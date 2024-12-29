<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class AuthController extends BaseController
{
    protected $mongoDB;

    public function __construct()
    {
        $this->mongoDB = new MongoDBLibrary();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Kullanıcıyı MongoDB'de bul
            $user = $this->mongoDB->findOne('users', ['email' => $email]);

            if (!$user) {
                return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
            }

            // Şifreyi doğrula
            if (!password_verify($password, $user['password'])) {
                return redirect()->back()->with('error', 'Hatalı şifre.');
            }

            // Oturum başlat
            session()->set('user', [
                'id' => (string)$user['_id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ]);

            return redirect()->to('/admin')->with('success', 'Giriş başarılı.');
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Başarıyla çıkış yapıldı.');
    }
}
