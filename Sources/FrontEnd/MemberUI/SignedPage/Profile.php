<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="SignedHomePage.css">
    <link rel="stylesheet" href="Profile.css">
    <title>Thông tin cá nhân</title>
</head>
<body>
    <header class="Home-container-header">
        <div id="Home-over-Header">
            <img id="Home-img" src="../GuestPage/img/logoWine.jpg" alt="">
            <form id="search" class="input__wrapper" method="post" action="SignedProduct.php">
                <input id="searchSanPham" name="searchFromAnotherPage" type="text" class="search-input" placeholder="Tìm kiếm" required="">
                <button id="filter-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                <div class="header-option"><a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
                <div class="header-option"><a href="Profile.php"><i class="fa-solid fa-user"></i></a></div>
                <div class="header-option"><a href="../Login/LoginUI.php"><i class="fa-solid fa-right-from-bracket"></i></a></div>
            </form>
        </div>
    </header>

    <div class="container container_profile containerPage">
        <div class="orderManagement_order_history">
            <p class="orderManagement_title">Thông tin cá nhân</p>
            <div id="infomation-group">
                <div id="infomation-page">
                    <!-- Load thông tin từ local storage -->
                </div>
            </div>
            <div class="update-button-wrapper">
                <button class="update-button" onclick="updateUserInfo()">Cập nhật thông tin</button>
            </div>
        </div>
    </div>

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
                <h4>FOLLOW US</h4>
                <a href="https://www.facebook.com/doanhdai.2004"><i id="fb" class="fa-brands fa-facebook" id="fb"></i></a>
                <a href="https://www.instagram.com"><i id="ig" class="fa-brands fa-instagram"></i></a>
                <a href="https://github.com/ltgiai/DO_AN_WEBSITE/tree/main"><i id="git" class="fa-brands fa-github"></i></a>
                <a href="https://twitter.com/?lang=vi"><i id="tw" class="fa-brands fa-square-twitter"></i></a>
                <a href="http://online.gov.vn/Home/WebDetails/36260"><img src="../../../img/design/logo_bct.webp" alt=""></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyrights © 2019 by comebuy_vn. All rights reserved.</p>
        </div>
    </section>

    <script>
        function loadUserInfoFromLocalStorage() {
            // Lấy dữ liệu từ local storage
            var userData = localStorage.getItem("key");

            // Kiểm tra nếu dữ liệu không tồn tại trong local storage
            if (!userData) {
                console.error("Không có dữ liệu trong local storage");
                return;
            }

            // Parse dữ liệu từ chuỗi JSON sang đối tượng JavaScript
            userData = JSON.parse(userData);

            // Hiển thị dữ liệu lên màn hình
            var infoPage = document.getElementById("infomation-page");
            infoPage.innerHTML = `
                <div class='infomation'>
                    <p class='information-child'>Họ và tên:</p>
                    <input class='info-value' type='text' value='${userData['HoTen']}'>
                </div>
                <div class='infomation'>
                    <p class='information-child'>Ngày sinh:</p>
                    <input class='info-value' type='text' value='${userData['NgaySinh']}'>
                </div>
                <div class='infomation'>
                    <p class='information-child'>Giới tính:</p>
                    <input class='info-value' type='text' value='${userData['GioiTinh']}'>
                </div>
                <div class='infomation'>
                    <p class='information-child'>Số điện thoại:</p>
                    <input class='info-value' type='text' value='${userData['SoDienThoai']}'>
                </div>
                <div class='infomation'>
                    <p class='information-child'>Email:</p>
                    <input class='info-value' type='email' value='${userData['Email']}' readonly>
                </div>
                <div class='infomation'>
                    <p class='information-child'>Địa chỉ:</p>
                    <input class='info-value' type='text' value='${userData['DiaChi']}'>
                </div>
            `;
        }

        function updateUserInfo() {
            // Code để cập nhật thông tin người dùng khi được bấm
            alert("Chức năng cập nhật thông tin đang được phát triển...");
        }

        // Gọi hàm để thực hiện load dữ liệu khi trang được tải
        window.onload = loadUserInfoFromLocalStorage;
    </script>
</body>
</html>
