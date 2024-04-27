<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../AdminDemo.css" />
  <link rel="stylesheet" href="../QLLoaiSanPham/QLLoaiSanPham.css" />
  <title>Quản lý loại sản phẩm</title>
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
                    <a class="MenuItemSidebar_menuItem__56b1m" href="QLLoaiSanPham.php">
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
                    <a class="MenuItemSidebar_menuItem__56b1m" href="./ThongKeDoanhThu.html">
                        <span class="MenuItemSidebar_title__LLBtx">Thống Kê Doanh Thu</span>
                    </a>
                    <a class="MenuItemSidebar_menuItem__56b1m" href="./thongkechitieu.html">
                        <span class="MenuItemSidebar_title__LLBtx">Thống Kê Chi Tiêu</span>
                    </a>
                    <a class="MenuItemSidebar_menuItem__56b1m" href="../ThongKe/ThongKeDonHang.php">
                        <span class="MenuItemSidebar_title__LLBtx">Thống Kê Đơn Hàng</span>
                    </a>
                </div>
                <div style="padding-left: 16%; width: 100%; padding-right: 2rem">
                  <div class="wrapper">
                    <div style="
                          display: flex;
                          padding-top: 1rem;
                          padding-bottom: 1rem;
                        ">
                      <h2>Loại Sản Phẩm</h2>
                      <button style="
                            margin-left: auto;
                            font-family: Arial;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: white;
                            background-color: rgb(65, 64, 64);
                            padding: 1rem;
                            border-radius: 0.6rem;
                            cursor: pointer;
                          ">
                        <a href="./FromCreateLoaiSanPham.php"> Thêm Loại Sản Phẩm</a>
                      </button>
                    </div>
                    <br>
                    <div class="boxFeature">
                      <div style="position: relative">
                      <i class="fa fa-search"></i>
                      <input class="input" placeholder="Tìm kiếm loại sản phẩm"/>
                      </div>


                      <div style="margin-left: auto"></div>
                    </div>
                    <br>
                    <div class="boxTable">
                      <table class="Table_table__BWPy">
                        <thead class="Table_head__FTUog">
                          <tr>
                            <th class="Table_th__hCkcg" scope="col">Mã loại sản phẩm</th>
                            <th class="Table_th__hCkcg" scope="col">Loại sản phẩm</th>
                            <th class="Table_th__hCkcg" scope="col">Xoá</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                        <?php
                          // require_once "../../../BackEnd/ManagerBE/LoaiSanPhamBE.php";

                          // $result = getAllLoaiSanPham(1, "");
                          // // $totalPage = $result->totalPages;
                          // $Ketqua = $result->data;

                          // foreach ($Ketqua as $record) {
                          //   echo '
                          //         <tr>
                          //           <td style="text-align:center">' . $record['maLoaiSanPham'] . '</td>
                          //           <td style="text-align:center">' . $record['TenLoaiSanPham'] . '</td>
                          //           <td style="text-align:center"><button>Xoá</button></td>
                          //         </tr>';
                          // }
                          ?>
                        </tbody>
                      </table>
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
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  // Hàm để xóa hết các dòng trong bảng
  function clearTable() {
    var tableBody = document.querySelector('.Table_table__BWPy tbody');
    tableBody.innerHTML = ''; // Xóa nội dung trong tbody
  }

  // Hàm getAllNhaCungCap
  function getAllLoaiSanPham(page, search) {
    $.ajax({
      url: '../../../BackEnd/ManagerBE/LoaiSanPhamBE.php',
      type: 'GET',
      dataType: "json",
      data: {
        page: page,
        search: search
      },
      success: function(response) {
        var data = response.data;
        var tableBody = document.getElementById("tableBody"); // Lấy thẻ tbody của bảng
        var tableContent = ""; // Chuỗi chứa nội dung mới của tbody

        // Duyệt qua mảng dữ liệu và tạo các hàng mới cho tbody
        data.forEach(function(record) {
          var trContent = `
                        <tr>
                            <td style="text-align:center">${record.MaLoaiSanPham}</td>
                            <td style="text-align:center">${record.TenLoaiSanPham}</td>
                            <td style="text-align:center"><button style="cursor:pointer" onclick="deleteLoaiSanPham(${record.MaLoaiSanPham})"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>`;

          tableContent += trContent; // Thêm nội dung của hàng vào chuỗi tableContent
        });

        // Thiết lập lại nội dung của tbody bằng chuỗi tableContent
        tableBody.innerHTML = tableContent;

        //Tạo phân trang
        createPagination(page, response.totalPages);
      },

      error: function(xhr, status, error) {
        console.error('Lỗi khi gọi API: ', error);
      }
    });
  }

  // Hàm để gọi getAllLoaiSanPham và cập nhật dữ liệu và phân trang
  function fetchDataAndUpdateTable(page, search) {
    //Clear dữ liệu cũ
    clearTable();

    // Gọi hàm getAllTaiKhoan và truyền các giá trị tương ứng
    getAllLoaiSanPham(page, search);

    // Tạo phân trang
    createPagination(page);
  }

  // Khởi tạo trang hiện tại
  var currentPage = 1;
  fetchDataAndUpdateTable(currentPage, '');

  // Hàm tạo nút phân trang
  function createPagination(currentPage, totalPages) {
    var paginationContainer = document.querySelector('.pagination');
    var searchValue = document.querySelector('.Admin_input__LtEE-').value;

    // Xóa nút phân trang cũ (nếu có)
    paginationContainer.innerHTML = '';

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
        // Gọi hàm fetchDataAndUpdateTable khi người dùng click vào nút phân trang
        fetchDataAndUpdateTable(index + 1, searchValue); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
      });
    });

    // Đánh dấu trang hiện tại
    paginationContainer.querySelector('.pageButton:nth-child(' + currentPage + ')').classList.add('active'); // Sửa lại để chỉ chọn trang hiện tại
  }


  // Hàm xử lý sự kiện khi nút tìm kiếm được click
  document.getElementById('searchButton').addEventListener('click', function() {
    var searchValue = document.querySelector('.Admin_input__LtEE-').value;

    // Truyền giá trị của biến currentPage vào hàm fetchDataAndUpdateTable
    fetchDataAndUpdateTable(currentPage, searchValue, '');
  });

  // Bắt sự kiện khi người dùng ấn phím Enter trong ô tìm kiếm
  document.querySelector('.Admin_input__LtEE-').addEventListener('keypress', function(event) {
    // Kiểm tra xem phím được ấn có phải là Enter không (mã phím 13)
    if (event.key === 'Enter') {
      // Ngăn chặn hành động mặc định của phím Enter (ví dụ: gửi form)
      event.preventDefault();

      // Lấy giá trị của ô tìm kiếm
      var searchValue = this.value;

      // Truyền giá trị của biến currentPage vào hàm fetchDataAndUpdateTable
      fetchDataAndUpdateTable(currentPage, searchValue);
    }
  });

  function deleteLoaiSanPham(MaLoaiSanPham) {
  // Hiển thị hộp thoại xác nhận
  var confirmation = confirm(`Bạn có muốn xóa loại sản phẩm ${MaLoaiSanPham} không?`);

  // Kiểm tra xác nhận của người dùng
  if (confirmation) {
    // Gọi hàm deleteLoaiSanPham bằng Ajax
    $.ajax({
      url: '../../../BackEnd/ManagerBE/LoaiSanPhamBE.php',
      type: 'POST',
      dataType: "json",
      data: {
        MaNCC: MaNCC
      },
      success: function(response) {
        // Nếu xóa thành công, reload bảng
        if (response.status === 200) {
          alert("Xóa loại sản phẩm thành công !!");
          fetchDataAndUpdateTable(currentPage, '');
        } else {
          console.error('Lỗi khi xóa loại sản phẩm: ', response.message);
        }
      },
      error: function(xhr, status, error) {
        console.error('Lỗi khi gọi API: ', error);
      }
    });
  }
}

</script>