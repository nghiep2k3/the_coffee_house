<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="#"><img src="../assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="#" id="manage-products">Quản lý sản phẩm</a></li>
                <li><a href="#" id="manage-orders">Quản lý đơn hàng</a></li>
                <li><a href="./index.php" id="logout">Thoát</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="products-section" class="admin-section">
            <h2>Quản lý sản phẩm</h2>
            <form action="admin.php" method="post">
                <button name="add-product-btn" id="add-product-btn">Thêm sản phẩm</button>
                <?php
                    if(isset($_POST['add-product-btn'])) {
                        header('location: ./form_insert.php');
                    }
                ?>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Best Seller</th>
                        <th>View</th>
                        <th>Loại sản phẩm</th>
                    </tr>
                </thead>
                <tbody id="product-list">
                    <?php
                    require_once '../connect.php';
                    $sql = "SELECT p.id, p.name AS product_name, p.image, p.price, p.best_seller, p.view, c.CateName AS category_name
                            FROM product p
                            JOIN productcategory c ON p.idCategory = c.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td><img src='..assets/img/" . $row['image'] . "' alt='" . $row['product_name'] . "' width='50'></td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . ($row['best_seller'] ? 'Yes' : 'No') . "</td>";
                            echo "<td>" . $row['view'] . "</td>";
                            echo "<td>" . $row['category_name'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No products found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>

        <section id="orders-section" class="admin-section" style="display: none;">
            <h2>Quản lý đơn hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tình trạng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="order-list">
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>