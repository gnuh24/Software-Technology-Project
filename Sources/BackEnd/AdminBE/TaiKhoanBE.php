<?php 
    require "../../Configure/MysqlConfig.php";

    function getAllTaiKhoan($page, $search, $quyen, $trangThai){
        //Chuẩn bị trước biến $connection
        $connection = null;

        //Chuẩn bị câu truy vấn gốc
        $query = "SELECT * FROM `TaiKhoan`";

        //Mảng chứa điều kiện
        $where_conditions=[];
        
        //Số phần tử mỗi trang
        $entityPerPage = 5;

        //Tổng số trang
        $totalPages = null;


        /*
            Ý tưởng tổng quát về lọc
                - Cứ mỗi tham số lọc được set vào thì mảng điều kiện sẽ chứa thêm 1 điều kiện
                - Sau cùng ta chỉ cần hàm implode() để nối các điều kiện lại
                    implode(<Ký tự>, <Mảng>): Dùng để nối các ký tự torng mảng lại
                    VD: 
                            $array = array('apple', 'banana', 'orange');
                            $comma_separated = implode(", ", $array);
                            echo $comma_separated; // Kết quả: apple, banana, orange

        
        */
    
        // Lọc theo search
        if (!empty($search)) {
            $empty = false;
            $where_conditions[] .= "`TenDangNhap` LIKE '%" . $search . "%' ";
        }

        // Thêm điều kiện về quyền
        if (isset($quyen)) {
            $where_conditions[] = "`Quyen` = '$quyen' ";
        }

        // Thêm điều kiện về trạng thái
        if (isset($trangThai)) {
            $where_conditions[] = "`TrangThai` = $trangThai";
        }
        
        // Kết nối các điều kiện lại với nhau (Nếu không có thì skip)
        if (!empty($where_conditions)) {
            $query .= " WHERE " . implode(" AND ", $where_conditions);
        }

    
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
        // Tính toán tổng số trang
        if ($totalPages === null) {
    
            // Query dùng để tính tổng số trang của các data trả về
            /* 
                        Substr_replace là lệnh dùng để thay thế chuỗi trong PHP
                        Param 1: $query: Chuỗi cần thay ra
                        Param 2: "COUNT(*)": Chuỗi sẽ được thay vào
                        Param 3: 7: Thay thế bắt đầu từ vị trí ký tự 7 (Tính từ 0)
                        Param 4: 1: Thay đúng 1 ký tự 
                            Sample:
                        $query = "SELECT * FROM `TaiKhoan`";
                        $query_total_row = substr_replace($query, "COUNT(*)", 7, 1);
                        -> $query_total_row = "SELECT COUNT(*) FROM `TaiKhoan`"
    
                    */

            //fetchColumn ( <Cột thứ n> ) : Lấy row đầu tiên của cột thứ n - 1
            $query_total_row = substr_replace($query, "COUNT(*)", 7, 1);

            // Chạy lệnh Query để lấy ra tổng trang
            $statement_total_row = $connection->prepare($query_total_row);
            $statement_total_row->execute();
    
            //Làm tròn lên
            $totalPages = ceil($statement_total_row->fetchColumn() / $entityPerPage);
        }
    
        // Kiểm tra tham số phân trang 
    
        /*
                $entityPerPage: Số lượng phân tử mỗi trang
                $current_page: Số trang hiện tại
                $start_from: Bắt đầu từ  row thứ bao nhiêu ?
    
                Giải thích câu truy vấn
                    + Offset: Dùng để bỏ qua số lượng row (Chặn đầu trên) (Bắt đầu từ 0)
                    + Limit giới hạn số row lấy ra (Chặn đầu dưới)
                        -> Kết hợp cả 2 lại ta có công thức phân trang
    
                */
    

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

    function getTaiKhoanByMaTaiKhoan($maTaiKhoan){
        //Chuẩn bị trước biến $connection
        $connection = null;

        //Chuẩn bị câu truy vấn gốc
        $query = "SELECT * FROM `TaiKhoan` WHERE `MaTaiKhoan` = :maTaiKhoan";
    
        // Khởi tạo kết nối
        $connection = MysqlConfig::getConnection();
    
    
        // Khởi tạo kết nối đến cơ sở dữ liệu
        try {

            $statement = $connection->prepare($query);
      
            if ($statement !== false) {
      
                $statement->bindValue(':maTaiKhoan', $maTaiKhoan, PDO::PARAM_INT);
      
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

    

?>