<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../AdminDemo.css" />
  <link rel="stylesheet" href="QLPhieuNhapKho.css" />
  <title>Document</title>
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
                    <div style="
                          display: flex;
                          padding-top: 1rem;
                          padding-bottom: 1rem;
                        ">
                      <h2>Phiếu Nhập Kho</h2>
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
                          "><a href="taoPhieuNhapKho.php">Tạo Phiếu Nhập</a>
                      </button>
                    </div>
                    <div class="boxFeature">
                      <div>
                        <label>
                          <span style="font-size: 1.3rem; font-weight: 700">Đơn Trong Tháng :
                          </span>
                          <input class="input datesearch" style="width: 20rem" type="month" />
                        </label>
                      </div>
                      <div style="margin-left: auto"></div>
                    </div>
                    <div class="Admin_boxTable__hLXRJ">
                      <table class="Table_table__BWPy">
                        <thead class="Table_head__FTUog">
                          <tr>
                            <th class="Table_th__hCkcg">Mã Phiếu</th>
                            <th class="Table_th__hCkcg">Ngày Nhập Kho</th>
                            <th class="Table_th__hCkcg">Tên Nhà Cung Cấp</th>
                            <th class="Table_th__hCkcg">Tên Người Quản Lý</th>
                            <th class="Table_th__hCkcg"> Tổng Giá Trị</th>
                            <th class="Table_th__hCkcg">Thao Tác</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                          <!-- Các hàng dữ liệu sẽ được thêm ở đây -->

                        </tbody>
                      </table>
                      <div class="pagination">

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

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  // Hàm để xóa hết các dòng trong bảng
  function clearTable() {
    var tableBody = document.querySelector('#tableBody');
    tableBody.innerHTML = ''; // Xóa nội dung trong tbody
  }

  // Hàm getAllphieunhapkho
  function getAllphieunhapkho(page, datenhapkho) {
    $.ajax({
      url: '../../../BackEnd/ManagerBE/PhieuNhapKhoBE.php',
      type: 'GET',
      dataType: "json",
      data: {
        page: page,
        datenhapkho: datenhapkho
      },
      success: function(response) {
        var data = response.data;
        var tableBody = document.getElementById("tableBody"); // Lấy thẻ tbody của bảng
        var tableContent = ""; // Chuỗi chứa nội dung mới của tbody

        // Duyệt qua mảng dữ liệu và tạo các hàng mới cho tbody
        data.forEach(function(record) {
          var ngayNhapKho = record['NgayNhapKho'];

          // Chuyển đổi ngày nhập kho sang đối tượng Date
          var date = new Date(ngayNhapKho);

          // Lấy các thành phần của ngày nhập kho (giờ, phút, giây, ngày, tháng, năm)
          var gio = date.getHours();
          var phut = date.getMinutes();
          var giay = date.getSeconds();
          var ngay = date.getDate();
          var thang = date.getMonth() + 1; // Tháng trong JavaScript đếm từ 0, nên cần cộng thêm 1
          var nam = date.getFullYear();

          // Định dạng lại chuỗi ngày giờ
          var ngayNhapKhoFormatted = gio + ":" + phut + ":" + giay + " " + ngay + "/" + thang + "/" + nam;

          var formattedTongGiaTri = record['TongGiaTri'].toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

          var trContent = `
                <form id="updateForm_${record['MaPhieu']}" method="post" action="taoPhieuNhapKho.php?MaPhieu=${record['MaPhieu']}&MaNCC=${record['MaNCC']}&MaQuanLy=${record['MaQuanLy']}&TongTien=${record['TongGiaTri']}&HoTen=${record['HoTen']}">
                    <tr>
                        <td class="Table_data" style="width: 130px;">${record['MaPhieu']}</td>
                        <td class="Table_data">${ngayNhapKhoFormatted}</td>
                        <td class="Table_data">${record['TenNCC']}</td>
                        <td class="Table_data">${record['HoTen']}</td>
                        <td class="Table_data">${formattedTongGiaTri}</td>
                        <td class="Table_data">
                            <button class="edit" onclick="update(${record['MaPhieu']})">Xem chi tiết</button>
                        </td>
                    </tr>
                </form>
                `;

          tableContent += trContent; // Thêm nội dung của hàng vào chuỗi tableContent
        });

        // Thiết lập lại nội dung của tbody bằng chuỗi tableContent
        tableBody.innerHTML = tableContent;
        // Tạo phân trang
        createPagination(page, response.totalPages);
      },
      error: function(xhr, status, error) {
        console.error('Lỗi khi gọi API: ', error);
      }
    });
  }

  // Hàm để gọi getAllphieunhapkho và cập nhật dữ liệu và phân trang
  function fetchDataAndUpdateTable(page, datenhapkho) {
    //Clear dữ liệu cũ
    clearTable();
    // Gọi hàm getAllphieunhapkho và truyền các giá trị tương ứng
    getAllphieunhapkho(page, datenhapkho);
  }

  // Hàm tạo nút phân trang
  function createPagination(currentPage, totalPages) {
    var paginationContainer = document.querySelector('.pagination');
    var date = document.querySelector('.datesearch').value;
    // Xóa nút phân trang cũ (nếu có)
    paginationContainer.innerHTML = '';
    if(totalPages != 1){
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
        fetchDataAndUpdateTable(index + 1, date); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
      });
    });

    // Đánh dấu trang hiện tại
    paginationContainer.querySelector('.pageButton:nth-child(' + currentPage + ')').classList.add('active');
   } // Sửa lại để chỉ chọn trang hiện tại
  }

  function update(MaPhieu) {
    // Lấy ra form bằng id của nó
    var form = document.querySelector(`#updateForm_${MaPhieu}`);

    // Gửi form đi
    form.submit();
  }


  // Sự kiện DOMContentLoaded
  document.addEventListener('DOMContentLoaded', function() {
    // Lấy thẻ input
    var inputElement = document.querySelector('.datesearch');

    // Thêm sự kiện 'change' vào input
    inputElement.addEventListener('change', function(event) {
      // Lấy giá trị mới của input khi nó thay đổi
      var newValue = event.target.value;

      // Kiểm tra xem input có giá trị hay không
      if (newValue) {
        // Gọi hàm fetchDataAndUpdateTable với trang hiện tại và giá trị mới của input
        fetchDataAndUpdateTable(currentPage, newValue);
      } else {
        // Nếu input không có giá trị, gán giá trị rỗng cho date
        var date = '';
        // Gọi lại hàm fetchDataAndUpdateTable với trang hiện tại và giá trị date rỗng
        fetchDataAndUpdateTable(currentPage, date);
      }
    });

    // Khởi tạo trang hiện tại
    var currentPage = 1;
    fetchDataAndUpdateTable(currentPage, '');
  });
</script>
