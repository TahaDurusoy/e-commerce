<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login'); // Giriş yap sayfasını çağırır
    }

    public function register()
    {
        return view('auth/register'); // auth/register view dosyasını çağırıyoruz
    }
}
