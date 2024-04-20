<?php
require "../../Configure/MysqlConfig.php";
function getAllChiTietphieunhapkho($page, $maPhieuNhap = null, $masanpham = null)
{
    //Chuẩn bị trước biến $connection
    $connection = null;

    //Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `CTPNK`";

    //Mảng chứa điều kiện
    $where_conditions = [];

    //Số phần tử mỗi trang
    $entityPerPage = 5;

    //Tổng số trang
    $totalPages = null;

    // Thêm điều kiện về ngày nhập kho
    //Lọc theo mã phiếu nhập
    if (isset($maPhieuNhap)) {
        $where_conditions[] = "`MaPhieu` = '$maPhieuNhap' ";
    }

    // Thêm điều kiện về giá trị đơn hàng
    //trong khoảng giá trị
    if (isset($masanpham)) {
        $where_conditions[] = "`MaSanPham` = $masanpham";
    }

    // Kết nối các điều kiện lại với nhau (Nếu không có thì skip)
    if (!empty($where_conditions)) {
        $query .= " WHERE " . implode(" AND ", $where_conditions);
    }
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    // Tính toán tổng số trang
    if ($totalPages === null) {
        //fetchColumn ( <Cột thứ n> ) : Lấy row đầu tiên của cột thứ n - 1
        $query_total_row = substr_replace($query, "COUNT(*)", 7, 1);
        echo $query_total_row;
        // Chạy lệnh Query để lấy ra tổng trang
        $statement_total_row = $connection->prepare($query_total_row);
        $statement_total_row->execute();

        //Làm tròn lên -> Tính ra tổng số trang
        $totalPages = ceil($statement_total_row->fetchColumn() / $entityPerPage);
    }

    $current_page = isset($page) ? $page : 1;
    $start_from = ($current_page - 1) * $entityPerPage;

    $query .= " LIMIT $entityPerPage OFFSET $start_from";
    // Khởi tạo kết nối đến cơ sở dữ liệu

    try {

        $statement = $connection->prepare($query);

        if ($statement !== false) {

            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return (object) [
                "status" => 200,
                "message" => "Thành công",
                "data" => $result,
                "totalPages" => $totalPages
            ];
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => "Lỗi không thể lấy danh sách tài khoản",
        ];
    } finally {
        $connection = null;
    }
}
function getChiTietPhieuNhapByMaPhieuNhap($maPhieuNhap)
{
    //Chuẩn bị trước biến $connection
    $connection = null;

    //Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `CTPNK` WHERE `MaPhieu` = :maPhieuNhap";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();


    // Khởi tạo kết nối đến cơ sở dữ liệu
    try {

        $statement = $connection->prepare($query);

        if ($statement !== false) {

            $statement->bindValue(':maTaiKhoan', $maPhieuNhap, PDO::PARAM_INT);

            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return (object) [
                "status" => 200,
                "message" => "Thành công",
                "data" => $result,
            ];
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => "Lỗi không thể lấy quyền",
        ];
    } finally {
        $connection = null;
    }
}
function CreateChiTietPhieuNhap($SoLuong,$DonGiaNhap,$MaPhieu,$MaSanPham)
{

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    $query = "INSERT INTO `CTPNK` (`SoLuong`,`DonGiaNhap`   ,`ThanhTien`, `MaPhieu`,       `MaSanPham`)
                                VALUES (:SoLuong, :DonGiaNhap, :ThanhTien,:MaPhieu,:MaSanPham)";


    try {

        $statement = $connection->prepare($query);
    
        if ($statement  !== false) {
    
            // Bind giá trị vào tham số :tenTaiKhoan trong câu truy vấn
            $statement->bindValue(':SoLuong', $SoLuong,        PDO::PARAM_INT);
            $statement->bindValue(':DonGiaNhap'    , $DonGiaNhap,            PDO::PARAM_STR);
            $statement->bindValue(':ThanhTien'      ,(double) $SoLuong*$DonGiaNhap,              PDO::PARAM_STR);
            $statement->bindValue(':MaQuanLy'      , $MaPhieu,              PDO::PARAM_INT);
            $statement->bindValue(':MaSanPham'      , $MaSanPham,              PDO::PARAM_INT);

            // Thực hiện truy vấn
            $statement = $statement->execute();
    
            //Mã tài khoản vừa khởi tạo
            $id = $connection->lastInsertId();


            if ($statement !== false) {
                // Trả về ID của bản ghi vừa chèn
                return (object) [
                    "status" => 200,
                    "message" => "Thành công",
                    "data" => $id
                ];
            } else {
                // Trả về false nếu không thành công
                throw new PDOException();
            }
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => $e->getMessage()
        ];
    } finally {
        $connection = null;
    }
}
