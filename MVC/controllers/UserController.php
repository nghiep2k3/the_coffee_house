<?php
class UserController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = $this->model('UserModel');
            $user = $userModel->getUser($username, $password);

            if ($user) {
                // Đăng nhập thành công
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=home&action=index');
            } else {
                // Đăng nhập thất bại
                $this->view('login', ['error' => 'Invalid username or password']);
            }
        } else {
            $this->view('login');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?controller=user&action=login');
    }
}
?>