<?php
// models/Product.php

class Categories {
    public $id;
    public $CateName;
    public function __construct($id, $CateName) {
        $this->id = $id;
        $this->CateName = $CateName;
    }
}
?>