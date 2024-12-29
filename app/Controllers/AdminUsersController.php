<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class AdminUsersController extends BaseController
{
    protected $mongoDB;

    public function __construct()
    {
        $this->mongoDB = new MongoDBLibrary();
    }
    public function update($id)
    {
        $mongoDBLibrary = new MongoDBLibrary();

        // Kullanıcı verilerini al
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];

        try {
            // MongoDB'de kullanıcıyı güncelle
            $mongoDBLibrary->update(
                'users',
                ['_id' => new \MongoDB\BSON\ObjectId($id)],
                ['$set' => $data]
            );

            // Başarılı mesajı ile geri dön
            return redirect()->to('/admin')->with('success', 'Kullanıcı başarıyla güncellendi.');
        } catch (\Exception $e) {
            // Hata mesajı ile geri dön
            return redirect()->to('/admin')->with('error', 'Kullanıcı güncellenirken bir hata oluştu.');
        }
    }




    public function index()
    {
        $users = $this->mongoDB->find('users');
        return view('admin/users/manage', ['users' => $users]);
    }
    public function edit($id)
    {
        // MongoDB kütüphanesini kullanarak kullanıcı bilgilerini çek
        $mongoDBLibrary = new MongoDBLibrary();
        $user = $mongoDBLibrary->findOne('users', ['_id' => new \MongoDB\BSON\ObjectId($id)]);

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Kullanıcı bulunamadı.');
        }

        return view('admin/users/edit', ['user' => $user]);
    }
    public function editUser($id)
    {
        $user = $this->mongoDB->findOne('users', ['_id' => new \MongoDB\BSON\ObjectId($id)]);
        if (!$user) {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }
        return view('admin/users/edit', ['user' => $user]);
    }


    public function delete($id)
    {
        $mongoDBLibrary = new MongoDBLibrary();

        try {
            $mongoDBLibrary->delete('users', ['_id' => new \MongoDB\BSON\ObjectId($id)]);
            return $this->response->setJSON(['success' => true, 'message' => 'Kullanıcı başarıyla silindi!']);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage()); // Loglama eklenmeli
            return $this->response->setJSON(['success' => false, 'message' => 'Kullanıcı silinirken bir hata oluştu.']);
        }

    }


}

