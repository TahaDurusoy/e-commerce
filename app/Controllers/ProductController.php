<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class ProductController extends BaseController
{
    public function index()
    {
        try {
            $mongoLibrary = new MongoDBLibrary();
            $productsCollection = $mongoLibrary->getCollection('products');

            $data['products'] = $productsCollection->find()->toArray();
            return view('admin/products', $data); // 'admin/products' görünümüne yönlendirme
        } catch (\Exception $e) {
            // Hata durumunda kullanıcıya mesaj göster
            echo "Hata: " . $e->getMessage();
        }
    }
}
