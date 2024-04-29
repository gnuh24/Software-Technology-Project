<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../AdminDemo.css" />
  <link rel="stylesheet" href="./QLDonHang.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        <input class="Admin_input__LtEE-" type="date" id="dateStart" />
                      </div>
                      <label for=""> đến </label>
                      <div style="position: relative">
                        <input class="Admin_input__LtEE-" type="date" id="dateEnd" />
                      </div>
                      <div style="position: relative">
                        <select style="height: 3rem; padding: 0.3rem;" class="Admin_input__LtEE-" id="TrangThai">
                          <option value="">Trạng thái : Tất Cả</option>
                          <option value="ChoDuyet">Chờ duyệt</option>
                          <option value="DaDuyet">Đã duyệt</option>
                          <option value="Huy">Hủy</option>
                          <option value="DangGiao">Đang giao</option>
                          <option value="GiaoThanhCong">Giao thành công</option>
                        </select>
                      </div>
                      <!-- <button style="
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
                      </button> -->
                    </div>
                    <div class="Admin_boxTable__hLXRJ">
                      <table class="Table_table__BWPy">
                        <thead class="Table_head__FTUog">
                          <tr>
                            <th class="Table_th__hCkcg">Mã đơn</th>
                            <th class="Table_th__hCkcg">Ngày đặt</th>
                            <th class="Table_th__hCkcg">Tổng đơn</th>
                            <th class="Table_th__hCkcg">Email khách hàng</th>
                            <th class="Table_th__hCkcg">Trạng thái</th>
                            <th class="Table_th__hCkcg">Hành động</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                          <!-- <?php
                                require_once "../../../BackEnd/ManagerBE/DonHangBE.php";
                                require_once "../../../BackEnd/ManagerBE/TrangThaiDonHangBE.php";
                                require_once "../../../BackEnd/ManagerBE/PhuongThucThanhToan.php";


                                $result = getAllDonHang(1, "null", "null", "null");
                                $totalPage = $result->totalPages;
                                $Ketqua = $result->data;

                                $printed_orders = [];
                                $order_statuses = [];

                                foreach ($Ketqua as $record) {

                                  $maDonHang = $record['MaDonHang'];

                                  $ngayDat = date('H:i:s d/m/Y', strtotime($record['NgayDat']));

                                  if (in_array($maDonHang, $printed_orders)) {
                                    continue;
                                  }

                                  // Lưu trạng thái mới nhất của mã đơn hàng
                                  $order_statuses[$maDonHang] = $record['TrangThai'];
                                  if ($order_statuses[$maDonHang] == 'ChoDuyet') {
                                    $order_statuses[$maDonHang] = 'Chờ Duyệt';
                                  }
                                  if ($order_statuses[$maDonHang] == 'Huy') {
                                    $order_statuses[$maDonHang] = 'Đã Hủy';
                                  }
                                  if ($order_statuses[$maDonHang] == 'DaDuyet') {
                                    $order_statuses[$maDonHang] = 'Đã duyệt';
                                  }
                                  if ($order_statuses[$maDonHang] == 'DangGiao') {
                                    $order_statuses[$maDonHang] = 'Đang Giao';
                                  }
                                  if ($order_statuses[$maDonHang] == 'GiaoThanhCong') {
                                    $order_statuses[$maDonHang] = 'GiaoThanhCong';
                                  }
                                  $printed_orders[] = $maDonHang;

                                  if ((int) $record['MaDonHang'] % 2 !== 0) {
                                    echo '<tr>
                                          <td class="Table_data_quyen_1">' . $record['MaDonHang'] . '</td>
                                          <td class="Table_data_quyen_1">' . $ngayDat . '</td>
                                          <td class="Table_data_quyen_1">' . $record['TongGiaTri'] . '</td>
                                          <td class="Table_data_quyen_1">' . $record['Email'] . '</td>
                                          <td class="Table_data_quyen_1"><button type="button" onclick="" class="edit">' . $order_statuses[$maDonHang] . '</button></td>                                                            
                                        ';
                                    if ($order_statuses[$maDonHang] == 'Chờ Duyệt')
                                      echo '<td class="Table_data_quyen_1"><a href="./ChiTietDonHang.php" class="edit"> chi tiết</a> <button class="delete"> hủy</button> </td></tr>';
                                    else
                                      echo '<td class="Table_data_quyen_1"><a href="./ChiTietDonHang.php" class="edit"> chi tiết</a> </td></tr>';
                                  } else {
                                    echo '<tr>
                                          <td class="Table_data_quyen_2">' . $record['MaDonHang'] . '</td>
                                          <td class="Table_data_quyen_2">' . $ngayDat . '</td>
                                          <td class="Table_data_quyen_2">' . $record['TongGiaTri'] . '</td>
                                          <td class="Table_data_quyen_2">' . $record['Email'] . '</td>
                                          <td class="Table_data_quyen_2"><button type="button" onclick="" class="edit">' . $order_statuses[$maDonHang] . '</button></td>        
                                        ';
                                    if ($order_statuses[$maDonHang] == 'Chờ Duyệt')
                                      echo '<td class="Table_data_quyen_2"><a href="./ChiTietDonHang.php" class="edit"> chi tiết</a> <button class="delete"> hủy</button> </td></tr>';
                                    else
                                      echo '<td class="Table_data_quyen_2"><a href="./ChiTietDonHang.php" class="edit"> chi tiết</a> </td></tr>';
                                  }
                                }
                                ?> -->


                        </tbody>
                      </table>
                      <div id="pagination" class="pagination">

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

  console.log("Quản lý đơn hàng");

  var udPage=0; 
  var udminNgayTao=0;
  var udmaxNgayTao=0;
  var udtrangThai=0;

  function clearTable() {
    var tableBody = document.getElementById("tableBody");
    tableBody.innerHTML = ''; // Xóa nội dung trong tbody
  }

  function number_format_vnd(number) {
    return Number(number).toLocaleString('vi-VN', {
      style: 'currency',
      currency: 'VND'
    });
  }

  function formatDate(originalDate) {
    // Parse the original date string
    var dateObj = new Date(originalDate);

    // Extract date components
    var month = dateObj.getMonth() + 1; // Months are zero-based, so add 1
    var day = dateObj.getDate();
    var year = dateObj.getFullYear();
    var hours = dateObj.getHours();
    var minutes = dateObj.getMinutes();
    var seconds = dateObj.getSeconds();
    var meridian = hours >= 12 ? 'PM' : 'AM';

    // Adjust hours to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight (0 hours)

    // Format the date string
    var formattedDate = month + '/' + day + '/' + year + ', ' + hours + ':' + minutes + ':' + seconds + ' ' + meridian;

    return formattedDate;
  }

  function getTenTrangThai(order_statuses){
    if (order_statuses == 'ChoDuyet') {
      order_statuses = 'Chờ Duyệt';
    }
    if (order_statuses == 'Huy') {
      order_statuses = 'Đã Hủy';
    }
    if (order_statuses == 'DaDuyet') {
      order_statuses = 'Đã duyệt';
    }
    if (order_statuses == 'DangGiao') {
      order_statuses = 'Đang Giao';
    }
    if (order_statuses == 'GiaoThanhCong') {
      order_statuses = 'Giao Thành Công';
    }
    return order_statuses;
  }

  function getOrderStatusClassName(order_statuses) {
    var order_statuses_classname;
    if (order_statuses == 'Chờ Duyệt') {
      order_statuses_classname = 'ChoDuyet';
    } else if (order_statuses == 'Đã Hủy') {
      order_statuses_classname = 'Huy';
    } else if (order_statuses == 'Đã duyệt') {
      order_statuses_classname = 'DaDuyet';
    } else if (order_statuses == 'Đang Giao') {
      order_statuses_classname = 'DangGiao';
    } else if (order_statuses == 'Giao Thành Công') {
      order_statuses_classname = 'GiaoThanhCong';
    }
    return order_statuses_classname;
  }

  function createPagination(currentPage, totalPages) {
    var paginationContainer = document.getElementById('pagination');
    // var searchValue = document.querySelector('.Admin_input__LtEE-').value;
    // var quyenValue = document.querySelector('#selectQuyen').value;

    // Xóa nút phân trang cũ (nếu có)
    paginationContainer.innerHTML = '';

    // Tạo nút cho từng trang và thêm vào chuỗi HTML
    var paginationHTML = '';
    for (var i = 1; i <= totalPages; i++) {
      if (i == currentPage) {
        paginationHTML += '<button class="pageButton active">' + i + '</button>';
      } else {
        paginationHTML += '<button class="pageButton">' + i + '</button>';
      }
    }
    if(totalPages>1){
      paginationContainer.innerHTML = paginationHTML;
    }
   
    paginationContainer.querySelectorAll('.pageButton').forEach(function(button, index) {
      button.addEventListener('click', function() {
        // Gọi hàm fetchDataAndUpdateTable khi người dùng click vào nút phân trang
        fetchDataAndUpdateTable(index + 1,udminNgayTao, udmaxNgayTao, udtrangThai); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
      });
    });
  }

  function getAllDonHang(page, minNgayTao = "null", maxNgayTao = "null", trangThai = "null") {
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
        console.log(response)
        var totalPages = response.totalPages;
        var data = response.data;
        var tableBody = document.getElementById("tableBody"); // Lấy thẻ tbody của bảng
        var tableContent = ""; // Chuỗi chứa nội dung mới của tbody
        var printed_orders = [];
        var order_statuses;
        // Duyệt qua mảng dữ liệu và tạo các hàng mới cho tbody

        data.forEach(function(record) {
          var trClass = (parseInt(record.MaDonHang) % 2 !== 0) ? "Table_data_quyen_1" : "Table_data_quyen_2";

          var maDonHang = record.MaDonHang;

          var ngayDatFormatted = formatDate(record.NgayDat);

          if (printed_orders.includes(maDonHang)) {
            return;
          }

          // Lưu trạng thái mới nhất của mã đơn hàng
          order_statuses = getTenTrangThai(record.TrangThai);

          printed_orders.push(maDonHang);
          var order_statuses_classname = getOrderStatusClassName(order_statuses);

          var trContent = `<tr>
                            <td class="${trClass}"> ${record.MaDonHang}  </td>
                            <td class="${trClass}"> ${ngayDatFormatted}  </td>
                            <td class="${trClass}"> ${number_format_vnd(record.TongGiaTri)}</td>
                            <td class="${trClass}"> ${record.Email}  </td>  
                            <td class="${trClass}"><button type="button" onclick="changeOrderStatus(${record.MaDonHang}, '${record.TrangThai}')" class="${order_statuses_classname}">  ${order_statuses}  </button></td>        
                          `;
          if (order_statuses == 'Chờ Duyệt')
            trContent += `<td class="${trClass}"><a href="./ChiTietDonHang.php?${record.MaDonHang}" class="edit">chi tiết</a> <button class="delete" onclick="setTrangThaiDonHang(${record.MaDonHang},'Huy')"> hủy</button> </td></tr> `;
          else
            trContent += `<td class="${trClass}"><a href="./ChiTietDonHang.php?${record.MaDonHang}" class="edit">chi tiết</a> </td></tr>`;
          tableContent += trContent; // Thêm nội dung của hàng vào chuỗi tableContent
        });

        // Thiết lập lại nội dung của tbody bằng chuỗi tableContent
        tableBody.innerHTML = tableContent;
        createPagination(page, totalPages);
      },

      error: function(xhr, status, error) {
        console.error('Lỗi khi gọi API: ', error);
      }
    });
  }

  function fetchDataAndUpdateTable(page, minNgayTao, maxNgayTao, trangThai) {
    //Clear dữ liệu cũ
    clearTable();

    udPage = page;
    udminNgayTao = minNgayTao;
    udmaxNgayTao = maxNgayTao;
    udtrangThai = trangThai;

    // Gọi hàm getAllTaiKhoan và truyền các giá trị tương ứng
    getAllDonHang(page, minNgayTao, maxNgayTao, trangThai);

  }

  // Khởi tạo trang hiện tại
  var currentPage = 1;
  fetchDataAndUpdateTable(currentPage);



  var dateStart = document.getElementById('dateStart');
  dateStart.addEventListener('change', function(event) {
    var minNgayTao = event.target.value;
    var maxNgayTao = document.getElementById('dateEnd').value;
    var trangThai = document.getElementById('TrangThai').value;
    minNgayTao = minNgayTao !== '' ? minNgayTao : 'null';
    maxNgayTao = maxNgayTao !== '' ? maxNgayTao : 'null';
    trangThai = trangThai !== '' ? trangThai : 'null';
    fetchDataAndUpdateTable(1, minNgayTao, maxNgayTao, trangThai);
  });

  var dateEnd = document.getElementById('dateEnd');
  dateEnd.addEventListener('change', function(event) {
    var minNgayTao = document.getElementById('dateStart').value;
    var maxNgayTao = event.target.value;
    var trangThai = document.getElementById('TrangThai').value;
    minNgayTao = minNgayTao !== '' ? minNgayTao : 'null';
    maxNgayTao = maxNgayTao !== '' ? maxNgayTao : 'null';
    trangThai = trangThai !== '' ? trangThai : 'null';
    fetchDataAndUpdateTable(1, minNgayTao, maxNgayTao, trangThai);
  });

  var TrangThai = document.getElementById('TrangThai');
  TrangThai.addEventListener('change', function(event) {
    var minNgayTao = document.getElementById('dateStart').value;
    var maxNgayTao = document.getElementById('dateEnd').value;
    var trangThai = event.target.value;
    minNgayTao = minNgayTao !== '' ? minNgayTao : 'null';
    maxNgayTao = maxNgayTao !== '' ? maxNgayTao : 'null';
    trangThai = trangThai !== '' ? trangThai : 'null';
    fetchDataAndUpdateTable(1, minNgayTao, maxNgayTao, trangThai);
  });

  const EnumTrangThai = ['ChoDuyet', 'DaDuyet', 'DangGiao', 'GiaoThanhCong'];

  function nextState(TrangThai) {
    var currentIndex = EnumTrangThai.indexOf(TrangThai);
    return EnumTrangThai[currentIndex+1];
  }

  function changeOrderStatus(MaDonHang, TrangThai) {
    if (TrangThai == "Huy" || TrangThai == "GiaoThanhCong") {
      return;
    }
    TrangThai = nextState(TrangThai);
    setTrangThaiDonHang(MaDonHang, TrangThai);
  }

  function setTrangThaiDonHang(MaDonHang, TrangThai) {
    $.ajax({
      url: '../../../BackEnd/ManagerBE/TrangThaiDonHangBE.php',
      type: 'POST',
      dataType: "json",
      data: {
        MaDonHang: MaDonHang,
        TrangThai: TrangThai
      },
      success: function(response) {
        console.log(udPage)
        console.log(udminNgayTao)
        console.log(udmaxNgayTao)
        console.log(udtrangThai)
        fetchDataAndUpdateTable(udPage, udminNgayTao, udmaxNgayTao, udtrangThai);
        console.log(response);
        Swal.fire({
          icon: 'success',
          text: 'Cập nhật trạng thái thành công.'
        });
      },
      error: function(xhr, status, error) {
        Swal.fire({
          icon: 'error',
          text: 'Cập nhật trạng thái thất bại.'
        });
      }
    })
  }

  // Example usage:
  // }
</script>

</html>