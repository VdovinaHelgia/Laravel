<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function registration()
    {
        return view('registration');
    }

    public function registrationOk()
    {
        return view('registration-ok');
    }
    
    public function authentication()
    {
        return view('authentication');
    }
}
