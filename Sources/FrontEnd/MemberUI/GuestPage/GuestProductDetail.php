<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="HomePage.css" />
    <link rel="stylesheet" href="GuestProductDetail.css" />

    <link rel="stylesheet" href="login.css" />
    <title>Chi tiết sản phẩm</title>
    <style>
        .quantity-available {
            color: red;
        }
    </style>
</head>

<body>
    <header class="Home-container-header">
        <div id="Home-over-Header">
            <img id="Home-img" src="img/logoWine.jpg" alt="" />
            <form id="search" class="input__wrapper" action="GuestProduct.php" method="post">
                <input id="searchSanPham" name="searchSanPham" type="text" class="search-input" placeholder="Tìm kiếm" required=""/>
                <button id="filter-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <div id="Home-login">Login</div>
        </div>
    </header>


    <section>
        <div class="center-text">
            <div class="title_section">
                <div class="bar"></div>
                <h2 class="center-text-share">Chi tiết sản phẩm</h2>
            </div>
        </div>
    </section>


    <section>
        <div class="product-detail-wrapper">
            <div class="product__wrapper containerPage">
                <?php

                function formatCurrency($number) {
                    // Chuyển đổi số thành chuỗi và đảm bảo nó là số nguyên
                    $number = intval($number);

                    // Sử dụng hàm number_format để định dạng số tiền
                    // và thêm đơn vị tiền tệ "đ" vào cuối chuỗi
                    return number_format($number, 0, '', '.') . 'đ';
                }

                require_once "../../../BackEnd/ManagerBE/SanPhamBE.php";

                if (isset($_GET['maSanPham'])) {

                    $maSanPham = $_GET['maSanPham'];

                    $sanPham = getSanPhamByMaSanPham($maSanPham)->data;

                    $soLuongConLai = $sanPham["SoLuongConLai"];

                    // Thay đổi thông báo số lượng sản phẩm còn lại nếu = 0
                    $quantityMessage = $soLuongConLai > 0 ? "Còn $soLuongConLai sản phẩm" : "<span style='color: red;'>Sản phẩm đã hết hàng</span>";

                    echo '<div class="product_images__wrapper">


                    <div class="image">
                        <img style="border: 2px solid black;  height: 400px;" src="' . $sanPham["AnhMinhHoa"] . '" alt="" class="product_img">
                    </div>

                </div>
                <div class="info__wrapper" style="margin-left: 30px">
                    <div class="title__wrapper">
                        <h2 class="title__wrapper">' . $sanPham["TenSanPham"] . '</h2>
                    </div>
                    <div class="price__wrapper">
                        <p class="price">' . formatCurrency($sanPham["Gia"]) . '</p>
                    </div>
                    <!--Thêm dòng dữ liệu hiển thị số lượng sản phẩm còn-->
                    <div class="quantity-available">
                        <p class="title">' . $quantityMessage . '</p>
                        <p id="soLuongCon"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="detail_info__wrapper">
                        <div class="specification__wrapper">
                            <a href="../img/y.jpg" class="origin specification_item">
                                <i class="fa-solid fa-plane"></i>
                                <p>' . $sanPham["XuatXu"] . '</p>
                            </a>
                            <a href="#" class="specification_item">
                                <i class="fa-solid fa-wine-bottle"></i>
                                <p>Rượu Vang Đỏ</p>
                            </a>
                        </div>
                        <div class="rating__wrapper"></div>
                        <div class="size__wrapper">
                            <p class="title">Nồng độ cồn</p>
                            <div class="size__list">

                                <div class="size__item ">
                                    <p>' . $sanPham["NongDoCon"] . '%</p>
                                </div>

                            </div>
                        </div>
                        <div class="size__wrapper">
                            <p class="title">Dung tích</p>
                            <div class="size__list">

                                <div class="size__item ">
                                    <p>' . $sanPham["TheTich"] . 'ml</p>
                                </div>

                            </div>
                        </div>
                        <div class="quantity__wrapper" style="display: flex; align-items: center;">
                            <p class="title">Số lượng</p>
                            <div class="quantity">
                                <div style="display: flex; align-items: center; justify-content: center;" class="minusBtn"> <i class="fa-solid fa-minus"></i></div>
                                
                                <input type="number" value="1" min="0" max="' . $soLuongConLai . '" oninput="checkQuantity(this)">
                                
                                <div style="display: flex; align-items: center; justify-content: center;" class="plusBtn"><i class="fa-solid fa-plus"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="button__wrapper">
                        <button class="secondary">
                            <span>Thêm vào giỏ hàng</span>
                        </button>
                        <button class="primary">
                            <span>Mua ngay</span>
                        </button>
                    </div>
                </div>';

                } else {
                    // Nếu không có mã sản phẩm được truyền vào, hiển thị thông báo lỗi
                    echo "Không có mã sản phẩm được cung cấp!";
                    exit; // Dừng thực thi của mã PHP tại đây
                }
                ?>



            </div>
        </div>
    </section>

    <!-- Footer -->
    <section id="footer">
        <div class="contact-info">
            <div class="first-info">
                <div style="font-size: 20px;">Thông tin liên hệ</div>
                <div class="map">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>An Dương Vương, Phường 3, Quận 5</span>
                </div>
                <div class="phone">
                    <i class="fa-solid fa-phone-volume"></i>
                    <span>0325459901</span>
                </div>
                <div class="mail">
                    <i class="fa-solid fa-envelope"></i>
                    <span>doanhdaigr5.2004@gmail.com</span>
                </div>
            </div>
            <div class="second-info">
                <h4>CHÍNH SÁCH</h4>
                <ul>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Chính sách giao hàng</a></li>
                    <li><a href="#">Chính sách thẻ thành viên</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                </ul>
            </div>

            <div class="third-info">
                <h4>ABOUT US</h4>
                <ul>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Tuyển dụng</a></li>
                    <li><a href="#">Nhượng quyền</a></li>
                    <li><a href="#">Tin tức</a></li>
                </ul>
            </div>

            <div class="fourth">
                <h4>FOLOW US</h4>
                <a href="https://www.facebook.com/doanhdai.2004"><i id="fb" class="fa-brands fa-facebook" id="fb"></i></a>
                <a href="https://www.instagram.com"><i id="ig" class="fa-brands fa-instagram"></i></a>
                <a href="https://github.com/ltgiai/DO_AN_WEBSITE/tree/main"><i id="git" class="fa-brands fa-github"></i></a>
                <a href="https://twitter.com/?lang=vi"><i id="tw" class="fa-brands fa-square-twitter"></i></a>
                <a href="http://online.gov.vn/Home/WebDetails/36260"><img src="#" alt="" /></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyrights © 2019 by comebuy_vn. All rights reserved.</p>
        </div>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Lắng nghe sự kiện click vào id "Home-login"
    document.getElementById("Home-login").addEventListener("click", function () {
        window.location.href = '../Login/LoginUI.php';
    });

    // Lắng nghe sự kiện click vào nút "Thêm vào giỏ hàng"
    document.querySelector(".secondary").addEventListener("click", function () {
        window.location.href = '../Login/LoginUI.php'; // Chuyển hướng đến trang Login khi click
    });

    // Lắng nghe sự kiện click vào nút "Mua ngay"
    document.querySelector(".primary").addEventListener("click", function () {
        window.location.href = '../Login/LoginUI.php'; // Chuyển hướng đến trang Login khi click
    });

     // Lắng nghe sự kiện click vào nút "Minus"
     document.querySelector(".minusBtn").addEventListener("click", function () {
        var quantityInput = document.querySelector("input[type='number']"); // Lấy input số lượng
        var currentQuantity = parseInt(quantityInput.value); // Lấy giá trị số lượng hiện tại
        if (currentQuantity > 1) { // Kiểm tra nếu số lượng hiện tại lớn hơn 0
            quantityInput.value = currentQuantity - 1; // Giảm số lượng đi 1 và cập nhật vào input
        }
    });

    // Lắng nghe sự kiện click vào nút "Plus"
    document.querySelector(".plusBtn").addEventListener("click", function () {
        var quantityInput = document.querySelector("input[type='number']"); // Lấy input số lượng
        var currentQuantity = parseInt(quantityInput.value); // Lấy giá trị số lượng hiện tại
        var maxQuantity = parseInt(quantityInput.getAttribute("max")); // Lấy giá trị cận trên
        if (currentQuantity < maxQuantity) { // Kiểm tra nếu số lượng hiện tại nhỏ hơn cận trên
            quantityInput.value = currentQuantity + 1; // Tăng số lượng đi 1 và cập nhật vào input
        }
    });

    // Kiểm tra sự kiện của khi người dùng "cố tình" nhập vào số lượng lớn hơn.
    function checkQuantity(input) {
        var maxQuantity = parseInt(input.getAttribute("max")); // Lấy giá trị cận trên
        var enteredQuantity = parseInt(input.value); // Lấy giá trị số lượng nhập vào
        if (enteredQuantity < 0) { // Nếu số lượng nhập vào nhỏ hơn 0
            input.value = 0; // Đặt giá trị là 0
        } else if (enteredQuantity > maxQuantity) { // Nếu số lượng nhập vào lớn hơn số lượng tối đa
            input.value = maxQuantity; // Đặt giá trị là số lượng tối đa
        }
    }

    // Lắng nghe sự kiện click vào nút "kính lúp"
    document.getElementById("filter-button").addEventListener("click", function (event) {
            event.preventDefault();

            const form = document.getElementById("search");
            const searchValue  = document.getElementById("searchSanPham").value;
            console.log(searchValue);
            form.action = `GuestProduct.php?searchFromAnotherPage=${searchValue}`;
            console.log(form.action);
            form.submit();

        });

    document.getElementById("Home-img").addEventListener("click", function () {
            // Chuyển hướng về trang chủ khi click vào hình ảnh
            window.location.href = "GuestHomePage.php";
        });





</script>

</html>