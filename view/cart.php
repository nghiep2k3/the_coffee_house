<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../assest/icons/themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div style="width: 60px;">
            <a href="" class="logo">
                <img src="../assest/img/logo.png" alt="">
            </a>
        </div>
        <ul class="nav-bar">
            <li><a href="">Trang chủ</a></li>
            <li><a class="sub" href="danhmuc.php">Menu
                    <ul class="subnav">
                        <li><a href="">Tất cả</a></li>
                        <li><a href="">Cà phê</a></li>
                        <li><a href="">Trà</a></li>
                        <li><a href="">Cloud</a></li>
                        <li><a href="">Tea Healthy</a></li>
                        <li><a href="">Đá xay</a></li>
                        <li><a href="">Bánh&snack</a></li>
                        <li><a href="">Thưởng thức tại nhà</a></li>
                    </ul>
                </a></li>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Shop</a></li>
            <li><a href=""></a></li>
            <li class="admin-role" style="display: none;"><a href="./admin.php">Quản lý</a></li>
        </ul>
        <div class="header-icon">
            <i class="header-i ti-shopping-cart"></i>
            <i class="header-i ti-search"></i>
            <i class="header-i ti-menu-alt"></i>
        </div>
        <div class="form" id="login-form">
            <form action="index.php" method="post">
                <button class="button login" type="submit" name="switch-login">
                    <span class="button-content">Đăng nhập</span>
                </button>
                <button class="button login" type="submit" name="switch-register">
                    <span class="button-content">Đăng ký</span>
                </button>
            </form>
            <?php
            require_once "../controller/login.php";
            if (isset($_POST['switch-login'])) {
                header('location: ./form_login.php');
            }
            if (isset($_POST['switch-register'])) {
                header('location: ./form_register.php');
            }
            ?>
        </div>
        <div id="user-greeting" style="display: none;">
            <span>Welcome, <span id="username-display"></span></span>
        </div>
        <form action="index.php" method="post">
            <button style="display: none;" class="button login" id="logout" type="submit" name="switch-logout">
                <span class="button-content">Đăng xuất</span>
            </button>
        </form>
        <?php
        require_once "../controller/logout.php";
        ?>
    </header>

    <div id="content">
        <div id="header_content" style="padding: 0 70px;"
            class="d-flex w-100 justify-content-between align-item-center">
            <p>Trang chủ / Giỏ hàng</p>
            <p>Bạn đang có 2 sản phẩm trong giỏ hàng</p>
        </div>
        <div id="list_cart" class="w-100">
            <div class="content_right">

                <h1 class="text-uppercase fs-3 text-warning">Giỏ hàng của bạn</h1>

                <?php
                include "../connect.php";
                $test = 3;
                // Lấy username từ query string
                $username = isset($_GET['username']) ? $_GET['username'] : '';

                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                // Câu lệnh SQL để nối hai bảng và lấy dữ liệu cần thiết
                $sql = "SELECT p.name, p.unit_price, p.description, p.src_img, c.quantity, p.id
                        FROM cart c
                        JOIN products p ON c.id_product = p.id
                        WHERE c.name_account = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Hiển thị kết quả trong bảng
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["name"];
                        $id_product = $row["id"];
                        $unit_price = $row["unit_price"];
                        $quantity = $row["quantity"];
                        $src = $row["src_img"];
                        $description = $row["description"];
                        $total_price = $unit_price * $quantity;

                        echo "<div class='d-flex pb-5 position-relative mb-4 cart-item' style='border-bottom: 1px dashed black'>";
                        echo "<div class='me-5' style='width: 200px;'><img style='width: 100%' src='$src' alt=''>" . "</div>";
                        echo "
                    <div>
                        <h2 class='text-uppercase'>$name</h2>
                        <p>ID: $id_product</p>
                        <p>Giá: <span class='unit-price'>$unit_price</span> VND</p>
                        <div class='input-group mb-3' style='max-width: 150px;'>
                            <button class='btn btn-outline-secondary' type='button' onclick='decreaseQuantity(this)'>-</button>
                            <input type='text' class='form-control text-center quantity-input' value='$quantity' readonly />
                            <button class='btn btn-outline-secondary' type='button' onclick='increaseQuantity(this)'>+</button>
                        </div>
                        <p class='total-price'>Tổng giá: <span class='item-total-price'>$total_price</span> VND</p>
                    </div>
                    ";
                        echo "
                    <div class='position-absolute bottom-0 pb-3 pe-3 end-0'>
                        <button class='btn btn-danger' onclick='removeItem(this)'>Xóa</button>
                    </div>
                    ";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Không có sản phẩm nào trong giỏ hàng.</p>";
                }
                ?>


                <div>
                    <div><b class="text-dark fs-3">Ghi chú đơn hàng</b></div>
                    <div class="w-100">
                        <textarea class="w-100 p-3" rows="7" cols="50" placeholder="Nhập thông tin ghi chú của bạn..."
                            name="" id=""></textarea>
                    </div>
                </div>
            </div>
            <div class="content_left ms-5">
                <div class="border border-secondary rounded">
                    <div class="title_card text-uppercase fw-bold text-white px-3"
                        style="line-height: 50px; background-color: #2e3192;">
                        thông tin đơn hàng
                    </div>
                    <div class="pt-2 px-3 pb-2">
                        <div style='border-bottom: 1px dashed black'>
                            <p class="d-block my-2">Tổng tiền: <span class="text-danger fs-5" id="grand-total">0</span>
                                VND</p>
                            <span class="text-secondary">Phí vận chuyển sẽ được tính ở trang thanh toán.</span>
                            <span class="text-secondary d-block mb-3">Bạn cũng có thể nhập mã giảm giá ở trang thanh
                                toán.</span>
                        </div>
                        <div class="mt-3 mb-1 d-flex align-item-center">
                            <input type="checkbox" style="width: 20px; height: 20px;" class="me-2">
                            <p>Xuất hóa đơn</p>
                        </div>
                        <div class="w-100">
                            <button type="button" class="w-100 btn btn-outline-secondary">Tiếp tục mua hàng</button>
                        </div>
                        <div class="w-100 my-2">
                            <button type="button" class="w-100 bg-warning text-white btn btn-outline-white">Thanh
                                toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var role = localStorage.getItem("role");
        if (role === 'admin') {
            var adminRoles = document.getElementsByClassName("admin-role");
            for (var i = 0; i < adminRoles.length; i++) {
                adminRoles[i].style.display = "inline-block";
            }
        }
        updateGrandTotal();
    });

    function decreaseQuantity(button) {
        var input = button.nextElementSibling;
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
            updateTotalPrice(input);
        }
    }

    function increaseQuantity(button) {
        var input = button.previousElementSibling;
        var value = parseInt(input.value);
        input.value = value + 1;
        updateTotalPrice(input);
    }

    function updateTotalPrice(input) {
        var cartItem = input.closest('.cart-item');
        var unitPrice = parseFloat(cartItem.querySelector('.unit-price').innerText);
        var quantity = parseInt(input.value);
        var totalPriceElement = cartItem.querySelector('.item-total-price');
        totalPriceElement.innerText = (unitPrice * quantity).toFixed(2);
        updateGrandTotal();
    }

    function removeItem(button) {
        var cartItem = button.closest('.cart-item');
        cartItem.remove();
        updateGrandTotal();
        // Optionally, you could add an AJAX request here to update the cart on the server
    }

    function updateGrandTotal() {
        var cartItems = document.querySelectorAll('.cart-item');
        var grandTotal = 0;
        cartItems.forEach(function(cartItem) {
            var itemTotalPrice = parseFloat(cartItem.querySelector('.item-total-price').innerText);
            grandTotal += itemTotalPrice;
        });
        document.getElementById('grand-total').innerText = formatCurrency(grandTotal);
    }

    function formatCurrency(number) {
        return number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' VND';
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>