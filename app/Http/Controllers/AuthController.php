<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function postAuthenticate(string $provider) {
        $provider = ['user','retailer'];
        if(!in_array($provider, $provider)) {
            return response()->json(['errors' => ['main' => 'Wrong provider provided']], 422);
        }

        return 'provider ' . $provider;
    }
}
