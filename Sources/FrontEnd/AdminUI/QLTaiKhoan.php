<?php 
    require_once "../../BackEnd/AdminBE/TaiKhoanBE.php";

    //$result = getAllTaiKhoan(1, "custom", "Member", 0); // Lấy dữ liệu
    // $result = getTaiKhoanByMaTaiKhoan(1); // Lấy dữ liệu
    // $result = getTaiKhoanByTenDangNhap("Thug24"); // Lấy dữ liệu
    $result = isTenDangNhapExists("Thug25"); // Lấy dữ liệu

    if ($result->status == 200) {
        echo "$result->isExists";

    } else {
        echo "Lỗi: " . $result->message; // Xử lý thông báo lỗi
    }

    // if ($result->status == 200) {
    //     $Object = $result->data;
    //     $totalPages = $result->totalPages;

    //     echo "<table border='1'>";
    //     echo "<tr><th>MaTaiKhoan</th><th>TenDangNhap</th><th>MatKhau</th><th>TrangThai</th><th>NgayTao</th><th>Quyen</th></tr>";

    //     // In ra dữ liệu
    //     foreach ($Object as $row) {
    //         // Hiển thị dữ liệu
    //             echo "<tr>";
    //             echo "<td>" . $row['MaTaiKhoan'] . "</td>";
    //             echo "<td>" . $row['TenDangNhap'] . "</td>";
    //             echo "<td>" . $row['MatKhau'] . "</td>";
    //             echo "<td>" . ($row['TrangThai'] ? 'true' : 'false') . "</td>";
    //             echo "<td>" . $row['NgayTao'] . "</td>";
    //             echo "<td>" . $row['Quyen'] . "</td>";
    //             echo "</tr>";
          
    //     }
    //     echo "</table>";

    // } else {
    //     echo "Lỗi: " . $result->message; // Xử lý thông báo lỗi
    // }

   // Kiểm tra kết quả của hàm createTaiKhoan
    $result = updateTaiKhoan(25, false, "Manager");
    // if ($result->status == 200) {
    //     echo "ID: $result->data";
    // } else if ($result->status === 400) {
    //     echo "Lỗi: $result->message";
    // }

?>
