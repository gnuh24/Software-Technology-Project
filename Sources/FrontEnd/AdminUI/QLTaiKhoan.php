<?php 
    require_once "../../BackEnd/AdminBE/TaiKhoanBE.php";
    require_once "../../BackEnd/AdminBE/NguoiDungBE.php";

    // Lấy dữ liệu
    //$result = getAllTaiKhoan(1, "nt", null, null); 
    //$result = getNguoiDungByMaNguoiDung(1); 

    // if ($result->status == 200) {
    //     // In ra số lượng kết quả
    //     echo "Tổng số tài khoản: " . count($result->data) . "<br>";

    //     // Hiển thị dữ liệu trong bảng
    //     echo "<table border='1'>";
    //     echo "<tr><th>MaTaiKhoan</th><th>TenDangNhap</th><th>MatKhau</th><th>TrangThai</th><th>NgayTao</th><th>Quyen</th><th>HoTen</th><th>Email</th><th>GioiTinh</th></tr>";

    //     // In ra dữ liệu
    //     foreach ($result->data as $row) {
    //         echo "<tr>";
    //         echo "<td>" . $row['MaTaiKhoan'] . "</td>";
    //         echo "<td>" . $row['TenDangNhap'] . "</td>";
    //         echo "<td>" . $row['MatKhau'] . "</td>";
    //         echo "<td>" . ($row['TrangThai'] ? 'true' : 'false') . "</td>";
    //         echo "<td>" . $row['NgayTao'] . "</td>";
    //         echo "<td>" . $row['Quyen'] . "</td>";
    //         echo "<td>" . $row['HoTen'] . "</td>";
    //         echo "<td>" . $row['Email'] . "</td>";
    //         echo "<td>" . $row['GioiTinh'] . "</td>";
    //         echo "</tr>";
    //     }
    //     echo "</table>";

    // } else {
    //     echo "Lỗi: " . $result->message; // Xử lý thông báo lỗi
    // }

    $result = updateNguoiDung(12, "THug16 ", "2004-02-05", "Male", "0938", "email@gmail", "123 Nguyễn CHí THanh");

    if ($result->status == 200) {
      //echo "$result->data";
            echo "Done :3";
    } else {
        echo "Lỗi: " . $result->message; // Xử lý thông báo lỗi
    }
?>
