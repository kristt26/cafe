<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(session()->get('isLogin')){
            return view('home');
        }
        return view('user/home');
    }
}
