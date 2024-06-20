<?php
class Order {
    public $id;
    public $username;
    public $total;
    public $create_id;
    public $id_product;

    public function __construct($id, $username, $total, $create_id, $id_product) {
        $this->id = $id;
        $this->username = $username;
        $this->total = $total;
        $this->create_id = $create_id;
        $this->id_product = $id_product;
    }
}
?>
