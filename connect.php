<?php
$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "coffeehp";
$conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn) {
//     echo "thành công";
// } else {
//     echo ("Kết nối thất bại " . $conn->connect_error);
// }

if($conn->connect_error){
    echo ("Kết nối thất bại " . $conn->connect_error);

}
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection()
{
    $servername = "localhost:4306";
    $username = "root";
    $password = "";
    $dbname = "coffeehp";
    $conn = new mysqli($servername, $username, $password, $dbname);


    $conn = new PDO($servername, $username, $password);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
 
?>