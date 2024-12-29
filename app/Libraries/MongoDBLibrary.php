<?php

namespace App\Libraries;

require_once APPPATH . '../vendor/autoload.php';

use MongoDB\Client;
use MongoDB\Exception\Exception;

class MongoDBLibrary
{
    protected $client;
    protected $db;

    public function __construct()
    {
        try {
            $this->client = new Client(getenv('MONGO_DB_URI') ?: 'mongodb://localhost:27017');
            $this->db = $this->client->selectDatabase(getenv('MONGO_DB_NAME') ?: 'chronocraft');
        } catch (Exception $e) {
            log_message('error', 'MongoDB Connection Error: ' . $e->getMessage());
            throw new \RuntimeException('Veritabanı bağlantısı sırasında bir hata oluştu.');
        }
    }

    public function getCollection(string $collectionName)
    {
        try {
            return $this->db->selectCollection($collectionName);
        } catch (Exception $e) {
            log_message('error', 'Error Accessing Collection: ' . $e->getMessage());
            throw new \RuntimeException('Koleksiyon erişiminde bir hata oluştu.');
        }
    }

    public function findByEmail(string $collectionName, string $email)
    {
        try {
            $collection = $this->getCollection($collectionName);
            $document = $collection->findOne(['email' => $email]);
            return $document ? (array) $document : null;
        } catch (Exception $e) {
            log_message('error', 'Error Finding Document by Email: ' . $e->getMessage());
            return null;
        }
    }

    public function insert(string $collectionName, array $data): bool
    {
        try {
            $collection = $this->getCollection($collectionName);
            $result = $collection->insertOne($data);
            return $result->isAcknowledged();
        } catch (\Exception $e) {
            log_message('error', 'Error inserting document: ' . $e->getMessage());
            return false;
        }
    }

    public function findOne(string $collectionName, array $filter = [])
    {
        try {
            $collection = $this->getCollection($collectionName);
            $document = $collection->findOne($filter);
            return $document ? (array) $document : null;
        } catch (Exception $e) {
            log_message('error', 'Error Performing FindOne Query: ' . $e->getMessage());
            return null;
        }
    }

    public function delete(string $collectionName, array $filter)
    {
        try {
            $collection = $this->getCollection($collectionName);
            return $collection->deleteOne($filter);
        } catch (\Exception $e) {
            log_message('error', 'Error deleting document: ' . $e->getMessage());
            throw $e;
        }
    }


    public function update(string $collectionName, array $filter, array $updateData)
    {
        try {
            $collection = $this->getCollection($collectionName);
            return $collection->updateOne($filter, $updateData);
        } catch (\Exception $e) {
            log_message('error', 'Error Performing Update Operation: ' . $e->getMessage());
            throw $e;
        }
    }

    public function find(string $collectionName, array $filter = []): array
    {
        try {
            $collection = $this->getCollection($collectionName);
            return $collection->find($filter)->toArray();
        } catch (Exception $e) {
            log_message('error', 'Error Performing Find Query: ' . $e->getMessage());
            return [];
        }
    }
}
