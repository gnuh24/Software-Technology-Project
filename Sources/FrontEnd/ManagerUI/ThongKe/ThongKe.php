<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="ThongKe.css" />

    <title>Thống kê đơn hàng</title>
  </head>
  <body>
        <div id="root">
            <div>
                <div class="App">
                    <div class="StaffLayout_wrapper__CegPk">
                        <div class="StaffHeader_wrapper__IQw-U">
                            <p class="StaffHeader_title__QxjW4">Dekanta</p>
                            <button class="StaffHeader_signOut__i2pcu">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket" class="svg-inline--fa fa-arrow-right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 2rem; height: 2rem; color: white">
                                    <path fill="currentColor" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"></path>
                                </svg>
                            </button>
                        </div>
                        <div>
                            <div>
                                <div class="Manager_wrapper__vOYy">
                                    <div class="Sidebar_sideBar__CC4MK">
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="../QLLoaiSanPham/QLLoaiSanPham.php">
                                            <span class="MenuItemSidebar_title__LLBtx">Loại Sản Phẩm</span>
                                        </a>
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="../QLSanPham/QLSanPham.php">
                                            <span class="MenuItemSidebar_title__LLBtx">Sản Phẩm</span>
                                        </a>
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="../QLNhaCungCap/QLNhaCungCap.php">
                                            <span class="MenuItemSidebar_title__LLBtx">Nhà Cung Cấp</span>
                                        </a>
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="../QLPhieuNhapKho/QLPhieuNhapKho.php">
                                            <span class="MenuItemSidebar_title__LLBtx">Phiếu Nhập Kho</span>
                                        </a>
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="../QLDonHang/QLDonHang.php">
                                            <span class="MenuItemSidebar_title__LLBtx">Đơn Hàng</span>
                                        </a>
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="./thongkedoanhthu.html">
                                            <span class="MenuItemSidebar_title__LLBtx">Thống Kê Doanh Thu</span>
                                        </a>
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="./thongkechitieu.html">
                                            <span class="MenuItemSidebar_title__LLBtx">Thống Kê Chi Tiêu</span>
                                        </a>
                                        <a class="MenuItemSidebar_menuItem__56b1m" href="ThongKe.php">
                                            <span class="MenuItemSidebar_title__LLBtx">Thống Kê Đơn Hàng</span>
                                        </a>
                                    </div>
                                    <div style="padding-left: 16%; width: 100%; padding-right: 2rem">
                                        <div class="wrapper">
                                            <div style="display: flex; padding-top: 1rem; padding-bottom: 1rem;">
                                                <h2>Thống Kê</h2>
                                            </div>
                                            <div class="boxFeature">
                                                <span class="text">Ngày Bắt Đầu</span>
                                                <input type="date" style="height: 3rem; padding: 0.3rem;">
                                                <span class="text">Ngày Kết Thúc</span>
                                                <input type="date" style="height: 3rem; padding: 0.3rem;">
                                                <p style="font-size: 1.3rem; margin-left: auto; color: rgb(100, 100, 100); font-weight: 700;">
                                                    Mặc định được thống kê từ ngày 01/01/2010
                                                </p>
                                            </div>

                                            <?php
                                                // Include file chứa hàm thongKeDonHang
                                                include_once "../../../BackEnd/ManagerBE/ThongKeBE.php";

                                                // Gọi hàm thongKeDonHang với các tham số $from và $to
                                                $result = thongKeDonHang(NULL, NULL);

                                                // Kiểm tra nếu hàm thongKeDonHang trả về dữ liệu thành công
                                                if ($result->status === 200) {

                                                    $totalHuy = 0;
                                                    $totalChoDuyet = 0;
                                                    $totalGiaoThanhCong = 0;

                                                    $totalDonHang = 0;

                                                    // Lặp qua từng dòng dữ liệu
                                                    foreach ($result->data as $item) {
                                                        // Lấy giá trị từ dữ liệu trả về và đặt vào các biến tương ứng
                                                        $totalDonHang += $item['soLuongDon'];   
                                                        switch ($item['trangThai']){
                                                            case "GiaoThanhCong": 
                                                                $totalGiaoThanhCong += $item['soLuongDon'];
                                                                break;
                                                            case "ChoDuyet": 
                                                                $totalChoDuyet += $item['soLuongDon'];
                                                                break;
        
                                                            case "Huy": 
                                                                $totalHuy += $item['soLuongDon'];
                                                                break;

                                                        }
                                                    }
                                                }


                                                        
                                            ?>
                                            <div class="boxTable">
                                                <div style="display: flex; gap: 1.5rem;">
                                                    <div style="display: flex; align-items: center; gap: 1rem; background-color: #e91e63; width: 30rem; padding: 1rem;">
                                                        <div>
                                                            <p style="color: white; font-weight: 700;">Số đơn hàng bị hủy</p>
                                                            <p style="color: white; font-weight: 700; font-size: 2.5rem;"><?php echo $totalHuy ?></p>
                                                        </div>
                                                    </div>
                                                    <div style="display: flex; align-items: center; gap: 1rem; background-color: #00bcd4; width: 30rem; padding: 1rem;">
                                                        <div>
                                                            <p style="color: white; font-weight: 700;">Số đơn hàng chờ duyệt</p>
                                                            <p style="color: white; font-weight: 700; font-size: 2.5rem;"><?php echo $totalChoDuyet ?></p>
                                                        </div>
                                                    </div>
                                                    <div style="display: flex; align-items: center; gap: 1rem; background-color: #8bc34a; width: 30rem; padding: 1rem;">
                                                        <div>
                                                            <p style="color: white; font-weight: 700;">Số đơn hàng giao thành công</p>
                                                            <p style="color: white; font-weight: 700; font-size: 2.5rem;"><?php echo $totalGiaoThanhCong ?></p>
                                                        </div>
                                                    </div>
                                                    <div style="display: flex; align-items: center; gap: 1rem; background-color: #ff9800; width: 30rem; padding: 1rem;">
                                                        <div>
                                                            <p style="color: white; font-weight: 700;">Tổng số đơn hàng</p>
                                                            <p style="color: white; font-weight: 700; font-size: 2.5rem;"><?php echo $totalDonHang ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <canvas id="myChart" width="400" height="120"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        thongKeDonHang("2009-01-01", "2024-04-23");
        //Call API Thống kê đơn hàng
        function thongKeDonHang(from, to) {
            $.ajax({
                url: '../../../BackEnd/ManagerBE/ThongKeBE.php',
                type: 'GET',
                dataType: "json",
                data: {
                    from: from,
                    to: to,
                    thongKeDonHang: true
                },
                success: function(response) {
                    // Xử lý dữ liệu trả về từ API ở đây
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi gọi API: ', error);
                }
            });
        }



        // Lấy thẻ canvas
        var ctx = document.getElementById('myChart').getContext('2d');

        // Dữ liệu và màu sắc tương ứng với từng đường
        var data = {
            labels: <?php echo json_encode($ngay); ?>, // Dữ liệu ngày lấy từ PHP
            datasets: [
                {
                    label: 'Số đơn hàng bị hủy',
                    data: <?php echo json_encode($soDonHangBiHuy); ?>,
                    borderColor: '#e91e63',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Số đơn hàng chờ duyệt',
                    data: <?php echo json_encode($soDonHangChoDuyet); ?>,
                    borderColor: '#00bcd4',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Số đơn hàng giao thành công',
                    data: <?php echo json_encode($soDonHangGiaoThanhCong); ?>,
                    borderColor: '#8bc34a',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Tổng số đơn hàng',
                    data: <?php echo json_encode($tongSoDonHang); ?>,
                    borderColor: '#ff9800',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    fill: false
                }
            ]
        };

        // Tạo biểu đồ đường
        var myChart = new Chart(ctx, {
            type: 'line', // Loại biểu đồ đường
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Đặt giá trị trục y bắt đầu từ 0
                    }
                }
            }
        });
  </script>
</html>
