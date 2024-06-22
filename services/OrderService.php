<?php
// services/OrderService.php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Bill.php';
require_once __DIR__ . '/../services/ProductService.php';

class OrderService
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function addOrder($username, $productId, $quantity)
    {
        // Giả sử tổng tiền là giá sản phẩm nhân với số lượng
        $productService = new ProductService();
        $product = $productService->getProductById($productId);
        $total = $product->unit_price * $quantity;
        $create_id = time(); // Sử dụng timestamp làm create_id

        $order = new Order(null, $username, $quantity, $total, $create_id, $productId);

        $sql = "INSERT INTO orders (username, quantity, total, create_id, id_product) 
                VALUES ('{$order->username}', '{$order->quantity}', '{$order->total}', '{$order->create_id}', '{$order->id_product}')";
        return $this->db->execute($sql);
    }

    public function addBills($username, $tel, $address, $total_item, $money)
    {
        echo "Username: " . $username;
        echo "Tel: " . $tel;
        echo "Address: " . $address;
        echo "Total Item: " . $total_item;
        echo "Money: " . $money;

        $order = new Bill(null, $username, $tel, $address, $total_item, $money);

        $sql = "INSERT INTO bills (`username`, `tel`, `address`, `total_item`, `money`) 
                VALUES ('{$order->username}', '{$order->tel}', '{$order->address}', '{$order->total_item}', '{$order->money}')";
        return $this->db->execute($sql);
    }

    public function getOrdersByUsername($username)
    {
        $sql = "SELECT orders.*, products.name as product_name, products.src_img as product_image, products.unit_price as product_price 
                FROM orders 
                JOIN products ON orders.id_product = products.id 
                WHERE orders.username = '{$username}'";
        $this->db->execute($sql);
        $data = $this->db->getAllData();
        $orders = [];
        if ($data) {
            foreach ($data as $item) {
                $order = [
                    'id' => $item['id'],
                    'username' => $item['username'],
                    'quantity' => $item['quantity'],
                    'total' => $item['total'],
                    'create_id' => $item['create_id'],
                    'id_product' => $item['id_product'],
                    'product_name' => $item['product_name'],
                    'product_image' => $item['product_image'],
                    'product_price' => $item['product_price']
                ];
                $orders[] = $order;
            }
        }
        return $orders;
    }

    public function deleteOrder($orderId)
    {
        $sql = "DELETE FROM orders WHERE id = '{$orderId}'";
        return $this->db->execute($sql);
    }


}
?>