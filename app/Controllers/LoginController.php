<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class LoginController extends BaseController
{
    public function index()
    {
     
        return view('login');
    }

    public function login()
    {
       
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

   
        $mongoDBLibrary = new MongoDBLibrary();
        $user = $mongoDBLibrary->findByEmail('users', $email);

      
        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {

         
            session()->set([
                'isLoggedIn' => true,
                'user' => [
                    'id' => $user['_id'] ?? $user['id'], 
                    'name' => $user['name'],
                    'role' => $user['role'], 
                ]
            ]);
            return redirect()->to('/'); 
        }

     
        if (!$user) {
            return redirect()->back()->with('error', 'Bu e-posta adresi kayıtlı değil.');
        }

        return redirect()->back()->with('error', 'Geçersiz şifre.');
    }


    public function logout()
    {
        
        session()->destroy();
        return redirect()->to('/login'); 
    }
}
