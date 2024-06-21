<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Quản lý</title>
</head>

<body>
    <header>
        <h1>Trang Quản Lý</h1>
        <nav>
            <ul>
                <li><a href="#products">Quản lý sản phẩm</a></li>
                <li><a href="#orders">Quản lý đơn hàng</a></li>
                <li><a href="../index.php">Trang chủ</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="products">
            <h2>Quản lý sản phẩm</h2>
            <button onclick="showProductForm()">Thêm sản phẩm mới</button>
            <div id="product-form" style="display: none;">
                <h3 id="product-form-title">Thêm sản phẩm</h3>
                <form id="add-product-form" method="post" action="/the_coffee_house/routers/admin_router.php">
                    <input type="hidden" name="action" value="add_product">
                    <label for="product-name">Tên sản phẩm:</label>
                    <input type="text" id="product-name" name="product_name" required>
                    <label for="product-price">Giá:</label>
                    <input type="number" id="product-price" name="product_price" required>
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" required>
                    <label for="description">Mô tả:</label>
                    <input type="text" id="description" name="description" required>
                    <label for="image">Hình ảnh:</label>
                    <input type="text" id="image" name="image" required>
                    <label for="product-category">Loại:</label>
                    <input type="number" id="category" name="category_id" required>
                    <button type="submit">Lưu</button>
                    <button type="button" onclick="hideProductForm()">Hủy</button>
                </form>
            </div>
        </section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="product-list">
                <?php if(isset($products)) { foreach ($products as $product):?>
                <tr>
                    <td><?php echo htmlspecialchars($product['id']); ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['unit_price']); ?></td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($product['src_img']); ?>" alt="Product Image" width="50">
                    </td>
                </tr>
                <?php endforeach; } ?>
            </tbody>
        </table>
        <section id="orders">
            <h2>Quản lý đơn hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="order-list">
                </tbody>
            </table>
        </section>
    </main>
    <script src="../js/admin.js"></script>
</body>

</html>

<script>
function showProductForm() {
    document.getElementById('product-form').style.display = 'block';
}

function hideProductForm() {
    document.getElementById('product-form').style.display = 'none';
}
</script>