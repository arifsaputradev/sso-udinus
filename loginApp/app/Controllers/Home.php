<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    
    public function home() 
    {
        return view('home');
    }

    public function logout() 
    {
        session_destroy();
        return redirect()->to('/login');
    }
}
