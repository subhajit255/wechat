<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function contacts($key)
    {
        // dd($key);
        DB::beginTransaction();
        try {
            $users = User::where('id', '!=', auth()->user()->id);
            if($key == 1) {
                $users = $users->get();
            }elseif($key == 2) {
                $users = $users->where('status', true)->get();
            }else {
                $users = $users->where('status', false)->get();
            }
            if (count($users) > 0) {
                $data = $users;
                $message = 'Users Found';
            } else {
                $data = [];
                $message = 'No users found';
            }
            return $this->responseJson(true, 200, $message, $users);
        } catch (\Throwable $e) {
            DB::rollback();
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, 'Something went wrong', []);
        }
    }
}
