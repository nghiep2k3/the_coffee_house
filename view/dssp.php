<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <?php
    if (isset($_GET['message'])) {
        echo "<p>" . htmlspecialchars($_GET['message']) . "</p>";
    }
    ?>
    <form action="../controller/addcart.php" method="post">
        <input type="hidden" name="product_id" value="1">
        <button type="submit">Thêm vào giỏ hàng 1</button>
    </form>
    <button><a href="chitiet.php?id=1">Chi tiết 1</a></button>

    <form action="../controller/addcart.php" method="post">
        <input type="hidden" name="product_id" value="2">
        <button type="submit">Thêm vào giỏ hàng 2</button>
    </form>
    <button><a href="chitiet.php?id=2">Chi tiết 2</a></button>

    <form action="../controller/addcart.php" method="post">
        <input type="hidden" name="product_id" value="3">
        <button type="submit">Thêm vào giỏ hàng 3</button>
    </form>
    <button><a href="chitiet.php?id=3">Chi tiết 3</a></button>
</body>

</html>