<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="QLSanPham.css" />
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <div id="root">
        <div>
            <!-- Modal chỉnh sửa sản phẩm -->
            <div id="editProductModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Chỉnh sửa sản phẩm</h2>

                   
                </div>
            </div>

            <div class="App">
                <div class="StaffLayout_wrapper__CegPk">
                    <?php require_once "../ManagerHeader.php" ?>

                    <div>
                        <div>
                            <div class="Manager_wrapper__vOYy">
                                <?php require_once "../ManagerMenu.php" ?>

                                <div class="wrapper">
                                    <div>
                                        <h2>Sản Phẩm</h2>
                                        <button id="createProductBtn" onclick="toCreateForm()">Tạo Sản Phẩm</button>
                                    </div>
                                     <!-- Thanh lọc menu -->
                                    <div id="filter-menu">
                                        <input type="text" placeholder="Tìm kiếm theo tên sản phẩm" id="searchSanPham" name="searchSanPham">
                                        <button id="filter-button"><i class="fa-solid fa-magnifying-glass"></i></button>

                                                <label for="price-filter">Giá:</label>
                                                <select id="price-filter">
                                                    <option value="">Tất cả</option>
                                                    <option value="low">Dưới 1 triệu</option>
                                                    <option value="medium">Từ 1 đến 3 triệu</option>
                                                    <option value="high">Trên 3 triệu</option>
                                                </select>

                                                <label for="state-filter">Trạng thái:</label>
                                                <select id="state-filter">
                                                    <option value="">Tất cả</option>
                                                    <option value="1">Kinh doanh</option>
                                                    <option value="0">Ngừng kinh doanh</option>
                        
                                                </select>

                                                <label for="category-filter">Loại sản phẩm:</label>
                                                <select id="category-filter">
                                                        <!-- Hiển thị menu LoaiSanPham -->

                                                </select>

                                                <button id="reset-button"><i class="fa-solid fa-rotate-right"></i></button>
                                            </div>
                                        
                                        <div>
                                        <div class="boxTable" style="width: 100%;">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%; text-align: center;">ID</th>
                                                        <th style="width: 10%; text-align: center;" >Minh họa</th>
                                                        <th style="width: 25%;">Tên Sản Phẩm</th>
                                                        <th style="width: 10%; text-align: center;">Giá Tiền</th>
                                                        <th style="width: 5%; text-align: center;">Nồng Độ Cồn (%)</th>
                                                        <th style="width: 10%; text-align: center;">Dung Tích (đơn vị: ml)</th>
                                                        <th style="width: 10%; text-align: center;">Trạng thái</th>
                                                        <th style="width: 10%;text-align: center;">Loại sản phẩm</th>

                                                        <th style="width: 5%; text-align: center;">Số Lượng</th>
                                                        <th style="width: 10%; text-align: center;">Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody"></tbody>
                                            </table>
                                            <div id="pagination">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        function toCreateForm(){
            window.location.href = "FormCreateSanPham.php";
        }




    function getAllSanPham(page, search, minGia, maxGia, trangThai, maLoaiSanPham) {
                // Gọi API để lấy dữ liệu sản phẩm
                $.ajax({
                    url: "../../../BackEnd/ManagerBE/SanPhamBE.php",
                    method: "GET",
                    dataType: "json",
                    data: {
                        getManager: true,
                        page: page,
                        search: search,
                        minGia: minGia,
                        maxGia: maxGia,
                        trangThai: trangThai,
                        maLoaiSanPham: maLoaiSanPham
                    },
            success: function(response) {
                var data = response.data;
                var tableBody = document.getElementById("tableBody");
                var tableContent = "";

                if (data.length > 0){
                    data.forEach(function(record, index) {
                        var trangThai = record.TrangThai == 0 ? "Ngừng kinh doanh": "Kinh doanh";
                        var buttonText = (record.TrangThai === 0) ? "Mở khóa" : "Khóa";
                        var buttonClass = (record.TrangThai === 0) ? "unlock" : "block";
                        var buttonData = (record.TrangThai === 0) ? "unlock" : "block";
                        var trContent = `
                            <tr>
                                <td style="text-align: center;">${record.MaSanPham}</td>
                                <td><img style="height: 80px;" src="${record.AnhMinhHoa}"></td>
                                <td>${record.TenSanPham}</td>
                                <td style="text-align: center;">${record.Gia}</td>
                                <td style="text-align: center;">${record.NongDoCon}</td>
                                <td style="text-align: center;">${record.TheTich}</td>
                                <td style="text-align: center;">${trangThai}</td>
                                <td style="text-align: center;">${record.TenLoaiSanPham}</td>

                                <td style="text-align: center;">${record.SoLuongConLai}</td>
                                <td>
                                    <button class="edit" onclick="toUpdate(${record.MaSanPham})">Sửa</button>
                                    <button class="${buttonClass}" data-action="${buttonData}" onclick="handleLockUnlock(${record.MaSanPham}, ${record.TrangThai})">${buttonText}</button>
                                </td>
                            </tr>`;
                        tableContent += trContent;
                    });
                }else{
                    tableContent = `<tr ><td style="text-align: center;" colspan="10">Không có sản phẩm nào thỏa yêu cầu</td></tr>`;
                }
                



                tableBody.innerHTML = tableContent;

                createPagination(page, response.totalPages); 
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi gọi API: ', error);
            }
        });
    }

     // Hàm xử lý sự kiện cho nút khóa / mở khóa
     function handleLockUnlock(maSanPham, trangThai) {
        var newTrangThai = trangThai === 0 ? 1 : 0; // Đảo ngược trạng thái
        // Hiển thị hộp thoại xác nhận bằng SweetAlert2
        Swal.fire({
            title: `Bạn có muốn ${newTrangThai === 0 ? 'khóa' : 'mở khóa'} sản phẩm ${maSanPham} không?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // Gọi hàm updateTaiKhoan bằng Ajax
                $.ajax({
                    url: '../../../BackEnd/ManagerBE/SanPhamBE.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        changeState: true,
                        maSanPham: maSanPham,
                        trangThai: newTrangThai,
                    },
                    success: function (response) {
                        // Nếu cập nhật thành công, reload bảng
                        if (response.status === 200) {
                            var alertContent = newTrangThai === 0 ? "khóa" : "mở khóa";
                            Swal.fire('Thành công!', `Bạn đã ${alertContent} thành công !!`, 'success');
                            filterProducts(currentPage);
                        } else {
                            console.error('Lỗi khi cập nhật tài khoản: ', response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Lỗi khi gọi API: ', error);
                    }
                });
            }
        });
    }

    var currentPage = 1;
    document.addEventListener('DOMContentLoaded', function() {
        filterProducts(currentPage);
        getCategories();
    });
 

        // Lắng nghe sự kiện click vào id "reset-button"
        document.getElementById("reset-button").addEventListener("click", function () {
            // Reset tất cả các thanh lọc về giá trị mặc định
            document.getElementById("searchSanPham").value = "";
            document.getElementById("price-filter").value = "";
            document.getElementById("state-filter").value = "";
            document.getElementById("category-filter").value = "";
            currentPage = 1;

            // Gọi lại hàm getAllSanPham với các giá trị mặc định
            getAllSanPham(currentPage, "",  0, 10000000000, "", 0);
        });

        // Lắng nghe sự kiện keypress trên ô nhập liệu "price-filter"
        document.getElementById("price-filter").addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                // Thực hiện hành động tương tự như khi click vào nút "Lọc"
                document.getElementById("filter-button").click();
            }
        });

        function formatCurrency(number) {
            // Chuyển đổi số thành chuỗi và đảm bảo nó là số nguyên
            number = parseInt(number);

            // Sử dụng hàm toLocaleString() để định dạng số tiền
            // và thêm đơn vị tiền tệ "đ" vào cuối chuỗi
            return number.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }



        // Lắng nghe sự kiện change cho thanh lọc giá
        document.getElementById("price-filter").addEventListener("change", function() {
            currentPage = 1;

            // Gọi lại hàm lọc sản phẩm khi giá trị thay đổi
            filterProducts(currentPage);
        });


        // Lắng nghe sự kiện change cho thanh lọc loại sản phẩm
        document.getElementById("category-filter").addEventListener("change", function() {
            currnetPage = 1;
            // Gọi lại hàm lọc sản phẩm khi giá trị thay đổi
            filterProducts(currentPage);
        });

        // Lắng nghe sự kiện change cho thanh lọc trạng thái
        document.getElementById("state-filter").addEventListener("change", function() {
            currentPage = 1;

            // Gọi lại hàm lọc sản phẩm khi giá trị thay đổi
            filterProducts(currentPage);
        });


        // Hàm lọc sản phẩm
        function filterProducts(page) {
            // Lấy giá trị từ thanh tìm kiếm
            var searchText = document.getElementById("searchSanPham").value;

            // Lấy giá trị từ thanh lọc giá
            var priceFilter = document.getElementById("price-filter").value;
            var minPrice, maxPrice;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc giá
            switch (priceFilter) {
                case "low":
                    minPrice = 0;
                    maxPrice = 1000000;
                    break;
                case "medium":
                    minPrice = 1000000;
                    maxPrice = 3000000;
                    break;
                case "high":
                    minPrice = 3000000;
                    maxPrice = 1000000000; // Trên 3 triệu, không giới hạn
                    break;
                default:
                    minPrice = 0;
                    maxPrice = 1000000000; // Không giới hạn
                    break;
            }

            // Lấy giá trị từ thanh lọc thể tích
            var stateFilter = document.getElementById("state-filter").value ;
          

            // Lấy giá trị từ thanh lọc loại sản phẩm
            var categoryFilter = document.getElementById("category-filter").value;
            if (categoryFilter == "") {
                categoryFilter = 0;
            }

            // Gọi hàm lọc sản phẩm với các tham số vừa lấy được
            getAllSanPham(page, searchText, minPrice, maxPrice, stateFilter, categoryFilter);
        }

        // Lắng nghe sự kiện click vào nút search
        document.getElementById("filter-button").addEventListener("click", function(event) {
            currentPage = 1;
            event.preventDefault();

            // Lấy giá trị từ thanh tìm kiếm
            var searchText = document.getElementById("searchSanPham").value;

            // Lấy giá trị từ thanh lọc giá
            var priceFilter = document.getElementById("price-filter").value;
            var minPrice, maxPrice;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc giá
            switch (priceFilter) {
                case "low":
                    minPrice = 0;
                    maxPrice = 1000000;
                    break;
                case "medium":
                    minPrice = 1000000;
                    maxPrice = 3000000;
                    break;
                case "high":
                    minPrice = 3000000;
                    maxPrice = 1000000000; // Trên 3 triệu, không giới hạn
                    break;
                default:
                    minPrice = 0;
                    maxPrice = 1000000000; // Không giới hạn
                    break;
            }


            // Lấy giá trị từ thanh lọc thể tích
            var stateFilter = document.getElementById("state-filter").value;
        

            // Lấy giá trị từ thanh lọc loại sản phẩm
            var categoryFilter = document.getElementById("category-filter").value;
            if (categoryFilter == "") {
                categoryFilter = 0;
            }

            getAllSanPham(currentPage, searchText, minPrice, maxPrice, stateFilter, categoryFilter);
        });

       
        
        // Hàm tạo nút phân trang
        function createPagination(currentPage, totalPages) {
            var paginationContainer = document.getElementById("pagination");

            // Xóa nút phân trang cũ (nếu có)
            paginationContainer.innerHTML = '';

            // Chỉ tạo phân trang khi totalPages > 1
            if (totalPages > 1) {
                // Tạo nút cho từng trang và thêm vào chuỗi HTML
                var paginationHTML = '';
                for (var i = 1; i <= totalPages; i++) {
                    paginationHTML += '<button class="pageButton">' + i + '</button>';
                }

                // Thiết lập nút phân trang vào paginationContainer
                paginationContainer.innerHTML = paginationHTML;

                // Thêm sự kiện click cho từng nút phân trang
                paginationContainer.querySelectorAll('.pageButton').forEach(function(button, index) {
                    button.addEventListener('click', function() {
                        // Gọi hàm filterProducts khi người dùng click vào nút phân trang
                        filterProducts(index + 1); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
                    });
                });

                // Đánh dấu trang hiện tại
                paginationContainer.querySelector('.pageButton:nth-child(' + currentPage + ')').classList.add('active');
            }
        }

        function toUpdate(maSanPham) {
            window.location.href = `FormUpdateSanPham.php?maSanPham=${maSanPham}`;
        }


        function getCategories() {
            $.ajax({
                url: "../../../BackEnd/ManagerBE/LoaiSanPhamBE.php",
                method: "GET",
                dataType: "json",
                data: {
                    isDemoHome: true
                },
                success: function(response) {
                    var categoryFilter = $('#category-filter');
                    var htmlContent = '';

                    // Duyệt qua danh sách loại sản phẩm và tạo option cho select
                    $.each(response.data, function(index, category) {
                        htmlContent += `<option value="${category.MaLoaiSanPham}">${category.TenLoaiSanPham}</option>`;
                    });

                    // Thêm tùy chọn "Tất cả"
                    htmlContent = '<option value="">Tất cả</option>' + htmlContent;

                    // Thiết lập nội dung HTML cho select
                    categoryFilter.html(htmlContent);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }


</script>


</body>
</html>
