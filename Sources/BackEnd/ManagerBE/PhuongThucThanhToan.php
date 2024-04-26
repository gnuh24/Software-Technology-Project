<?php 
require_once __DIR__ . "/../../Configure/MysqlConfig.php";

    function getAllPhuongThucThanhToan($page){
        
        // Chuẩn bị trước biến $connection
        $connection = null;

        // Chuẩn bị câu truy vấn gốc
        $query = "SELECT * FROM `PhuongThucThanhToan`";
        // Số phần tử mỗi trang
        $entityPerPage = 20;
        // Tổng số trang
        $totalPages = null;
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();       
        // Tính toán tổng số trang
        if ($totalPages === null) {

            // Query dùng để tính tổng số trang của các data trả về
            $query_total_row = "SELECT COUNT(*) FROM `PhuongThucThanhToan`";
            $statement_total_row = $connection->prepare($query_total_row);
            $statement_total_row->execute();

            // Làm tròn lên -> Tính ra tổng số trang
            $totalPages = ceil($statement_total_row->fetchColumn() / $entityPerPage);
        }

        // Kiểm tra tham số phân trang
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
                "message" => "Lỗi không thể lấy danh sách phương thức thanh toán",
            ];
        } finally {
            $connection = null;
        }
    }

    function getPhuongThucThanhToanByMaPhuongThuc($MaPhuongThuc) {
        // Khởi tạo kết nối
        $connection = null;
    
        // Chuẩn bị câu truy vấn gốc
        $query = "SELECT * FROM `PhuongThucThanhToan` WHERE `MaPhuongThuc` = :MaPhuongThuc";
    
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
        try {
            $statement = $connection->prepare($query);
    
            if ($statement !== false) {
                $statement->bindValue(':MaPhuongThuc', $MaPhuongThuc, PDO::PARAM_INT);
    
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
                "message" => "Lỗi không thể lấy thông tin phương thức thanh toán",
            ];
        } finally {
            $connection = null;
        }
    }
    

    function isTenPhuongThucExists($TenPhuongThuc) {
        // Khởi tạo kết nối
        $connection = null;
    
        // Chuẩn bị câu truy vấn gốc
        $query = "SELECT * FROM `PhuongThucThanhToan` WHERE `TenPhuongThuc` = :TenPhuongThuc";
    
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
        try {
            $statement = $connection->prepare($query);
    
            if ($statement !== false) {
                $statement->bindValue(':TenPhuongThuc', $TenPhuongThuc, PDO::PARAM_STR);
    
                $statement->execute();
    
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
                $isExists = !empty($result) ? 1 : 0;
    
                return (object) [
                    "status" => 200,
                    "message" => "Truy vấn thành công!",
                    "isExists" => $isExists
                ];
            } else {
                throw new PDOException();
            }
        } catch (PDOException $e) {
            return (object) [
                "status" => 400,
                "message" => "Lỗi không thể kiểm tra phương thức thanh toán",
            ];
        } finally {
            $connection = null;
        }
    }

    function isTenPhuongThucBelongToMaPhuongThuc($MaPhuongThuc, $TenPhuongThuc) {
        // Khởi tạo kết nối
        $connection = null;
    
        // Chuẩn bị câu truy vấn gốc
        $query = "SELECT * FROM `PhuongThucThanhToan` WHERE `MaPhuongThuc` = :MaPhuongThuc AND `TenPhuongThuc` = :TenPhuongThuc";
    
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
        try {
            $statement = $connection->prepare($query);
    
            if ($statement !== false) {
                $statement->bindValue(':MaPhuongThuc', $MaPhuongThuc, PDO::PARAM_INT);
                $statement->bindValue(':TenPhuongThuc', $TenPhuongThuc, PDO::PARAM_STR);
    
                $statement->execute();
    
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
                $isExists = !empty($result) ? 1 : 0;
    
                return (object) [
                    "status" => 200,
                    "message" => "Truy vấn thành công!",
                    "isExists" => $isExists
                ];
            } else {
                throw new PDOException();
            }
        } catch (PDOException $e) {
            return (object) [
                "status" => 400,
                "message" => "Lỗi không thể kiểm tra phương thức thanh toán",
            ];
        } finally {
            $connection = null;
        }
    }

    function createPhuongThucThanhToan($TenPhuongThuc) {
        
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();

        $query = "INSERT INTO `PhuongThucThanhToan` (`TenPhuongThuc`) 
                    VALUES (:TenPhuongThuc)";
        
        try {
            $statement = $connection->prepare($query);

            if ($statement !== false) {
                $statement->bindValue(':TenPhuongThuc', $TenPhuongThuc, PDO::PARAM_STR);
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

    function updatePhuongThucThanhToan($MaPhuongThuc, $TenPhuongThuc) {
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();

        $query = "UPDATE `PhuongThucThanhToan` SET 
                    `TenPhuongThuc` = :TenPhuongThuc,
                WHERE `MaPhuongThuc` = :MaPhuongThuc";

        try {
            $statement = $connection->prepare($query);

            if ($statement !== false) {
                $statement->bindValue(':MaPhuongThuc', $MaPhuongThuc, PDO::PARAM_INT);
                $statement->bindValue(':TenPhuongThuc', $TenPhuongThuc, PDO::PARAM_STR);

                $statement->execute();

                if ($statement->rowCount() > 0) {
                    return (object) [
                        "status" => 200,
                        "message" => "Thành công",
                    ];
                } else {
                    throw new PDOException("Không có bản ghi nào được cập nhật");
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
    
function deletePhuongThuc($maPhuongThuc) {
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        // Bắt đầu transaction
        $connection->beginTransaction();

        // Lấy danh sách các hóa đơn thuộc phương thức thanh toán cần xóa
        $query_select_DonHang = "SELECT `MaPhuongThuc` FROM `DonHang` WHERE `MaPhuongThuc` = :maPhuongThuc";
        $statement_select_DonHang = $connection->prepare($query_select_DonHang);
        $statement_select_DonHang->bindValue(':maPhuongThuc', $maPhuongThuc, PDO::PARAM_INT);
        $statement_select_DonHang->execute();
        $DonHang = $statement_select_DonHang->fetchAll(PDO::FETCH_ASSOC);

        // Cập nhật mã phương thức thanh toán của các hóa đơn đó sang mã phương thức thanh toán mặc định (id = 1)
        $query_update_DonHang = "UPDATE `DonHang` SET `MaPhuongThuc` = 1 WHERE `MaPhuongThuc` = :maPhuongThuc";
        $statement_update_DonHang = $connection->prepare($query_update_DonHang);
        $statement_update_DonHang->bindValue(':maPhuongThuc', $maPhuongThuc, PDO::PARAM_INT);
        $statement_update_DonHang->execute();

        // Xóa phương thức thanh toán
        $query_delete_nha_cung_cap = "DELETE FROM `PhuongThuc` WHERE `MaPhuongThuc` = :maPhuongThuc";
        $statement_delete_nha_cung_cap= $connection->prepare($query_delete_nha_cung_cap);
        $statement_delete_nha_cung_cap->bindValue(':maPhuongThuc', $maPhuongThuc, PDO::PARAM_INT);
        $statement_delete_nha_cung_cap->execute();

        // Commit transaction nếu mọi thứ diễn ra suôn sẻ
        $connection->commit();

        return (object) [
            "status" => 200,
            "message" => "Thành công",
        ];

    } catch (PDOException $e) {
        // Rollback transaction nếu có lỗi xảy ra
        $connection->rollBack();

        return (object) [
            "status" => 400,
            "message" => $e->getMessage()
        ];
    } finally {
        $connection = null;
    }
}
?>
