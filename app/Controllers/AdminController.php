<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class AdminController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login'); 
        }

        $user = session()->get('user');
        if ($user['role'] !== 'admin') {
            return redirect()->to('/')->with('error', 'Bu sayfaya erişim izniniz yok.'); // Admin değilse anasayfaya yönlendir
        }

        $mongoDBLibrary = new MongoDBLibrary();

        $products = $mongoDBLibrary->find('products');

        $users = $mongoDBLibrary->find('users');

        return view('admin', [
            'products' => $products,
            'users' => $users,
        ]);
    }
}
