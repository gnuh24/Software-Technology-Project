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
    <?php require_once "../Header/SignedHeader.php" ?>


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

    <?php require_once "../Footer/Footer.php" ?>


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
