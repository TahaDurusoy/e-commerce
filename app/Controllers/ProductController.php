<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class ProductController extends BaseController
{
    protected $mongoDB;

    public function __construct()
    {
        // MongoDBLibrary sınıfını başlatıyoruz
        $this->mongoDB = new MongoDBLibrary();
        helper('text'); // Text helper'ı yükleme
    }

    public function index()
    {
        try {
            // MongoDB'den ürünleri al
            $products = $this->mongoDB->find('products');

            // Kelime sınırlandırmasını uygula (eğer açıklama varsa)
            foreach ($products as &$product) {
                $product['short_description'] = word_limiter($product['description'] ?? '', 20);
            }

            // Ürünleri 'products' görünümüne gönder
            return view('products', ['products' => $products]);
        } catch (\Exception $e) {
            return redirect()->to('/')->with('error', 'Ürünler yüklenirken bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function detail($slug)
    {
        try {
            // MongoDB'den slug'a göre ürünü bul
            $product = $this->mongoDB->findOne('products', ['slug' => $slug]);

            if (!$product) {
                return redirect()->to('/products')->with('error', 'Ürün bulunamadı.');
            }

            // Ürünü 'product_detail' görünümüne gönder
            return view('product_detail', ['product' => $product]);
        } catch (\Exception $e) {
            return redirect()->to('/products')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }
}
