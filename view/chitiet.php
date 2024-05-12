<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .figure {
        height: 200px;
        width: 200px;
    }

    img {
        width: 100%;
    }

    p {
        font-size: 25px;
    }
    </style>
</head>
<?php
require_once "../controller/product_detail.php";
?>

<body>
    <h1>Chi tiết sản phẩm</h1>
    <h1>Đây là id số: <?= $product['order_id'] ?></h1>
    <h1>Hình ảnh sản phẩm</h1>
    <div class="figure">
        <img src="<?= $product['src_img'] ?>" alt="Lỗi">
    </div>
    <h1>Mô tả sản phẩm:</h1>
    <p><?= $product['description'] ?></p>
    <h1>Giá:</h1>
    <p><?= $product['unit_price'] ?></p>

</body>


</html>