<?php
class UserModel {
    private $pdo;

    public function __construct() {
        $dsn = 'mysql:host=localhost:4306;dbname=coffeehp;charset=utf8';
        $username = 'your_database_username';
        $password = 'your_database_password';

        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function validateUser($username, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $stmt->execute(['username' => $username, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
