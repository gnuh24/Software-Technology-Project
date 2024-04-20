<?php

require_once "../../Configure/MysqlConfig.php";

function getGioHangByMaTaiKhoan($maTaiKhoan) {
    $connection = null;

    $query = "SELECT * FROM `GioHang` WHERE `MaTaiKhoan` = :maTaiKhoan";

    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maTaiKhoan', $maTaiKhoan, PDO::PARAM_INT);

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
            "message" => "Lỗi không thể lấy dữ liệu giỏ hàng",
        ];
    } finally {
        $connection = null;
    }
}

function createGioHang($maTaiKhoan, $maSanPham, $donGia, $soLuong, $thanhTien) {
    $connection = MysqlConfig::getConnection();

    $query = "INSERT INTO `GioHang` (`MaTaiKhoan`, `MaSanPham`, `DonGia`, `SoLuong`, `ThanhTien`) 
                VALUES (:maTaiKhoan, :maSanPham, :donGia, :soLuong, :thanhTien)";
    
    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maTaiKhoan', $maTaiKhoan, PDO::PARAM_INT);
            $statement->bindValue(':maSanPham', $maSanPham, PDO::PARAM_INT);
            $statement->bindValue(':donGia', $donGia, PDO::PARAM_INT);
            $statement->bindValue(':soLuong', $soLuong, PDO::PARAM_INT);
            $statement->bindValue(':thanhTien', $thanhTien, PDO::PARAM_INT);

            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Thêm giỏ hàng thành công",
            ];
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => "Lỗi không thể thêm giỏ hàng",
        ];
    } finally {
        $connection = null;
    }
}

function updateGioHang($maTaiKhoan, $maSanPham, $donGia = null, $soLuong = null, $thanhTien = null) {
    $connection = MysqlConfig::getConnection();

    $query = "UPDATE `GioHang` SET ";
    $update_values = [];

    if ($donGia !== null) {
        $update_values[] = "`DonGia` = :donGia";
    }

    if ($soLuong !== null) {
        $update_values[] = "`SoLuong` = :soLuong";
    }

    if ($thanhTien !== null) {
        $update_values[] = "`ThanhTien` = :thanhTien";
    }

    $query .= implode(", ", $update_values);
    $query .= " WHERE `MaTaiKhoan` = :maTaiKhoan AND `MaSanPham` = :maSanPham";

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maTaiKhoan', $maTaiKhoan, PDO::PARAM_INT);
            $statement->bindValue(':maSanPham', $maSanPham, PDO::PARAM_INT);

            if ($donGia !== null) {
                $statement->bindValue(':donGia', $donGia, PDO::PARAM_INT);
            }

            if ($soLuong !== null) {
                $statement->bindValue(':soLuong', $soLuong, PDO::PARAM_INT);
            }

            if ($thanhTien !== null) {
                $statement->bindValue(':thanhTien', $thanhTien, PDO::PARAM_INT);
            }

            $statement->execute();

            if ($statement->rowCount() > 0) {
                return (object) [
                    "status" => 200,
                    "message" => "Cập nhật giỏ hàng thành công",
                ];
            } else {
                throw new PDOException("Không có bản ghi nào được cập nhật");
            }
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => $e->getMessage(),
        ];
    } finally {
        $connection = null;
    }
}

function deleteGioHang($maTaiKhoan, $maSanPham) {
    $connection = MysqlConfig::getConnection();

    $query = "DELETE FROM `GioHang` WHERE `MaTaiKhoan` = :maTaiKhoan AND `MaSanPham` = :maSanPham";

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maTaiKhoan', $maTaiKhoan, PDO::PARAM_INT);
            $statement->bindValue(':maSanPham', $maSanPham, PDO::PARAM_INT);

            $statement->execute();

            if ($statement->rowCount() > 0) {
                return (object) [
                    "status" => 200,
                    "message" => "Xóa giỏ hàng thành công",
                ];
            } else {
                throw new PDOException("Không có bản ghi nào được xóa");
            }
        } else {
            throw new PDOException();
        }
    } catch (PDOException $e) {
        return (object) [
            "status" => 400,
            "message" => $e->getMessage(),
        ];
    } finally {
        $connection = null;
    }
}

?>
