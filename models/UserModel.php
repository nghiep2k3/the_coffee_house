<?php
class UserModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getUser($username, $password) {
        $sql = "SELECT * FROM account WHERE username = ? AND password = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
