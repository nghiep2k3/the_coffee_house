<?php
class Database {
    private $servername = "localhost:4306";
    private $username = "root";
    private $password = "";
    private $dbname = "web_nang_cao";
    private $conn = NULL;
    private $result = NULL;
    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if(!$this->conn) {
            echo "Kết nối thất bại";
            exit(); 
        }
        else{
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }
    public function execute($sql) {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }
    public function getData() {
        if($this->result) {
            $data = mysqli_fetch_array($this->result);
        }
        else {
            $data = 0;
        }
        return $data;
    }
    public function getAllData() {
        if(!$this->result) {
            $data = 0;
        }
        else {
            while($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
}
?>