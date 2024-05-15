<?php
include "../connect.php";

// Tạo bảng nếu chưa tồn tại
$sql = "CREATE TABLE IF NOT EXISTS product(
    id INT(100) UNSIGNED PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    quantity VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    note VARCHAR(100) NOT NULL,
    total VARCHAR(100) NOT NULL,
    create_id VARCHAR(100) NOT NULL,
    last_id VARCHAR(100) NOT NULL
)";

// Thực thi truy vấn
if ($conn->query($sql) === TRUE) {
    echo "Tạo bảng thành công";
} else {
    echo "Lỗi khi tạo bảng: ";
}

// Dữ liệu cần chèn
$id = 2;
$name = "John Doe";
$phone = "123456789";
$address = "123 Main Street";
$note = "Delivery instructions";
$total = "50.00";
$create_id = "1";
$last_id = "1";

// Truy vấn chèn dữ liệu
$sql2 = "INSERT INTO orders (id,name, phone, address, note, total, create_id, last_id) 
        VALUES ('$id','$name', '$phone', '$address', '$note', '$total', '$create_id', '$last_id')";

if ($conn->query($sql2) === TRUE) {
    echo "Chèn dữ liệu thành công";
} else {
    echo "Lỗi khi chèn dữ liệu: ";
}
// Đóng kết nối
$conn->close();
?>