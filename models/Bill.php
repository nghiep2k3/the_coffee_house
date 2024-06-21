<?php
// models/Bill.php

class Bill {
    public $id;
    public $username;
    public $tel;
    public $address;
    public $total_item;
    public $money;

    public function __construct($username, $tel, $address, $total_item, $money, $id = null) {
        $this->id = $id;
        $this->username = $username;
        $this->tel = $tel;
        $this->address = $address;
        $this->total_item = $total_item;
        $this->money = $money;
    }
}
?>