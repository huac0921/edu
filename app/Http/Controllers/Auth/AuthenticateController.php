<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use JWTAuth;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function register(Request $request) {

        $newUser = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($request->get('password')),
        ];
        $user = User::create($newUser);
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'));
    }
}
