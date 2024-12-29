<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class AdminController extends BaseController
{
    public function index()
    {
        // Kullanıcının oturum durumu kontrol edilir
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login'); // Eğer giriş yapılmamışsa login sayfasına yönlendirilir
        }

        // Kullanıcının rolünü kontrol et
        $user = session()->get('user');
        if ($user['role'] !== 'admin') {
            return redirect()->to('/')->with('error', 'Bu sayfaya erişim izniniz yok.'); // Admin değilse anasayfaya yönlendir
        }

        // MongoDB kütüphanesi kullanılarak ürün ve kullanıcı bilgileri alınır
        $mongoDBLibrary = new MongoDBLibrary();

        // 'products' koleksiyonundaki tüm ürünleri çek
        $products = $mongoDBLibrary->find('products');

        // 'users' koleksiyonundaki tüm kullanıcıları çek
        $users = $mongoDBLibrary->find('users');

        // Görünüm dosyasına veriler gönderilir
        return view('admin', [
            'products' => $products,
            'users' => $users,
        ]);
    }
}
