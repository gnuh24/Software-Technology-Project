<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="QLSanPham.css" />
    <link rel="stylesheet" href="../../AdminUI/Admin.css" />
    <title>Quản lý sản phẩm</title>
</head>
<body>
<div id="root">
    <div>
        <div class="App">
            <div class="StaffLayout_wrapper__CegPk">
                <div class="StaffHeader_wrapper__IQw-U">
                    <p class="StaffHeader_title__QxjW4">Dekanta</p>
                    <button class="StaffHeader_signOut__i2pcu">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket"
                             class="svg-inline--fa fa-arrow-right-from-bracket" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                             style="width: 2rem; height: 2rem; color: white">
                            <path fill="currentColor"
                                  d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div>
                    <div>
                        <div class="Manager_wrapper__vOYy">
                            <div class="Sidebar_sideBar__CC4MK">
                                <a class="MenuItemSidebar_menuItem__56b1m"
                                   href="../QLLoaiSanPham/QLLoaiSanPham.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Loại Sản Phẩm</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="../QLSanPham/QLSanPham.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Sản Phẩm</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m"
                                   href="../QLNhaCungCap/QLNhaCungCap.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Nhà Cung Cấp</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m"
                                   href="../QLPhieuNhapKho/QLPhieuNhapKho.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Phiếu Nhập Kho</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m"
                                   href="../QLDonHang/QLDonHang.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Đơn Hàng</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m"
                                   href="../ThongKe/ThongKeDoanhThuChiTieu.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Thống Kê Tài Chính</span>
                                </a>
                                <a class="MenuItemSidebar_menuItem__56b1m" href="../ThongKe/ThongKeDonHang.php">
                                    <span class="MenuItemSidebar_title__LLBtx">Thống Kê Đơn Hàng</span>
                                </a>
                            </div>
                            <div style="padding-left: 16%; width: 100%; padding-right: 2rem">
                                <div class="wrapper">
                                    <div style="display: flex; padding-top: 1rem; padding-bottom: 1rem;">
                                        <h2>Sản Phẩm</h2>
                                        <button style="margin-left: auto; font-family: Arial; font-size: 1.5rem;
                                          font-weight: 700; color: white; background-color: rgb(65, 64, 64); padding: 1rem;
                                          border-radius: 0.6rem; cursor: pointer;">
                                            Tạo Sản Phẩm
                                        </button>
                                    </div>
                                    <div class="boxFeature">
                                        <div style="width: 40%">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            <input class="input" placeholder="Tìm kiếm sản phẩm" />
                                        </div>
                                        <select style="height: 3rem; padding: 0.3rem">
                                            <option style="display: none">Nồng Độ Cồn</option>
                                            <option value="0">Mặc Định</option>
                                            <option value="1">Dưới 20%</option>
                                            <option value="2">20%-40%</option>
                                            <option value="3">40%-60%</option>
                                            <option value="4">Trên 60%</option>
                                        </select>
                                        <select style="height: 3rem; padding: 0.3rem">
                                            <option style="display: none">Dung Tích</option>
                                            <option value="0">Mặc Định</option>
                                            <option value="1">Dưới 250ML</option>
                                            <option value="2">250ML-500ML</option>
                                            <option value="3">500ML-1L</option>
                                            <option value="4">Trên 1L</option>
                                        </select>
                                        <select style="height: 3rem; padding: 0.3rem">
                                            <option style="display: none">Mức Giá</option>
                                            <option value="0">Mặc Định</option>
                                            <option value="1">Dưới 500k</option>
                                            <option value="2">500k-1tr</option>
                                            <option value="3">1tr-3tr</option>
                                            <option value="4">Trên 3tr</option>
                                        </select>
                                        <div style="margin-left: auto"></div>
                                    </div>
                                    <div class="boxTable">
                                        <table class="Table_table__BWPy">
                                            <thead class="Table_head__FTUog">
                                            <tr>
                                                <th class="Table_th__hCkcg">Mã Sản Phẩm</th>
                                                <th class="Table_th__hCkcg">Hình Ảnh</th>
                                                <th class="Table_th__hCkcg">Tên Sản Phẩm</th>
                                                <th class="Table_th__hCkcg">Giá Tiền</th>
                                                <th class="Table_th__hCkcg">Nồng Độ Cồn</th>
                                                <th class="Table_th__hCkcg">Dung Tích</th>
                                                <th class="Table_th__hCkcg">Xuất Xứ</th>
                                                <th class="Table_th__hCkcg">Số Lượng</th>
                                                <th class="Table_th__hCkcg">Trạng thái</th>
                                                <th class="Table_th__hCkcg">Thao Tác</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tableBody"></tbody>
                                        </table>
                                        <div class="pagination"></div>
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
<script>
    // JavaScript code here...
</script>
</html>
