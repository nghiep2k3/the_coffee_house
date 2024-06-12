<?php
// controllers/ProductController.php
require_once __DIR__ . '/../services/ProductService.php';

class ProductController {
    private $productService;

    public function __construct() {
        $this->productService = new ProductService();
    }

    public function list() {
        $products = $this->productService->getAllProducts();
        include __DIR__ . '/../views/product_list.php';
    }
}
?>