<?php
require_once "../../../BackEnd/ManagerBE/ChiTietPhieuNhapKhoBE.php";
require_once "../../../BackEnd/ManagerBE/PhieuNhapKhoBE.php";

// Kiểm tra xem có dữ liệu GET được gửi từ AJAX không
if (isset($_GET['MaNhaCungCap']) && isset($_GET['MaQuanLy']) && isset($_GET['TotalValue']) && isset($_GET['ProductData'])) {
    // Lấy dữ liệu từ GET request
    $maNhaCungCap = $_GET['MaNhaCungCap'];
    $maQuanLy = $_GET['MaQuanLy'];
    $totalValue = $_GET['TotalValue'];
    $productData = json_decode($_GET['ProductData'], true); // Giải mã chuỗi JSON thành mảng PHP

    // Create a new DateTime object and format the date as a string
// Thiết lập múi giờ của Việt Nam
$dateZone = new DateTimeZone('Asia/Ho_Chi_Minh');

// Tạo đối tượng DateTime với múi giờ của Việt Nam
$date1 = new DateTime('now', $dateZone);

// Định dạng ngày giờ
$formattedDate = $date1->format('Y-m-d H:i:s');


    // Tạo phiếu nhập kho
    $ketqua1 = createPhieuNhapKho($formattedDate, $totalValue, $maNhaCungCap, $maQuanLy);
    if ($ketqua1->status === 200) {
        $idpnh = $ketqua1->data;
        // Tạo chi tiết phiếu nhập cho từng sản phẩm
        foreach ($productData as $tmp) {
            createChiTietPhieuNhap($tmp['SoLuong'], $tmp['DonGia'], $idpnh, $tmp['MaSanPham']);
        }
        echo "Phiếu nhập kho đã được tạo thành công.";
    } else {
        echo "Lỗi: Không thể tạo phiếu nhập kho.";
    }
} else {
    // Nếu không có dữ liệu GET hoặc dữ liệu không đủ, bạn có thể trả về thông báo lỗi.
    echo "Lỗi: Dữ liệu không hợp lệ.";
}
