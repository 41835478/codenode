<?php

namespace App\Http\ApiController;

use Illuminate\Http\Request;
use Lcobucci\JWT\Configuration;
class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function auth(){
        $config = new Configuration();
    }
}
