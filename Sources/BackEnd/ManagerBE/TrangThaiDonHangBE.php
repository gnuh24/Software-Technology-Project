<?php
require_once "../../Configure/MysqlConfig.php";

function getTrangThaiDonHangByMaDonHang($maDonHang) {
    $connection = null;

    $query = "SELECT * FROM `TrangThaiDonHang` WHERE `MaDonHang` = :maDonHang";

    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maDonHang', $maDonHang, PDO::PARAM_INT);

            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return (object) [
                "status" => 200,
                "message" => "Truy vấn thành công!",
                "data" => $result
            ];
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => "Lỗi không thể lấy thông tin trạng thái đơn hàng",
        ];
    } finally {
        $connection = null;
    }
}

function createTrangThaiDonHang($maDonHang, $trangThai) {
    $connection = null;

    $query = "INSERT INTO `TrangThaiDonHang` (`TrangThai`, `MaDonHang`) 
                VALUES (:trangThai, :maDonHang)";

    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maDonHang', $maDonHang, PDO::PARAM_INT);
            $statement->bindValue(':trangThai', $trangThai, PDO::PARAM_STR);

            $statement->execute();

            $id = $connection->lastInsertId();

            return (object) [
                "status" => 200,
                "message" => "Thành công",
                "data" => $id
            ];
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
