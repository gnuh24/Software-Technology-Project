<?php 
    require_once __DIR__ . "/../../Configure/MysqlConfig.php";

function getAllLoaiSanPham(){
    // Chuẩn bị trước biến $connection
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `LoaiSanPham`";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
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
            "message" => "Lỗi không thể lấy danh sách loại sản phẩm",
        ];
    } finally {
        $connection = null;
    }
}

function getLoaiSanPhamByID($maLoaiSanPham) {
    // Khởi tạo kết nối
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `LoaiSanPham` WHERE `MaLoaiSanPham` = :maLoaiSanPham";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maLoaiSanPham', $maLoaiSanPham, PDO::PARAM_INT);

            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);

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
            "message" => "Lỗi không thể lấy thông tin loại sản phẩm",
        ];
    } finally {
        $connection = null;
    }
}

function isTenLoaiSanPhamExists($tenLoaiSanPham) {
    // Khởi tạo kết nối
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `LoaiSanPham` WHERE `TenLoaiSanPham` = :tenLoaiSanPham";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':tenLoaiSanPham', $tenLoaiSanPham, PDO::PARAM_STR);

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
            "message" => "Lỗi không thể kiểm tra loại sản phẩm",
        ];
    } finally {
        $connection = null;
    }
}

function isTenLoaiSanPhamBelongToMaSanPham($maLoaiSanPham, $tenLoaiSanPham) {
    // Khởi tạo kết nối
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `LoaiSanPham` WHERE `MaLoaiSanPham` = :maLoaiSanPham AND `TenLoaiSanPham` = :tenLoaiSanPham";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maLoaiSanPham', $maLoaiSanPham, PDO::PARAM_INT);
            $statement->bindValue(':tenLoaiSanPham', $tenLoaiSanPham, PDO::PARAM_STR);

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
            "message" => "Lỗi không thể kiểm tra loại sản phẩm",
        ];
    } finally {
        $connection = null;
    }
}

function createLoaiSanPham($tenLoaiSanPham) {
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    $query = "INSERT INTO `LoaiSanPham` (`TenLoaiSanPham`) VALUES (:tenLoaiSanPham)";
    
    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':tenLoaiSanPham', $tenLoaiSanPham, PDO::PARAM_STR);

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

function updateLoaiSanPham($maLoaiSanPham, $tenLoaiSanPham) {
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    $query = "UPDATE `LoaiSanPham` SET 
                `TenLoaiSanPham` = :tenLoaiSanPham
              WHERE `MaLoaiSanPham` = :maLoaiSanPham";

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maLoaiSanPham', $maLoaiSanPham, PDO::PARAM_INT);
            $statement->bindValue(':tenLoaiSanPham', $tenLoaiSanPham, PDO::PARAM_STR);

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

function deleteLoaiSanPham($maLoaiSanPham) {
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        // Bắt đầu transaction
        $connection->beginTransaction();

        // Lấy danh sách các sản phẩm thuộc loại sản phẩm cần xóa
        $query_select_products = "SELECT `MaSanPham` FROM `SanPham` WHERE `MaLoaiSanPham` = :maLoaiSanPham";
        $statement_select_products = $connection->prepare($query_select_products);
        $statement_select_products->bindValue(':maLoaiSanPham', $maLoaiSanPham, PDO::PARAM_INT);
        $statement_select_products->execute();
        $products = $statement_select_products->fetchAll(PDO::FETCH_ASSOC);

        // Cập nhật mã loại sản phẩm của các sản phẩm đó sang mã loại sản phẩm mặc định (id = 1)
        $query_update_products = "UPDATE `SanPham` SET `MaLoaiSanPham` = 1 WHERE `MaLoaiSanPham` = :maLoaiSanPham";
        $statement_update_products = $connection->prepare($query_update_products);
        $statement_update_products->bindValue(':maLoaiSanPham', $maLoaiSanPham, PDO::PARAM_INT);
        $statement_update_products->execute();

        // Xóa loại sản phẩm
        $query_delete_loai_san_pham = "DELETE FROM `LoaiSanPham` WHERE `MaLoaiSanPham` = :maLoaiSanPham";
        $statement_delete_loai_san_pham = $connection->prepare($query_delete_loai_san_pham);
        $statement_delete_loai_san_pham->bindValue(':maLoaiSanPham', $maLoaiSanPham, PDO::PARAM_INT);
        $statement_delete_loai_san_pham->execute();

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
