<?php 
    require_once __DIR__ . "/../../Configure/MysqlConfig.php";

    if (isset($_GET['from']) && isset($_GET['to'])){

        $from = $_GET['from'];
        $to = $_GET['to'];

        if (isset($_GET['thongKeDonHang'])){

            $result = thongKeDonHang($from, $to);

            echo json_encode($result);

        }else{

        }


    }

    function thongKeDonHang($from, $to){
        // Chuẩn bị kết nối
        $connection = null;

        // Chuẩn bị câu truy vấn
        $query = "SELECT DATE(dh.NgayDat) AS ngayLapDon, tdh.TrangThai AS trangThai, COUNT(*) AS soLuongDon
                FROM TrangThaiDonHang tdh
                INNER JOIN DonHang dh ON tdh.MaDonHang = dh.MaDonHang
                WHERE DATE(dh.NgayDat) BETWEEN COALESCE(:minDate, '2010-01-01') AND COALESCE(:maxDate, CURRENT_DATE())
                AND tdh.NgayCapNhat = (
                    SELECT MAX(tdh2.NgayCapNhat)
                    FROM TrangThaiDonHang tdh2
                    WHERE tdh2.MaDonHang = tdh.MaDonHang
                )
                GROUP BY DATE(dh.NgayDat), tdh.TrangThai
                ORDER BY DATE(dh.NgayDat)";

        try {
            // Khởi tạo kết nối
            $connection = MysqlConfig::getConnection();
            $statement = $connection->prepare($query);

            // Bind các giá trị tham số
            $statement->bindValue(':minDate', $from, PDO::PARAM_STR);
            $statement->bindValue(':maxDate', $to, PDO::PARAM_STR);

            // Thực thi truy vấn
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Trả về kết quả
            return (object) [
                "status" => 200,
                "message" => "Thống kê thành công !!",
                "data" => $result
            ];
        } catch (PDOException $e) {
            // Xử lý nếu có lỗi
            return (object) [
                "status" => 400,
                "message" => "Lỗi không thể thống kê đơn hàng",
                "data" => []
            ];
        } finally {
            // Đóng kết nối
            $connection = null;
        }
    }

?>