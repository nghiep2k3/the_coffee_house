<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./product.css">
</head>
<?php
    require_once 'product.php';
    $dsdm = danhmuc_all();
    if(!isset($_GET['iddm'])) {
        $iddm=0;
    } else {
        $iddm = $_GET['iddm'];
    }
    $dssp = get_dssp($iddm, 4);
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
                <img src="./assest/img/'.$image.'" alt=""
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
            require_once './view/header.php';
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
                <!-- <div class="items col-half">
                    <a href="./product.html"></a>
                    <div class="tea-item">
                        <div class="item-img">
                            <img src="./assest/img/cafe1.jpg" alt=""
                                class="img-tea-item">
                        </div>
                        <div class="item-tt">
                            <p class="name-tea">Cà phê 1</p>
                            <p class="price">80.000₫</p>
                            <button class="btn-item"><a href="./product.html">Thêm vào giỏ</a></button>
                        </div>
                    </div>
                    </a>
                    <div class="tea-item">
                        <a href="./product.html">
                            <div class="item-img">
                                <img src="./assest/img/greentea/d385ce2cabe96a724807459a4190ea42.jpg" alt=""
                                    class="img-tea-item">
                            </div>
                            <div class="item-tt">
                                <p class="name-tea">Trà Xanh</p>
                                <p class="price">80.000₫</p>
                                <button class="btn-item">Thêm vào giỏ</button>
                            </div>
                        </a>
                    </div>
                    <div class="tea-item">
                        <span class="status-product">-20%</span>
                        <a href="./product.html">
                            <div class="item-img">
                                <img src="./assest/img/greentea/066835380a9ddd3db19f2532c22c15f2.jpg" alt=""
                                    class="img-tea-item">
                            </div>
                            <div class="item-tt">
                                <p class="name-tea">Trà Sen</p>
                                <p class="price">80.000₫</p>
                                <button class="btn-item">Thêm vào giỏ</button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="items col-half sc-item">
                    <div class="tea-item">
                        <span class="status-product">-20%</span>
                        <a href="./product.html">
                            <div class="item-img">
                                <img src="./assest/img/greentea/52fe6c49b42e8d46567ede8bd661ba34.jpg" alt=""
                                    class="img-tea-item">
                            </div>
                            <div class="item-tt">
                                <p class="name-tea">Hồng Trà</p>
                                <p class="price">80.000₫</p>
                                <button class="btn-item">Thêm vào giỏ</button>
                            </div>
                        </a>
                    </div>
                    <div class="tea-item">
                        <a href="./product.html">
                            <div class="item-img">
                                <img src="./assest/img/greentea/a7348029825568ffd31629443e14662b.jpg" alt=""
                                    class="img-tea-item">
                            </div>
                            <div class="item-tt">
                                <p class="name-tea">Trà Olong</p>
                                <p class="price">80.000₫</p>
                                <button class="btn-item">Thêm vào giỏ</button>
                            </div>
                        </a>
                    </div>
                    <div class="tea-item">
                        <span class="status-product">-20%</span>
                        <a href="">
                            <div class="item-img">
                                <img src="./assest/img/greentea/ea7fb2f447a7b23e68ee967fe376b313.jpg" alt=""
                                    class="img-tea-item">
                            </div>
                            <div class="item-tt">
                                <p class="name-tea">Trà Nhài</p>
                                <p class="price">80.000₫</p>
                                <button class="btn-item">Thêm vào giỏ</button>
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>