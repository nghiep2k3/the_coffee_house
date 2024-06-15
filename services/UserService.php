<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/User.php';

class UserService {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }
    public function getUser($username, $password) {
        $sql = "SELECT * FROM account WHERE username = '$username' LIMIT 1";
        $result = $this->db->execute($sql);
        $user = null;
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            if ($password == $data['password']) {
                $user = new User(
                    $data['id'], 
                    $data['username'], 
                    $data['password'], 
                    $data['role']
                );
            }
        }
        return $user;
    }
    public function createUser($phone, $username, $password, $rePass) {
        if ($password !== $rePass) {
            return "Passwords do not match.";
        }
        $user = new User(null, $username, $password, 'user');
        $sql = "INSERT INTO account (username, password, role) VALUES ('$user->username','$user->password', '$user->role')";
        $result = $this->db->execute($sql);
        if ($result) {
            return "User created successfully.";
        } else {
            return "Error: " . $result->error;
        }
    }
}
?>
