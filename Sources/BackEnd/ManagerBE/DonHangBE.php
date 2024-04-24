<?php 
require_once __DIR__ . "/../../Configure/MysqlConfig.php";


function getAllDonHang($page, $minNgayTao, $maxNgayTao, $trangThai) {
    $connection = null;
    $query = "SELECT * FROM `DonHang` dh 
                JOIN `TrangThaiDonHang` tt ON dh.`MaDonHang` = tt.`MaDonHang`
                WHERE tt.`NgayCapNhat` = (
                    SELECT MAX(`NgayCapNhat`) 
                    FROM `TrangThaiDonHang` subtt 
                    WHERE dh.`MaDonHang` = subtt.`MaDonHang`
                )";

    $where_conditions = [];
    
    $entityPerPage = 20;
    $totalPages = null;

    if (!empty($minNgayTao) && !empty($maxNgayTao)) {
        $where_conditions[] = "NgayDat BETWEEN '$minNgayTao' AND '$maxNgayTao'";
    }

    if (isset($trangThai)) {
        $where_conditions[] = "tt.TrangThai = '$trangThai'";
    }
    
    if (!empty($where_conditions)) {
        $query .= " AND " . implode(" AND ", $where_conditions);
    }

    $connection = MysqlConfig::getConnection();
    
    if ($totalPages === null) {
        $query_total_row = "SELECT COUNT(*) FROM DonHang";
        $statement_total_row = $connection->prepare($query_total_row);
        $statement_total_row->execute();

        $totalPages = ceil($statement_total_row->fetchColumn() / $entityPerPage);
    }

    $current_page = isset($page) ? $page : 1;
    $start_from = ($current_page - 1) * $entityPerPage;

    $query .= " LIMIT $entityPerPage OFFSET $start_from";

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
            "message" => "Lỗi không thể lấy danh sách đơn hàng",
        ];
    } finally {
        $connection = null;
    }
}

function getAllDonHangByMaKH($maKH) {
    $connection = null;
    $query = "SELECT * FROM `DonHang` dh 
                JOIN `TrangThaiDonHang` tt ON dh.`MaDonHang` = tt.`MaDonHang`
                WHERE tt.`NgayCapNhat` = (
                    SELECT MAX(`NgayCapNhat`) 
                    FROM `TrangThaiDonHang` subtt 
                    WHERE dh.`MaDonHang` = subtt.`MaDonHang`
                ) AND dh.`MaKH` = :maKH";

    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maKH', $maKH, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return (object) [
                "status" => 200,
                "message" => "Thành công",
                "data" => $result
            ];
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => "Lỗi không thể lấy danh sách đơn hàng của khách hàng",
        ];
    } finally {
        $connection = null;
    }
}

function getDonHangByMaDonHang($maDonHang) {
    $connection = null;
    $query = "SELECT * FROM `DonHang` dh 
                JOIN `TrangThaiDonHang` tt ON dh.`MaDonHang` = tt.`MaDonHang`
                WHERE dh.`MaDonHang` = :maDonHang";

    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maDonHang', $maDonHang, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return (object) [
                "status" => 200,
                "message" => "Thành công",
                "data" => $result
            ];
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => "Lỗi không thể lấy thông tin đơn hàng",
        ];
    } finally {
        $connection = null;
    }
}

function createDonHang($tongGiaTri, $maKH, $diaChiGiaoHang, $maPhuongThuc, $maDichVu) {
    $connection = null;
    
    $query_insert_donhang = "INSERT INTO `DonHang` (`TongGiaTri`, `MaKH`, `DiaChiGiaoHang`, `MaPhuongThuc`, `MaDichVu`) 
                                VALUES (:tongGiaTri, :maKH, :diaChiGiaoHang, :maPhuongThuc, :maDichVu)";

    $query_insert_trangthai = "INSERT INTO `TrangThaiDonHang` (`TrangThai`, `MaDonHang`) 
                                    VALUES ('ChoDuyet', LAST_INSERT_ID())";

    $connection = MysqlConfig::getConnection();

    try {
        // Thực hiện truy vấn insert vào bảng DonHang
        $statement_donhang = $connection->prepare($query_insert_donhang);

        if ($statement_donhang !== false) {
            $statement_donhang->bindValue(':tongGiaTri', $tongGiaTri, PDO::PARAM_INT);
            $statement_donhang->bindValue(':maKH', $maKH, PDO::PARAM_INT);
            $statement_donhang->bindValue(':diaChiGiaoHang', $diaChiGiaoHang, PDO::PARAM_STR);
            $statement_donhang->bindValue(':maPhuongThuc', $maPhuongThuc, PDO::PARAM_INT);
            $statement_donhang->bindValue(':maDichVu', $maDichVu, PDO::PARAM_INT);

            $statement_donhang->execute();

            // Lấy ID của đơn hàng vừa được tạo
            $id_donhang = $connection->lastInsertId();

            // Thực hiện truy vấn insert vào bảng TrangThaiDonHang
            $statement_trangthai = $connection->prepare($query_insert_trangthai);

            if ($statement_trangthai !== false) {
                $statement_trangthai->execute();

                return (object) [
                    "status" => 200,
                    "message" => "Thành công",
                    "data" => $id_donhang
                ];
            } else {
                throw new PDOException("Lỗi khi thêm trạng thái đơn hàng.");
            }
        } else {
            throw new PDOException("Lỗi khi thêm đơn hàng.");
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

?>
