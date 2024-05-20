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
            <a href="#"><img src="./assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="#" id="manage-products">Quản lý sản phẩm</a></li>
                <li><a href="#" id="manage-orders">Quản lý đơn hàng</a></li>
                <li><a href="#" id="logout">Đăng xuất</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="products-section" class="admin-section">
            <h2>Quản lý sản phẩm</h2>
            <button id="add-product-btn">Thêm sản phẩm</button>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="product-list">
                    <!-- Product rows will be added here dynamically -->
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
                    <!-- Order rows will be added here dynamically -->
                </tbody>
            </table>
        </section>

        <div id="product-form-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Thêm/Sửa Sản Phẩm</h2>
                <form id="product-form">
                    <label for="product-name">Tên sản phẩm:</label>
                    <input type="text" id="product-name" name="product-name" required>
                    
                    <label for="product-price">Giá:</label>
                    <input type="number" id="product-price" name="product-price" required>
                    
                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </main>
    <script src="admin.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var manageProductsBtn = document.getElementById("manage-products");
    var manageOrdersBtn = document.getElementById("manage-orders");
    var productsSection = document.getElementById("products-section");
    var ordersSection = document.getElementById("orders-section");

    manageProductsBtn.addEventListener("click", function() {
        productsSection.style.display = "block";
        ordersSection.style.display = "none";
    });

    manageOrdersBtn.addEventListener("click", function() {
        productsSection.style.display = "none";
        ordersSection.style.display = "block";
    });

    var addProductBtn = document.getElementById("add-product-btn");
    var productFormModal = document.getElementById("product-form-modal");
    var closeBtn = document.getElementsByClassName("close-btn")[0];

    addProductBtn.addEventListener("click", function() {
        productFormModal.style.display = "block";
    });

    closeBtn.addEventListener("click", function() {
        productFormModal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == productFormModal) {
            productFormModal.style.display = "none";
        }
    });

    // Handle form submission
    var productForm = document.getElementById("product-form");
    productForm.addEventListener("submit", function(event) {
        event.preventDefault();
        var productName = document.getElementById("product-name").value;
        var productPrice = document.getElementById("product-price").value;
        // Add your code to handle the form data and interact with your backend
        console.log("Product Name:", productName);
        console.log("Product Price:", productPrice);
        productFormModal.style.display = "none";
    });
});

</script>
</html>
