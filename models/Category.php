<?php

class Category {
    public $id;
    public $CateName;
    public function __construct($id, $CateName) {
        $this->id = $id;
        $this->CateName = $CateName;
    }
}
?>