<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use App\Models\User;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postAuthenticate(Request $request, string $providerP) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $provider = ['user','retailer'];
        if(!in_array($providerP, $provider)) {
            return response()->json(['errors' => ['main' => 'Wrong provider provided']], 422);
        }

        $selectedProvider = $this->getProvider($providerP);
        $model = $selectedProvider->where('email', '=', $request->input('email'))->first();

        if (!$model) {
            return response()->json(['errors' => ['main' => 'Bad Credentials']], 401);
        }

        if (Hash::check($request->input('password'), $model->password)) {
            return response()->json(['errors' => ['main' => 'Bad Credentials']], 401);
        }

        return 'provider ' . $providerP;
    }

    public function getProvider(string $provider): Authorizable {
        if ($provider == "user") {
            return new User();
        } else if($provider == "retailer") {
            return new Retailer();
        } else {
            throw new \Exception('Provider not found');
        }
    }
}
