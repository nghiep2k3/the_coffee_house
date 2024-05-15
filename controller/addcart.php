<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    // Kiểm tra productId
    var_dump($productId);

    // Kết nối tới cơ sở dữ liệu
    include "../connect.php";

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Cập nhật trường active thành TRUE cho sản phẩm có id tương ứng
    $sql = "UPDATE products SET active = TRUE WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Gán biến productId vào câu lệnh SQL
    if (!$stmt->bind_param("i", $productId)) {
        die("Binding parameters failed: " . $stmt->error);
    }

    // Thực thi câu lệnh SQL
    if (!$stmt->execute()) {
        $message = "Error: " . $stmt->error;
    } else {
        $message = "Success";
    }

    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();

    // Quay lại trang danh sách sản phẩm và hiển thị thông báo
    header("Location: ../view/dssp.php?message=" . urlencode($message));
    exit();
}
?>