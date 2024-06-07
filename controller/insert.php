<?php
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $idCategory = $_POST['idCategory'];
    $best_seller = isset($_POST['best_seller']) ? 1 : 0;
    $target_dir = "../assets/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO products (name, price, image, idCategory, best_seller) VALUES ('$name', '$price', '".basename($_FILES["image"]["name"])."', '$idCategory', '$best_seller')";
            if (mysqli_query($conn, $sql)) {
                echo "Thêm sản phẩm thành công.";
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>