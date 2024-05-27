<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../product.css">
    <link rel="stylesheet" href="../assest/icons/themify-icons/themify-icons.css">
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
    $sql = $sql = "SELECT * FROM product WHERE 1";
    if ($iddm>0) {
        $sql .=" AND idCategory=".$iddm;
    }
    $sql .= " ORDER BY id DESC limit 4";
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
        <a href="./product.html">
            <div class="item-img">
                <img src="../assets/img/'.$image.'" alt=""
                    class="img-tea-item">
            </div>
            <div class="item-tt">
                <p class="name-tea">'.$name.'</p>
                <p class="price">'.$price.' đ</p>
                <button class="btn-item">Thêm vào giỏ</button>
            </div>
        </a>
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
                    <li><a style="color: #d38338ad; font-size: 18px;" href="./menu.html">Herbal Tea</a></li>
                    <li><a href="./fruittea.html">Fruit Tea</a></li>
                    <li><a href="./cupcake.html">Cupcake</a></li>
                    <li><a href="./tiramisu.html">Tiramisu</a></li>
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
    <?php
    ?>
</body>

</html>