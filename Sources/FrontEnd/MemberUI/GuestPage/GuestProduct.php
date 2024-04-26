
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="HomePage.css" />
        <link rel="stylesheet" href="login.css" />
        <title>Các sản phẩm</title>
    </head>

    <body>
        <header class="Home-container-header">
            <div id="Home-over-Header">
                <img id="Home-img" src="img/logoWine.jpg" alt="" />
                <form class="input__wrapper">
                    <input
                        type="text"
                        class="search-input"
                        placeholder="Tìm kiếm"
                        required=""
                    />
                </form>
                <div id="Home-login">Login</div>
            </div>
            <div class="Home-Header-Container">
                <ul class="Home-navigation">
                  
                </ul>
            </div>
        </header>

        <section id="product" style="padding: 0 5%;">
            <div class="products">
                <!-- Hiển thị vài sản phẩm nổi bật -->
            </div>

        </section>

        <!-- Footer -->
        <section id="footer">
        <div class="contact-info">
            <div class="first-info">
            <div style="font-size: 20px;">Thông tin liên hệ</div>
            <div class="map">
                <i class="fa-solid fa-location-dot"></i>
                <span>An Dương Vương, Phường 3, Quận 5</span>
            </div>
            <div class="phone">
                <i class="fa-solid fa-phone-volume"></i>
                <span>0325459901</span>
            </div>
            <div class="mail">
                <i class="fa-solid fa-envelope"></i>
                <span>doanhdaigr5.2004@gmail.com</span>
            </div>
            </div>
            <div class="second-info">
            <h4>CHÍNH SÁCH</h4>
            <ul>
                <li><a href="#">Chính sách bảo mật</a></li>
                <li><a href="#">Chính sách giao hàng</a></li>
                <li><a href="#">Chính sách thẻ thành viên</a></li>
                <li><a href="#">Điều khoản sử dụng</a></li>
            </ul>
            </div>
            <div class="third-info">
            <h4>ABOUT US</h4>
            <ul>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Tuyển dụng</a></li>
                <li><a href="#">Nhượng quyền</a></li>
                <li><a href="#">Tin tức</a></li>
            </ul>
            </div>
            <div class="fourth">
            <h4>FOLOW US</h4>
            <a href="https://www.facebook.com/doanhdai.2004"><i id="fb" class="fa-brands fa-facebook" id="fb"></i></a>
            <a href="https://www.instagram.com"><i id="ig" class="fa-brands fa-instagram"></i></a>
            <a href="https://github.com/ltgiai/DO_AN_WEBSITE/tree/main"><i id="git" class="fa-brands fa-github"></i></a>
            <a href="https://twitter.com/?lang=vi"><i id="tw" class="fa-brands fa-square-twitter"></i></a>
            <a href="http://online.gov.vn/Home/WebDetails/36260"><img src="#" alt="" /></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyrights © 2019 by comebuy_vn. All rights reserved.</p>
        </div>
        </section>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        function formatCurrency(number) {
            // Chuyển đổi số thành chuỗi và đảm bảo nó là số nguyên
            number = parseInt(number);

            // Sử dụng hàm toLocaleString() để định dạng số tiền
            // và thêm đơn vị tiền tệ "đ" vào cuối chuỗi
            return number.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }


        // Lắng nghe sự kiện click vào id "Home-login"
        document
          .getElementById("Home-login")
          .addEventListener("click", function () {
             window.location.href = '../Login/LoginUI.php';
        });

        // Gọi hàm getAllLoaiSanPham khi trang được tải
        $(document).ready(function() {
            getAllSanPham();
        });


        // Hàm getAllSanPham
        function getAllSanPham() {
            // Gọi API để lấy dữ liệu sản phẩm
            $.ajax({
                url: "../../../BackEnd/ManagerBE/SanPhamBE.php",
                method: "GET",
                dataType: "json",

                data: {
                    isDemoHome: true
                },
                success: function(response) {
                    console.log(response);
                    var productContainer = $('#product .products');
                    if (response.data && response.data.length > 0) {
                        // Tạo biến lưu trữ nội dung HTML mới
                        var htmlContent = '';
                        // Duyệt qua từng sản phẩm và tạo nội dung HTML tương ứng
                        $.each(response.data, function(index, product) {
                        
                            var imageSrc = product.AnhMinhHoa;
                            htmlContent += `
                                <div class="row">
                                    <a href="../Login/LoginUI.php">
                                        <img src="${imageSrc}" alt="" style=" height: 300px;">
                                        <div class="product-card-content">
                                            <div class="price">
                                                <h4 class="name-product">${product.TenSanPham}</h4>
                                                <p class="price-tea">${formatCurrency(product.Gia)}</p>
                                            </div>
                                            <div class="buy-btn-container">
                                                <a href="../Login/LoginUI.php">mua ngay</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            `;
                        });
                        // Thay đổi nội dung HTML của phần tử sản phẩm
                        productContainer.html(htmlContent);
                    } else {
                        // Hiển thị thông báo khi không có sản phẩm
                        productContainer.html('<p>Không có sản phẩm nào.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }
            
    </script>
</html>
