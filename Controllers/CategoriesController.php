<?php
require_once __DIR__ . '/../services/CategoriesService.php';

class CategoriesController {
    private $categoryService;

    public function __construct() {
        $this->categoryService = new CategoriesService(new Database());
    }

    public function getAllCategories() {
        return $this->categoryService->getAllCategories();
    }
}
?>
