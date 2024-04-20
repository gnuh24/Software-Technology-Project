<?php
require_once "../../Configure/MysqlConfig.php";

function getAllNhaCungCap($page)
{
        
    // Chuẩn bị trước biến $connection
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `NhaCungCap`";
    // Số phần tử mỗi trang
    $entityPerPage = 20;
    // Tổng số trang
    $totalPages = null;
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();       
    // Tính toán tổng số trang
    if ($totalPages === null) {

        // Query dùng để tính tổng số trang của các data trả về
        $query_total_row = "SELECT COUNT(*) FROM `NhaCungCap`";
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

function getNhaCungCapByID($maNhaCungCap)
{
    // Khởi tạo kết nối
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `NhaCungCap` WHERE `MaNCC` = :maNhaCungCap";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maNhaCungCap', $maNhaCungCap, PDO::PARAM_INT);

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
function getNhaCungCapBySDT($SoDienThoai)
{
    // Khởi tạo kết nối
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `NhaCungCap` WHERE `SoDienThoai` = :SoDienThoai";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':SoDienThoai', $SoDienThoai, PDO::PARAM_INT);

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
function isTenNhaCungCapExists($tenNhaCungCap)
{
    // Khởi tạo kết nối
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `NhaCungCap` WHERE `TenNCC` = :tenNhaCungCap";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':tenNhaCungCap', $tenNhaCungCap, PDO::PARAM_STR);

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

function isTenNhaCungCapBelongToMaNhaCungCap($maNhaCungCap, $tenNhaCungCap)
{
    // Khởi tạo kết nối
    $connection = null;

    // Chuẩn bị câu truy vấn gốc
    $query = "SELECT * FROM `NhaCungCap` WHERE `MaNCC` = :maNhaCungCapAND `TenNCC` = :tenNhaCungCap";

    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maNhaCungCap', $maNhaCungCap, PDO::PARAM_INT);
            $statement->bindValue(':tenNhaCungCap', $tenNhaCungCap, PDO::PARAM_STR);

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
            "message" => "Lỗi không thể kiểm tra nhà cung cấp",
        ];
    } finally {
        $connection = null;
    }
}

function createNhaCungCap($tenNhaCungCap, $SoDienThoai, $Email)
{
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    $query = "INSERT INTO `NhaCungCap` (`TenNCC`,`SoDienThoai`,`Email`) VALUES (:tenLoaiSanPham,:SoDienThoai,:Email)";

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':tenLoaiSanPham', $tenNhaCungCap, PDO::PARAM_STR);
            $statement->bindValue(':SoDienThoai', $SoDienThoai, PDO::PARAM_STR);
            $statement->bindValue(':Email', $Email, PDO::PARAM_STR);

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

function updateNhaCungCap($maNhaCungCap, $tenNhaCungCap, $SoDienThoai, $Email)
{
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    $query = "UPDATE `NhaCungCap` SET 
                `TenNCC` = :tenLoaiSanPham,
                `soDienThoai`=:soDienThoai,
                `Email` =:Email
              WHERE `MaNCC` = :maNhaCungCap";

    try {
        $statement = $connection->prepare($query);

        if ($statement !== false) {
            $statement->bindValue(':maNhaCungCap', $maNhaCungCap, PDO::PARAM_INT);
            $statement->bindValue(':tenNhaCungCap', $tenNhaCungCap, PDO::PARAM_STR);
            $statement->bindValue(':SoDienThoai', $SoDienThoai, PDO::PARAM_STR);
            $statement->bindValue(':Email', $Email, PDO::PARAM_STR);


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

function deleteNhaCungCap($maNhaCungCap)
{
    // Khởi tạo kết nối
    $connection = MysqlConfig::getConnection();

    try {
        // Bắt đầu transaction
        $connection->beginTransaction();

        // Lấy danh sách các phiếu nhập kho thuộc nhà cung cấp cần xóa
        $query_select_PNKS = "SELECT `MaNCC` FROM `PhieuNhapKho` WHERE `MaNCC` = :maNhaCungCap";
        $statement_select_PNKS = $connection->prepare($query_select_PNKS);
        $statement_select_PNKS->bindValue(':maNhaCungCap', $maNhaCungCap, PDO::PARAM_INT);
        $statement_select_PNKS->execute();
        $PNKS = $statement_select_PNKS->fetchAll(PDO::FETCH_ASSOC);

        // Cập nhật mã nhà cung cấp của các phiếu nhập kho đó sang mã nhà cung cấp mặc định (id = 1)
        $query_update_PNKS = "UPDATE `PhieuNhapKho` SET `MaNCC` = 1 WHERE `MaNCC` = :maNhaCungCap";
        $statement_update_PNKS = $connection->prepare($query_update_PNKS);
        $statement_update_PNKS->bindValue(':maNhaCungCap', $maNhaCungCap, PDO::PARAM_INT);
        $statement_update_PNKS->execute();

        // Xóa loại nhà cung cáp
        $query_delete_nha_cung_cap = "DELETE FROM `NhaCungCap` WHERE `MaNCC` = :maNhaCungCap";
        $statement_delete_nha_cung_cap = $connection->prepare($query_delete_nha_cung_cap);
        $statement_delete_nha_cung_cap->bindValue(':maNhaCungCap', $maNhaCungCap, PDO::PARAM_INT);
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
