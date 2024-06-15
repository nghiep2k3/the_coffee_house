<?php
// services/OrderService.php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Order.php';

class OrderService {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function addOrder($username, $productId, $quantity) {
        // Giả sử tổng tiền là giá sản phẩm nhân với số lượng
        $productService = new ProductService();
        $product = $productService->getProductById($productId);
        $total = $product->unit_price * $quantity;
        $create_id = time(); // Sử dụng timestamp làm create_id

        $order = new Order(2, $username, $total, $create_id, $productId);

        $sql = "INSERT INTO orders (username, total, create_id, id_product) 
                VALUES ('{$order->username}', '{$order->total}', '{$order->create_id}', '{$order->id_product}')";
        return $this->db->execute($sql);
    }

    public function getOrdersByUsername($username) {
        $sql = "SELECT * FROM orders WHERE username = '{$username}'";
        $this->db->execute($sql);
        $data = $this->db->getAllData();
        $orders = [];
        if ($data) {
            foreach ($data as $item) {
                $order = new Order(
                    $item['id'], 
                    $item['username'], 
                    $item['total'], 
                    $item['create_id'], 
                    $item['id_product']
                );
                $orders[] = $order;
            }
        }
        return $orders;
    }
}
?>