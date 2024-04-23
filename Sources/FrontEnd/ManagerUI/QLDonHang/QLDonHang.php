<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../AdminDemo.css" />
  <link rel="stylesheet" href="QLDonHang.css" />
  <title>Quản lý đơn hàng</title>
</head>

<body>
  <div>
    <div class="App">
      <div class="StaffLayout_wrapper__CegPk">
        <div class="StaffHeader_wrapper__IQw-U">
          <p class="StaffHeader_title__QxjW4">Dekanta</p>
          <button class="StaffHeader_signOut__i2pcu">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket" class="svg-inline--fa fa-arrow-right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 2rem; height: 2rem; color: white"></svg>
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
                <a class="MenuItemSidebar_menuItem__56b1m" href="QLDonHang.php">
                  <span class="MenuItemSidebar_title__LLBtx">Đơn Hàng</span>
                </a>
                <a class="MenuItemSidebar_menuItem__56b1m" href="./thongkedoanhthu.html">
                  <span class="MenuItemSidebar_title__LLBtx">Thống Kê Doanh Thu</span>
                </a>
                <a class="MenuItemSidebar_menuItem__56b1m" href="./thongkechitieu.html">
                  <span class="MenuItemSidebar_title__LLBtx">Thống Kê Chi Tiêu</span>
                </a>
                <a class="MenuItemSidebar_menuItem__56b1m" href="../ThongKe/ThongKe.php">
                  <span class="MenuItemSidebar_title__LLBtx">Thống Kê Đơn Hàng</span>
                </a>
              </div>
              <div style="padding-left: 16%; width: 100%; padding-right: 2rem">
                <div class="wrapper">
                  <div class="Admin_rightBar__RXnS9">
                    <div style="
                          display: flex;
                          margin-bottom: 1rem;
                          align-items: center;
                        ">
                      <p class="Admin_title__1Tk48">Quản lí đơn hàng</p>
                      <!-- <button style="margin-left: auto; font-family: Arial; font-size: 1.5rem; font-weight: 700; color: white; background-color: rgb(65, 64, 64); padding: 1rem; border-radius: 0.6rem; cursor: pointer;">Tạo Tài Khoản

                                </button> -->
                    </div>
                    <div class="Admin_boxFeature__ECXnm">
                      <label for=""> Lọc đơn hàng:</label>
                      <div style="position: relative">
                        <input class="Admin_input__LtEE-" type="date" onchange="" />
                      </div>
                      <label for=""> đến </label>
                      <div style="position: relative">
                        <input class="Admin_input__LtEE-" type="date" onchange="" />
                      </div>
                      <div style="position: relative">
                        <select style="height: 3rem; padding: 0.3rem;" class="Admin_input__LtEE-" onchange="">
                          <option value="">Trạng thái : Tất Cả</option>
                          <option value="ChoDuyet">Chờ duyệt</option>
                          <option value="DaDuyet">Đã duyệt</option>
                          <option value="Huy">Hủy</option>
                          <option value="DangGiao">Đang giao</option>
                          <option value="GiaoThanhCong">Giao thành công</option>
                        </select>
                      </div>
                      <button style="
                            margin-left: auto;
                            font-family: Arial;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: white;
                            background-color: rgb(14, 195, 14);
                            padding: 1rem;
                            border-radius: 0.6rem;
                            cursor: pointer;
                          ">
                        xác nhận
                      </button>
                    </div>
                    <div class="Admin_boxTable__hLXRJ">
                      <table class="Table_table__BWPy">
                        <thead class="Table_head__FTUog">
                          <tr>
                            <th class="Table_th__hCkcg">Mã đơn</th>
                            <th class="Table_th__hCkcg">Ngày đặt</th>
                            <th class="Table_th__hCkcg">Tổng đơn</th>
                            <th class="Table_th__hCkcg">Mã khách</th>
                            <th class="Table_th__hCkcg">Phương thức thanh toán</th>
                            <th class="Table_th__hCkcg">Trạng thái</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                          <?php
                          require_once "../../../BackEnd/ManagerBE/DonHangBE.php";
                          require_once "../../../BackEnd/ManagerBE/TrangThaiDonHangBE.php";
                          require_once "../../../BackEnd/ManagerBE/PhuongThucThanhToan.php";


                          $result = getAllDonHang(1, null, null, null);
                          $totalPage = $result->totalPages;
                          $Ketqua = $result->data;

                          foreach ($Ketqua as $record) {

                            $ngayDat = date('H:i:s d/m/Y', strtotime($record['NgayDat']));

                            $phuongThucThanhToan = getPhuongThucThanhToanByMaPhuongThuc($record['MaPhuongThuc']);

                            $trangThai = getTrangThaiDonHangByMaDonHang($record['TrangThai']);

                            if ((int) $record['MaDonHang'] % 2 !== 0) {
                              echo '<tr>
                                          <td class="Table_data_quyen_1">' . $record['MaDonHang'] . '</td>
                                          <td class="Table_data_quyen_1">' . $ngayDat . '</td>
                                          <td class="Table_data_quyen_1">' . $record['TongGiaTri'] . '</td>
                                          <td class="Table_data_quyen_1">' . $record['MaKH'] . '</td>
                                          <td class="Table_data_quyen_1">' . $phuongThucThanhToan . '</td>
                                          <td class="Table_data_quyen_1">' . $trangThai . '</td>
                                          <td class="Table_data_quyen_1">           
                                          <button class="delete">Xóa</button>
                                          <button class="edit" >Đổi trạng thái</button>
                                        </tr>';
                            } else {
                              echo '<tr>
                                          <td class="Table_data_quyen_2">' . $record['MaDonHang'] . '</td>
                                          <td class="Table_data_quyen_2">' . $record['NgayDat'] . '</td>
                                          <td class="Table_data_quyen_2">' . $record['TongGiaTri'] . '</td>
                                          <td class="Table_data_quyen_2">' . $record['MaKH'] . '</td>
                                          <td class="Table_data_quyen_2">' . $phuongThucThanhToan . '</td>
                                          <td class="Table_data_quyen_2">' . $trangThai . '</td>
                                          <td class="Table_data_quyen_2">           
                                          <button class="delete">Xóa</button>
                                          <button class="edit" >Đổi trạng thái</button>
                                        </tr>';
                            }
                          }
                          ?>
                        </tbody>
                      </table>
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
  </div>
