<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../product.css">
    <link rel="stylesheet" href="../assets/icons/themify-icons/themify-icons.css">
</head>
<?php
    require_once '../connect.php';
    $sql = "SELECT * FROM productcategory ORDER BY stt DESC";
    $dsdm = mysqli_query($conn,$sql);
    if(!isset($_GET['iddm'])) {
        $iddm=0;
    } else {
        $iddm = $_GET['iddm'];
    }
    $sql = $sql = "SELECT * FROM products WHERE 1";
    if ($iddm>0) {
        $sql .=" AND idCategory=".$iddm;
    }
    $sql .= " ORDER BY id DESC";
    $dssp = mysqli_query($conn,$sql);
    $html_dm = '';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link = 'danhmuc.php?iddm='.$id;
        $html_dm.='<li><a class="infor-extra" href="'.$link.'">'.$CateName.'</a></li>';
    }
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        if($best_seller==1) {
            $best = '<span class="status-product"></span>';
        } else {
            $best = '';
        }
        $html_dssp .='<div class="box-item">
        '.$best.'
            <div class="item-img">
                <img src="'.$image.'" alt=""
                    class="img-tea-item">
            </div>
            <div class="item-tt">
                <p class="name-tea">'.$name.'</p>
                <p class="price">'.$unit_price.' đ</p>
                <button class="btn-item" name = "check-log">Thêm vào giỏ</button>
            </div>
    </div>';
    }
?>

<body>
    <div class="main">
        <?php 
            require_once './header.php';
        ?>
        <div class="product">
            <div class="sidebar">
                <ul class="cate-product">
                    <li class="all-item">All Items</li>
                    <li><a style="color: #d38338ad; font-size: 18px;" href="">Herbal Tea</a></li>
                    <li><a href="">Fruit Tea</a></li>
                    <li><a href="">Cupcake</a></li>
                    <li><a href="">Tiramisu</a></li>
                </ul>
                <ul class="cate-product">
                    <li class="all-item">Danh mục sản phẩm</li>
                    <?=$html_dm?>
                </ul>
            </div>
            <div class="item-container">               
                <?=$html_dssp;?>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-item');
            buttons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productId = this.getAttribute('data-product-id');
                    const user = localStorage.getItem('username');
                    if (user) {
                        window.location.href = `chitiet.php?id=${productId}`;
                    } else {
                        alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ.');
                        window.location.href = './form_login.php';
                    }
                });
            });
        });
    </script>
</body>

</html>