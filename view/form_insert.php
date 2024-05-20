<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="item-container">
    <form action="form_insert.php" method="post" enctype="multipart/form-data" id="insertForm">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" required><br>
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" required><br>
        <label for="idCategory">Danh mục:</label>
        <select id="idCategory" name="idCategory">
            <?php
            require_once '../connect.php';
            $sql = "SELECT * FROM productcategory ORDER BY stt DESC";
            $dsdm = mysqli_query($conn,$sql);
            foreach ($dsdm as $dm) {
                echo '<option value="'.$dm['id'].'">'.$dm['CateName'].'</option>';
            }
            ?>
        </select><br>
        <label for="best_seller">Best Seller:</label>
        <input type="checkbox" id="best_seller" name="best_seller" value="1"><br>
        <button type="submit" name="insert" class="button-mn">Thêm sản phẩm</button>
    </form>
    <?php
        require '../controller/insert.php'
    ?>
</div>
</body>
</html>