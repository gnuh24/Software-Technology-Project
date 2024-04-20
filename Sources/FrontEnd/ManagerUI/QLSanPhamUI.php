<?php
require_once "../../BackEnd/ManagerBE/SanPhamBE.php"; // Thay your_functions_file.php bằng tên file chứa các hàm

// Test getAllSanPham function
$page = 1;
$search = "";
$minTheTich = 1000;
$maxTheTich = 3000;
$minGia = 1000000;
$maxGia = 10000000;
$minNongDo = 40;
$maxNongDo = 50;
$trangThai = null;
$maLoaiSanPham = null;
$result = getAllSanPham($page, $search, $minTheTich, $maxTheTich, $minGia, $maxGia, $minNongDo, $maxNongDo, $trangThai, $maLoaiSanPham);

// Check if data exists
if ($result->status === 200) {
    // Retrieve data
    $data = $result->data;

    // Display data in table format
    echo "<table border='1'>";
    echo "<tr><th>MaSanPham</th><th>TenSanPham</th><th>XuatXu</th><th>ThuongHieu</th><th>TheTich</th><th>NongDoCon</th><th>Gia</th><th>SoLuongConLai</th><th>AnhMinhHoa</th><th>TrangThai</th><th>MaLoaiSanPham</th></tr>";
    
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row['MaSanPham'] . "</td>";
        echo "<td>" . $row['TenSanPham'] . "</td>";
        echo "<td>" . $row['XuatXu'] . "</td>";
        echo "<td>" . $row['ThuongHieu'] . "</td>";
        echo "<td>" . $row['TheTich'] . "</td>";
        echo "<td>" . $row['NongDoCon'] . "</td>";
        echo "<td>" . $row['Gia'] . "</td>";
        echo "<td>" . $row['SoLuongConLai'] . "</td>";
        echo "<td>" . $row['AnhMinhHoa'] . "</td>";
        echo "<td>" . ($row['TrangThai'] == 1 ? 'Hoạt động' : 'Không hoạt động') . "</td>";
        echo "<td>" . $row['MaLoaiSanPham'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Không có dữ liệu";
}

// // Test createSanPham function
// echo "Test createSanPham function: <br>";
// $tenSanPham = "Sản phẩm mới";
// $xuatXu = "Việt Nam";
// $thuongHieu = "Thương hiệu mới";
// $theTich = 50;
// $nongDoCon = 10;
// $gia = 500000;
// $soLuongConLai = 100;
// $anhMinhHoa = "path/to/image.jpg";
// $trangThai = 1;
// $maLoaiSanPham = 1;

// $result = createSanPham($tenSanPham, $xuatXu, $thuongHieu, $theTich, $nongDoCon, $gia, $anhMinhHoa,  $maLoaiSanPham);
// print_r($result);
// echo "<br><br>";

// Test updateSanPham function
// echo "Test updateSanPham function: <br>";
// $maSanPham = 31; // Sửa lại mã sản phẩm cần update
// $tenSanPham = "Sản phẩm mới cập nhật";
// $xuatXu = "Việt Nam";
// $thuongHieu = "Thương hiệu cập nhật";
// $theTich = 60;
// $nongDoCon = 15;
// $gia = 600000;
// $soLuongConLai = 50;
// $anhMinhHoa = "path/to/updated_image.jpg";
// $trangThai = 1;
// $maLoaiSanPham = 2; // Sửa lại mã loại sản phẩm mới

// $result = updateSanPham($maSanPham, $tenSanPham, $xuatXu, $thuongHieu, $theTich, $nongDoCon, $gia, $soLuongConLai, $anhMinhHoa, $trangThai, $maLoaiSanPham);
// print_r($result);
// echo "<br><br>";

//$r = isTenSanPhamExists("Tequila Maestro Dobel 50 Cristalino");
$r = isTenSanPhamBelongToMaSanPham(19, "Tequila Maestro Dobel 50 Cristalino");

echo "Test: $r->isExists";

?>
