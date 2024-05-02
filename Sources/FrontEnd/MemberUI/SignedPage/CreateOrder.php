<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="SignedHomePage.css">
    <link rel="stylesheet" href="CreateOrder.css">
    <title>Thanh toán</title>
</head>
<body>
    <?php require "../Header/SignedHeader.php"; ?>

    <div>
        <section>
            <div class="center-text">
                <div class="title_section">
                    <div class="bar"></div>
                    <h2 class="center-text-share">Thanh Toán</h2>
                </div>
            </div>
        </section>
        <section>
            <div class="layout__wrapper">
                <div class="checkout__wrapper containerPage">
                    <div class="payment_info__wrapper">
                        <div class="payment_info">
                            <div id='checkout_form'>
                                    <div class='input__wrapper'>
                                        <label for='username'>Họ tên:  <i class="fa-solid fa-lock"></i></label>
                                       
                                        <input type='text' name='username' id='username' placeholder='Nhập họ tên' readonly/>
                                    </div>
                                    <div class='input__wrapper'>
                                        <label for='phonenumber'>Số điện thoại: <i class="fa-solid fa-lock"></i></label>                                      
                                       

                                        <input type='number' name='phonenumber' id='phonenumber' placeholder='Nhập số điện thoại' readonly/>
                                    </div>
                                    <div class='input__wrapper'>
                                        <label for='address'>Địa chỉ nhận hàng:</label>
                                        <input type='text' name='address' id='address' placeholder='Nhập địa chỉ' />
                                    </div>

                                    <div class='payment__wrapper'>
                                    <label>Phương thức thanh toán:</label>
                                    <?php require_once "../../../BackEnd/ManagerBE/PhuongThucThanhToan.php" ;
                                    
                                        $result = getAllPhuongThucThanhToanNoPaging()->data;


                                        foreach($result as $row){
                                            echo "
                                            <div class='radio__wrapper'>
                                                <div>
                                                    <input value=" . $row['MaPhuongThuc'] . " type='radio' name='payment' id='ghtk' />
                                                    <label for='cash'>" . $row['TenPhuongThuc'] . "</label>
                                                </div>
                                            </div>";
                                        }
                                        
                                    ?>
                                </div>
                                <div class='payment__wrapper'>
                                    <label>Dịch vụ vận chuyển:</label>
                                    <?php require_once "../../../BackEnd/ManagerBE/DichVuVanChuyenBE.php" ;
                                    
                                        $result = getAllDichVuVanChuyenNoPaging()->data;


                                        foreach($result as $row){
                                            echo "
                                            <div class='radio__wrapper'>
                                                <div>
                                                    <input value=" . $row['MaDichVu'] . " type='radio' name='shipping' id='ghtk'/>
                                                    <label for='cash'>" . $row['TenDichVu'] . "</label>
                                                </div>
                                            </div>";
                                        }
                                        
                                    ?>

                                </div>   

                                <div class='payment__wrapper'>
                                    <label>Các sản phẩm đặt mua</label>
                                    <?php require_once "../../../BackEnd/ManagerBE/GioHangBe.php" ;

                                    function formatMoney($amount) {
                                        return number_format($amount, 0, ',', '.') . 'đ';
                                    }

                                    if (isset($_GET['maTaiKhoan'])) {
                                        $totalPrice_Shipping = 0;
                                        $maTaiKhoan = $_GET['maTaiKhoan'];
                                        $result = getAllGioHangByMaTaiKhoan($maTaiKhoan)->data;
                                            foreach($result as $cartProduct){
                                                $totalPrice_Shipping +=  $cartProduct['ThanhTien'];
                                                $formattedPrice = formatMoney($cartProduct['DonGia']);
                                                $formattedTotalPrice = formatMoney($cartProduct['ThanhTien']);
                                                echo "
                                                <div class='radio__wrapper'>
                                                    <div>
                                                        <div class='cartItem' id='{$cartProduct['MaSanPham']}'>
                                                            <a href='#' class='img'><img class='img' src='{$cartProduct['AnhMinhHoa']}' /></a>
                                                            <div class='inforCart'>
                                                                <div class='nameAndPrice'>
                                                                    <a href='#' class='nameCart'>{$cartProduct['TenSanPham']}</a>
                                                                    <p class='priceCart'>$formattedPrice</p>
                                                                </div>
                                                                <div class='quantity'>
                                                                    <div class='txtQuantity'>{$cartProduct['SoLuong']}</div>
                                                                </div>
                                                            </div>
                                                            <div class='wrapTotalPriceOfCart'>
                                                                <div class='totalPriceOfCart'>
                                                                    <p class='lablelPrice'>Thành tiền</p>
                                                                    <p class='valueTotalPrice'>$formattedTotalPrice</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                                
                                            }
                                        }else{
                                            echo "<h1> Không in ra được =((( </h1>";
                                        }
                                        
                                    ?>
                                </div>
                             
                              

                                <p class='hotline'>
                                    * Để được hỗ trợ trực tiếp và nhanh nhất vui lòng liên hệ THug88
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="order_info__wrapper">
                        <div class="order_info">
                            <p class="title" style="text-align: center;">Thông tin đơn hàng</p>
                            <div class="divider"></div>
                            <div class="info__wrapper order_info2">
                                <p><span class="span1">Họ tên người nhận:</span><span class="span2" id="spanHoTen"></span></p>
                                <p><span class="span1">Số điện thoại:</span><span class="span2" id="spanSoDienThoai"></span></p>
                                <p><span class="span1">Địa chỉ giao hàng:</span><span class="span2" id="spanDiaChi"></span></p>
                                <p><span class="span1">Phương thức thanh toán:</span><span class="span2" id="spanPhuongThucThanhToan"></span></p>
                                <p><span class="span1">Dịch vụ vận chuyển:</span><span class="span2" id="spanDichVuVanChuyen"></span></p>

                            </div>
                            <div class="divider"></div>
                            <div class="info__wrapper total__info">
                                <p>Tổng cộng</p>
                                <p id="totalPrice"></p>
                            </div>
                            <button class="button" id="createOrder">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once "../Footer/Footer.php" ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function() {
            fillUserDataToInputs();
            fillOrderInfo();
            
        });
        
        function convertPriceToNumber(priceString) {
            // Loại bỏ tất cả các ký tự '.'
            var priceWithoutDot = priceString.replace(/\./g, '');

            // Loại bỏ ký tự 'đ'
            var priceWithoutDong = priceWithoutDot.replace('đ', '');

            // Chuyển đổi thành số
            var priceNumber = parseInt(priceWithoutDong);

            return priceNumber;
        }

            

        document.getElementById('createOrder').addEventListener('click', function() {
            // Lấy giá trị của các trường input và radio button
            const maTaiKhoan = '<?php echo $maTaiKhoan; ?>';
            const hoTen = document.getElementById('username').value;
            const soDienThoai = document.getElementById('phonenumber').value;
            const diaChi = document.getElementById('address').value;
            const selectedPayment = document.querySelector('input[name="payment"]:checked');
            const maPhuongThuc = selectedPayment ? selectedPayment.value : '';
            const selectedShipping = document.querySelector('input[name="shipping"]:checked');
            const maDichVu = selectedShipping ? selectedShipping.value : '';

            // Kiểm tra xem dichVuVanChuyen và phuongThucThanhToan có rỗng không
            if (!maPhuongThuc || !maDichVu) {
                alert("Vui lòng chọn phương thức thanh toán và dịch vụ vận chuyển.");
                return; // Dừng việc thực thi hàm nếu thiếu thông tin
            }

            // Lấy tổng giá trị đơn hàng từ phần tử HTML
            const tongGiaTri = '<?php echo $totalPrice_Shipping; ?>';

            // Tạo một danh sách các chi tiết đơn hàng từ các sản phẩm trong giỏ hàng
            const danhSachChiTietDonHang = [];
            const cartItems = document.querySelectorAll('.cartItem');
            cartItems.forEach(function(item) {
                const maSanPham = item.id;
                const tenSanPham = item.querySelector('.nameCart').textContent;
                const donGia = convertPriceToNumber(item.querySelector('.priceCart').textContent);
                const soLuong = item.querySelector('.txtQuantity').textContent;
                console.log(`Thanh tien truoc khi chuyển: ${item.querySelector('.valueTotalPrice').textContent}`);
                const thanhTien = convertPriceToNumber(item.querySelector('.valueTotalPrice').textContent);
                console.log(`Thanh tien sau khi chuyển: ${thanhTien}`);

                danhSachChiTietDonHang.push({
                    maSanPham: maSanPham,
                    tenSanPham: tenSanPham,
                    donGia: donGia,
                    soLuong: soLuong,
                    thanhTien: thanhTien
                });
            });

            // In thông tin lên console
            console.log("Họ tên:", hoTen);
            console.log("Số điện thoại:", soDienThoai);
            console.log("Địa chỉ giao hàng:", diaChi);
            console.log("Phương thức thanh toán:", maPhuongThuc);
            console.log("Dịch vụ vận chuyển:", maDichVu);
            console.log("Tổng giá trị đơn hàng:", tongGiaTri);
            console.log("Danh sách chi tiết đơn hàng:", danhSachChiTietDonHang);

            // Kiểm tra nếu có dữ liệu hợp lệ thì gọi hàm tạo đơn hàng
            if (hoTen && soDienThoai && diaChi && maPhuongThuc && maDichVu && tongGiaTri && danhSachChiTietDonHang.length > 0) {
                const diaChiGiaoHang = diaChi; // Địa chỉ giao hàng có thể thay đổi tùy theo yêu cầu của bạn
                // Gọi hàm tạo đơn hàng
                createDonHang(maTaiKhoan, tongGiaTri, maPhuongThuc, maDichVu, diaChiGiaoHang, danhSachChiTietDonHang);
                
                // var userData = JSON.parse(localStorage.getItem('key'));

                // var id = userData.MaTaiKhoan;
                // window.location.href = `MyOrder.php?maTaiKhoan=${id}`;
                alert("Đặt hàng thành công !!");

                window.location.href = `SignedProduct.php`;

            } else {
                // Hiển thị thông báo lỗi nếu thiếu thông tin
                console.log("Vui lòng điền đầy đủ thông tin và chọn sản phẩm.");
            }
        });




        document.getElementById('address').addEventListener('input', function() {
            fillOrderInfo();
        });

        
        var paymentMethods = document.querySelectorAll('input[name="payment"]');
        paymentMethods.forEach(function(method) {
            method.addEventListener('change', function() {
                fillOrderInfo();
            });
        });


        var shippingMethods = document.querySelectorAll('input[name="shipping"]');
        shippingMethods.forEach(function(method) {
            method.addEventListener('change', function() {
                fillOrderInfo();
            });
        });



        document.getElementById('address').addEventListener('input', function() {
            fillOrderInfo();

        });


        function fillUserDataToInputs() {
            // Lấy dữ liệu từ Local Storage
            var userData = JSON.parse(localStorage.getItem('key'));
            
            // Kiểm tra xem userData có tồn tại không
            if (userData) {
                // Điền dữ liệu vào các trường input tương ứng
                document.getElementById('username').value = userData.HoTen;
                document.getElementById('phonenumber').value = userData.SoDienThoai;
                document.getElementById('address').value = userData.DiaChi;
            }
        }

        function fillOrderInfo() {
            // Lấy giá trị của các trường input trong form checkout
            var hoTen = document.getElementById('username').value;
            var soDienThoai = document.getElementById('phonenumber').value;
            var diaChi = document.getElementById('address').value;

            // Kiểm tra xem phần tử radio đã được chọn chưa
            var selectedPayment = document.querySelector('input[name="payment"]:checked');
            var phuongThucThanhToan = selectedPayment ? selectedPayment.nextElementSibling.textContent : '';

            var selectedShipping = document.querySelector('input[name="shipping"]:checked');
            var dichVuVanChuyen = selectedShipping ? selectedShipping.nextElementSibling.textContent : '';

            // Đặt giá trị vào các phần tử trong mục order_info2
            document.getElementById('spanHoTen').textContent = hoTen;
            document.getElementById('spanSoDienThoai').textContent = soDienThoai;
            document.getElementById('spanDiaChi').textContent = diaChi;
            document.getElementById('spanPhuongThucThanhToan').textContent = phuongThucThanhToan;
            document.getElementById('spanDichVuVanChuyen').textContent = dichVuVanChuyen;

            // Update tổng cộng
            var totalPrice = '<?php echo number_format($totalPrice_Shipping, 0, ',', '.'); ?>&nbsp;đ';
            document.getElementById('totalPrice').innerHTML = totalPrice;
        }

        function createDonHang(maTaiKhoan, tongGiaTri, maPhuongThuc, maDichVu, diaChiGiaoHang, danhSachChiTietDonHang) {
            $.ajax({
                url: "../../../BackEnd/ManagerBE/DonHangBE.php",
                method: "POST",
                dataType: "json",
                data: {
                    action: 'add',
                    maTaiKhoan: maTaiKhoan,
                    tongGiaTri: tongGiaTri,
                    maPhuongThuc: maPhuongThuc,
                    maDichVu: maDichVu,
                    diaChiGiaoHang: diaChiGiaoHang
                },
                success: function(response) {
                    console.log("Tạo đơn:", response);
                    let maDonHang = response.data;

                    // Gọi hàm tạo ChiTietDonHang cho mỗi phần tử trong danhSachChiTietDonHang
                    danhSachChiTietDonHang.forEach(function(chiTiet) {
                        console.log(`Tạo chi tiết ${chiTiet.maSanPham}`)
                        createCTDH(maDonHang, chiTiet.maSanPham, chiTiet.donGia, chiTiet.soLuong, chiTiet.thanhTien);
                    });

                    //Tạo trạng thái mặc định
                    // createTrangThaiDonHang(maDonHang)


                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }


    function createCTDH(maDonHang, maSanPham, donGia, soLuong, thanhTien) {
        $.ajax({
            url: "../../../BackEnd/ManagerBE/ChiTietDonHangBE.php",
            method: "POST",
            dataType: "json",
            data: {
                action: 'add',
                maDonHang: maDonHang,
                maSanPham: maSanPham,
                donGia: donGia,
                soLuong: soLuong,
                thanhTien: thanhTien
            },
            success: function(response) {
                
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }

    // function createTrangThaiDonHang(maDonHang) {
    //     $.ajax({
    //         url: "../../../BackEnd/ManagerBE/TrangThaiDonHangBE.php",
    //         method: "POST",
    //         dataType: "json",
    //         data: {
    //             MaDonHang: maDonHang,
    //             TrangThai: "ChoDuyet"
    //         },
    //         success: function(response) {
    //             console.log(response);
    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // }


    </script>
</body>
</html>
