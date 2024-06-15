<?php
// controllers/ProductController.php
require_once __DIR__ . '/../services/ProductService.php';
require_once __DIR__ . '/../services/OrderService.php';

class ProductController {
    private $productService;
    private $orderService;

    public function __construct() {
        $this->productService = new ProductService();
        $this->orderService = new OrderService();
    }

    public function list() {
        $products = $this->productService->getAllProducts();
        require_once __DIR__ . '/../views/product_list.php';
    }

    public function view($id) {
        $product = $this->productService->getProductById($id);
        require_once __DIR__ . '/../views/product_detail.php';
    }

    public function addToCart() {
        if (isset($_POST['product_id']) && isset($_POST['username']) && isset($_POST['quantity'])) {
            $productId = $_POST['product_id'];
            $username = $_POST['username'];
            $quantity = $_POST['quantity'];
            
            $this->orderService->addOrder($username, $productId, $quantity);
            header('Location: ?action=list_products');
        }
    }
}
?>