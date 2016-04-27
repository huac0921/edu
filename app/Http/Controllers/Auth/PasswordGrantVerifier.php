<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: huac
 * Date: 16/4/27
 * Time: 下午6:16
 */

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}