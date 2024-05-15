<?php
// Kết nối tới cơ sở dữ liệu
include "../connect.php";

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn các sản phẩm có active = 1
$sql = "SELECT id, name, quantity, unit_price, description, src_img FROM products WHERE active = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị các sản phẩm
    echo "<h1>Giỏ hàng</h1>";

    if (isset($_GET['message'])) {
        echo "<p>" . htmlspecialchars($_GET['message']) . "</p>";
    }
    ?>
<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Description</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><input value="1" /></td>
        <td><?php echo $row["unit_price"]; ?></td>
        <td><?php echo $row["description"]; ?></td>
        <td><img src="<?php echo $row["src_img"]; ?>" alt="Product Image" width="100"></td>
        <td>
            <form action="../controller/removecart.php" method="post" style="display:inline;">
                <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                <button type="submit">Xóa</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<b></b>
<?php
} else {
    echo "Không có sản phẩm nào trong giỏ hàng.";
}

$conn->close();
?>