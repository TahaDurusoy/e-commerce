<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class RegisterController extends BaseController
{
    protected $mongoDB;

    public function __construct()
    {
        $this->mongoDB = new MongoDBLibrary();
    }

    public function index()
    {
        return view('register');
    }

    public function register()
    {
      
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
            'name' => 'required|min_length[3]',
        ];

      
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

    
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role') ?? 'user';

       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

       
        try {
            $this->mongoDB->insert('users', [
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'role' => $role,
            ]);

            return redirect()->to('/login')->with('success', 'Kayıt başarıyla tamamlandı.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }
}
