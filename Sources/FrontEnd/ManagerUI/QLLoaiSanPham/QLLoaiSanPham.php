<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="./tableAddProduct.css" />
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
                >
                  <path
                    fill="currentColor"
                    d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"
                  ></path>
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
                  <div
                    style="padding-left: 16%; width: 100%; padding-right: 2rem"
                  >
                    <div class="wrapper">
                      <div
                        style="
                          display: flex;
                          padding-top: 1rem;
                          padding-bottom: 1rem;
                        "
                      >
                        <h2>Phiếu Nhập Kho</h2>
                        <div style="margin-left: auto">
                          <button
                            style="
                              font-family: Arial;
                              font-size: 1.5rem;
                              font-weight: 700;
                              color: white;
                              color: rgb(65, 64, 64);
                              border: 1px solid rgb(65, 64, 64);
                              background-color: white;
                              padding: 1rem;
                              border-radius: 0.6rem;
                              cursor: pointer;
                            "
                            onclick="navigate('/system/manager/inventory')"
                          >
                            Hủy
                          </button>
                          <button
                            style="
                              margin-left: 1rem;
                              font-family: Arial;
                              font-size: 1.5rem;
                              font-weight: 700;
                              color: white;
                              background-color: rgb(65, 64, 64);
                              padding: 1rem;
                              border-radius: 0.6rem;
                              cursor: pointer;
                            "
                            onclick="setShowModal(true)"
                          >
                            Thêm Sản Phẩm
                          </button>
                        </div>
                      </div>
                      <div class="boxFeature">
                        <select
                          style="height: 3rem; padding: 0.3rem; width: 50rem"
                        >
                          <option defaultChecked style="display: block">
                            Nhà Cung Cấp
                          </option>
                        </select>
                        <button
                          style="
                            margin-left: auto;
                            font-family: Arial;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: white;
                            background-color: rgb(65, 64, 64);
                            padding: 1rem;
                            border-radius: 0.6rem;
                            cursor: pointer;
                          "
                          onclick="handleSubmit()"
                        >
                          Lưu
                        </button>
                      </div>
                      <div class="boxTable">
                        <div
                          style="
                            background-color: rgb(236, 233, 233);
                            width: 75%;
                          "
                        >
                          <table
                            style="
                              border-collapse: collapse;
                              width: 100%;
                              margin-top: 1rem;
                              border-radius: 1rem;
                            "
                          >
                            <thead>
                              <tr
                                style="
                                  background-color: rgb(40, 40, 40);
                                  color: white;
                                "
                              >
                                <th style="padding: 0.5rem">Mã Sản Phẩm</th>
                                <th style="padding: 0.5rem">Hình Ảnh</th>
                                <th style="padding: 0.5rem">Tên Sản Phẩm</th>
                                <th style="padding: 0.5rem">Thao Tác</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td
                                  colspan="4"
                                  style="
                                    text-align: center;
                                    font-weight: 700;
                                    padding: 1rem;
                                  "
                                >
                                  Không tìm thấy bất kì phiếu nào
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div
                          style="
                            width: 25%;
                            background-color: rgb(236, 233, 233);
                            padding: 1rem;
                          "
                        >
                          <label>
                            <p style="font-size: 1.3rem; font-weight: 700">
                              Mã Phiếu
                            </p>
                            <input
                              style="
                                height: 3rem;
                                padding: 0.5rem;
                                width: 100%;
                                background-color: white;
                                font-weight: 700;
                                margin-top: 0.5rem;
                              "
                              value=""
                              disabled="true"
                            />
                          </label>
                          <label>
                            <p
                              style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                margin-top: 1rem;
                              "
                            >
                              Tên Người Quản Lý
                            </p>
                            <select
                              style="
                                height: 3rem;
                                padding: 0.5rem;
                                width: 100%;
                                background-color: white;
                                font-weight: 700;
                                margin-top: 0.5rem;
                              "
                              disabled="true"
                            >
                              <option defaultChecked value="">
                                Chọn Quản Lý
                              </option>
                            </select>
                          </label>
                          <label>
                            <p
                              style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                margin-top: 1rem;
                              "
                            >
                              Tổng Giá Trị
                            </p>
                            <input
                              style="
                                height: 3rem;
                                padding: 0.5rem;
                                width: 100%;
                                background-color: white;
                                font-weight: 700;
                                margin-top: 0.5rem;
                              "
                              value=""
                              disabled="true"
                            />
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="modal_overlay">
                      <div class="modal_content">
                        <span class="close_btn">
                          <h3>Chọn Sản Phẩm</h3>
                          <i onclick="setShowModal(false)">X</i>
                        </span>
                        <div style="margin-top: 1rem">
                          <div style="position: relative">
                            <i class="fa fa-search"></i>
                            <input
                              class="input"
                              placeholder="Tìm kiếm phiếu nhập kho"
                            />
                          </div>
                          <table
                            style="
                              border-collapse: collapse;
                              width: 100%;
                              margin-top: 1rem;
                              border-radius: 1rem;
                            "
                          >
                            <thead>
                              <tr
                                style="
                                  background-color: rgb(40, 40, 40);
                                  color: white;
                                "
                              >
                                <th style="padding: 0.5rem">Mã Sản Phẩm</th>
                                <th style="padding: 0.5rem">Hình Ảnh</th>
                                <th style="padding: 0.5rem">Tên Sản Phẩm</th>
                                <th style="padding: 0.5rem">Thao Tác</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr style="text-align: center">
                                <td style="padding: 0.5rem">1</td>
                                <td style="padding: 0.5rem">hinh_anh.png</td>
                                <td style="padding: 0.5rem">Sản Phẩm 1</td>
                                <td style="padding: 0.5rem">
                                  <input type="checkbox" />
                                </td>
                              </tr>
                              <tr
                                style="
                                  text-align: center;
                                  background-color: rgb(233, 233, 233);
                                "
                              >
                                <td style="padding: 0.5rem">2</td>
                                <td style="padding: 0.5rem">hinh_anh.png</td>
                                <td style="padding: 0.5rem">Sản Phẩm 2</td>
                                <td style="padding: 0.5rem">
                                  <input type="checkbox" />
                                </td>
                              </tr>
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
    </div>
  </body>
</html>
