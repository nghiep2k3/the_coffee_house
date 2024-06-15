<?php
// services/ProductService.php
// services/ProductService.php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Product.php';

class ProductService {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $this->db->execute($sql);
        $data = $this->db->getAllData();
        $products = [];
        if ($data) {
            foreach ($data as $item) {
                $product = new Product(
                    $item['id'], 
                    $item['name'], 
                    $item['quantity'], 
                    $item['unit_price'], 
                    $item['description'], 
                    $item['src_img']
                );
                $products[] = $product;
            }
        }
        return $products;
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = " . intval($id);
        $this->db->execute($sql);
        $item = $this->db->getData();
        if ($item) {
            return new Product(
                $item['id'], 
                $item['name'], 
                $item['quantity'], 
                $item['unit_price'], 
                $item['description'], 
                $item['src_img']
            );
        }
        return null;
    }
}

?>