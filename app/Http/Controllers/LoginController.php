<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


/**
 * Created by PhpStorm.
 * User: huac
 * Date: 16/4/3
 * Time: 上午1:05
 */
class LoginController extends Controller{
    public function login(Request $request){
        $uid=$request->input('uid');
        dd($uid);
        return '123';
    }
    public function regist(){
        return '234';
    }

}