<?php
if (isset($_GET['MaNguoiDung'])) {
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];
    require_once "../../../BackEnd/AdminBE/NguoiDungBE.php";
    require_once "../../../BackEnd/AdminBE/TaiKhoanBE.php";
    $id = $_GET['MaNguoiDung'];
    $mess = updateNguoiDung($id, $hoten, $ngaysinh, $gioitinh, $sodienthoai, null, $diachi);
    $nguoidung= getTaiKhoanByMaTaiKhoan($id)->data;
    $jsonNguoiDung = json_encode($nguoidung);
    echo $jsonNguoiDung;
    if ($mess->status == '200') {
        echo '<script> 
        localStorage.removeItem("key");
        var data = localStorage.getItem("key");
        var jsonData = ' . $jsonNguoiDung . ';
        localStorage.setItem("key", JSON.stringify(jsonData));
        window.location.href = "Profile.php";

        </script>';
    }
    exit();     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="SignedHomePage.css">
    <link rel="stylesheet" href="Profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Thông tin cá nhân</title>
</head>
<body>
    <?php require_once "../Header/SignedHeader.php" ?>
    <div class="col-12">
        <div class="my-2 d-flex justify-content-center">
            <h3>My Profile</h3>
            <hr>
        </div>
        <div class="row mb-5 gx-5 d-flex justify-content-center " id="contentprofile" style="height: fit-content; margin : 0px;">
        </div>
    </div>
    <?php require_once "../Footer/Footer.php" ?>
    <script>
        function loadUserInfoFromLocalStorage() {
            var userData = localStorage.getItem("key");
            if (!userData) {
                console.error("Không có dữ liệu trong local storage");
                return;
            }
            userData = JSON.parse(userData);
            var infoPage = document.getElementById("contentprofile");
            infoPage.innerHTML = `
            <div class='col-xxl-8 mb-5 mb-xxl-0'>
            <form name="profileForm" action="Profile.php?MaNguoiDung=${userData['MaNguoiDung']}" method="POST" onsubmit="return validateForm()">
                    <div class='bg-secondary-soft px-4 py-5 rounded'>
                        <div class='row g-3' style='text-align:left;'>
                            <h4 class='my-2 mt-0'>Thông tin cá nhân</h4>
                            <div class='col-md-6'>
                                <label class='form-label'>Họ tên *</label>
                                <input type='text' class='form-control' name='hoten' value='${userData['HoTen']}'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Số điện thoại *</label>
                                <input type='text' class='form-control' name='sodienthoai' value='${userData['SoDienThoai']}'>
                            </div>
                            <div class='col-md-6'>
                                <label for='gioitinh'>Giới tính</label>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='gioitinh' id='inlineRadio1' value='Male' ${userData['GioiTinh'] === 'Male' ? 'checked' : ''}>
                                    <label class='form-check-label' for='inlineRadio1'>Nam</label>
                                </div>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='gioitinh' id='inlineRadio2' value='Female' ${userData['GioiTinh'] === 'Female' ? 'checked' : ''}>
                                    <label class='form-check-label' for='inlineRadio2'>Nữ</label>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <label for='birthday'>Ngày sinh</label>
                                <input type='date' class='form-control' id='birthday' name='ngaysinh' value='${userData['NgaySinh']}'>
                            </div>
                            <div class='col-md-6'>
                                <label for='inputEmail4' class='form-label'>Email *</label>
                                <input type='email' class='form-control' id='inputEmail4' name='email' value='${userData['Email']}' readonly>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Địa chỉ *</label>
                                <input type='text' class='form-control' name='diachi' value='${userData['DiaChi']}'>
                            </div>
                            <button class='btn btn-primary' type='submit' style='background-color: rgb(146, 26, 26);'>Thay đổi thông tin</button>
                        </div>
                    </div>
                </form>
            </div>
            `;
            console.log(userData);
        }
        window.onload = loadUserInfoFromLocalStorage;
        function validateForm() {
            var hoten = document.forms["profileForm"]["hoten"].value;
            var sodienthoai = document.forms["profileForm"]["sodienthoai"].value;
            var ngaysinh = document.forms["profileForm"]["ngaysinh"].value;
            var diachi = document.forms["profileForm"]["diachi"].value;
            if (/\d/.test(hoten)) {
                alert("Họ tên không được chứa số.");
                return false;
            }
            if (!/^0\d{9}$/.test(sodienthoai)) {
                alert("Số điện thoại không hợp lệ. Số điện thoại phải có 10 chữ số và bắt đầu từ 0.");
                return false;
            }
            var dob = new Date(ngaysinh);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 18) {
                alert("Bạn phải đủ 18 tuổi để sử dụng dịch vụ này.");
                return false;
            }
            if (diachi.trim() === "") {
                alert("Địa chỉ không được để trống.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
