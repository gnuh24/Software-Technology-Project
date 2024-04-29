<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="QLDonHang.css" />
    <link rel="stylesheet" href="detail_donhang.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Quản lý đơn hàng</title>
</head>

<body>
    <div>
        <div class="App">
            <div class="StaffLayout_wrapper__CegPk">
                <div class="StaffHeader_wrapper__IQw-U">
                    <p class="StaffHeader_title__QxjW4">Dekanta</p>
                    <button class="StaffHeader_signOut__i2pcu">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket" class="svg-inline--fa fa-arrow-right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 2rem; height: 2rem; color: white"></svg>
                    </button>
                </div>
                <div>
                    <div>
                        <div class="Manager_wrapper__vOYy">
                            <div class="Sidebar_sideBar__CC4MK">
                                <a class="MenuItemSidebar_menuItem__56b1m" href="../QLLoaiSanPham/QLLoaiSanPham.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Loại Sản Phẩm</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="../QLSanPham/QLSanPham.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Sản Phẩm</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="../QLNhaCungCap/QLNhaCungCap.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Nhà Cung Cấp</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="../QLPhieuNhapKho/QLPhieuNhapKho.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Phiếu Nhập Kho</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="QLDonHang.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Đơn Hàng</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="./thongkedoanhthu.html">
                                    <span class="MenuItemSidebar_title__LLBtx">Thống Kê Doanh Thu</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="./thongkechitieu.html">
                                    <span class="MenuItemSidebar_title__LLBtx">Thống Kê Chi Tiêu</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="../ThongKe/ThongKe.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Thống Kê Đơn Hàng</span>
                                </a>
                            </div>
                            <div style="padding-left: 16%; width: 100%; padding-right: 2rem">
                                <div class="wrapper">
                                    <div class="orderManagement_order_history">
                                        <a class="back" href="./QLDonHang.php">
                                            <</a>
                                                <div class="detail__wrapper">
                                                    <p class="title">Chi tiết đơn hàng: <span id="orderID"></span></p>
                                                    <ul class="order_status__wrapper" id="order_status">
                                                        <?php
                                                        if ($dataDonHang['TrangThai'] == 'Huy') {
                                                            echo "  <div class='order_status completed'>
                                                                <li>Đã đặt hàng</li>
                                                            </div>
                                                            <div class='order_status completed'>
                                                                <li>Đã hủy</li>
                                                            </div>";
                                                        } else {
                                                            echo "<div class='order_status completed'>
                                                                <li>Đã đặt hàng</li>
                                                            </div>
                                                            <div class='order_status ";
                                                            echo 'completed';
                                                            echo "'>
                                                                <li>Đã xác nhận</li>
                                                            </div>
                                                            <div class='order_status ";
                                                            echo 'completed';
                                                            echo "'>
                                                            <li>Đang giao hàng</li>
                                                            </div>
                                                            <div class='order_status ";
                                                            echo 'completed';
                                                            echo "'>
                                                                <li>Giao hàng thành công</li>
                                                            </div>";
                                                        }
                                                        ?>
                                                    </ul>
                                                    <div class="transaction_info__wrapper">
                                                        <div class="receive_info__wrapper">
                                                            <p class="title">Thông tin người nhận:</p>
                                                            <div class="divider"></div>
                                                            <div class="receive_info">
                                                                <p class='name' id='hoten'></p>
                                                                <p id='diachigiaohang'></p>
                                                                <p id='sodienthoai'></p>
                                                            </div>
                                                        </div>
                                                        <div class="payment_method__wrapper">
                                                            <p class="title">Phương thức thanh toán:</p>
                                                            <div class="divider"></div>
                                                            <p id="tenphuongthuc">
                                                                <!-- <span> CHỈ ÁP DỤNG TIỀN MẶT ĐỐI VỚI NỘI THÀNH TPHCM</span> -->
                                                            </p>
                                                        </div>
                                                        <div class="payment_method__wrapper">
                                                            <p class="title">Phương thức vận chuyển:</p>
                                                            <div class="divider"></div>
                                                            <p id="tendichvu">
                                                                <!-- <span> CHỈ ÁP DỤNG TIỀN MẶT ĐỐI VỚI NỘI THÀNH TPHCM</span> -->
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="transaction_items__wrapper">
                                                        <p class="transaction_name">Trạng thái:
                                                            <span class="" id="trangthai">

                                                            </span>
                                                        </p>
                                                        <div class="divider"></div>
                                                        <div class="transaction_list">
                                                            <!-- <?php

                                                            foreach ($dataChitiet as $sanPham) {
                                                                echo "
                                                                    <div class='transaction_item'><img  src='' alt=''>
                                                                        <div class='item_info__wrapper'>
                                                                            <div class='item_info'>
                                                                                <p class='name'>TenSanPham</p>
                                                                            </div>
                                                                            <div class='item_info'>
                                                                                <p class='quantity'>XSoLuong</p>
                                                                                <p class='price'>9999999999đ</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class='divider'></div>";
                                                            }

                                                            ?> -->

                                                        </div>
                                                    </div>
                                                    <div class="order_total__wrapper">
                                                        <div>
                                                            <p>Tổng tạm tính:</p>
                                                            <p id="tongTamTinh"></p>
                                                        </div>
                                                        <div>
                                                            <p>Giảm giá:</p>
                                                            <p id="giamGia">0 đ</p>
                                                        </div>
                                                        <div>
                                                            <p>Phí vận chuyển:</p>
                                                            <p id="phiVanChuyen">0 đ</p>
                                                        </div>
                                                        <div class="total">
                                                            <p>Thành tiền:</p>
                                                            <p id="totalPrice"></p>
                                                        </div>
                                                    </div>
                                                </div>


                                    </div>

                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    var currentURL = new URL(window.location.href);

    var MaDonHang = currentURL.searchParams.get("MaDonHang");

    document.getElementById("orderID").innerText = MaDonHang;

    getChiTietDonHangByMaDonHang(MaDonHang);

    getDonHangByMaDonHang(MaDonHang);

    function getChiTietDonHangByMaDonHang(MaDonHang) {
        $.ajax({
            url: '../../../BackEnd/ManagerBE/ChiTietDonHangBE.php',
            type: 'GET',
            dataType: "json",
            data: {
                MaDonHang: MaDonHang,
            },
            success: function(response) {
                console.log(response)
                var data = response.data;

            },

            error: function(xhr, status, error) {
                console.error('Lỗi khi gọi API: ', error);
            }
        });
    }

    function getTenTrangThai(order_statuses) {
        if (order_statuses == 'ChoDuyet') {
            order_statuses = 'Chờ Duyệt';
        }
        if (order_statuses == 'Huy') {
            order_statuses = 'Đã Hủy';
        }
        if (order_statuses == 'DaDuyet') {
            order_statuses = 'Đã duyệt';
        }
        if (order_statuses == 'DangGiao') {
            order_statuses = 'Đang Giao';
        }
        if (order_statuses == 'GiaoThanhCong') {
            order_statuses = 'Giao Thành Công';
        }
        return order_statuses;
    }

    function getDonHangByMaDonHang(MaDonHang) {
        $.ajax({
            url: '../../../BackEnd/ManagerBE/DonHangBE.php',
            type: 'GET',
            dataType: "json",
            data: {
                MaDonHang: MaDonHang,
            },
            success: function(response) {
                console.log(response)
                var data = response.data;
                var order_status = document.getElementById("order_status");
                document.getElementById("hoten").innerHTML = `<span>Họ tên:</span>${data.HoTen}`;
                document.getElementById("diachigiaohang").innerHTML = `<span>Địa chỉ: </span>${data.SoDienThoai}`;
                document.getElementById("sodienthoai").innerHTML = `<span>Số điện thoại: </span>${data.DiaChiGiaoHang}`;
                document.getElementById("tenphuongthuc").innerHTML = `${date.TenPhuongThuc}<br>`;
                document.getElementById("tendichvu").innerHTML = `${data.TenDichVu}<br>`;
                document.getElementById("trangthai").innerText = getTenTrangThai(data.TrangThai);

            },

            error: function(xhr, status, error) {
                console.error('Lỗi khi gọi API: ', error);
            }
        });
    }
</script>

</html>