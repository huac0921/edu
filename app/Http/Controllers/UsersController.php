<?php
namespace App\Http\Controllers;
use App\Http\Models\User;

/**
 * Created by PhpStorm.
 * User: huac
 * Date: 16/4/27
 * Time: 下午6:14
 */
class UsersController extends BaseController
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // 数组形式
        return $this->response->array($user->toArray());
    }
}