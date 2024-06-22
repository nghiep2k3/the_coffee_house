<?php
// models/Bill.php

class Bill {
    public $id;
    public $username;
    public $tel;
    public $address;
    public $total_item;
    public $money;

    public function __construct($id = null, $username, $tel, $address, $total_item, $money) {
        $this->id = $id;
        $this->username = $username;
        $this->tel = $tel;
        $this->address = $address;
        $this->total_item = $total_item;
        $this->money = $money;
    }
}
?>