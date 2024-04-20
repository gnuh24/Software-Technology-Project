<?php
require_once "../../BackEnd/ManagerBE/LoaiSanPhamBE.php"; 

// Test getAllLoaiSanPham function
// echo "Test getAllLoaiSanPham function: <br>";
// $result = getAllLoaiSanPham();
// print_r($result);
// echo "<br><br>";

// Test getLoaiSanPhamByID function
// echo "Test getLoaiSanPhamByID function: <br>";
// $maLoaiSanPham = 1; // Thay đổi mã loại sản phẩm cần kiểm tra
// $result = getLoaiSanPhamByID($maLoaiSanPham);
// print_r($result);
// echo "<br><br>";

// Test isTenLoaiSanPhamExists function
// echo "Test isTenLoaiSanPhamExists function: <br>";
// $tenLoaiSanPham = "Rượu Vodka"; // Thay đổi tên loại sản phẩm cần kiểm tra
// $result = isTenLoaiSanPhamExists($tenLoaiSanPham);
// print_r($result);
// echo "<br><br>";

// // Test isTenLoaiSanPhamBelongToMaSanPham function
// echo "Test isTenLoaiSanPhamBelongToMaSanPham function: <br>";
// $maSanPham = 2; // Thay đổi mã sản phẩm cần kiểm tra
// $tenLoaiSanPham = "Rượu Vodka"; // Thay đổi tên loại sản phẩm cần kiểm tra
// $result = isTenLoaiSanPhamBelongToMaSanPham($maSanPham, $tenLoaiSanPham);
// print_r($result);
// echo "<br><br>";

// // Test createLoaiSanPham function
// echo "Test createLoaiSanPham function: <br>";
// $tenLoaiSanPham = "Tên loại sản phẩm mới"; // Thay đổi tên loại sản phẩm cần tạo
// $result = createLoaiSanPham($tenLoaiSanPham);
// print_r($result);
// echo "<br><br>";

// // Test updateLoaiSanPham function
// echo "Test updateLoaiSanPham function: <br>";
// $maLoaiSanPham = 5; // Thay đổi mã loại sản phẩm cần cập nhật
// $tenLoaiSanPham = "Tên loại sản phẩm cập nhật"; // Thay đổi tên loại sản phẩm mới
// $result = updateLoaiSanPham($maLoaiSanPham, $tenLoaiSanPham);
// print_r($result);
// echo "<br><br>";

// // Test deleteLoaiSanPham function
echo "Test deleteLoaiSanPham function: <br>";
$maLoaiSanPham = 2; // Thay đổi mã loại sản phẩm cần xóa
$result = deleteLoaiSanPham($maLoaiSanPham);
print_r($result);
echo "<br><br>";
?>
