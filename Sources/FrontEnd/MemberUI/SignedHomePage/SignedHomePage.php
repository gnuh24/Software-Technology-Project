
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="SignedHomePage.css" />
        <link rel="stylesheet" href="login.css" />
        <title>Kinh doanh rượu</title>
    </head>

    <body>
        <header class="Home-container-header">
            <div id="Home-over-Header">
                <img src="" alt="" />
                <img id="Home-img" src="img/logoWine.jpg" alt="" />
                <form class="input__wrapper">
                    <input
                        type="text"
                        class="search-input"
                        placeholder="Tìm kiếm"
                        required=""
                    />
                </form>
                <div id="Home-cart">
                    <a href="../cart/cart.html"><img src="img/cart.png" alt="" /></a>
                </div>
                <div id="Home-login">Login</div>
            </div>
            <div class="Home-Header-Container">
                <ul class="Home-navigation">
                    <li class="Home-navigation-child">
                        <a href="./home.html">HOME</a>
                    </li>
                    <li class="Home-navigation-child">
                        <a href="./classify_product.html">RƯỢU VANG</a>
                    </li>
                    <li class="Home-navigation-child">
                        <a href="./classify_product.html">RƯỢU MẠNH</a>
                    </li>
                    <li class="Home-navigation-child">
                        <a href="./classify_product.html">HỘP QUÀ WISHKY</a>
                    </li>
                    <li class="Home-navigation-child">
                        <a href="./classify_product.html">HỘP QUÀ WISHKY</a>
                    </li>
                </ul>
            </div>
        </header>

        <div id="login">
            <div class="wrap-login">
                <div class="login100-pic js-tilt" data-tilt="" style="transform: perspective(300px) rotateX(0deg) rotateY(0deg); will-change: transform;">
                    <img src="img/img-01.webp" alt="IMG" />
                </div>
                <form class="login100-form validate-form">
                    <span class="login100-form-title"> ĐĂNG NHẬP </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input
                            class="input100"
                            type="text"
                            name="username"
                            placeholder="Username"
                        />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input
                            class="input100"
                            type="password"
                            name="pass"
                            placeholder="Password"
                        />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Login</button>
                    </div>
                    <div class="text-center p-t-12" style="display: flex; margin-top: 20px">
                        <span class="txt1"> Bạn chưa có tài khoản? </span>
                        <h5 class="btn_register" href="#">Đăng kí</h5>
                    </div>
                </form>
            </div>
        </div>

        <div id="register">
            <div class="wrap-register">
                <div class="login100-pic js-tilt" data-tilt="" style="transform: perspective(300px) rotateX(0deg) rotateY(0deg); will-change: transform;">
                    <img src="../img/img-01.webp" alt="IMG" />
                </div>
                <form class="login100-form validate-form">
                    <span class="login100-form-title"> ĐĂNG KÍ </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input
                            class="input100"
                            type="text"
                            name="username"
                            placeholder="username"
                        />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input
                            class="input100"
                            type="password"
                            name="pass"
                            placeholder="Password"
                        />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input
                            class="input100"
                            type="password"
                            name="RepeatPassword"
                            placeholder="Repeat Password"
                        />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Login</button>
                    </div>
                    <div class="text-center p-t-12" style="display: flex; margin-top: 10px">
                        <span class="txt1"> Bạn đã có tài khoản? </span>
                        <h5 class="btn_register">Đăng nhập</h5>
                    </div>
                </form>
            </div>
        </div>
        
        <section>
            <div class="center-text">
                <div class="title_section">
                    <div class="bar"></div>
                    <h2 class="center-text-share">SẢN PHẨM NỔI BẬT</h2>
                </div>
            </div>
            <div class="icon-bottom-title">
                <img src="../../../img/design/line.webp" alt="" />
            </div>
            <div class="openFilter">
                <button id="filterButton"><i class="fa-solid fa-sliders" style="margin-right: 5px;"></i>Lọc theo sản phẩm</button>
            </div> 
        </section>
        <section id="product">
            <div class="products">
                <div class="row">
                    <a href="../details/detail.html">
                        <img src="../img/ruouvang1.webp" alt="" />
                        <div class="product-card-content">
                            <div class="price">
                                <h4 class="name-product">rượu vang đỏ</h4>
                                <p class="price-tea">25.000đ</p>
                            </div>
                            <div class="buy-btn-container">
                                <a href="#">mua ngay</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Các sản phẩm khác -->
            </div>
            <div>
                <ul class="listPage"></ul>
            </div>
        </section>
        <!-- Tin tức -->
        <section class="Home-titleSection">
        <div class="Home-lineSection-2"></div>
        <h2 class="Home-txtTitle">TIN TỨC</h2>
        <div class="Home-lineSection-2"></div>
        </section>

        <section class="Home-grid-container">
        <div class="Home-grid-item">
            <img class="Home-gird-item-img" src="img/uongRuouVangMoiNgay.jpg" alt=""/>
            <div class="home-title-context">
            <h1 class="Home-title-heading">Uống rượu vang mỗi ngày, nên hay không?</h1>
            <p class="Home-context">
                Nếu bạn thật sự rất thích rượu vang, thì bạn chắc hẳn sẽ có xu hướng mất kiểm soát bản thân. Điều này thì cũng dễ hiểu vì khi bạn thực sự thích một điều gì đó thì việc dừng lại cũng giống như cực hình.
            </p>
            </div>
        </div>
        <div class="Home-grid-item">
            <img class="Home-gird-item-img" src="img/whisky.jpg" alt=""/>
            <div class="home-title-context">
            <h1 class="Home-title-heading">Sự thật về sự khác biệt giữa Single Malt Whisky và Blended Scotch Whisky</h1>
            <p class="Home-context">
                Về quy trình sản xuất, Whisky có thể được phân thành hai loại. Đó chính là single malt và blended whisky. Dưới đây là cách phân biệt single malt whisky với blended whisky.
            </p>
            </div>
        </div>
        <div class="Home-grid-item">
            <img class="Home-gird-item-img" src="img/chivas.jpg" alt=""/>
            <div class="home-title-context">
            <h1 class="Home-title-heading">Giá rượu Chivas 12, 18, 21, 25, 38 mới nhất tại thị thường Việt Nam 2024</h1>
            <p class="Home-context">
                Chivas là một trong những thương hiệu rượu Whisky nổi tiếng mà những người sành rượu ai cũng biết. Nhãn hiệu này ngày càng phát triển với những dòng rượu đình đám như Chivas 12, Chivas 18, Chivas 21 Royal Salute, Chivas 25 và Chivas 38.
            </p>
            </div>
        </div>
        <div class="Home-grid-item">
            <img class="Home-gird-item-img" src="img/ballantines.jpg" alt=""/>
            <div class="home-title-context">
            <h1 class="Home-title-heading">Giá rượu Ballantine's Finest, 12, 15, 17, 19, 21, 30, 40 mới nhất thị trường 2023</h1>
            <p class="Home-context">
                Giá rượu thương hiệu Ballantine’s 12, 15, 17, 19, 21, 30, 40... mới nhất thị trường hiện nay và luôn là top rượu bán chạy hàng đầu tại Việt Nam.
            </p>
            </div>
        </div>
        <div class="Home-grid-item">
            <img class="Home-gird-item-img" src="img/jagermiester.jpg" alt=""/>
            <div class="home-title-context">
            <h1 class="Home-title-heading">Cách nhận biết rượu Jagermeister thật giả</h1>
            <p class="Home-context">
                Một trong những loại rượu mùi nhập khẩu số một tại Mỹ và top đầu trên thế giới. Hãy khám phá rượu Jagermeister là gì và cách phân biệt thật giả mới nhất hiện nay trong bài viết dưới đây.
            </p>
            </div>
        </div>
        <div class="Home-grid-item">
            <img class="Home-gird-item-img" src="img/Bordeaux.jpg" alt=""/>
            <div class="home-title-context">
            <h1 class="Home-title-heading">Top 10 chai rượu vang Pháp nổi tiếng thế giới đã có mặt tại thị trường Việt Nam</h1>
            <p class="Home-context">
                Cùng Winemart điểm qua Top 10 chai rượu vang Pháp nổi tiếng thế giới đã có mặt tại thị trường Việt Nam mà có thể bạn chưa biết.
            </p>
            </div>
        </div>
        </section>

        <!-- Dịch vụ -->
        <section class="Home-service">
        <div class="Home-service-child">
            <div><img class="Home-service-img" src="img/service-1.jpg" alt=""/></div>
            <h2 class="home-heading-sercive">Giao Hàng nhanh</h2>
            <p class="home-txt-sercive">
            Winemart sẽ luôn cố gắng giao hàng nhanh nhất có thể
            </p>
        </div>
        <div class="Home-service-child">
            <div><img class="Home-service-img" src="img/service2.jpg" alt=""/></div>
            <h2 class="home-heading-sercive">Hỗ trợ khách hàng</h2>
            <p class="home-txt-sercive">
            Chăm sóc, tư vấn và hỗ trợ khách hàng gọi ngay <br />
            1900.636.035
            </p>
        </div>
        <div class="Home-service-child">
            <div><img class="Home-service-img" src="img/service3.jpg" alt=""/></div>
            <h2 class="home-heading-sercive">Thanh toán thuận tiện</h2>
            <p class="home-txt-sercive">
            Winemart hỗ trợ thanh toán
            <br />
            COD "Trong nội thành TP.HCM" và chuyển khoản
            </p>
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
            <a href="http://online.gov.vn/Home/WebDetails/36260"><img src="../../../img/design/logo_bct.webp" alt="" /></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyrights © 2019 by comebuy_vn. All rights reserved.</p>
        </div>
        </section>
    </body>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var loginForm = document.getElementById("login");
        var registerForm = document.getElementById("register");

        // Lắng nghe sự kiện click vào id "Home-login"
        document
          .getElementById("Home-login")
          .addEventListener("click", function () {
             window.location.href = '../Login/LoginUI.php';
        });

        // Lắng nghe sự kiện click vào class "btn_register"
        document.querySelectorAll(".btn_register").forEach(function (btn) {
          btn.addEventListener("click", function () {
            loginForm.style.display = "none";
            registerForm.style.display = "block";
          });
        });
      });
    </script>
</html>
