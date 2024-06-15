<?php
// services/ProductService.php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Categories.php';

class ProductService {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }
    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $this->db->execute($sql);
        $data = $this->db->getAllData();
        $categories = [];
        if ($data) {
            foreach ($data as $item) {
                $product = new Categories(
                    $item['id'], 
                    $item['CateName'], 
                );
                $categories[] = $categories;
            }
        }
        return $categories;
    }
}
?>