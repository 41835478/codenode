<?php
/**
 * Created by PhpStorm.
 * User: asuspc
 * Date: 2017/3/16
 * Time: 23:06
 */

namespace App\Http\Api\Controllers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController
{
    public function login(Request $request){

        $credentials['email'] = $request->get('email');
        $credentials['password'] = $request->get('password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['result' => '邮箱或密码错误.','errno'=>101]);
        }
       // $user = JWTAuth::parseToken()->authenticate();
        return response()->json(['result' => $token,'errno'=>0,'username'=>$request->get('email')]);
    }
}