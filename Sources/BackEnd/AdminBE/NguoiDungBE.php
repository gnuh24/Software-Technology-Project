<?php 
    require_once "../../Configure/MysqlConfig.php";

    function getNguoiDungByMaNguoiDung($maNguoiDung){
        //Chuẩn bị trước biến $connection
        $connection = null;

        //Chuẩn bị câu truy vấn gốc
        $query = "SELECT * FROM `NguoiDung` WHERE `MaNguoiDung` = :maNguoiDung";
    
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
    
        // Khởi tạo kết nối đến cơ sở dữ liệu
        try {

            $statement = $connection->prepare($query);
      
            if ($statement !== false) {
      
                $statement->bindValue(':maNguoiDung', $maNguoiDung, PDO::PARAM_INT);
      
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

    function createNguoiDung(   $hoTen,
                                $ngaySinh, 
                                $gioiTinh,
                                $soDienThoai, 
                                $email, 
                                $diaChi) {
    
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
        $query = "INSERT INTO `NguoiDung` (`HoTen`, `NgaySinh`, `GioiTinh`, `SoDienThoai`, `Email`, `DiaChi`) 
                                    VALUES (:hoTen, :ngaySinh, :gioiTinh, :soDienThoai, :email, :diaChi)";
        
        try {
        
            $statement = $connection->prepare($query);
        
            if ($statement !== false) {
        
                // Bind giá trị vào các tham số trong câu truy vấn
                $statement->bindValue(':hoTen', $hoTen, PDO::PARAM_STR);
                $statement->bindValue(':ngaySinh', $ngaySinh, PDO::PARAM_STR);
                $statement->bindValue(':gioiTinh', $gioiTinh, PDO::PARAM_STR);
                $statement->bindValue(':soDienThoai', $soDienThoai, PDO::PARAM_STR);
                $statement->bindValue(':email', $email, PDO::PARAM_STR);
                $statement->bindValue(':diaChi', $diaChi, PDO::PARAM_STR);
        
                // Thực hiện truy vấn
                $statement->execute();
        
                // Mã người dùng vừa được tạo
                $id = $connection->lastInsertId();
    
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
        } catch (PDOException $e) {
            return (object) [
                "status" => 400,
                "message" => $e->getMessage()
            ];
        } finally {
            $connection = null;
        }
    }
    

    function updateNguoiDung($maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $soDienThoai, $email, $diaChi) {
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
        $query = "UPDATE `NguoiDung` SET 
                    `HoTen` = :hoTen,
                    `NgaySinh` = :ngaySinh,
                    `GioiTinh` = :gioiTinh,
                    `SoDienThoai` = :soDienThoai,
                    `Email` = :email,
                    `DiaChi` = :diaChi
                WHERE `MaNguoiDung` = :maNguoiDung";
    
        try {
            $statement = $connection->prepare($query);
    
            if ($statement !== false) {
                // Bind giá trị vào các tham số trong câu truy vấn
                $statement->bindValue(':maNguoiDung', $maNguoiDung, PDO::PARAM_INT);
                $statement->bindValue(':hoTen', $hoTen, PDO::PARAM_STR);
                $statement->bindValue(':ngaySinh', $ngaySinh, PDO::PARAM_STR);
                $statement->bindValue(':gioiTinh', $gioiTinh, PDO::PARAM_STR);
                $statement->bindValue(':soDienThoai', $soDienThoai, PDO::PARAM_STR);
                $statement->bindValue(':email', $email, PDO::PARAM_STR);
                $statement->bindValue(':diaChi', $diaChi, PDO::PARAM_STR);
    
                // Thực hiện truy vấn
                $statement->execute();
    
                // Kiểm tra xem có bản ghi nào được cập nhật không
                if ($statement->rowCount() > 0) {
                    // Trả về thành công nếu có bản ghi được cập nhật
                    return (object) [
                        "status" => 200,
                        "message" => "Thành công",
                    ];
                } else {
                    // Trả về false nếu không có bản ghi nào được cập nhật
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

?>