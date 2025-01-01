<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;

class ProductController extends BaseController
{
    protected $mongoDB;

    public function __construct()
    {
       
        $this->mongoDB = new MongoDBLibrary();
        helper('text'); 
    }

    public function index()
    {
        try {
         
            $products = $this->mongoDB->find('products');

           
            foreach ($products as &$product) {
                $product['short_description'] = word_limiter($product['description'] ?? '', 20);
            }

            
            return view('products', ['products' => $products]);
        } catch (\Exception $e) {
            return redirect()->to('/')->with('error', 'Ürünler yüklenirken bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function detail($slug)
    {
        try {
          
            $product = $this->mongoDB->findOne('products', ['slug' => $slug]);

            if (!$product) {
                return redirect()->to('/products')->with('error', 'Ürün bulunamadı.');
            }

         
            return view('product_detail', ['product' => $product]);
        } catch (\Exception $e) {
            return redirect()->to('/products')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }
}
