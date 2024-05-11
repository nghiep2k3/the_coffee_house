<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .show {
            display: block !important;
        }

        .dropdown-content {
            display: none;
        }
    </style>
</head>

<body>
    <div id="product">
        <div class="list_drink">
            <div>Tất cả</div>
            <div class="dropdown">
                <div class="dropbtn">Cà phê</div>
                <ul class="dropdown-content">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <div class="dropbtn">Trà</div>
                <ul class="dropdown-content">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <div class="dropbtn">Cloud</div>
                <ul class="dropdown-content">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <div class="dropbtn">Hi - tea </div>
                <ul class="dropdown-content">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </div>
        </div>
        <div class="item"></div>
    </div>

    <script>
        // JavaScript
        document.addEventListener("DOMContentLoaded", function () {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach((dropdown) => {
                const btn = dropdown.querySelector('.dropbtn');
                const content = dropdown.querySelector('.dropdown-content');
                btn.addEventListener('click', () => {
                    // Đóng tất cả các dropdown trước khi mở dropdown hiện tại
                    dropdowns.forEach((d) => {
                        if (d !== dropdown) {
                            const otherContent = d.querySelector('.dropdown-content');
                            if (otherContent) {
                                otherContent.classList.remove("show");
                            }
                        }
                    });
                    // Mở hoặc đóng dropdown hiện tại
                    if (content) {
                        content.classList.toggle("show");
                    }
                });
            });
        });
    </script>
</body>

</html>