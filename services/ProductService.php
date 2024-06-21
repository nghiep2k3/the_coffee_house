<?php
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
                    $item['src_img'],
                    $item['idCategory']
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
                $item['src_img'],
                $item['idCategory']
            );
        }
        return null;
    }
    public function getProductsByCategory($categoryId) {
        $sql = "SELECT p.*, c.CateName 
                FROM products p 
                JOIN categories c ON p.idCategory = c.id 
                WHERE c.id = $categoryId";
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
                    $item['src_img'],
                    $item['idCategory']
                );
                $products[] = $product;
            }
        }
        return $products;
    }
    public function addProduct($name, $price, $quantity, $description, $image, $category) {
        $product = new Product(null, $name, $quantity, $price, $description, $image, $category);
        $sql = ("INSERT INTO products (`name`, unit_price, quantity, `description`,src_img, idCategory)
         VALUES ('$product->name','$product->unit_price', '$product->quantity', '$product->description', '$product->src_img','$product->IdCategory')");
        $result = $this->db->execute($sql);
        if ($result) {
            return "Thêm thành công";
        } else {
            return "Error: " . $result->error;
        }
    }
}