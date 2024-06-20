<?php
// models/OrderWithProductDetails.php

class OrderWithProductDetails {
    public $id;
    public $username;
    public $quantity;
    public $total;
    public $create_id;
    public $id_product;
    public $product_name;
    public $product_image;
    public $product_price;

    public function __construct($id, $username, $quantity, $total, $create_id, $id_product, $product_name, $product_image, $product_price) {
        $this->id = $id;
        $this->username = $username;
        $this->quantity = $quantity;
        $this->total = $total;
        $this->create_id = $create_id;
        $this->id_product = $id_product;
        $this->product_name = $product_name;
        $this->product_image = $product_image;
        $this->product_price = $product_price;
    }
}
?>