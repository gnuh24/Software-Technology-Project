<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../GuestPage/HomePage.css" />
    <link rel="stylesheet" href="SignedProductDetail.css" />

    <link rel="stylesheet" href="../GuestPage/login.css" />
    <title>Chi tiết sản phẩm</title>
    <style>
        .quantity-available {
            color: red;
        }
    </style>
</head>

<body>
   
    <?php require_once "../Header/SignedHeader.php" ?>

    <section>
        <div class="center-text">
            <div class="title_section">
                <div class="bar"></div>
                <h2 class="center-text-share">Chi tiết sản phẩm</h2>
            </div>
        </div>
    </section>


    <section>
        <div class="product-detail-wrapper">
            <div class="product__wrapper containerPage">
                <?php

                function formatCurrency($number) {
                    // Chuyển đổi số thành chuỗi và đảm bảo nó là số nguyên
                    $number = intval($number);

                    // Sử dụng hàm number_format để định dạng số tiền
                    // và thêm đơn vị tiền tệ "đ" vào cuối chuỗi
                    return number_format($number, 0, '', '.') . 'đ';
                }

                require_once "../../../BackEnd/ManagerBE/SanPhamBE.php";

                if (isset($_GET['maSanPham'])) {

                    $maSanPham = $_GET['maSanPham'];

                    $sanPham = getSanPhamByMaSanPham($maSanPham)->data;


                    $soLuongConLai = $sanPham["SoLuongConLai"];

                    // Thay đổi thông báo số lượng sản phẩm còn lại nếu = 0
                    $quantityMessage = $soLuongConLai > 0 ? "Còn $soLuongConLai sản phẩm" : "<span style='color: red;'>Sản phẩm đã hết hàng</span>";

                    echo '<div class="product_images__wrapper">
                    <div class="image">
                        <img style="border: 2px solid black;  height: 400px;" src="' . $sanPham["AnhMinhHoa"] . '" alt="" class="product_img">
                    </div>
                </div>
                <div class="info__wrapper" style="margin-left: 30px">
                    <div class="title__wrapper">
                        <h2 class="title__wrapper">' . $sanPham["TenSanPham"] . '</h2>
                    </div>
                    <div class="price__wrapper">
                        <p class="price">' . formatCurrency($sanPham["Gia"]) . '</p>
                    </div>
                    <!--Thêm dòng dữ liệu hiển thị số lượng sản phẩm còn-->
                    <div class="quantity-available">
                        <p class="title">' . $quantityMessage . '</p>
                        <p id="soLuongCon"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="detail_info__wrapper">
                        <div class="specification__wrapper">
                            <a href="../img/y.jpg" class="origin specification_item">
                                <i class="fa-solid fa-plane"></i>
                                <p>' . $sanPham["XuatXu"] . '</p>
                            </a>
                            <a href="#" class="specification_item">
                                <i class="fa-solid fa-wine-bottle"></i>
                                <p>Rượu Vang Đỏ</p>
                            </a>
                        </div>
                        <div class="rating__wrapper"></div>
                        <div class="size__wrapper">
                            <p class="title">Nồng độ cồn</p>
                            <div class="size__list">
                                <div class="size__item ">
                                    <p>' . $sanPham["NongDoCon"] . '%</p>
                                </div>
                            </div>
                        </div>
                        <div class="size__wrapper">
                            <p class="title">Dung tích</p>
                            <div class="size__list">
                                <div class="size__item ">
                                    <p>' . $sanPham["TheTich"] . 'ml</p>
                                </div>
                            </div>
                        </div>
                        <div class="quantity__wrapper" style="display: flex; align-items: center;">
                            <p class="title">Số lượng</p>
                            <div class="quantity">
                                <div style="display: flex; align-items: center; justify-content: center;" class="minusBtn"> <i class="fa-solid fa-minus"></i></div>
                                <input type="number" value="1" min="1" max="' . $soLuongConLai . '" oninput="checkQuantity(this)">
                                <div style="display: flex; align-items: center; justify-content: center;" class="plusBtn"><i class="fa-solid fa-plus"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="button__wrapper">';
                        if ($soLuongConLai > 0) {
                            echo '<button class="secondary">
                                <span>Thêm vào giỏ hàng</span>
                            </button>';
                        }
        echo '          <button class="primary" style="visibility: hidden;">
                            <span>Mua ngay</span>
                        </button>
                    </div>
                </div>';
        

                } else {
                    // Nếu không có mã sản phẩm được truyền vào, hiển thị thông báo lỗi
                    echo "Không có mã sản phẩm được cung cấp!";
                    exit; // Dừng thực thi của mã PHP tại đây
                }
                ?>



            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require_once "../Footer/Footer.php" ?>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

      // Hàm kiểm tra số lượng nhập vào
      function checkQuantity(input) {
        var currentValue = parseInt(input.value); // Lấy giá trị số lượng hiện tại
        var maxQuantity = parseInt(input.getAttribute("max")); // Lấy giá trị số lượng tối đa
        var quantityMessage = document.querySelector(".quantity-available p.title"); // Phần hiển thị thông báo số lượng còn lại

        if (currentValue < 1) { // Nếu số lượng nhỏ hơn 1
            input.value = 1; // Đặt lại giá trị là 1
        } else if (currentValue > maxQuantity) { // Nếu số lượng lớn hơn số lượng tối đa
            input.value = maxQuantity; // Đặt lại giá trị là số lượng tối đa
        }
    }

    // Lắng nghe sự kiện click vào nút "Thêm vào giỏ hàng"
    var secondaryBtn = document.querySelector(".secondary");
    if (secondaryBtn) {
        secondaryBtn.addEventListener("click", function () {
            // Lấy các giá trị cần thiết từ phần tử HTML
            var maSanPham = "<?php echo $maSanPham; ?>"; // Lấy mã sản phẩm từ PHP
            var soLuong = document.querySelector("input[type='number']").value; // Lấy số lượng từ input
            var donGia = "<?php echo $sanPham['Gia']; ?>"; // Lấy đơn giá từ PHP
            var thanhTien = parseInt(soLuong) * parseInt(donGia); // Tính thành tiền

            // Lấy maTaiKhoan từ localStorage
            var localStorageData = JSON.parse(localStorage.getItem("key"));
            var maTaiKhoan = localStorageData.MaTaiKhoan;

            // Gửi dữ liệu qua Ajax
            $.ajax({
                url: "../../../BackEnd/ManagerBE/GioHangBE.php",
                method: "POST",
                dataType: "json",
                data: {
                    action: 'add',
                    maTaiKhoan: maTaiKhoan,
                    maSanPham: maSanPham,
                    soLuong: soLuong,
                    donGia: donGia,
                    thanhTien: thanhTien
                },
                success: function (response) {
                    alert("Bạn đã thêm vào giỏ hàng thành công !!");
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });
    }


    // Lắng nghe sự kiện click vào nút "Minus"
    var minusBtn = document.querySelector(".minusBtn");
    if(minusBtn) {
        minusBtn.addEventListener("click", function () {
            var quantityInput = document.querySelector("input[type='number']"); // Lấy input số lượng
            var currentQuantity = parseInt(quantityInput.value); // Lấy giá trị số lượng hiện tại
            if (currentQuantity > 1) { // Kiểm tra nếu số lượng hiện tại lớn hơn 0
                quantityInput.value = currentQuantity - 1; // Giảm số lượng đi 1 và cập nhật vào input
            }
        });
    }

    // Lắng nghe sự kiện click vào nút "Plus"
    var plusBtn = document.querySelector(".plusBtn");
    if(plusBtn) {
        plusBtn.addEventListener("click", function () {
            var quantityInput = document.querySelector("input[type='number']"); // Lấy input số lượng
            var currentQuantity = parseInt(quantityInput.value); // Lấy giá trị số lượng hiện tại
            var maxQuantity = parseInt(quantityInput.getAttribute("max")); // Lấy giá trị cận trên
            if (currentQuantity < maxQuantity) { // Kiểm tra nếu số lượng hiện tại nhỏ hơn cận trên
                quantityInput.value = currentQuantity + 1; // Tăng số lượng đi 1 và cập nhật vào input
            }
        });
    }


</script>

</html>