</body>

<script>
  function clearTable() {
    var tableBody = document.getElementById("tableBody");
    tableBody.innerHTML = ''; // Xóa nội dung trong tbody
  }

  function getAllDonHang(page, minNgayTao, maxNgayTao, trangThai) {
    $.ajax({
      url: '../../../BackEnd/ManagerBE/DonHangBE.php',
      type: 'GET',
      dataType: "json",
      data: {
        page: page,
        minNgayTao: minNgayTao,
        maxNgayTao: maxNgayTao,
        trangThai: trangThai
      },
      success: function(response) {
        var data = response.data;
        var tableBody = document.getElementById("tableBody"); // Lấy thẻ tbody của bảng
        var tableContent = ""; // Chuỗi chứa nội dung mới của tbody

        // Duyệt qua mảng dữ liệu và tạo các hàng mới cho tbody
        data.forEach(function(record) {
          var trClass = (parseInt(record.MaDonHang) % 2 !== 0) ? "Table_data_quyen_1" : "Table_data_quyen_2"; // Xác định class của hàng

          var ngayDat = new Date(record.ngayDat);
          var ngayDatFormatted = ngayDat.toLocaleString();

          // Xác định trạng thái và văn bản của nút dựa trên trạng thái của tài khoản
          var buttonText = "Chờ duyệt";
          // var buttonClass = (record.TrangThai === 0) ? "unlock" : "block";
          // var buttonData = (record.TrangThai === 0) ? "unlock" : "block";

          var trContent = `
                        <tr>
                            <td class="${trClass}" style="width: 130px;">${record.MaDonHang}</td>
                            <td class="${trClass}">${ngayTaoFormatted}</td>
                            <td class="${trClass}">${record.TongGiaTri}</td>
                            <td class="${trClass}">${ngayTaoFormatted}</td>
                            <td class="${trClass}">${record.MaKH}</td>
                            <td class="${trClass}">${record.MaPhuongThuc}</td>
                            <td class="${trClass}">record.TrangThai</td>
                            <td class="${trClass}">
                                 <button class="edit" onclick="">Hủy</button>
                                 <button onclick="">${buttonText}</button>
                            </td>
                        </tr>`;

          tableContent += trContent; // Thêm nội dung của hàng vào chuỗi tableContent
        });

        // Thiết lập lại nội dung của tbody bằng chuỗi tableContent
        tableBody.innerHTML = tableContent;

        


      },

      error: function(xhr, status, error) {
        console.error('Lỗi khi gọi API: ', error);
      }
    });
  }

  function createPagination(currentPage, totalPages) {
    var paginationContainer = document.querySelector('.pagination');
    // var searchValue = document.querySelector('.Admin_input__LtEE-').value;
    // var quyenValue = document.querySelector('#selectQuyen').value;

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
        fetchDataAndUpdateTable(index + 1, '', '', ''); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
      });
    });

    // Đánh dấu trang hiện tại
    paginationContainer.querySelector('.pageButton:nth-child(' + currentPage + ')').classList.add('active'); // Sửa lại để chỉ chọn trang hiện tại
  }

  function fetchDataAndUpdateTable(page, minNgayTao, maxNgayTao, trangThai) {
    //Clear dữ liệu cũ
    clearTable();

    // Gọi hàm getAllTaiKhoan và truyền các giá trị tương ứng
    getAllTaiKhoan(page, minNgayTao, maxNgayTao, trangThai);

    // Tạo phân trang
    createPagination(page);
  }

  // Khởi tạo trang hiện tại
  var currentPage = 1;
  fetchDataAndUpdateTable(currentPage, '', '', '');

  // // Hàm để gọi getAllTaiKhoan và cập nhật dữ liệu và phân trang
  // function fetchDataAndUpdateTable(page, minNgayTao, maxNgayTao, trangThai) {
  //   //Clear dữ liệu cũ
  //   clearTable();

  //   // Gọi hàm getAllTaiKhoan và truyền các giá trị tương ứng
  //   getAllTaiKhoan(page, minNgayTao, maxNgayTao, trangThai);
  // }
</script>

</html>