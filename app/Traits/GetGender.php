<?php

namespace App\Traits;


trait GetGender
{
    protected function getGender($name){
        $api_key = env('GENDER_API_KEY');
        $api_url = "https://gender-api.com/get?name=$name&key=$api_key";

        $response = file_get_contents($api_url);

        if ($response === false) {
            return 'Unknown';
        }

        $data = json_decode($response, true);

        if ($data['gender'] === 'unknown') {
            return 'Unknown';
        } else {
            return $data['gender'];
        }
    }
}