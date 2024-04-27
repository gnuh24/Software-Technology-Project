<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="SignedHomePage.css">
    <link rel="stylesheet" href="Cart.css">
    <title>Giỏ hàng</title>
</head>

<body>
    <div>

        <header class="Home-container-header">
            <div id="Home-over-Header">
                <img id="Home-img" src="../GuestPage/img/logoWine.jpg" alt="" />
                <form id="search" class="input__wrapper" method="post" action="SignedProduct.php">
                    <input id="searchSanPham" name="searchFromAnotherPage" type="text" class="search-input"
                        placeholder="Tìm kiếm" required="" />
                    <button id="filter-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <div class="header-option"><a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    <div class="header-option"><a href="Profile.php"><i class="fa-solid fa-user"></i></a></div>
                    <div class="header-option" onclick="logout()"><a href="../Login/LoginUI.php"><i
                                class="fa-solid fa-right-from-bracket"></i></a></div>

                </form>

            </div>

        </header>

        <section>
            <div class="center-text" style="margin-top: 70px;">

                <div class="title_section">
                    <div class="bar"></div>
                    <h2 class="center-text-share">Giỏ Hàng Của Bạn</h2>
                </div>
            </div>
        </section>

        <section class="show_cart">

            <div class="page_cart containerPage">
                <div class="wrapListCart">

                    <!-- <p class="quantityCart">Bạn đang có <span class="totalProducts"><?php echo $numberOfProducts;
                        ?></span> sản phẩm trong giỏ hàng (from _Dai)</p> -->
                    <div class="listCart">

                    <?php
                        require_once "../../../BackEnd/ManagerBE/GioHangBE.php";
                        function formatMoney($amount) {
                            return number_format($amount, 0, ',', '.') . 'đ';
                        }
                        if (isset($_GET["maTaiKhoan"])) {
                            $data = getAllGioHangByMaTaiKhoan($_GET["maTaiKhoan"]);

                            foreach ($data->data as $cartProduct) {
                                $formattedPrice = formatMoney($cartProduct['DonGia']);
                                $formattedTotalPrice = formatMoney($cartProduct['ThanhTien']);

                                echo "
                                    <div class='cartItem' id='{$cartProduct['MaSanPham']}'>
                                            <a href='#' class='img'><img class='img' src='{$cartProduct['AnhMinhHoa']}' /></a>
                                            <div class='inforCart'>
                                            <div class='nameAndPrice'>
                                                <a href='#' class='nameCart'>{$cartProduct['TenSanPham']}</a>
                                                <p class='priceCart'>$formattedPrice</p>
                                            </div>
                                            <div class='quantity'>
                                                <button class='btnQuantity decrease'>-</button>
                                                <div class='txtQuantity'>{$cartProduct['SoLuong']}</div>
                                                <button class='btnQuantity increase' >+</button>
                                            </div>
                                        </div>
                                        <div class='wrapTotalPriceOfCart'>
                                            <div class='totalPriceOfCart'>
                                                <p class='lablelPrice'>Thành tiền</p>
                                                <p class='valueTotalPrice'>$formattedTotalPrice</p>
                                            </div>
                                            <button class='btnRemove'>
                                                <i class='fa-solid fa-xmark'></i>
                                            </button>
                                        </div>
                                    </div>";
                            }
                        } else {
                            echo "<h1> Lỗi </h1>";
                        }
                        // Gọi hàm để lấy thông tin giỏ hàng
                        ?>

                    </div>
                </div>
                <div class="wrapInfoOrder">
                    <div class="bg_infoOrder"></div>
                    <div class="infoOrder">
                        <p class="titleOrder">Thông tin đơn hàng</p>
                        <div class="wrapPriceTotal">
                            <p class="titlePriceTotal">Tạm tính:</p>
                            <p class="priceTotal"><?php
                                                    $total = 0;
                                                    foreach ($data->data as $cartProduct) {
                                                        $total = $cartProduct['ThanhTien'] + $total;
                                                    }
                                                    echo number_format($total, 0, ',', '.') ?>&nbsp;đ</p>
                        </div>
                        <!-- <a href="#" class="btnCheckout"> -->
                        <button class="btnCheckout">Tiến hành đặt hàng</button>
                        <!-- </a> -->
                        <a href=" ./cartHome.php">
                            <button class="btnCheckout_buy">Tiếp tục mua hàng</button>
                        </a>
                    </div>
                </div>
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
                    <a href="https://www.facebook.com/doanhdai.2004"><i id="fb" class="fa-brands fa-facebook"
                            id="fb"></i></a>
                    <a href="https://www.instagram.com"><i id="ig" class="fa-brands fa-instagram"></i></a>
                    <a href="https://github.com/ltgiai/DO_AN_WEBSITE/tree/main"><i id="git"
                            class="fa-brands fa-github"></i></a>
                    <a href="https://twitter.com/?lang=vi"><i id="tw" class="fa-brands fa-square-twitter"></i></a>
                    <a href="http://online.gov.vn/Home/WebDetails/36260"><img src="#" alt="" /></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyrights © 2019 by comebuy_vn. All rights reserved.</p>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>


