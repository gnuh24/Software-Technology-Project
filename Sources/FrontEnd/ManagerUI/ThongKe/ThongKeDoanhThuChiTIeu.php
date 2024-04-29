<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="ThongKeDonHang.css" />

    <title>Thống kê doanh thu, chi tiêu</title>
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
                    <a class="MenuItemSidebar_menuItem__56b1m" href="../ThongKe/ThongKeDoanhThuChiTieu.php">
                        <span class="MenuItemSidebar_title__LLBtx">Thống Kê Tài Chính</span>
                    </a>                         
                    </a>
                    <a class="MenuItemSidebar_menuItem__56b1m" href="../ThongKe/ThongKeDonHang.php">
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
                                                <input id="from" type="date" style="height: 3rem; padding: 0.3rem;">
                                                <span class="text">Ngày Kết Thúc</span>
                                                <input id="to" type="date" style="height: 3rem; padding: 0.3rem;">
                                                <button id="thongKeButton" style="height: 3rem; padding: 0.3rem; color: white; font-weight: 700; background-color: black;">Thống kê</button>
                                                <button id="resetButton" style="height: 3rem; padding: 0.3rem; color: white; font-weight: 700; background-color: black;">Reset thống kê</button>

                                                <p style="font-size: 1.3rem; margin-left: auto; color: rgb(100, 100, 100); font-weight: 700;">
                                                    Mặc định được thống kê từ ngày 01/01/2010
                                                </p>

                                            </div>
                                            <div class="boxTable1">
                                                
                                            </div>
                                            <div class="boxTable2">
                                                
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

        const resetButton = document.getElementById("resetButton");
        const thongKeButton = document.getElementById("thongKeButton");
        const from = document.getElementById("from");
        const to = document.getElementById("to");

        thongKeButton.addEventListener("click", () => {
            fromValue = from.value !== "" ? from.value : "2010-01-01";
            toValue = to.value !== "" ? to.value : formattedDate;  

            // Gọi thongKeDoanhThu và thongKeChiTieu
            thongKeDoanhThu(fromValue, toValue, function(dataDoanhThu) {
                    thongKeChiTieu(fromValue, toValue, function(dataChiTieu) {
                            // Tại đây, cả hai cuộc gọi AJAX đã hoàn tất và bạn có thể thực hiện các hàm khác
                            fetchTable(dataDoanhThu, dataChiTieu);
                            // Hoặc bất kỳ hành động nào khác bạn muốn thực hiện
                    });
            });
        });


        resetButton.addEventListener("click", () => {
            from.value = "";
            to.value = "";
            // Gọi thongKeDoanhThu và thongKeChiTieu
            thongKeDoanhThu("2010-01-01", formattedDate, function(dataDoanhThu) {
                    thongKeChiTieu("2010-01-01", formattedDate, function(dataChiTieu) {
                            // Tại đây, cả hai cuộc gọi AJAX đã hoàn tất và bạn có thể thực hiện các hàm khác
                            fetchTable(dataDoanhThu, dataChiTieu);
                            // Hoặc bất kỳ hành động nào khác bạn muốn thực hiện
                    });
            });
        })  

        var currentDate = new Date();

        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Thêm số 0 phía trước nếu cần
        var day = currentDate.getDate().toString().padStart(2, '0'); // Thêm số 0 phía trước nếu cần

        var formattedDate = year + '-' + month + '-' + day;

        // Gọi thongKeDoanhThu và thongKeChiTieu
        thongKeDoanhThu("2010-01-01", formattedDate, function(dataDoanhThu) {
                thongKeChiTieu("2010-01-01", formattedDate, function(dataChiTieu) {
                        // Tại đây, cả hai cuộc gọi AJAX đã hoàn tất và bạn có thể thực hiện các hàm khác
                        fetchTable(dataDoanhThu, dataChiTieu);
                        // Hoặc bất kỳ hành động nào khác bạn muốn thực hiện
                });
        });

        function fetchTable(thongKeDoanhThu, thongKeChiTieu) {

            // Thực hiện các phép tính thống kê dữ liệu ở đây, hoặc bạn có thể truyền các biến đã tính sẵn vào hàm này.
            var totalChiTieu = 0; 
            var totalSanPhamNhap = 0; 
            var totalDoanhThu = 0; 
            var totalSanPhamBan = 0; 

            var mapLabelsDoanhThu = new Map();
            var mapLabelsChiTieu = new Map();

            var mapLabelsSanPhamBan = new Map();
            var mapLabelsSanPhamNhap = new Map();


            var labels = [];
            var dataChiTieu = [];
            var dataSanPhamNhap = [];
            var dataDoanhThu = [];
            var dataSanPhamBan = [];

            // Duyệt qua từng phần tử trong mảng thongKeDoanhThu
            thongKeDoanhThu.forEach(function(item) {

               labels.push(item.NgayThongKe);

               totalDoanhThu += parseInt(item.DoanhThu);
               totalSanPhamBan += parseInt(item.SoLuongDaBan);

               mapLabelsDoanhThu.set(item.NgayThongKe, item.DoanhThu);
               mapLabelsSanPhamBan.set(item.NgayThongKe, item.SoLuongDaBan);

 
            });


                // Duyệt qua từng phần tử trong mảng thongKeDoanhThu
                thongKeChiTieu.forEach(function(item) {
                        labels.push(item.NgayNhap);

                        totalChiTieu += parseInt(item.ChiTieu);
                        totalSanPhamNhap += parseInt(item.SoLuongDaNhap);

                        mapLabelsChiTieu.set(item.NgayNhap, item.ChiTieu);
                        mapLabelsSanPhamNhap.set(item.NgayNhap, item.SoLuongDaNhap);
                });

                labels.sort(function(a, b) {
                        return new Date(a) - new Date(b);
                });


                var uniqueLabels = [...new Set(labels)];

                uniqueLabels.forEach(function(time) {
                    
                    dataDoanhThu.push( mapLabelsDoanhThu.has(time) ? mapLabelsDoanhThu.get(time) : 0);
                    dataChiTieu.push( mapLabelsChiTieu.has(time) ? mapLabelsChiTieu.get(time) : 0);

                    dataSanPhamBan.push( mapLabelsSanPhamBan.has(time) ? mapLabelsSanPhamBan.get(time) : 0);
                    dataSanPhamNhap.push( mapLabelsSanPhamNhap.has(time) ? mapLabelsSanPhamNhap.get(time) : 0);

                });


                
            var boxTable = document.querySelector('.boxTable1');
            
            // Tạo các phần tử HTML và thêm nội dung vào
            var htmlContent = `
                <div style="display: flex; gap: 1.5rem;">
                    <div style="display: flex; align-items: center; gap: 1rem; background-color: #e91e63; width: 60rem; padding: 1rem;">
                        <div>
                            <p style="color: white; font-weight: 700;">Tổng chi tiêu</p>
                            <p style="color: white; font-weight: 700; font-size: 2.5rem;">${totalChiTieu}</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem; background-color: #8bc34a; width: 60rem; padding: 1rem;">
                        <div>
                            <p style="color: white; font-weight: 700;">Tổng doanh thu</p>
                            <p style="color: white; font-weight: 700; font-size: 2.5rem;">${totalDoanhThu}</p>
                        </div>
                    </div>
                </div>
                <div>
                        <canvas id="myChart1" width="400" height="120" margin-bottom: 40px;></canvas>
                </div>
                <div style="display: flex; gap: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem; background-color: #00bcd4; width: 60rem; padding: 1rem;">
                        <div>
                            <p style="color: white; font-weight: 700;">Tổng số sản phẩm nhập kho</p>
                            <p style="color: white; font-weight: 700; font-size: 2.5rem;">${totalSanPhamNhap}</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem; background-color: #ff9800; width: 60rem; padding: 1rem;">
                        <div>
                            <p style="color: white; font-weight: 700;">Tổng số sản phẩm bán được</p>
                            <p style="color: white; font-weight: 700; font-size: 2.5rem;">${totalSanPhamBan}</p>
                        </div>
                    </div>
                </div>
                <div>
                        <canvas id="myChart2" width="400" height="120" margin-bottom: 40px;></canvas>
                </div>
            `;
            
            // Thêm nội dung vào boxTable
            boxTable.innerHTML = htmlContent;

            // Lấy tham chiếu đến thẻ canvas
            var ctx1 = document.getElementById('myChart1').getContext('2d');
            var ctx2 = document.getElementById('myChart2').getContext('2d');

    
            // Cấu hình các tùy chọn cho biểu đồ
            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            // Tạo một biểu đồ đường mới
            var myChart = new Chart(ctx1,  {
                        type: 'line',
                        data: {
                            labels: uniqueLabels,
                            datasets: [
                                {
                                    label: 'Tổng chi tiêu',
                                    backgroundColor: 'rgb(255, 99, 132)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: dataChiTieu
                                },
                                {
                                    label: 'Tổng doanh thu',
                                    backgroundColor: '#8bc34a',
                                    borderColor: '#8bc34a',
                                    data: dataDoanhThu
                                }
                            ]
                        },
                        options: options
            });
              // Tạo một biểu đồ đường mới
              var myChart = new Chart(ctx2,  {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'Tổng số sản phẩm nhập kho',
                                    backgroundColor: '#00bcd4',
                                    borderColor: '#00bcd4',
                                    data: dataSanPhamNhap
                                },
                                {
                                    label: 'Tổng số sản phẩm bán được',
                                    backgroundColor: '#ff9800',
                                    borderColor: '#ff9800',
                                    data: dataSanPhamBan
                                }
                            ]
                        },
                        options: options
            });
        }

        // Hàm chuyển đổi ngày tháng từ yyyy-MM-dd sang dd/MM/yyyy
        function formatNgay(ngay) {
            var parts = ngay.split('-');
            return parts[2] + '/' + parts[1] + '/' + parts[0];
        }


        function thongKeDoanhThu(from, to, callback) {
                $.ajax({
                        url: '../../../BackEnd/ManagerBE/ThongKeBE.php',
                        type: 'GET',
                        dataType: "json",
                        data: {
                        from: from,
                        to: to,
                        thongKeDoanhThu: true
                        },
                        success: function(response) {
                        // Xử lý dữ liệu trả về từ API ở đây
                        callback(response.data); // Gọi callback và truyền dữ liệu cho nó
                        },
                        error: function(xhr, status, error) {
                        console.error('Lỗi khi gọi API: ', error);
                        }
                });
                }

                function thongKeChiTieu(from, to, callback) {
                $.ajax({
                        url: '../../../BackEnd/ManagerBE/ThongKeBE.php',
                        type: 'GET',
                        dataType: "json",
                        data: {
                        from: from,
                        to: to,
                        thongKeChiTieu: true
                        },
                        success: function(response) {
                        // Xử lý dữ liệu trả về từ API ở đây
                        callback(response.data); // Gọi callback và truyền dữ liệu cho nó
                        },
                        error: function(xhr, status, error) {
                        console.error('Lỗi khi gọi API: ', error);
                        }
                });
                }

       



       
  </script>
</html>
