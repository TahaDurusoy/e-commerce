<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Veritabanındaki kullanıcılar tablosu
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'role'];
}
