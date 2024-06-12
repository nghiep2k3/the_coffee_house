<?php
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function login($username, $password) {
        $user = $this->userModel->getUser($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }
}
?>
