<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products'; // Veritabanındaki ürünler tablosu
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'price', 'stock'];
}
