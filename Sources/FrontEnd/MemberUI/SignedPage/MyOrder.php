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
    <title>Đơn hàng của tôi</title>
</head>
<body>
    <?php require_once "../Header/SignedHeader.php" ?>

    <section>
        <div class="center-text" style="margin-top: 20px;">
            <div class="title_section">
                <div class="bar"></div>
                <h2 class="center-text-share">Đơn hàng của bạn</h2>
            </div>
        </div>
    </section>

    <!-- Phần hiển thị đơn hàng -->
    <div class="orderManagement_order_history">
        <?php
        // Code PHP để lấy dữ liệu đơn hàng
        ?>

        <?php
        // Kiểm tra số lượng đơn hàng
        $numberOfProducts = count(array_unique(array_column($data->data, 'MaDonHang')));

        if ($numberOfProducts <= 0) {
            echo '<p class="emty_cart" style="text-align: center;">Bạn chưa có đơn hàng nào!</p>';
        }

        // Hiển thị thông tin đơn hàng
        foreach ($data->data as $hoaDon) {
            echo "<div class='orderManagement_order_list'>" .

                "<div class='orderManagement_order_title'>" .
                    "<p class='anhMinhHoa'>Ảnh minh họa</p>" .
                    "<p class='tenSanPham'>Tên sản phẩm</p>" .
                    "<p class='donGia'> Đơn giá</p>" .
                    "<p class='soLuong'>Số lượng</p>" .
                    "<p class='thanhTien'>Thành tiền</p>" .
                "</div>";

            require_once "../../../BackEnd/ManagerBE/ChiTietDonHangBE.php";

            $listCTDH = getChiTietDonHangByMaDonHang($hoaDon["MaDonHang"])->data;

            foreach ($listCTDH as $chiTiet) {
                echo "<div class='orderManagement_order_info'>" .
                    "<p class='anhMinhHoa'><img style='width: 100px; height: 100px;' src='{$chiTiet['AnhMinhHoa']}'></p>" .
                    "<p class='tenSanPham'>{$chiTiet['TenSanPham']}</p>" .
                    "<p class='donGia'>{$chiTiet['DonGia']}</p>" .
                    "<p class='soLuong'>{$chiTiet['SoLuong']}</p>" .
                    "<p class='thanhTien'>{$chiTiet['ThanhTien']}</p>" .
                "</div>";
            }

            echo "<div class='orderManagement_order_thanhTien'>" .
                "<p>Trạng thái: ";
                switch ($hoaDon['TrangThai']) {
                    case 'ChoDuyet':
                        echo "Chờ duyệt";
                        break;
                    case 'DaDuyet':
                        echo "Đã được duyệt";
                        break;
                    case 'DangGiao':
                        echo "Đang giao hàng";
                        break;
                    case 'GiaoThanhCong':
                        echo "Giao thành công";
                        break;
                    case 'Huy':
                        echo "Đã hủy";
                        break;
                    default:
                        echo $hoaDon['TrangThai'];
                }
                echo "</p>" .
                    "<p>Tổng giá trị: {$hoaDon['TongGiaTri']}</p>" .
                    "</div>" .
                    // Hiển thị nút chi tiết và nút hủy đơn hàng
                    "<div class='orderManagement_order_actions'>";

            // Chuyển danh sách sản phẩm thành chuỗi JSON để truyền vào hàm cancel
            $listSanPham = json_encode($listCTDH);

            if ($hoaDon['TrangThai'] == 'GiaoThanhCong' || $hoaDon['TrangThai'] == 'Huy') {
                echo "<button class='order_detail_button' onclick='toOrderDetail({$hoaDon["MaDonHang"]})'> Chi tiết</button>";
            } else {
                echo "<button class='order_detail_button' onclick='toOrderDetail({$hoaDon["MaDonHang"]})'> Chi tiết</button>" .
                    "<button class='cancel_order_button' onclick='cancel({$hoaDon["MaDonHang"]}, \"{$hoaDon['TrangThai']}\", " . json_encode($listSanPham) . ")'>Hủy đơn hàng</button>";
            }
            
            
            echo "</div>" .
                "</div>";
        }
        ?>

    </div>

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
