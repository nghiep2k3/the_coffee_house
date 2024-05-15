<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    // Kết nối tới cơ sở dữ liệu
    include "../connect.php";

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Cập nhật trường active thành 0 cho sản phẩm có id tương ứng
    $sql = "UPDATE products SET active = 0 WHERE id = ?";
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
        $message = "Xóa thành công";
    }

    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();

    // Quay lại trang giỏ hàng và hiển thị thông báo
    header("Location: ../view/cart.php?message=" . urlencode($message));
    exit();
}
?>