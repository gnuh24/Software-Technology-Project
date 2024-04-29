<?php
require_once "../../../BackEnd/ManagerBE/DonHangBE.php";

if (isset($_GET['maTaiKhoan'])) {
    $maTaiKhoan = $_GET['maTaiKhoan'];
    // Gọi hàm PHP bạn muốn thực thi và trả về kết quả dưới dạng JSON
    $data = getAllDonHangByMaKH($maTaiKhoan);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../GuestPage/HomePage.css" />
    <link rel="stylesheet" href="../GuestPage/login.css" />
    <link rel="stylesheet" href="MyOrder.css" />
    <title>Chi tiết đơn hàng</title>
</head>
<body>
    <?php require_once "../Header/SignedHeader.php" ?>

    <section>
        <div class="center-text" style="margin-top: 20px;">
            <div class="title_section">
                <div class="bar"></div>
                <h2 class="center-text-share">Chi tiết đơn hàng</h2>
            </div>
        </div>
    </section>

  

    <?php require_once "../Footer/Footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       function cancel(maDonHang, trangThai, listSanPham){
            // Hiển thị hộp thoại xác thực
            var confirmation = confirm("Bạn có chắc muốn hủy đơn hàng này?");
            
            // Kiểm tra xác thực người dùng
            if (confirmation) {
                // Nếu xác thực thành công
                if (trangThai !== "ChoDuyet"){
                    // Duyệt danh sách sản phẩm và gọi hàm tangSoLuongSanPham để hoàn trả số lượng
                    listSanPham.forEach(function(sanPham) {
                        var maSanPham = sanPham.MaSanPham;
                        var soLuong = sanPham.SoLuong;

                        tangSoLuongSanPham(maSanPham, soLuong);
                    });
                }
                
                // Gọi hàm createTrangThaiDonHang để cập nhật trạng thái đơn hàng
                createTrangThaiDonHang(maDonHang);
                
                // Hiển thị thông báo và reload trang
                alert("Đã hủy đơn hàng thành công");
                location.reload(); // Hoặc window.location.reload()
            } else {
                // Nếu người dùng không xác thực, không thực hiện hủy đơn hàng
                console.log("Hủy thao tác hủy đơn hàng");
            }
        }


        function createTrangThaiDonHang(maDonHang) {
            $.ajax({
                url: "../../../BackEnd/ManagerBE/TrangThaiDonHangBE.php",
                method: "POST",
                dataType: "json",
                data: {
                    MaDonHang: maDonHang,
                    TrangThai: "Huy"
                },
                success: function(response) {
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
     

                }
            });
        }

        function tangSoLuongSanPham(maSanPham, soLuongTang) {
            $.ajax({
                url: '../../../BackEnd/ManagerBE/SanPhamBE.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'up',
                    maSanPham: maSanPham,
                    soLuongTang: soLuongTang // Đảm bảo đặt tên trường đúng
                },
                success: function(response) {
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        function toOrderDetail(maDonHang){
            window.location.href = `MyOrderInDetail.php?maDonHang=${maDonHang}`;
        }



    </script>
</body>
</html>
