<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../AdminDemo.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="QLNhaCungCap.css" />
  <!-- <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css"> -->
  <title>Quản lý nhà cung cấp</title>
</head>

<body>
  <div id="root">
    <div>
      <div class="App">
        <div class="StaffLayout_wrapper__CegPk">
          <div class="StaffHeader_wrapper__IQw-U">
            <p class="StaffHeader_title__QxjW4">Dekanta</p>
            <button id="logoutButton" class="StaffHeader_signOut__i2pcu">
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
                    <div style="
                          display: flex;
                          padding-top: 1rem;
                          padding-bottom: 1rem;
                        ">
                      <h2>Nhà Cung Cấp</h2>
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
                        <a href="./FormCreateNhaCungCap.php"> Thêm Nhà Cung Cấp</a>
                      </button>
                    </div>
                    <br>

                    <div class="boxFeature">
                      <div style="position: relative">
                        <input class="Admin_input__LtEE-" placeholder="Tìm kiếm nhà cung cấp" />
                        <button id="searchButton" style="cursor: pointer;"><i class="fa fa-search"></i></button>
                      </div>
                      <div style="margin-left: auto"></div>
                    </div>

                    <br>
                    <div class="boxTable">
                      <table class="Table_table__BWPy">
                        <thead class="Table_head__FTUog">
                          <tr>
                            <th class="Table_th__hCkcg">Mã nhà cung cấp</th>
                            <th class="Table_th__hCkcg">Nhà cung cấp</th>
                            <th class="Table_th__hCkcg">Email</th>
                            <th class="Table_th__hCkcg">Số điện thoại</th>
                            <th class="Table_th__hCkcg">Xoá</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">

                        </tbody>
                      </table>
                    </div>
                    <div class="pagination">
                      <?php
                      for ($i = 1; $i <= $totalPage; $i++) {
                        echo '<button class="pageButton" onclick="fetchDataAndUpdateTable(' . $i . ')">' . $i . '</button>';
                      }
                      ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  // Lắng nghe sự kiện click trên nút logout
  document.addEventListener('DOMContentLoaded', function() {
    var logoutButton = document.getElementById('logoutButton');
    if (logoutButton) {
      logoutButton.addEventListener('click', function() {
        localStorage.removeItem('key');
        window.location.href = '../../../FrontEnd/MemberUI/Login/LoginUI.php';
      });
    }
  });

  // Hàm để xóa hết các dòng trong bảng
  function clearTable() {
    var tableBody = document.querySelector('.Table_table__BWPy tbody');
    tableBody.innerHTML = ''; // Xóa nội dung trong tbody
  }

  // Hàm getAllNhaCungCap
  function getAllNhaCungCap(page, search) {
    $.ajax({
      url: '../../../BackEnd/ManagerBE/NhaCungCapBE.php',
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
         <form id="updateForm" method="POST" action="FormUpdateNhaCungCap.php?MaNCC=${record.MaNCC}&TenNCC=${record.TenNCC}&Email=${record.Email}&SoDienThoai=${record.SoDienThoai}">
    <tr>
      <td style="text-align:center">${record.MaNCC}</td>
      <td style="text-align:center">${record.TenNCC}</td>
      <td style="text-align:center">${record.Email}</td>
      <td style="text-align:center">${record.SoDienThoai}</td>
      <td style="text-align:center">`;

          //Điều kiện để thêm nút xoá vào
          if (record.MaNCC != 1) {
            trContent += `
    <button style="cursor:pointer" class="edit" onclick="updateNhaCungCap(${record.MaNCC}, '${record.TenNCC}', '${record.Email}', '${record.SoDienThoai}')">Sửa</button>
    
    <button style="cursor:pointer" class="delete" onclick="deleteNhaCungCap(${record.MaNCC}, '${record.TenNCC}')">Xoá</button>`;
          }

          trContent += `</td>
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

  // Hàm để gọi getAllNhaCungCap và cập nhật dữ liệu và phân trang
  function fetchDataAndUpdateTable(page, search) {
    //Clear dữ liệu cũ
    clearTable();

    // Gọi hàm getAllTaiKhoan và truyền các giá trị tương ứng
    getAllNhaCungCap(page, search);

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
                    // Gọi hàm fetchDataAndUpdateTable khi người dùng click vào nút phân trang
                    fetchDataAndUpdateTable(index + 1, searchValue); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
                });
            });

            // Đánh dấu trang hiện tại
            paginationContainer.querySelector('.pageButton:nth-child(' + currentPage + ')').classList.add('active'); // Sửa lại để chỉ chọn trang hiện tại
        }
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

      // Lấy giá trị của ô tìm kiếm và của select quyền
      var searchValue = this.value;

      // Truyền giá trị của biến currentPage vào hàm fetchDataAndUpdateTable
      fetchDataAndUpdateTable(currentPage, searchValue);
    }
  });

  function deleteNhaCungCap(MaNCC, tenNCC) {
  // Sử dụng Swal thay vì hộp thoại confirm
  Swal.fire({
    title: `Bạn có muốn xóa  ${tenNCC} không?`,
    text: "Hành động này sẽ không thể hoàn tác!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Xóa',
    cancelButtonText: 'Hủy'
  }).then((result) => {
    // Nếu người dùng nhấn nút Xóa
    if (result.isConfirmed) {
      // Thực hiện gọi Ajax để xóa nhà cung cấp
      $.ajax({
        url: '../../../BackEnd/ManagerBE/NhaCungCapBE.php',
        type: 'POST',
        dataType: "json",
        data: {
          action: "delete",
          MaNCC: MaNCC
        },
        success: function(response) {
          console.log('Status:', response.status); // In mã trạng thái
          console.log('Message:', response.message); // In thông báo
          console.log('MaNCC:', MaNCC);

          if (response.status === 200) {
            Swal.fire({
              icon: 'success',
              title: 'Thành công!',
              text: 'Xóa nhà cung cấp thành công !!',
            }).then(function() {
              fetchDataAndUpdateTable(currentPage, '');
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Lỗi!',
              text: 'Đã xảy ra lỗi khi xóa nhà cung cấp',
            });
            console.error('Lỗi khi xóa nhà cung cấp: ', response.message);
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: 'Đã xảy ra lỗi khi gọi API',
          });
          console.error('Lỗi khi gọi API: ', xhr, status, error);
        }
      });
    }
  });
}



  function updateNhaCungCap(MaNCC, TenNCC, Email, SoDienThoai) {
    // Lấy ra form bằng id của nó
    var form = document.querySelector("#updateForm");

    form.action = `FormUpdateNhaCungCap.php?MaNCC=${MaNCC}&TenNCC=${TenNCC}&Email=${Email}&SoDienThoai=${SoDienThoai}`

    // Gửi form đi
    form.submit();

  }
</script>