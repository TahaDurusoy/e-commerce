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

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];

        try {
            $mongoDBLibrary->update(
                'users',
                ['_id' => new \MongoDB\BSON\ObjectId($id)],
                ['$set' => $data]
            );

            return redirect()->to('/admin')->with('success', 'Kullanıcı başarıyla güncellendi.');
        } catch (\Exception $e) {
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
            log_message('error', $e->getMessage()); 
            return $this->response->setJSON(['success' => false, 'message' => 'Kullanıcı silinirken bir hata oluştu.']);
        }

    }


}

