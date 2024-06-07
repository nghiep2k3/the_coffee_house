<?php
class Model {
    protected $db;

    public function __construct() {
        $servername = "localhost:4306";
        $username = "root";
        $password = "";
        $dbname = "nghiep1320";

        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }
}
?>