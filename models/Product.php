<?php
class Product {
    public $id;
    public $name;
    public $quantity;
    public $unit_price;
    public $description;
    public $src_img;
    public $IdCategory;
    public function __construct($id, $name, $quantity, $unit_price, $description, $src_img, $IdCategory) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;
        $this->description = $description;
        $this->src_img = $src_img;
        $this->IdCategory = $IdCategory;
    }
}
?>