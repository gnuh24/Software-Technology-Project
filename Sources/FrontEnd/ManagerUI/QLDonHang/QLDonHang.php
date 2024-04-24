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
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fas"
                data-icon="arrow-right-from-bracket"
                class="svg-inline--fa fa-arrow-right-from-bracket"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                style="width: 2rem; height: 2rem; color: white"
              ></svg>
            </button>
          </div>
          <div>
            <div>
              <?php 
                require_once "../../../BackEnd/ManagerBE/DonHangBE.php";
                require_once "../../../BackEnd/ManagerBE/TrangThaiDonHangBE.php";
                require_once "../../../BackEnd/ManagerBE/PhuongThucThanhToan.php";
              ?>
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
                    <a class="MenuItemSidebar_menuItem__56b1m" href="../ThongKe/ThongKeDonHang.php">
                        <span class="MenuItemSidebar_title__LLBtx">Thống Kê Đơn Hàng</span>
                    </a>
                </div>
                <div
                  style="padding-left: 16%; width: 100%; padding-right: 2rem"
                >
                  <div class="wrapper">
                    <div class="Admin_rightBar__RXnS9">
                      <div
                        style="
                          display: flex;
                          margin-bottom: 1rem;
                          align-items: center;
                        "
                      >
                        <p class="Admin_title__1Tk48">Quản lí đơn hàng</p>
                        <!-- <button style="margin-left: auto; font-family: Arial; font-size: 1.5rem; font-weight: 700; color: white; background-color: rgb(65, 64, 64); padding: 1rem; border-radius: 0.6rem; cursor: pointer;">Tạo Tài Khoản

                                </button> -->
                      </div>
                      <div class="Admin_boxFeature__ECXnm">
                        <label for=""> Lọc đơn hàng:</label>
                        <div style="position: relative">
                          <input class="Admin_input__LtEE-" type="date" />
                        </div>
                        <!-- <select style="height: 3rem; padding: 0.3rem;">
                                    <option value="">Quyền Hạn : Tất Cả</option>
                                    <option value="Admin">Admin</option>
                                    <option value="CEO">CEO</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Seller">Seller</option>
                                    <option value="User">User</option>
                                </select> -->
                        <label for=""> đến </label>
                        <div style="position: relative">
                          <input class="Admin_input__LtEE-" type="date" />
                        </div>
                        <button
                          style="
                            margin-left: auto;
                            font-family: Arial;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: white;
                            background-color: rgb(14, 195, 14);
                            padding: 1rem;
                            border-radius: 0.6rem;
                            cursor: pointer;
                          "
                        >
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
                              <th class="Table_th__hCkcg">
                                Phương thức thanh toán
                              </th>
                              <th class="Table_th__hCkcg">Trạng thái</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- <?php
              foreach ($Ketqua as $record) {
                if( (int)$record['MaTaiKhoan']%2!==0){
                   echo '<tr>
                    <td class="Table_data_quyen_1">' . $record['MaTaiKhoan'] . '</td>
                    <td class="Table_data_quyen_1">' . $record['HoTen'] . '</td>
                    <td class="Table_data_quyen_1">' . $record['NgaySinh'] . '</td>
                    <td class="Table_data_quyen_1">' . $record['DiaChi'] . '</td>
                    <td class="Table_data_quyen_1">' . $record['GioiTinh'] . '</td>
                    <td class="Table_data_quyen_1">' . $record['SoDienThoai'] . '</td>
                    <td class="Table_data_quyen_1">' . $record['Email'] . '</td>
                    <td class="Table_data_quyen_1">' . $record['DoiTuong'] . '</td>
                    <td class="Table_data_quyen_1">           
                    <button class="delete">Xóa</button>
                    <button class="edit" >Sửa</button>
                    
              </tr>';
                }
                else{
                  echo '<tr>
                  <td class="Table_data_quyen_2">' . $record['MaTaiKhoan'] . '</td>
                  <td class="Table_data_quyen_2">' . $record['HoTen'] . '</td>
                  <td class="Table_data_quyen_2">' . $record['NgaySinh'] . '</td>
                  <td class="Table_data_quyen_2">' . $record['DiaChi'] . '</td>
                  <td class="Table_data_quyen_2">' . $record['GioiTinh'] . '</td>
                  <td class="Table_data_quyen_2">' . $record['SoDienThoai'] . '</td>
                  <td class="Table_data_quyen_2">' . $record['Email'] . '</td>
                  <td class="Table_data_quyen_2">' . $record['DoiTuong'] . '</td>
                  <td class="Table_data_quyen_2">           
                  <button class="delete">Xóa</button>
                  <button class="edit" >Sửa</button>
                  
            </tr>';
                }
    }
?> -->
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
