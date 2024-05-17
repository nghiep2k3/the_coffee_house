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

    // Lấy dữ liệu từ form
    $id_product = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
    $id_account = 3; // Bạn có thể thay đổi để lấy ID người dùng hiện tại
    $name_account = 'vinhmom123'; // Bạn có thể thay đổi để lấy tên người dùng hiện tại

    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng của người dùng
    $sql_check = "SELECT quantity FROM cart WHERE id_account = $id_account AND id_product = $id_product";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
        $row = $result_check->fetch_assoc();
        $new_quantity = $row['quantity'] + 1;
        $sql_update = "UPDATE cart SET quantity = $new_quantity WHERE id_account = $id_account AND id_product = $id_product";
        $conn->query($sql_update);
    } else {
        // Sản phẩm chưa có trong giỏ hàng, thêm mới
        $sql_insert = "INSERT INTO cart (id_account, name_account, id_product, quantity) VALUES ($id_account, '$name_account', $id_product, 1)";
        $conn->query($sql_insert);
    }

    // Đóng kết nối
    $conn->close();
    // Quay lại trang danh sách sản phẩm và hiển thị thông báo
    header("Location: ../view/dssp.php?message=" . "Succes");
    exit();
}
?>