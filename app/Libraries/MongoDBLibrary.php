<?php

namespace App\Libraries;

require_once APPPATH . '../vendor/autoload.php'; // Composer ile yüklenen MongoDB kütüphanesini dahil edin

use MongoDB\Client;

class MongoDBLibrary
{
    protected $client;  // MongoDB istemcisi
    protected $db;      // Veritabanı

    public function __construct()
    {
        // MongoDB'ye bağlantı
        $this->client = new Client("mongodb://localhost:27017"); // Bağlantı URL'si, localhost ve varsayılan port
        $this->db = $this->client->selectDatabase('watch'); // 'watch' adında bir veritabanı seçiyoruz (kendi veritabanı adınıza göre değiştirin)
    }

    // Verilen koleksiyona erişim sağlamak için bir metod
    public function getCollection($collectionName)
    {
        return $this->db->selectCollection($collectionName);
    }
}
