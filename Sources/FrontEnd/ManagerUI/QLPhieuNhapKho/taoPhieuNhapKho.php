<?php
if (isset($_GET['MaPhieu'])) {
    require_once "../../../BackEnd/ManagerBE/ChiTietPhieuNhapKhoBE.php";
    $result = getAllChiTietphieunhapkho(1, $_GET['MaPhieu'], null);
    $totalPage = $result->totalPages;
    $Ketqua1 = $result->data;
    $MaNCC;
    foreach ($Ketqua1 as $record) {
        $MaNCC = $record['MaNCC'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../adminDemo.css" />
    <link rel="stylesheet" href="taoPhieuNhapKho.css" />
    <title>Document</title>
</head>

<body>
    <div id="root">
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
                        <a class="MenuItemSidebar_menuItem__56b1m" href="QLPhieuNhapKho.php">
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

                    <div style="padding-left: 16%; width: 100%; padding-right: 2rem">
                        <div class="wrapper">
                            <div style="display: flex; padding-top: 1rem; padding-bottom: 1rem;">
                                <h2>Phiếu Nhập Kho</h2>
                                <div style="margin-left: auto;">
                                    <button style="font-family: Arial; font-size: 1.5rem; font-weight: 700; color: white; color: rgb(65, 64, 64); border: 1px solid rgb(65, 64, 64); background-color: white; padding: 1rem; border-radius: 0.6rem; cursor: pointer;" onclick="navigate('/system/manager/inventory')">
                                        <a href="QLPhieuNhapKho.php">
                                            <?php
                                            if (!isset($_GET['MaPhieu'])) echo 'Hủy';
                                            else echo 'Quay lại';
                                            ?>
                                        </a>
                                    </button>
                                    <?php
                                    if (!isset($_GET['MaPhieu']))
                                        echo '
                                        <button style="margin-left: 1rem; font-family: Arial; font-size: 1.5rem; font-weight: 700; color: white; background-color: rgb(65, 64, 64); padding: 1rem; border-radius: 0.6rem; cursor: pointer;" onclick="setShowModal(true)">
                                            Thêm Sản Phẩm
                                        </button>';
                                    ?>
                                </div>
                            </div>
                            <div class="boxFeature">
                                <select style="height: 3rem; padding: 0.3rem; width: 50rem;" id="manhacungcap" <?php if (isset($_GET['MaPhieu'])) echo 'disabled="true"'; ?>>
                                    <option defaultChecked style="display: block;">
                                        Nhà Cung Cấp
                                        <?php
                                        require_once "../../../BackEnd/ManagerBE/NhaCungCapBE.php";

                                        $result = getAllNhaCungCap();
                                        $result1 = $result->data;
                                        foreach ($result1 as $Ketqua) {
                                            if (isset($_GET['MaPhieu'])) {
                                                if ($Ketqua["MaNCC"] == $MaNCC)
                                                    echo '<option value="' . $Ketqua["MaNCC"] . '" selected>' . $Ketqua["TenNCC"] . '</option>';
                                                else
                                                    echo '<option value="' . $Ketqua["MaNCC"] . '">' . $Ketqua["TenNCC"] . '</option>';
                                            } else {
                                                echo '<option value="' . $Ketqua["MaNCC"] . '">' . $Ketqua["TenNCC"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </option>
                                </select>
                                <button style="margin-left: auto; font-family: Arial; font-size: 1.5rem; font-weight: 700; color: white; background-color: rgb(65, 64, 64); padding: 1rem; border-radius: 0.6rem; cursor: pointer;" onclick="handleSubmit()">
                                    Lưu
                                </button>
                            </div>
                            <div class="boxTable">
                                <div style="background-color: rgb(236, 233, 233); width: 75%;">
                                    <table style="border-collapse: collapse; width: 100%; margin-top: 1rem; border-radius: 1rem;">
                                        <thead>
                                            <tr style="background-color: rgb(40, 40, 40); color: white;">
                                                <th style="padding: 0.5rem;">Mã Sản Phẩm</th>
                                                <th style="padding: 0.5rem;">Tên Sản Phẩm</th>
                                                <th style="padding: 0.5rem;">Đơn giá</th>
                                                <th style="padding: 0.5rem;">Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <?php
                                            require_once "../../../BackEnd/ManagerBE/ChiTietPhieuNhapKhoBE.php";

                                            if (isset($_GET['MaPhieu'])) {
                                                $data = getChiTietPhieuNhapByMaPhieuNhap($_GET["MaPhieu"]);
                                                $data1 = $data->data;
                                                if (!empty($data1)) {
                                                    foreach ($data1 as $tmp) {
                                                        echo '<tr style="text-align: center;">
                                                                <td style="padding: 0.5rem; name=MaSanPham[]">' . $tmp['MaSanPham'] . '</td>
                                                                <td style="padding: 0.5rem;">' . $tmp['TenSanPham'] . '</td>
                                                                <td style="padding: 0.5rem;"><input type="text" name="donGia[]" value="' . $tmp['DonGiaNhap'] . '" disabled="true" style=" height: 3rem; padding: 0.5rem; width: 100%; background-color: white; font-weight: 700; margin-top: 0.5rem;text-align: right;" ></td>
                                                                <td style="padding: 0.5rem;"><input type="text" name="soLuong[]" value="' . $tmp['SoLuong'] . '" disabled="true" style=" height: 3rem; padding: 0.5rem; width: 100%; background-color: white; font-weight: 700; margin-top: 0.5rem;text-align: right;"></td>
                                                            </tr>';
                                                    }
                                                }
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div style="width: 25%; background-color: rgb(236, 233, 233); padding: 1rem;">
                                    <label>
                                        <p style="font-size: 1.3rem; font-weight: 700;">Mã Phiếu</p>
                                        <input style="height: 3rem; padding: 0.5rem; width: 100%; background-color: white; font-weight: 700; margin-top: 0.5rem;" value="<?php if (isset($_GET['MaPhieu'])) echo $_GET['MaPhieu']; ?>" disabled="true" />
                                    </label>
                                    <label>
                                        <p style="font-size: 1.3rem; font-weight: 700; margin-top: 1rem;">Tên Người Quản Lý</p>
                                        <select id="maquanly" style="height: 3rem; padding: 0.5rem; width: 100%; background-color: white; font-weight: 700; margin-top: 0.5rem;" <?php if (isset($_GET['MaPhieu'])) echo 'disabled="true"';  ?>>
                                            <?php
                                            require_once "../../../BackEnd/AdminBE/TaiKhoanBE.php";
                                            $result = getAllTaiKhoan1("Manager");
                                            $result1 = $result->data;
                                            foreach ($result1 as $Ketqua) {
                                                if (isset($_GET['MaQuanLy']))
                                                    if ($_GET['MaQuanLy'] == $Ketqua["MaTaiKhoan"])
                                                        echo '
                                                            <option value="' . $Ketqua["MaTaiKhoan"] . '" selected>' . $Ketqua["HoTen"] . '</option>
                                                            ';
                                                    else
                                                        echo '
                                                            <option value="' . $Ketqua["MaTaiKhoan"] . '" >' . $Ketqua["HoTen"] . '</option>
                                                            ';
                                                else
                                                    echo '
                                                        <option value="' . $Ketqua["MaTaiKhoan"] . '" >' . $Ketqua["HoTen"] . '</option>
                                                        ';
                                            }
                                            ?>
                                        </select>
                                    </label>
                                    <label>
                                        <p style="font-size: 1.3rem; font-weight: 700; margin-top: 1rem;">Tổng Giá Trị</p>
                                        <input id="totalvalue" style=" height: 3rem; padding: 0.5rem; width: 100%; background-color: white; font-weight: 700; margin-top: 0.5rem;" value="<?php if(isset($_GET['MaPhieu'])) echo $_GET['TongTien'];?>" disabled="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_GET['MaPhieu'])) {
        echo '
        <div class="modal_overlay">
            <div class="modal_content">
                <!-- Đầu modal_content -->
                <span class="close_btn">
                    <h3>Chọn Sản Phẩm</h3>
                    <i onclick="setShowModal(false)">X</i>
                </span>
                <div style="margin-top: 1rem;">
                    <div style="position: relative;">
                        <i class="fa fa-search"></i>
                        <input class="input" placeholder="Tìm kiếm sản phẩm" id="timkiemsp" />
                    </div>
                    <div class="table_wrapper"> <!-- Thêm một wrapper cho bảng sản phẩm -->
                        <table class="product_table"> <!-- Đặt một lớp mới cho bảng sản phẩm -->
                            <!-- Phần head của bảng -->
                            <thead>
                                <tr style="background-color: rgb(40, 40, 40); color: white;">
                                    <th style="padding: 0.5rem;">Mã Sản Phẩm</th>
                                    <th style="padding: 0.5rem;width: 477px;">Tên Sản Phẩm</th>
                                    <th style="padding: 0.5rem;">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody1">                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>';
    };
    ?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Function to handle form submission
    function handleSubmit() {
        var maNhaCungCap = document.getElementById('manhacungcap').value;
        var maQuanLy = document.getElementById('maquanly').value;
        var totalValue = document.getElementById('totalvalue').value;
        var productData = [];

        $('#tableBody tr').each(function() {
            var maSanPham = $(this).find('td:nth-child(1)').text().trim();
            var tenSanPham = $(this).find('td:nth-child(2)').text().trim();
            var donGia = $(this).find('td:nth-child(3) input').val().trim();
            var soLuong = $(this).find('td:nth-child(4) input').val().trim();

            var productItem = {
                'MaSanPham': maSanPham,
                'TenSanPham': tenSanPham,
                'DonGia': donGia,
                'SoLuong': soLuong
            };

            productData.push(productItem);
        });

        $.ajax({
            type: 'GET',
            url: 'xulyPhieuNhapKho.php',
            data: {
                'MaNhaCungCap': maNhaCungCap,
                'MaQuanLy': maQuanLy,
                'TotalValue': totalValue,
                'ProductData': JSON.stringify(productData)
            },
            success: function(response) {
                if(response.includes("Phiếu nhập kho đã được tạo thành công."))
                window.location.href = 'QLPhieuNhapKho.php';

            },
            error: function(xhr, status, error) {
                console.error('Đã xảy ra lỗi khi gửi yêu cầu.');
            }
        });
    }

    // Function to toggle modal display
    function setShowModal(show) {
        var modalOverlay = document.querySelector('.modal_overlay');
        modalOverlay.style.display = show ? '' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        loaddatasp();
        calculateTotalPrice();
        setInterval(calculateTotalPrice, 3000);

        function calculateTotalPrice() {
            var totalPrice = 0;
            var tableRows = document.querySelectorAll('#tableBody tr');
            tableRows.forEach(function(row) {
                var quantityCell = row.querySelector('td:nth-child(4) input');
                var priceCell = row.querySelector('td:nth-child(3) input');
                if (quantityCell && priceCell) {
                    var quantity = parseInt(quantityCell.value);
                    var price = parseFloat(priceCell.value);
                    if (!isNaN(quantity) && !isNaN(price)) {
                        totalPrice += quantity * price;
                    }
                }
            });

            var totalPriceElement = document.getElementById('totalvalue');
            if (totalPriceElement) {
                totalPriceElement.value = totalPrice;
            }
        }
    });

    // Change event listener for checkbox
    $(document).on('change', '.product_checkbox', function() {
        $('#tableBody').empty();
        $('.product_checkbox').each(function() {
            if ($(this).prop('checked')) {
                var productId = $(this).attr('id');
                var productName = $(this).closest('tr').find('td:eq(1)').text().trim();

                var selectedProductHTML = '<tr style="text-align: center;">' +
                    '<td style="padding: 0.5rem; name=MaSanPham[]">' + productId + '</td>' +
                    '<td style="padding: 0.5rem;">' + productName + '</td>' +
                    '<td style="padding: 0.5rem;"><input type="text" name="donGia[]" value="" style="height: 3rem; padding: 0.5rem; width: 100%; background-color: white; font-weight: 700; margin-top: 0.5rem;text-align: right;"></td>' +
                    '<td style="padding: 0.5rem;"><input type="text" name="soLuong[]" value="" style="height: 3rem; padding: 0.5rem; width: 100%; background-color: white; font-weight: 700; margin-top: 0.5rem;text-align: right;"></td>' +
                    '</tr>';
                $('#tableBody').append(selectedProductHTML);
            }
        });
    });

    // Function to load product data
    function loaddatasp() {
        $('#tableBody1').empty();
        $.ajax({
            url: '../../../BackEnd/ManagerBE/SanPhamBE.php',
            type: 'GET',
            dataType: "json",
            data: {
                search: timkiemsp.value
            },
            success: function(response) {
                var data = response.data;
                var tableBody = document.getElementById("tableBody1");
                var tableContent = "";
                data.forEach(function(record) {
                    var trContent = `
                    <tr style="text-align: center;">
                        <td style="padding: 0.5rem;">${record['MaSanPham']}</td>
                        <td style="padding: 0.5rem;">${record['TenSanPham']}</td>
                        <td style="padding: 0.5rem;">
                            <input type="checkbox" class="product_checkbox" id="${record['MaSanPham']}"/>
                        </td>
                    </tr>`;

                    tableContent += trContent;
                });

                tableBody.innerHTML = tableContent;
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi gọi API: ', error);
            }
        });
    }

    // Function to search products
    function searchProducts(keyword) {
        keyword = keyword.toLowerCase();
        var tableRows = document.querySelectorAll('#tableBody1 tr');
        tableRows.forEach(function(row) {
            var productName = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
            if (productName.includes(keyword)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Event listener for search input
    var timkiemsp = document.getElementById('timkiemsp');
    timkiemsp.addEventListener('input', function() {
        var searchKeyword = this.value.trim();
        searchProducts(searchKeyword);
    });
</script>