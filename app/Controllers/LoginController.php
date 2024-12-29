<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class LoginController extends BaseController
{
    public function index()
    {
        // Login sayfasını yükler
        return view('login');
    }

    public function login()
    {
        // Kullanıcıdan gelen e-posta ve şifre
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // MongoDB'den kullanıcı bilgilerini al
        $mongoDBLibrary = new MongoDBLibrary();
        $user = $mongoDBLibrary->findByEmail('users', $email);

        // Kullanıcı ve şifre doğrulama
        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {

            // Oturum açma işlemleri
            session()->set([
                'isLoggedIn' => true,
                'user' => [
                    'id' => $user['_id'] ?? $user['id'], // MongoDB ObjectID uyumu
                    'name' => $user['name'],
                    'role' => $user['role'], // 'admin' veya 'user'
                ]
            ]);
            return redirect()->to('/'); // Başarılı girişte anasayfaya yönlendirme
        }

        // Hatalı giriş durumları
        if (!$user) {
            return redirect()->back()->with('error', 'Bu e-posta adresi kayıtlı değil.');
        }

        return redirect()->back()->with('error', 'Geçersiz şifre.');
    }


    public function logout()
    {
        // Oturum kapatma işlemleri
        session()->destroy();
        return redirect()->to('/login'); // Çıkış yaptıktan sonra giriş sayfasına yönlendirme
    }
}
