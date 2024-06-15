<?php
require_once __DIR__ . '/../services/UserService.php';
class UserController {
    private $userService;

    public function __construct($userService) {
        $this->userService = $userService;
    }

    public function login($username, $password) {
        $user = $this->userService->getUser($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }
    public function register($phone, $username, $password, $rePass) {
        return $this->userService->createUser($phone, $username, $password, $rePass);
    }
}
?>
