<?php
// controllers/ProductController.php
require_once __DIR__ . '/../services/ProductService.php';
require_once __DIR__ . '/../services/OrderService.php';
require_once __DIR__ . '/../services/CategoriesService.php';

class ProductController {   
    private $productService;
    private $orderService;
    private $categoryService;

    public function __construct() {
        $this->productService = new ProductService(new Database());
        $this->orderService = new OrderService();
        $this->categoryService = new CategoriesService(new Database());
    }
    public function list() {
        $products = $this->productService->getAllProducts();
        $categories = $this->categoryService->getAllCategories();
        require_once __DIR__ . '/../views/product_list.php';
    }

    public function view($id) {
        $product = $this->productService->getProductById($id);
        require_once __DIR__ . '/../views/product_detail.php';
    }
    public function listByCategory($categoryId) {
        $products = $this->productService->getProductsByCategory($categoryId);
        $categories = $this->categoryService->getAllCategories();
        require __DIR__ . '/../views/product_list.php';
    }
    public function addToCart() {
        if (isset($_POST['product_id']) && isset($_POST['username']) && isset($_POST['quantity'])) {
            $productId = $_POST['product_id'];
            $username = $_POST['username'];
            $quantity = $_POST['quantity'];
            $this->orderService->addOrder($username, $productId, $quantity);
            header('Location: ../index.php?action=product_list');
        }
    }

    public function addProduct() {
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $category = $_POST['category_id'];
        $this->productService->addProduct($name, $price, $quantity, $description, $image,$category);
        header('Location: /the_coffee_house/views/admin.php');
    }
    

    public function showCart($username)
    {
        $orders = $this->orderService->getOrdersByUsername($username);
        require_once __DIR__ . '/../views/cart.php';
    }

    public function deleteOrder($user) {
        // if (isset($_POST['order_id'])) {
        //     $orderId = $_POST['order_id'];
        //     $this->orderService->deleteOrder($orderId);
        // }
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
            $this->orderService->deleteOrder($orderId);
        }
        header("Location: /the_coffee_house/routers/products_router.php?action=show_cart&username={$user}");
        exit();
    }

    public function checkout($username) {
        // Hiển thị trang thanh toán
        // header("Location: /the_coffee_house/views/checkout.php");
        $orders = $this->orderService->getOrdersByUsername($username);
        require_once __DIR__ . '/../views/checkout.php';
        exit();
    }
    
    public function processPayment() {
        // Xử lý thanh toán ở đây
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $totalAmount = isset($_POST['totalAmount']) ? $_POST['totalAmount'] : '';
        $productCount = isset($_POST['productCount']) ? $_POST['productCount'] : '';

        // Ở đây bạn có thể thực hiện các xử lý lưu thông tin thanh toán vào cơ sở dữ liệu,
        // gửi email thông báo, v.v...

        // Sau khi xử lý, có thể chuyển hướng người dùng đến trang hoàn thành thanh toán
        // hoặc trang chủ với thông báo thanh toán thành công.
        header("Location: /the_coffee_house/index.php");
        exit;
    }
    
}
?>