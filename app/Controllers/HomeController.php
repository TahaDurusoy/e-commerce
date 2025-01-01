<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return view('home'); 
    }

    public function about()
    {
        return view('about'); 
    }
}
