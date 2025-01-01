<?php

namespace App\Controllers;

use App\Libraries\MongoDBLibrary;
use MongoDB\BSON\ObjectId;

class AdminProductsController extends BaseController
{
    protected $mongoDB;

    public function __construct()
    {
        $this->mongoDB = new MongoDBLibrary();
    }

    public function index()
    {
        try {
            $products = $this->mongoDB->find('products');
            return view('admin', ['products' => $products]);
        } catch (\Exception $e) {
            return redirect()->to('/admin')->with('error', 'Ürünler yüklenirken bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $product = $this->mongoDB->findOne('products', ['_id' => new ObjectId($id)]);
            if (!$product) {
                return redirect()->to('/admin/products')->with('error', 'Ürün bulunamadı.');
            }
            return view('admin/products/edit', ['product' => $product]);
        } catch (\Exception $e) {
            return redirect()->to('/admin/products')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function update($id)
    {
        try {
            $productCode = $this->request->getPost('product_code');
            $price = $this->request->getPost('price');
            $image = $this->request->getFile('image');

            $slug = url_title($productCode, '-', true);

            $updateData = [
                'product_code' => $productCode,
                'price' => $price,
                'slug' => $slug, 
            ];

            if ($image && $image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move(FCPATH . 'images', $imageName);
                $updateData['image'] = $imageName;
            }

            $this->mongoDB->update('products', ['_id' => new ObjectId($id)], ['$set' => $updateData]);
            return redirect()->to('/admin/products')->with('success', 'Ürün başarıyla güncellendi.');
        } catch (\Exception $e) {
            return redirect()->to('/admin/products')->with('error', 'Ürün güncellenirken bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function add()
    {
        if ($this->request->getMethod() === 'post') {
            try {
                $productCode = $this->request->getPost('product_code');
                $price = $this->request->getPost('price');
                $image = $this->request->getFile('image');

                $slug = url_title($productCode, '-', true);

                if ($image && $image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move(FCPATH . 'images', $imageName);
                } else {
                    return redirect()->back()->with('error', 'Resim yüklenemedi.');
                }

                $this->mongoDB->insert('products', [
                    'product_code' => $productCode,
                    'price' => $price,
                    'slug' => $slug, 
                    'image' => $imageName,
                ]);

                return redirect()->to('/admin/products')->with('success', 'Ürün başarıyla eklendi!');
            } catch (\Exception $e) {
                return redirect()->to('/admin/products/add')->with('error', 'Ürün eklenirken bir hata oluştu: ' . $e->getMessage());
            }
        }

        return view('admin/products/add');
    }

    public function delete($id)
    {
        try {
            $result = $this->mongoDB->delete('products', ['_id' => new \MongoDB\BSON\ObjectId($id)]);

            if ($result->getDeletedCount() > 0) {
                return $this->response->setJSON(['success' => true, 'message' => 'Ürün başarıyla silindi!']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Ürün bulunamadı.']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Bir hata oluştu: ' . $e->getMessage()]);
        }
    }
}
