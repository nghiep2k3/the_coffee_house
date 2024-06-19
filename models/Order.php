<?php
// models/Order.php

class Order {
    public $id;
    public $username;
    public $quantity;
    public $total;
    public $create_id;
    public $id_product;

    // Constructor to initialize the order
    public function __construct($id, $username, $quantity, $total, $create_id, $id_product) {
        $this->id = $id;
        $this->username = $username;
        $this->quantity = $quantity;
        $this->total = $total;
        $this->create_id = $create_id;
        $this->id_product = $id_product;
    }
}
?>