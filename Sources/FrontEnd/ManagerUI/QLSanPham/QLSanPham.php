<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="QLSanPham.css" />
    <title>Quản lý sản phẩm</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .wrapper {
            padding-left: 16%;
            width: 100%;
            padding-right: 2rem;
        }
        .wrapper > div {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .wrapper > div h2 {
            margin: 0;
        }
        #createProductBtn {
            font-family: Arial;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            background-color: rgba(0,0,0,0.5);
            padding: 1rem;
            border-radius: 0.6rem;
            cursor: pointer;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .boxtable {
        margin-top: 1rem;
        overflow-y: auto;
        background-color: white; /* Thay đổi màu nền thành màu trắng */
        height: 48rem;
        border-radius: 0.3rem;
    }
    /* CSS cho modal chỉnh sửa */
#editProductModal {
    display: none; /* Ẩn modal mặc định */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    overflow: auto;
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div id="root">
        <div>
            <!-- Modal chỉnh sửa sản phẩm -->
            <div id="editProductModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Chỉnh sửa sản phẩm</h2>
                    <form id="editProductForm">
                        <label for="productName">Tên Sản Phẩm:</label><br>
                        <input type="text" id="productName" name="productName"><br>

                        <label for="productPrice">Giá Tiền:</label><br>
                        <input type="text" id="productPrice" name="productPrice"><br>

                        <label for="alcoholContent">Nồng Độ Cồn:</label><br>
                        <input type="text" id="alcoholContent" name="alcoholContent"><br>

                        <label for="productVolume">Dung Tích:</label><br>
                        <input type="text" id="productVolume" name="productVolume"><br>

                        <label for="productOrigin">Xuất Xứ:</label><br>
                        <input type="text" id="productOrigin" name="productOrigin"><br>

                        <label for="productQuantity">Số Lượng:</label><br>
                        <input type="text" id="productQuantity" name="productQuantity"><br>

                        <button type="submit">Lưu</button>

                        <button id="closeEditModal" type="button">Đóng</button>
                    </form>
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
                                        <button id="createProductBtn">Tạo Sản Phẩm</button>
                                    </div>
                                    <div class="boxFeature">
                                        <div style="position: relative">
                                            <span class="icon"></span>
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
                                    <table>
                                    <thead>
                                            <tr>
                                                <th>Mã Sản Phẩm</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Giá Tiền</th>
                                                <th>Nồng Độ Cồn (%)</th>
                                                <th>Dung Tích (đơn vị: ml)</th>
                                                <th>Xuất Xứ</th>
                                                <th>Số Lượng</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody"></tbody>
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

    <!-- Modal -->
    <div id="createProductModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="createProductForm">
                
                <label for="productID">Mã Sản Phẩm:</label><br>
                <input type="text" id="productID" name="productID"><br>

                <label for="productName">Tên Sản Phẩm:</label><br>
                <input type="text" id="productName" name="productName"><br>

                <label for="productPrice">Giá Tiền:</label><br>
                <input type="text" id="productPrice" name="productPrice"><br>

                <label for="alcoholContent">Nồng Độ Cồn:</label><br>
                <input type="text" id="alcoholContent" name="alcoholContent"><br>

                <label for="productVolume">Dung Tích:</label><br>
                <input type="text" id="productVolume" name="productVolume"><br>

                <label for="productOrigin">Xuất Xứ:</label><br>
                <input type="text" id="productOrigin" name="productOrigin"><br>

                <label for="productQuantity">Số Lượng:</label><br>
                <input type="text" id="productQuantity" name="productQuantity"><br><br>

                <button type="submit">Tạo</button>
            </form>
        </div>
    </div>
    <script>
var editingProductId = null;

function getAllSanPham(page, search) {
    $.ajax({
        url: 'http://localhost/Software-Technology-Project/Sources/BackEnd/ManagerBE/SanPhamBE.php',
        type: 'GET',
        dataType: "json",
        data: {
            page: page,
            search: search
        },
        success: function(response) {
            var data = response.data;
            var tableBody = document.getElementById("tableBody");
            var tableContent = "";

            data.forEach(function(record, index) {
                var trContent = `
                    <tr>
                        <td>${record.MaSanPham}</td>
                        <td>${record.TenSanPham}</td>
                        <td>${record.Gia}</td>
                        <td>${record.NongDoCon}</td>
                        <td>${record.TheTich}</td>
                        <td>${record.XuatXu}</td>
                        <td>${record.SoLuongConLai}</td>
                        <td>
                            ${record.TrangThai === 1 ?
                                `<button onclick="toggleProduct(${record.MaSanPham}, ${record.TrangThai})">Khóa</button>` :
                                `<button onclick="openEditModal(${record.MaSanPham})">Edit</button>`
                            }
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

document.addEventListener('DOMContentLoaded', function() {
    getAllSanPham(1, '');
});

function toggleProduct(productId, productStatus) {
    if (productStatus === 1) {
        updateProductStatus(productId, 0);
    } else {
        updateProductStatus(productId, 1);
    }
}

function updateProductStatus(productId, newStatus) {
    console.log('Cập nhật trạng thái sản phẩm có ID', productId, 'thành', newStatus);
    updateUIAfterStatusChange(productId, newStatus);
}

function updateUIAfterStatusChange(productId, newStatus) {
    var button = document.querySelector(`button[data-product-id="${productId}"]`);
    if (button) {
        button.innerText = newStatus === 1 ? 'Khóa' : 'Mở';
        if (newStatus === 1) {
            button.setAttribute('onclick', `openEditModal(${productId})`);
        }
    }
}
// Function to open the edit modal and populate it with product data
// Function to open the edit modal and populate it with product data
function openEditModal(productId) {
    $.ajax({
        url: 'http://localhost/Software-Technology-Project/Sources/BackEnd/ManagerBE/SanPhamBE.php',
        type: 'GET',
        dataType: 'json',
        data: {
            MaSanPham: productId
        },
        success: function(response) {
            var productData = response.data;
            $('#productId').val(productId);
            $('#productName').val(productData.TenSanPham);
            $('#productOrigin').val(productData.XuatXu);
            $('#productBrand').val(productData.ThuongHieu);
            $('#productVolume').val(productData.TheTich);
            $('#alcoholContent').val(productData.NongDoCon);
            $('#productPrice').val(productData.Gia);
            $('#productQuantity').val(productData.SoLuongConLai);
            $('#productImage').val(productData.AnhMinhHoa);
            $('#editProductModal').css('display', 'block');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching product data: ', error);
        }
    });
}

</script>


</body>
</html>
