<?php
require_once 'model/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function showLoginForm() {
        require 'view/form_login.php';
    }

    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->userModel->validateUser($username, $password)) {
                echo "Login successful";
            } else {
                echo "Invalid username or password";
            }
        } else {
            $this->showLoginForm();
        }
    }
}
?>
