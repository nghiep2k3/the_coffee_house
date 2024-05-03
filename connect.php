<?php
$servername = "localhost:8081";
$username = "root";
$password = "";
$dbname = "coffeehp";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại " . $conn->connect_error);
}
?>