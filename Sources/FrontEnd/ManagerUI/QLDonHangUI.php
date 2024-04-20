<?php 
require_once "../../BackEnd/ManagerBE/DonHangBE.php";

// Case test và hiển thị danh sách đơn hàng
function test_and_display_all_donhang() {
    $result = getAllDonHang(1, "2024-01-01", "2024-01-30", "Huy");
    if ($result->status == 200) {
        $data = $result->data;
        echo "<h2>Danh sách đơn hàng</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Mã đơn hàng</th><th>Ngày đặt</th><th>Tổng giá trị</th><th>Địa chỉ giao hàng</th><th>Mã phương thức</th><th>Mã dịch vụ</th><th>Trạng thái</th></tr>";
        foreach ($data as $donhang) {
            echo "<tr>";
            echo "<td>{$donhang['MaDonHang']}</td>";
            echo "<td>{$donhang['NgayDat']}</td>";
            echo "<td>{$donhang['TongGiaTri']}</td>";
            echo "<td>{$donhang['DiaChiGiaoHang']}</td>";
            echo "<td>{$donhang['MaPhuongThuc']}</td>";
            echo "<td>{$donhang['MaDichVu']}</td>";
            echo "<td>{$donhang['TrangThai']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Lỗi khi lấy danh sách đơn hàng!";
    }
}

// Chạy case test và hiển thị kết quả
test_and_display_all_donhang();




// Case test và hiển thị danh sách đơn hàng của một khách hàng
function test_and_display_all_donhang_by_makh($maKH) {
    $result = getAllDonHangByMaKH($maKH);
    if ($result->status == 200) {
        $data = $result->data;
        echo "<h2>Danh sách đơn hàng của khách hàng có mã $maKH</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Mã đơn hàng</th><th>Ngày đặt</th><th>Tổng giá trị</th><th>Địa chỉ giao hàng</th><th>Mã phương thức</th><th>Mã dịch vụ</th></tr>";
        foreach ($data as $donhang) {
            echo "<tr>";
            echo "<td>{$donhang['MaDonHang']}</td>";
            echo "<td>{$donhang['NgayDat']}</td>";
            echo "<td>{$donhang['TongGiaTri']}</td>";
            echo "<td>{$donhang['DiaChiGiaoHang']}</td>";
            echo "<td>{$donhang['MaPhuongThuc']}</td>";
            echo "<td>{$donhang['MaDichVu']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Lỗi khi lấy danh sách đơn hàng!";
    }
}

// Chạy các case test và hiển thị kết quả
$maKH = 8;
test_and_display_all_donhang_by_makh($maKH);

// Case test và hiển thị thông tin của một đơn hàng
function test_and_display_donhang_by_madonhang($maDonHang) {
    $result = getDonHangByMaDonHang($maDonHang);
    if ($result->status == 200) {
        $donhang = $result->data[0];
        echo "<h2>Thông tin đơn hàng có mã $maDonHang</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Mã đơn hàng</th><th>Ngày đặt</th><th>Tổng giá trị</th><th>Địa chỉ giao hàng</th><th>Mã phương thức</th><th>Mã dịch vụ</th></tr>";
        echo "<tr>";
        echo "<td>{$donhang['MaDonHang']}</td>";
        echo "<td>{$donhang['NgayDat']}</td>";
        echo "<td>{$donhang['TongGiaTri']}</td>";
        echo "<td>{$donhang['DiaChiGiaoHang']}</td>";
        echo "<td>{$donhang['MaPhuongThuc']}</td>";
        echo "<td>{$donhang['MaDichVu']}</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "Lỗi khi lấy thông tin đơn hàng!";
    }
}

// Case test và hiển thị thông tin của một đơn hàng
function test_and_display_create_donhang($tongGiaTri, $maKH, $diaChiGiaoHang, $maPhuongThuc, $maDichVu) {
    $result = createDonHang($tongGiaTri, $maKH, $diaChiGiaoHang, $maPhuongThuc, $maDichVu);
    if ($result->status == 200) {
        echo "<h2>Đơn hàng mới đã được tạo thành công!</h2>";
        echo "<p>Mã đơn hàng: {$result->data}</p>";
    } else {
        echo $result->message;
    }
}



$maDonHang = 1;
test_and_display_donhang_by_madonhang($maDonHang);

$tongGiaTri = 500000;
$maKH = 2;
$diaChiGiaoHang = "456 Đường XYZ, Quận ABC, TP HCM";
$maPhuongThuc = 2;
$maDichVu = 2;
test_and_display_create_donhang($tongGiaTri, $maKH, $diaChiGiaoHang, $maPhuongThuc, $maDichVu);
?>
