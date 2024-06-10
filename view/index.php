<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assest/icons/themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <div class="main">
        <?php
        require_once "./header.php";
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" pause="false" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner slider ">
                <div class="carousel-item active">
                    <img src="../assets/img/coffee-2562435_1280.jpg" class="d-block w-100" alt="...">
                    <div class="text-content">
                        <h2 class="text-heading">a place of tranquility</h2>
                        <div class="text-description">Lorem ipsum dolor sit amet consectetur adipisi</div>
                        <button class="button read-more edtf-button">
                            <span class="button-content">Đọc thêm</span>
                        </button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/coffee-shop-393954_1280.jpg" class="d-block w-100" alt="...">
                    <div class="text-content">
                        <h2 class="text-heading">a place of tranquility</h2>
                        <div class="text-description">Lorem ipsum dolor sit amet consectetur adipisi</div>
                        <button class="button read-more">
                            <span class="button-content">Đọc thêm</span>
                        </button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/pexels-photo-3968061.jpeg" class="d-block w-100" alt="...">
                    <div class="text-content">
                        <h2 class="text-heading">a place of tranquility</h2>
                        <div class="text-description">Lorem ipsum dolor sit amet consectetur adipisi</div>
                        <button class="button read-more">
                            <span class="button-content">Đọc thêm</span>
                        </button>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <script>
            document.addEventListener("DOMContentLoaded", function() {
                var username = localStorage.getItem("username");
                if (username) {
                    document.getElementById("login-button").style.display = "none";
                    document.getElementById("register-button").style.display = "none";
                    document.getElementById("username-display").textContent = username;
                    document.getElementById("user-greeting").style.display = "block";
                    document.getElementById("user-greeting").style.color = "white";
                    document.getElementById("logout").style.display = "block";
                }
                document.getElementById("logout").addEventListener("click", function() {
                    localStorage.removeItem("username");
                    document.getElementById("login-button").style.display = "block";
                    document.getElementById("register-button").style.display = "block";
                    document.getElementById("user-greeting").style.display = "none";
                    document.getElementById("logout").style.display = "none";
                });
            });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>
        </div>
        <?php
                require_once '../connect.php';
                $sql = "SELECT * FROM products WHERE best_seller = 1 ORDER BY id DESC";
                $dssp = mysqli_query($conn, $sql);
                $html_dssp = '';
                foreach ($dssp as $sp) {
                    extract($sp);
                    $best = '<span class="status-product"></span>';
                    $html_dssp .= '<div class="box-item sell-item">
                        '.$best.'
                        <a href="./chitiet.php?id='.$id.'">
                            <div class="item-img">
                                <img src="'.$image.'" alt="" class="img-tea-item">
                            </div>
                            <div class="item-tt">
                                <p class="name-tea">'.$name.'</p>
                                <p class="price">'.$unit_price.' đ</p>
                                <button class="btn-item">Thêm vào giỏ</button>
                            </div>
                        </a>
                    </div>';
                }
            ?>
        <div class="best-sell">
            <div class="title-bs">
                <h3 class="title-head">Best Seller</h3>
            </div>
            <div class="sell-container">
                <div class="list-bs">
                    <?=$html_dssp;?>
                </div>
            </div>
        </div>
        <div id="myDIV">
            <div class="edtf">

                <div class="application">
                    <p class="text-title">Application</p>
                    <h2 class="text-app">use our application</h2>
                    <div class="border-text-title"></div>
                    <div class="app-description">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error epicurei mea et. Mea facilisis urbanitas moderatius id.</div>
                    <button class="button read-more">
                        <span class="button-content">Đọc thêm</span>
                    </button> -->
                </div>
                <div class="edgtf-video-button">
                    <a itemprop="image" class="edgtf-video-button-play" href="https://www.youtube.com/watch?v=AVuJTw5yEH8"
                        data-rel="prettyPhoto">
                        <div class="edgtf-video-button-image">
                            <img itemprop="image" class="edtf-img"
                                src="https://barista.qodeinteractive.com/elementor/wp-content/uploads/2017/01/home-3-video-img-1.jpg"
                                alt="Video button image">
                                <i class="play-button ti-control-play"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>