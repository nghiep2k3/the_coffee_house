<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm trong giỏ hàng</title>
    <style>
    table {
        width: 50%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 18px;
        text-align: left;
    }

    th,
    td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <h1>Danh sách sản phẩm trong giỏ hàng</h1>

    <script>
    // Lấy username từ Local Storage
    var user = localStorage.getItem('username');
    if (user) {
        // Chuyển hướng đến cùng trang với username trong query string
        // window.location.href = window.location.pathname + '?username=' + encodeURIComponent(username);
    } else {
        document.write("Không có username trong Local Storage.");
    }
    </script>

    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../connect.php";

            // Lấy username từ query string
            $username = isset($_GET['username']) ? $_GET['username'] : '';
            var_dump($username);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Câu lệnh SQL để nối hai bảng và lấy dữ liệu cần thiết
            $sql = "SELECT p.name, p.unit_price, p.description, c.quantity
                    FROM cart c
                    JOIN products p ON c.id_product = p.id
                    WHERE c.name_account = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Hiển thị kết quả trong bảng
                while($row = $result->fetch_assoc()) {
                    $name = $row["name"];
                    $unit_price = $row["unit_price"];
                    $quantity = $row["quantity"];
                    $description = $row["description"];
                    $total_price = $unit_price * $quantity;

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($name) . "</td>";
                    echo "<td>" . number_format($unit_price, 2) . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>" . htmlspecialchars($description) . "</td>";
                    echo "<td>" . number_format($total_price, 2) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Không có sản phẩm nào trong giỏ hàng.</td></tr>";
            }

            // Đóng kết nối
            $conn->close();
            ?>
        </tbody>
    </table>
</body>

</html>