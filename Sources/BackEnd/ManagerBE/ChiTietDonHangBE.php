<?php
    require_once __DIR__ . "/../../Configure/MysqlConfig.php";

function getChiTietDonHangByMaDonHang($maDonHang) {
    $connection = null;

    $query = "SELECT * FROM `CTDH` WHERE `MaDonHang` = :maDonHang";

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
            "message" => "Lỗi không thể lấy thông tin chi tiết đơn hàng",
        ];
    } finally {
        $connection = null;
    }
}

function createChiTietDonHang($maDonHang, $maSanPham, $donGia, $soLuong, $thanhTien) {
    $connection = null;

    $query = "INSERT INTO `CTDH` (`MaDonHang`, `MaSanPham`, `DonGia`, `SoLuong`, `ThanhTien`) 
                VALUES (:maDonHang, :maSanPham, :donGia, :soLuong, :thanhTien)";

    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maDonHang', $maDonHang, PDO::PARAM_INT);
            $statement->bindValue(':maSanPham', $maSanPham, PDO::PARAM_INT);
            $statement->bindValue(':donGia', $donGia, PDO::PARAM_INT);
            $statement->bindValue(':soLuong', $soLuong, PDO::PARAM_INT);
            $statement->bindValue(':thanhTien', $thanhTien, PDO::PARAM_INT);

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
