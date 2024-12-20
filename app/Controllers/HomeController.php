<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return view('home'); // Ana sayfa görünümü (App/Views/home.php)
    }

    public function about()
    {
        return view('about'); // Hakkımızda sayfası (App/Views/about.php)
    }
}