$(document).ready(function () {
    $('.btnQuantity').on('click', function () {
        var btn = $(this);
        var quantityField = btn.siblings('.txtQuantity');
        var action = btn.hasClass('increase') ? 'increase' : 'decrease';
        var cartItem = btn.closest('.cartItem');
        var productId = cartItem.attr('id');
        var maTaiKhoan = '<?php echo $_GET["maTaiKhoan"]; ?>'; // Lấy mã tài khoản từ PHP
        var donGia = cartItem.find('.priceCart').text().replace(/\D/g,''); // Lấy đơn giá từ phần tử DOM và loại bỏ ký tự không phải số
        
        var soLuong = parseInt(quantityField.text()); // Mặc định lấy giá trị số lượng từ quantityField
        
        if (action == "increase"){
            soLuong += 1;
        } else {
            if (soLuong - 1 <= 0){
                alert("Bạn không thể để số lượng sản phẩm là 0 !!");
            } else {
                soLuong -= 1;
            }
        }

        var thanhTien = soLuong * donGia;
        
        // Set giá trị mới của số lượng
        quantityField.text(soLuong);

        // Tìm phần tử chứa giá trị thành tiền và cập nhật giá trị mới
        var totalPriceField = cartItem.find('.valueTotalPrice');
        totalPriceField.text(formatMoney(thanhTien));
        
        $.ajax({
            url: '../../../BackEnd/ManagerBE/GioHangBE.php',
            method: 'POST',
            data: {
                productId: productId,
                maTaiKhoan: maTaiKhoan,
                action: action,
                donGia: donGia,
                soLuong: soLuong,
                thanhTien: thanhTien
            },
            success: function (response) {
                console.log(response);
        
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

        // Gọi hàm cập nhật tổng tiền sau mỗi lần cập nhật sản phẩm
        updateTotalPrice();
    });

    $('.btnRemove').on('click', function () {
        // Code hiện tại của bạn để xóa sản phẩm khỏi giỏ hàng
        $('.btnRemove').on('click', function () {
                var productId = $(this).closest('.cartItem').attr('id');
                var maTaiKhoan = '<?php echo $_GET["maTaiKhoan"]; ?>'; // Thêm mã tài khoản vào
                $.ajax({
                    url: '../../../BackEnd/ManagerBE/GioHangBE.php',
                    method: 'POST',
                    dataType: "json",

                    data: {
                        productId: productId,
                        maTaiKhoan: maTaiKhoan, // Thêm mã tài khoản vào dữ liệu gửi đi
                        action: 'deleteCart'
                    },
                    success: function (response) {
                        console.log(response);
                        console.log(response.data);

                        try {
                            // Loại bỏ JSON.parse() ở đây
                            $('#' + productId).remove();
                            $('.priceTotal').text(response.priceTotal);
                            $('.totalProducts').text(response.quantityCart);                  
                        } catch (error) {
                            console.error("Error parsing JSON: ", error);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        // Gọi hàm cập nhật tổng tiền sau mỗi lần xóa sản phẩm
        updateTotalPrice();
    });

    // Hàm cập nhật tổng tiền dựa trên các giá trị thành tiền của từng sản phẩm trong giỏ hàng
    function updateTotalPrice() {
        var totalPrice = 0;
        $('.valueTotalPrice').each(function () {
            var price = parseFloat($(this).text().replace(/\D/g, ''));
            totalPrice += price;
        });
        $('.priceTotal').text(formatMoney(totalPrice));
    }

    // Hàm định dạng số tiền thành chuỗi có dấu chấm ngăn cách hàng nghìn
    function formatMoney(amount) {
        return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
}   


});





        function getProductInfo() {
            var productInfo = [];
            var cartItems = document.querySelectorAll('.cartItem');

            cartItems.forEach(function (item) {
                var productId = item.id;
                var quantity = item.querySelector('.txtQuantity').textContent;
                productInfo.push({
                    productId: productId,
                    quantity: quantity
                });
            });

            return productInfo;
        }

        document.querySelector('.btnCheckout').addEventListener('click', function () {
            window.location.href = '../../controller/cartControll/cartHome.php?page=thanhtoan';
        });
    </script>
</body>

</html>
