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

       <?php require_once "../Header/SignedHeader.php" ?>


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

                   
                    <div class="listCart">

                    <?php
                    require_once "../../../BackEnd/ManagerBE/GioHangBE.php";

                    function formatMoney($amount) {
                        return number_format($amount, 0, ',', '.') . 'đ';
                    }

                    // Kiểm tra xem biến `maTaiKhoan` đã được truyền vào không
                    if (isset($_GET["maTaiKhoan"])) {
                        $data = getAllGioHangByMaTaiKhoan($_GET["maTaiKhoan"]);

                        foreach ($data->data as $cartProduct) {
                            $formattedPrice = formatMoney($cartProduct['DonGia']);
                            $formattedTotalPrice = formatMoney($cartProduct['ThanhTien']);
                            $soLuongToiDa = $cartProduct['SoLuongConLai'];

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
                                        <button class='btnQuantity increase'>+</button>
                                    </div>
                                </div>
                                <div class='wrapTotalPriceOfCart'>
                                    <div class='totalPriceOfCart'>
                                        <p class='lablelPrice'>Thành tiền</p>
                                        <p class='valueTotalPrice'>$formattedTotalPrice</p>
                                    </div>
                                    <button class='btnRemove' >
                                        <i class='fa-solid fa-xmark'></i>
                                    </button>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<h1> Lỗi </h1>";
                    }
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
                        <button class="btnCheckout" onclick="thanhToan(<?php echo $_GET["maTaiKhoan"]; ?>)">Tiến hành đặt hàng</button>
                        <!-- </a> -->
                        <a href=" SignedProduct.php">
                            <button class="btnCheckout_buy" style="border: 2px #7b181a solid;">Tiếp tục mua hàng</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php require_once "../Footer/Footer.php" ?>

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
            var donGia = cartItem.find('.priceCart').text().replace(/\D/g, ''); // Lấy đơn giá từ phần tử DOM và loại bỏ ký tự không phải số

            var soLuong = parseInt(quantityField.text()); // Mặc định lấy giá trị số lượng từ quantityField
            
            var soLuongToiDa = <?php echo $soLuongToiDa; ?>;

        
            if (action == "increase") {
                if (soLuong + 1 > soLuongToiDa) {
                    alert("Bạn không thể mua hàng với số lượng lớn hơn số lượng tồn kho !!");
                } else {
                    soLuong += 1;
                }
            } else {
                if (soLuong - 1 <= 0) {
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

                    // Gọi hàm cập nhật tổng tiền sau mỗi lần xóa sản phẩm
                    updateTotalPrice();
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
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


        function thanhToan(maTaiKhoan){
            window.location.href = `CreateOrder.php?maTaiKhoan=${maTaiKhoan}`;
        }
     
    </script>
</body>

</html>
