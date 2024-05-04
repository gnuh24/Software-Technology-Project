<!DOCTYPE html>
<html lang="en">
<head>
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
            background-color: rgb(65, 64, 64);
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
    </style>
</head>
<body>
    <div id="root">
        <div>
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
                                                <th>Hình Ảnh</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Giá Tiền</th>
                                                <th>Nồng Độ Cồn</th>
                                                <th>Dung Tích</th>
                                                <th>Xuất Xứ</th>
                                                <th>Số Lượng</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTable">
                                            <!-- Dữ liệu sản phẩm sẽ được thêm vào đây -->
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
// Get reference to the button that triggers modal
var createProductBtn = document.getElementById('createProductBtn');

// Get reference to modal
var modal = document.getElementById('createProductModal');

// When the user clicks on the button, open the modal
createProductBtn.addEventListener('click', function() {
    modal.style.display = 'block';
});

// Handle form submission for creating a product
var createProductForm = document.getElementById('createProductForm');
createProductForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Get form input values
    var productName = document.getElementById('productName').value;

    // Check if any of the fields are empty
    if (productName.trim() === '') {
        alert('Vui lòng nhập tên sản phẩm.');
        return; // Don't proceed further
    }

    // Check if product with the same name already exists
    var productRows = document.querySelectorAll('#productTable tbody tr');
    for (var i = 0; i < productRows.length; i++) {
        var existingProductName = productRows[i].querySelector('td:nth-child(3)').textContent;
        if (existingProductName.trim().toLowerCase() === productName.trim().toLowerCase()) {
            alert('Sản phẩm đã tồn tại trong danh sách.');
            return; // Don't proceed further
        }
    }

    // Proceed with creating the product
    var productID = document.getElementById('productID').value;
    var productPrice = document.getElementById('productPrice').value;
    var alcoholContent = document.getElementById('alcoholContent').value;
    var productVolume = document.getElementById('productVolume').value;
    var productOrigin = document.getElementById('productOrigin').value;
    var productQuantity = document.getElementById('productQuantity').value;

    // Check if any of the fields are empty
    if (productID.trim() === '' || productPrice.trim() === '' || alcoholContent.trim() === '' || productVolume.trim() === '' || productOrigin.trim() === '' || productQuantity.trim() === '') {
        alert('Vui lòng điền đầy đủ thông tin sản phẩm.');
        return; // Don't proceed further
    }

    // Create new table row
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${productID}</td>
        <td><img src="product_image.jpg" alt="Hình Ảnh Sản Phẩm"></td>
        <td>${productName}</td>
        <td>${productPrice}</td>
        <td>${alcoholContent}</td>
        <td>${productVolume}</td>
        <td>${productOrigin}</td>
        <td>${productQuantity}</td>
        <td><button>Edit</button></td>
    `;

    // Append the new row to the table
    var productTable = document.getElementById('productTable');
    productTable.appendChild(newRow);

    // Close the modal
    modal.style.display = 'none';

    // Send data to server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'SanPhamBE.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            // Response from server
            var response = JSON.parse(xhr.responseText);
            if (response.status === 200) {
                alert('Sản phẩm đã được tạo thành công!');
                // You can optionally reload or update the product list here
            } else {
                alert('Đã xảy ra lỗi: ' + response.message);
            }
        }
    };
    // Send the data as URL-encoded form data
    xhr.send('productID=' + encodeURIComponent(productID) +
             '&productName=' + encodeURIComponent(productName) +
             '&productPrice=' + encodeURIComponent(productPrice) +
             '&alcoholContent=' + encodeURIComponent(alcoholContent) +
             '&productVolume=' + encodeURIComponent(productVolume) +
             '&productOrigin=' + encodeURIComponent(productOrigin) +
             '&productQuantity=' + encodeURIComponent(productQuantity));
});

// Get references to close button
var closeButton = document.querySelector('#createProductModal .close');

// When the user clicks on close button, close the modal
closeButton.addEventListener('click', function() {
    modal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});    

// Dựa vào dữ liệu sản phẩm từ server, thêm từng sản phẩm vào bảng
// Gửi yêu cầu AJAX để lấy dữ liệu sản phẩm từ server
var xhr = new XMLHttpRequest();
xhr.open('GET', 'SanPhamBE.php', true);
xhr.onreadystatechange = function() {
    if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
        // Xử lý dữ liệu trả về từ server
        var products = JSON.parse(xhr.responseText);
        if (products.length > 0) {
            // Duyệt qua từng sản phẩm và thêm vào bảng
            products.forEach(function(product) {
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${product.productID}</td>
                    <td><img src="${product.imageURL}" alt="Hình Ảnh Sản Phẩm"></td>
                    <td>${product.productName}</td>
                    <td>${product.productPrice}</td>
                    <td>${product.alcoholContent}</td>
                    <td>${product.productVolume}</td>
                    <td>${product.productOrigin}</td>
                    <td>${product.productQuantity}</td>
                    <td><button>Edit</button></td>
                `;
                var productTable = document.getElementById('productTable');
                productTable.appendChild(newRow);
            });
        } else {
            // Hiển thị thông báo nếu không có sản phẩm nào
            alert('Không có sản phẩm nào được tìm thấy.');
        }
    }
};
xhr.send();

</script>

</body>
</html>
