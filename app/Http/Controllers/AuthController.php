<?php
/**
 * Created by PhpStorm.
 * User: asuspc
 * Date: 2017/3/19
 * Time: 22:11
 */

namespace App\Http\Controllers;
use Socialite;

class AuthController
{
    public function redirectToProvider(){
        return Socialite::driver('github')->redirect();
    }
    /**
     * 从Github获取用户信息.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        session(['user'=>$user]);


        return view('login_success',['user'=>$user]);
      //  return response()->json($user);
    }
}