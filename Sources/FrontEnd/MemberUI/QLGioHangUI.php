<?php
require_once "../../BackEnd/MemberBE/GioHangBE.php";

// Test getGioHangByMaTaiKhoan function
// $maTaiKhoan = 3;

// $result = getGioHangByMaTaiKhoan($maTaiKhoan);

// if ($result->status === 200) {
//     $data = $result->data;
//     print_r($data);
// } else {
//     echo "Không có dữ liệu";
// }

//Test createGioHang function
// $maTaiKhoan = 1;
// $maSanPham = 2;
// $donGia = 1000000;
// $soLuong = 2;
// $thanhTien = $donGia * $soLuong;

// $result = createGioHang($maTaiKhoan, $maSanPham, $donGia, $soLuong, $thanhTien);
// print_r($result);

//Test updateGioHang function
// $maTaiKhoan = 1;
// $maSanPham = 2;
// $donGia = 1500000;
// $soLuong = 3;
// $thanhTien = $donGia * $soLuong;

// $result = updateGioHang($maTaiKhoan, $maSanPham, $donGia, $soLuong, $thanhTien);
// print_r($result);

// Test deleteGioHang function
$maTaiKhoan = 1;
$maSanPham = 2;

$result = deleteGioHang($maTaiKhoan, $maSanPham);
print_r($result);

?>
