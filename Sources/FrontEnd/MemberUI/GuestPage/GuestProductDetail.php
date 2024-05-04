<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="HomePage.css" />
    <link rel="stylesheet" href="GuestProductDetail.css" />

    <link rel="stylesheet" href="login.css" />
    <title>Chi tiết sản phẩm</title>
    <style>
        .quantity-available {
            color: red;
        }
    </style>
</head>

<body>
    <?php require_once "../Header/GuestHeader.php"; ?>

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
                        <img style="border: 2px solid black; height: 400px;" src="' . $sanPham["AnhMinhHoa"] . '" alt="" class="product_img">
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
                        <div class="quantity__wrapper" style="display: flex; align-items: center;">';
        
        // Kiểm tra nếu số lượng còn lại bằng 0, không in ra nút thêm vào giỏ hàng
        if ($soLuongConLai > 0) {
            echo '<p class="title">Số lượng</p>
                  <div class="quantity">
                      <div style="display: flex; align-items: center; justify-content: center;" class="minusBtn"> <i class="fa-solid fa-minus"></i></div>
                      <input type="number" value="1" min="0" max="' . $soLuongConLai . '" oninput="checkQuantity(this)">
                      <div style="display: flex; align-items: center; justify-content: center;" class="plusBtn"><i class="fa-solid fa-plus"></i></div>
                  </div>';
        }
        
        echo '</div>
                    </div>
                    <div class="button__wrapper">';
        // Nếu số lượng còn lại lớn hơn 0, in ra nút thêm vào giỏ hàng
        if ($soLuongConLai > 0) {
            echo '<button class="secondary">
                      <span>Thêm vào giỏ hàng</span>
                  </button>';
        }
        echo '<button class="primary" style="visibility: hidden;">
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

    <?php require_once "../Footer/Footer.php" ?>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Lắng nghe sự kiện click vào id "Home-login"
    document.getElementById("Home-login").addEventListener("click", function () {
        window.location.href = '../Login/LoginUI.php';
    });

    // Lắng nghe sự kiện click vào nút "Thêm vào giỏ hàng"
    document.querySelector(".secondary").addEventListener("click", function () {
        window.location.href = '../Login/LoginUI.php'; // Chuyển hướng đến trang Login khi click
    });

    // Lắng nghe sự kiện click vào nút "Mua ngay"
    document.querySelector(".primary").addEventListener("click", function () {
        window.location.href = '../Login/LoginUI.php'; // Chuyển hướng đến trang Login khi click
    });

     // Lắng nghe sự kiện click vào nút "Minus"
     document.querySelector(".minusBtn").addEventListener("click", function () {
        var quantityInput = document.querySelector("input[type='number']"); // Lấy input số lượng
        var currentQuantity = parseInt(quantityInput.value); // Lấy giá trị số lượng hiện tại
        if (currentQuantity > 1) { // Kiểm tra nếu số lượng hiện tại lớn hơn 0
            quantityInput.value = currentQuantity - 1; // Giảm số lượng đi 1 và cập nhật vào input
        }
    });

    // Lắng nghe sự kiện click vào nút "Plus"
    document.querySelector(".plusBtn").addEventListener("click", function () {
        var quantityInput = document.querySelector("input[type='number']"); // Lấy input số lượng
        var currentQuantity = parseInt(quantityInput.value); // Lấy giá trị số lượng hiện tại
        var maxQuantity = parseInt(quantityInput.getAttribute("max")); // Lấy giá trị cận trên
        if (currentQuantity < maxQuantity) { // Kiểm tra nếu số lượng hiện tại nhỏ hơn cận trên
            quantityInput.value = currentQuantity + 1; // Tăng số lượng đi 1 và cập nhật vào input
        }
    });

    // Kiểm tra sự kiện của khi người dùng "cố tình" nhập vào số lượng lớn hơn hoặc để trống.
    function checkQuantity(input) {
        var maxQuantity = parseInt(input.getAttribute("max")); // Lấy giá trị cận trên
        var enteredQuantity = parseInt(input.value); // Lấy giá trị số lượng nhập vào

        // Kiểm tra nếu giá trị nhập vào không phải là một số hoặc là một chuỗi rỗng
        if (isNaN(enteredQuantity) || input.value.trim() === "") {
            // Đặt giá trị là 1
            input.value = 1;
        } else if (enteredQuantity < 0) { // Nếu số lượng nhập vào nhỏ hơn 0
            input.value = 0; // Đặt giá trị là 0
        } else if (enteredQuantity > maxQuantity) { // Nếu số lượng nhập vào lớn hơn số lượng tối đa
            input.value = maxQuantity; // Đặt giá trị là số lượng tối đa
        }
    }


    document.getElementById("Home-img").addEventListener("click", function () {
            // Chuyển hướng về trang chủ khi click vào hình ảnh
            window.location.href = "GuestHomePage.php";
        });





</script>

</html>
