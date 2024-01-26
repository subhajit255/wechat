<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function index()
    {
        return view("signup");
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return $this->responseJson(false, 422, $validator->errors()->first());
        }
        DB::beginTransaction();
        try {
            $name = explode(' ', $request->name)[0];
            $gender = $this->getGender($name);
            $request->merge(['gender' => $gender]);
            $isUserCreated = User::create($request->except('_token'));
            if ($isUserCreated) {
                DB::commit();
                return $this->responseJson(true, 200, 'Sign up Successfully', route('sign-in'));
            }
        } catch (\Throwable $e) {
            DB::rollback();
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, 'Something went wrong', []);
        }
    }
    public function signIn()
    {
        return view("signin");
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseJson(false, 422, $validator->errors()->first());
        }
        DB::beginTransaction();
        try {
            $userData = array(
                'email' => $request->email,
                'password' => $request->password
            );
            if (auth()->attempt($userData)) {
                $user = auth()->user();
                $updateStatus = User::find(auth()->user()->id)->update(['status'=>true]);
                DB::commit();
                return $this->responseJson(true, 200, 'Login Successful', route('home'));
            } else {
                return $this->responseJson(false, 200, 'Incorrect Details');
            }
        } catch (\Throwable $e) {
            DB::rollback();
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, 'Something went wrong', []);
        }
    }
    public function getGender($name)
    {
        // $api_key = config('service.gender_api_key'); // Replace with your Gender-API key
        $api_key = '8caf901a695c1567907a99d5ed7139c5be3d718f70bfb66eeaf27f3fe4bd21f9'; // Replace with your Gender-API key

        $api_url = "https://gender-api.com/get?name=$name&key=$api_key";

        $response = file_get_contents($api_url);

        if ($response === false) {
            // Handle error
            return 'Unknown';
        }

        $data = json_decode($response, true);

        if ($data['gender'] === 'unknown') {
            return 'Unknown';
        } else {
            return $data['gender'];
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
        ]);
        if ($validator->fails()) {
            return $this->responseJson(false, 422, $validator->errors()->first());
        }
        DB::beginTransaction();
        try {
            $isUser = User::find($request->id);
            if ($request->hasFile('profile_image')) {
                $file = uniqid() . '.' . $request->profile_image->getClientOriginalExtension();
                $request->profile_image->move(public_path('storage/user_image'), $file);
                $updateUser = $isUser->update(['image' => $file]);
            }
            $updateUser = $isUser->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($updateUser) {
                DB::commit();
                return $this->responseJson(true, 200, 'Profile updated successfully');
            }
        } catch (\Throwable $e) {
            DB::rollback();
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, 'Something went wrong', []);
        }
    }
    public function logout()
    {
        try {
            $updateStatus = User::find(auth()->user()->id)->update(['status'=>false]);
            Auth::logout();
            return redirect('/sign-in');
        } catch (\Exception $e) {
            return $this->responseJson(false, 500, "Something Went Wrong");
        }
    }
}
