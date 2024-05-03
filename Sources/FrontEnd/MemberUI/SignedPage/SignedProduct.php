<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="SignedProduct.css" />
    <link rel="stylesheet" href="SignedHomePage.css" />
    <title>Các sản phẩm</title>
</head>

<body>
    <?php require_once "../Header/SignedHeaderProduct.php" ?>

    <!-- Thanh lọc menu -->
    <div id="filter-menu">
        <label for="alcohol-filter">Nồng độ cồn:</label>
        <select id="alcohol-filter">
            <option value="">Tất cả</option>
            <option value="low">Dưới 40%</option>
            <option value="medium">Từ 40% đến 60%</option>
            <option value="high">Trên 60%</option>
        </select>

        <label for="price-filter">Giá:</label>
        <select id="price-filter">
            <option value="">Tất cả</option>
            <option value="low">Dưới 1 triệu</option>
            <option value="medium">Từ 1 đến 3 triệu</option>
            <option value="high">Trên 3 triệu</option>
        </select>

        <label for="volume-filter">Thể tích:</label>
        <select id="volume-filter">
            <option value="">Tất cả</option>
            <option value="low">Dưới 500ml</option>
            <option value="medium">Từ 500ml đến 1L</option>
            <option value="high">Trên 1L</option>
        </select>

        <label for="category-filter">Loại sản phẩm:</label>
        <select id="category-filter">
                <!-- Hiển thị menu LoaiSanPham -->

        </select>

        <button id="reset-button"><i class="fa-solid fa-rotate-right"></i></button>
    </div>

    <section id="product" style="padding: 0 5%;">
        <div class="products">
            <!-- Hiển thị vài sản phẩm nổi bật -->
        </div>
    </section>

    <div class="pagination" id="pagination"></div>

    <!-- Footer -->
    <?php require_once "../Footer/Footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Lắng nghe sự kiện click vào id "reset-button"
        document.getElementById("reset-button").addEventListener("click", function () {
            // Reset tất cả các thanh lọc về giá trị mặc định
            document.getElementById("searchSanPham").value = "";
            document.getElementById("alcohol-filter").value = "";
            document.getElementById("price-filter").value = "";
            document.getElementById("volume-filter").value = "";
            document.getElementById("category-filter").value = "";
            currentPage = 1;

            // Gọi lại hàm getAllSanPham với các giá trị mặc định
            getAllSanPham(currentPage, "", 0, 100000, 0, 1000000000, 0, 100, 0);
        });

        // Lắng nghe sự kiện keypress trên ô nhập liệu "price-filter"
        document.getElementById("price-filter").addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                // Thực hiện hành động tương tự như khi click vào nút "Lọc"
                document.getElementById("filter-button").click();
            }
        });

        function formatCurrency(number) {
            // Chuyển đổi số thành chuỗi và đảm bảo nó là số nguyên
            number = parseInt(number);

            // Sử dụng hàm toLocaleString() để định dạng số tiền
            // và thêm đơn vị tiền tệ "đ" vào cuối chuỗi
            return number.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }

        // Lắng nghe sự kiện change cho thanh lọc nồng độ cồn
        document.getElementById("alcohol-filter").addEventListener("change", function() {
            currentPage = 1;
            // Gọi lại hàm lọc sản phẩm khi giá trị thay đổi
            filterProducts(currentPage);
        });

        // Lắng nghe sự kiện change cho thanh lọc giá
        document.getElementById("price-filter").addEventListener("change", function() {
            currentPage = 1;

            // Gọi lại hàm lọc sản phẩm khi giá trị thay đổi
            filterProducts(currentPage);
        });

        // Lắng nghe sự kiện change cho thanh lọc thể tích
        document.getElementById("volume-filter").addEventListener("change", function() {
            currentPage = 1;

            // Gọi lại hàm lọc sản phẩm khi giá trị thay đổi
            filterProducts(currentPage);
        });

        // Lắng nghe sự kiện change cho thanh lọc loại sản phẩm
        document.getElementById("category-filter").addEventListener("change", function() {
            currentPage = 1;

            // Gọi lại hàm lọc sản phẩm khi giá trị thay đổi
            filterProducts(currentPage);
        });


        // Hàm lọc sản phẩm
        function filterProducts(page) {
            // Lấy giá trị từ thanh tìm kiếm
            var searchText = document.getElementById("searchSanPham").value;

            // Lấy giá trị từ thanh lọc nồng độ cồn
            var alcoholFilter = document.getElementById("alcohol-filter").value;
            var minAlcoholLevel, maxAlcoholLevel;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc nồng độ cồn
            switch (alcoholFilter) {
                case "low":
                    minAlcoholLevel = 0;
                    maxAlcoholLevel = 40;
                    break;
                case "medium":
                    minAlcoholLevel = 40;
                    maxAlcoholLevel = 60;
                    break;
                case "high":
                    minAlcoholLevel = 60;
                    maxAlcoholLevel = 100;
                    break;
                default:
                    minAlcoholLevel = 0;
                    maxAlcoholLevel = 100;
                    break;
            }

            // Lấy giá trị từ thanh lọc giá
            var priceFilter = document.getElementById("price-filter").value;
            var minPrice, maxPrice;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc giá
            switch (priceFilter) {
                case "low":
                    minPrice = 0;
                    maxPrice = 1000000;
                    break;
                case "medium":
                    minPrice = 1000000;
                    maxPrice = 3000000;
                    break;
                case "high":
                    minPrice = 3000000;
                    maxPrice = 1000000000; // Trên 3 triệu, không giới hạn
                    break;
                default:
                    minPrice = 0;
                    maxPrice = 1000000000; // Không giới hạn
                    break;
            }

            // Lấy giá trị từ thanh lọc thể tích
            var volumeFilter = document.getElementById("volume-filter").value;
            var minVolume, maxVolume;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc thể tích
            switch (volumeFilter) {
                case "low":
                    minVolume = 0;
                    maxVolume = 500;
                    break;
                case "medium":
                    minVolume = 500;
                    maxVolume = 1000;
                    break;
                case "high":
                    minVolume = 1000;
                    maxVolume = 100000; // Không giới hạn
                    break;
                default:
                    minVolume = 0;
                    maxVolume = 100000; // Không giới hạn
                    break;
            }

            // Lấy giá trị từ thanh lọc loại sản phẩm
            var categoryFilter = document.getElementById("category-filter").value;
            if (categoryFilter == "") {
                categoryFilter = 0;
            }

            // Gọi hàm lọc sản phẩm với các tham số vừa lấy được
            getAllSanPham(page, searchText, minVolume, maxVolume, minPrice, maxPrice, minAlcoholLevel, maxAlcoholLevel, categoryFilter);
        }

        // Lắng nghe sự kiện click vào nút search
        document.getElementById("filter-button").addEventListener("click", function(event) {
            currentPage = 1;
            event.preventDefault();

            // Lấy giá trị từ thanh tìm kiếm
            var searchText = document.getElementById("searchSanPham").value;

            // Lấy giá trị từ thanh lọc nồng độ cồn
            var alcoholFilter = document.getElementById("alcohol-filter").value;
            var minAlcoholLevel, maxAlcoholLevel;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc nồng độ cồn
            switch (alcoholFilter) {
                case "low":
                    minAlcoholLevel = 0;
                    maxAlcoholLevel = 40;
                    break;
                case "medium":
                    minAlcoholLevel = 40;
                    maxAlcoholLevel = 60;
                    break;
                case "high":
                    minAlcoholLevel = 60;
                    maxAlcoholLevel = 100;
                    break;
                default:
                    minAlcoholLevel = 0;
                    maxAlcoholLevel = 100;
                    break;
            }

            // Lấy giá trị từ thanh lọc giá
            var priceFilter = document.getElementById("price-filter").value;
            var minPrice, maxPrice;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc giá
            switch (priceFilter) {
                case "low":
                    minPrice = 0;
                    maxPrice = 1000000;
                    break;
                case "medium":
                    minPrice = 1000000;
                    maxPrice = 3000000;
                    break;
                case "high":
                    minPrice = 3000000;
                    maxPrice = 1000000000; // Trên 3 triệu, không giới hạn
                    break;
                default:
                    minPrice = 0;
                    maxPrice = 1000000000; // Không giới hạn
                    break;
            }


            // Lấy giá trị từ thanh lọc thể tích
            var volumeFilter = document.getElementById("volume-filter").value;
            var minVolume, maxVolume;

            // Thiết lập giá trị min và max dựa trên giá trị của thanh lọc thể tích
            switch (volumeFilter) {
                case "low":
                    minVolume = 0;
                    maxVolume = 500;
                    break;
                case "medium":
                    minVolume = 500;
                    maxVolume = 1000;
                    break;
                case "high":
                    minVolume = 1000;
                    maxVolume = 100000; // Không giới hạn
                    break;
                default:
                    minVolume = 0;
                    maxVolume = 100000; // Không giới hạn
                    break;
            }

            // Lấy giá trị từ thanh lọc loại sản phẩm
            var categoryFilter = document.getElementById("category-filter").value;
            if (categoryFilter == "") {
                categoryFilter = 0;
            }

            getAllSanPham(currentPage, searchText, minVolume, maxVolume, minPrice, maxPrice, minAlcoholLevel, maxAlcoholLevel, categoryFilter);
        });

        // Gọi hàm getAllLoaiSanPham khi trang được tải
        $(document).ready(function() {
            filterProducts(currentPage);
            getCategories();
        });


        var currentPage = 1;

        function getAllSanPham(page, search, minTheTich, maxTheTich, minGia, maxGia, minNongDoCon, maxNongDoCon, maLoaiSanPham) {
            // Gọi API để lấy dữ liệu sản phẩm
            $.ajax({
                url: "../../../BackEnd/ManagerBE/SanPhamBE.php",
                method: "GET",
                dataType: "json",
                data: {
                    isProductPage: true,
                    page: page,
                    search: search,
                    minTheTich: minTheTich,
                    maxTheTich: maxTheTich,
                    minGia: minGia,
                    maxGia: maxGia,
                    minNongDoCon: minNongDoCon,
                    maxNongDoCon: maxNongDoCon,
                    maLoaiSanPham: maLoaiSanPham
                },
                success: function(response) {
                    var productContainer = $('#product .products');
                    if (response.data && response.data.length > 0) {
                        // Tạo biến lưu trữ nội dung HTML mới
                        var htmlContent = '';
                        // Duyệt qua từng sản phẩm và tạo nội dung HTML tương ứng
                        $.each(response.data, function(index, product) {

                            var imageSrc = product.AnhMinhHoa;
                            htmlContent += `
                                    <div class="row">
                                        <a href="SignedProductDetail.php?maSanPham=${product.MaSanPham}&soLuong=${product.SoLuongConLai}">
                                            <img src="${imageSrc}" alt="" style="height: 300px;">
                                            <div class="product-card-content">
                                                <div class="price">
                                                    <h4 class="name-product">${product.TenSanPham}</h4>
                                                    <p class="price-tea">${formatCurrency(product.Gia)}</p>
                                                </div>
                                                <div class="buy-btn-container">
                                                    <a href="SignedProductDetail.php?maSanPham=${product.MaSanPham}&soLuong=${product.SoLuongConLai}">Xem chi tiết</a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                `;

                        });
                        // Trong hàm getAllSanPham, sau khi thay đổi nội dung HTML của sản phẩm, gọi lại hàm createPagination
                        productContainer.html(htmlContent);


                        // Đưa giao diện về đầu trang
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth' // Tuỳ chọn, nếu muốn di chuyển mượt hơn
                        });

                    } else {
                        // Hiển thị thông báo khi không có sản phẩm
                        productContainer.html('<p style="font-size: 24px; text-align: center; ">Không có sản phẩm nào.</p>');
                    }

                    createPagination(page, response.totalPages);

                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }



        // Hàm để gọi API và lấy danh sách loại sản phẩm



        // Hàm tạo nút phân trang
        function createPagination(currentPage, totalPages) {
            var paginationContainer = document.getElementById("pagination");

            // Xóa nút phân trang cũ (nếu có)
            paginationContainer.innerHTML = '';

            // Chỉ tạo phân trang khi totalPages > 1
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
                        // Gọi hàm filterProducts khi người dùng click vào nút phân trang
                        filterProducts(index + 1); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
                    });
                });

                // Đánh dấu trang hiện tại
                paginationContainer.querySelector('.pageButton:nth-child(' + currentPage + ')').classList.add('active');
            }
        }


        function getCategories() {
            $.ajax({
                url: "../../../BackEnd/ManagerBE/LoaiSanPhamBE.php",
                method: "GET",
                dataType: "json",
                data: {
                    isDemoHome: true
                },
                success: function(response) {
                    console.log(response);
                    var categoryFilter = $('#category-filter');
                    var htmlContent = '';

                    // Duyệt qua danh sách loại sản phẩm và tạo option cho select
                    $.each(response.data, function(index, category) {
                        htmlContent += `<option value="${category.MaLoaiSanPham}">${category.TenLoaiSanPham}</option>`;
                    });

                    // Thêm tùy chọn "Tất cả"
                    htmlContent = '<option value="">Tất cả</option>' + htmlContent;

                    // Thiết lập nội dung HTML cho select
                    categoryFilter.html(htmlContent);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }
    </script>
</body>

</html>
