<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Category.php';

class CategoriesService {
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
                $category = new Category(
                    $item['id'], 
                    $item['CateName']
                );
                $categories[] = $category;
            }
        }
        return $categories;
    }
}
?>