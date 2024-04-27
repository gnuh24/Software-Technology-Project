<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="LoginUI.css"/>
    <link rel="stylesheet" href="../../../Resources/bootstrap-5.3.2-dist\css\bootstrap.css" />
    <title>Login</title>
  </head>

  <body>
    <div class="container" id="container">
    <div class="form-container sign-up">
            <form>
            <h1>Create Account</h1>
            <input type="text" placeholder="Tên đăng nhập" id="tenDangNhap" name="TenDangNhap" />
            <input type="password" placeholder="Mật khẩu" id="matKhau" name="MatKhau" />
            <input type="password" placeholder="Xác thực mật khẩu" id="xacNhanMatKhau" name="XacThucMatKhau" />

            <input type="text" placeholder="Họ và tên" id="hoTen" name="HoTen" />
            <input type="date" placeholder="Ngày sinh" id="ngaySinh" name="NgaySinh" />
            <div class="gender-selection" style="display: flex; align-items: center; margin-right: 200px">
                <span style="margin-right: 10px; font-size: 16px;">Giới tính:</span>
                <label style="margin-right: 10px; display: flex; align-items: center;">Nam<input type="radio" id="gioiTinhMale" name="GioiTinh" value="Male" style="margin-left: 10px"/></label>
                <label style="margin-right: 10px; display: flex; align-items: center;">Nữ<input type="radio" id="gioiTinhFemale" name="GioiTinh" value="Female" style="margin-left: 10px"/></label>
            </div>

            <input type="tel" placeholder="Số điện thoại" id="sdt" name="SoDienThoai" />
            <input type="email" placeholder="Email" id="email" name="Email" />
            <input type="text" placeholder="Địa chỉ" id="diaChi" name="DiaChi" />
            
            <button type="button" class="btn btn-danger" id="signUpButton">Đăng kí</button>
        </form>

    </div>



      <div class="form-container sign-in">
        <form>
          <h1>Sign In</h1>
          <input type="email" placeholder="Tên đăng nhập" id="tenDangNhapLogin"/>
          <input type="password" placeholder="Password"  id="passwordLogin"/>
          <button type="button" class="btn btn-danger" id="signInButton">Đăng nhập</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Welcome Back!</h1>
            <p>Enter your personal details to use all of site features</p>
            <button type="button" class="btn btn-light" id="login">
              Đăng nhập
            </button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Hello, Friend!</h1>
            <p>
              Register with your personal details to use all of site features
            </p>
            <button type="button" class="btn btn-light" id="register">
              Đăng kí
            </button>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <script>

        //Script xử lý Registation
        const container = document.getElementById("container");
        const registerBtn = document.getElementById("register");
        const loginBtn = document.getElementById("login");

        registerBtn.addEventListener("click", () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener("click", () => {
            container.classList.remove("active");
        });

        const signUpButton = document.getElementById("signUpButton");

        signUpButton.addEventListener('click', function check(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form

            let tenDangNhap = document.getElementById("tenDangNhap");
            let matKhau = document.getElementById("matKhau");
            let xacNhanMatKhau = document.getElementById("xacNhanMatKhau");
            let hoTen = document.getElementById("hoTen");
            let sdt = document.getElementById("sdt");
            let diaChi = document.getElementById("diaChi");
            let gioiTinhMale = document.getElementById("gioiTinhMale");
            let gioiTinhFemale = document.getElementById("gioiTinhFemale");
            let vaiTro = document.getElementById("vaiTro");
            let email = document.getElementById("email");
            let ngaySinh = document.getElementById("ngaySinh");

            if (!tenDangNhap.value.trim()) {
                alert("Tên đăng nhập không được để trống");
                tenDangNhap.focus();
                event.preventDefault();
                return;
            }
            if (!matKhau.value.trim()) {
                alert("Mật khẩu không được để trống");
                matKhau.focus();
                event.preventDefault();
                return;
            }

            if (!xacNhanMatKhau.value.trim()) {
                alert("Mật khẩu xác nhận không được để trống");
                xacNhanMatKhau.focus();
                event.preventDefault();
                return;
            }
            if (matKhau.value !== xacNhanMatKhau.value) {
                alert("Mật khẩu xác nhận và mật khẩu phải giống nhau");
                xacNhanMatKhau.focus();
                event.preventDefault();
                return;
            }
            if (!hoTen.value.trim()) {
                alert("Họ Tên không được để trống");
                hoTen.focus();
                event.preventDefault();
                return;
            }
            if (!email.value.trim()) {
                alert("Email không được để trống");
                email.focus();
                event.preventDefault();
                return;
            }
            if (!sdt.value.trim()) {
                alert("Số điện thoại không được để trống");
                sdt.focus();
                event.preventDefault();
                return;
            }
            if (!diaChi.value.trim()) {
                alert("Địa chỉ không được để trống");
                diaChi.focus();
                event.preventDefault();
                return;
            }
            if (!gioiTinhMale.checked && !gioiTinhFemale.checked) {
                alert("Vui lòng chọn giới tính");
                event.preventDefault();
                return;
            }

            if (!ngaySinh.value.trim()) {
                alert("Ngày sinh không được để trống");
                ngaySinh.focus();
                event.preventDefault();
                return;
            }

            // Kiểm tra định dạng Email
            if (!isValidEmail(email.value.trim())) {
                alert("Email không hợp lệ");
                email.focus();
                event.preventDefault();
                return;
            }
        

            //Kiểm tra tên đăng nhập
            if (checkTenDangNhap(tenDangNhap.value.trim())) {
                alert("Tên đăng nhập đã tồn tại");
                tenDangNhap.focus();
                event.preventDefault();
                return;
            }

            //Kiểm tra xem email đã tồn tại hay chưa
            if (checkEmailTonTai(email.value.trim())) {
                alert("Email đã tồn tại");
                email.focus();
                event.preventDefault();
                return;
            }

            //Sau khi qua được tất cả ta bắt đầu tạo TaiKhoan
            let isCreateTaiKhoanComplete = createTaiKhoan(tenDangNhap.value,
                            matKhau.value,
                            "Member");

            var gioiTinhValue = "Female";

            //XỬ lý giới tính
            if (gioiTinhMale.checked){
                gioiTinhValue = "Male";
            }
            

            //Tạo thông tin người dùng đi kèm
            let isCreateNguoiDungComplete = createNguoiDung(hoTen.value,
                            ngaySinh.value, 
                            gioiTinhValue, 
                            sdt.value, 
                            email.value, 
                            diaChi.value)

            
            //Sau khi tạo xong chuyển về trang QLTaiKHoan
            alert("Tạo tài khoản mới thành công !!");
            window.location.href = 'LoginUI.php';

            
        });

        function isValidEmail(email) {
        // Thực hiện kiểm tra định dạng Email và trả về true hoặc false
        // Bạn có thể sử dụng biểu thức chính quy hoặc các phương thức khác để kiểm tra định dạng Email
            return /[^\s@]+@[^\s@]+\.[^\s@]+/.test(email);
        }

        function checkTenDangNhap(value) {
            let exists = false;
            $.ajax({
                url: '../../../BackEnd/AdminBE/TaiKhoanBE.php',
                type: 'GET',
                dataType: "json",
                async: false, // Đảm bảo AJAX request được thực hiện đồng bộ
                data: {
                    tenDangNhap: value
                },
                success: function(data) {
                    if (data.status === 200) {
                        exists = data.isExists == 1;
                    } else {
                        console.error('Error:', data.message);
                    }
                },
                error: function(xhr, status, error) {
    
                    console.error('Error: ' + xhr.status + ' - ' + error);
                }
            });
            return exists;
        }


        function checkEmailTonTai(value) {
            let exists = false;
            $.ajax({
                url: '../../../BackEnd/AdminBE/NguoiDungBE.php',
                type: 'GET',
                dataType: "json",
                async: false, // Đảm bảo AJAX request được thực hiện đồng bộ
                data: {
                    email: value
                },
                success: function(data) {

                    if (data.status === 200) {
                        exists = data.isExists == 1;
                    } else {
                        console.error('Error:', data.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error: ' + xhr.status + ' - ' + error);
                }
            });
            return exists;
        }

        function createTaiKhoan(tenDangNhap, matKhau, quyen) {
            $.ajax({
                url: '../../../BackEnd/AdminBE/TaiKhoanBE.php',
                type: 'POST',
                dataType: "json",
                data: {
                    tenDangNhap: tenDangNhap,
                    matKhau: matKhau,
                    quyen: quyen
                },
                success: function(data) {
                    return data.status === 200;
                },
                error: function(xhr, status, error) {
                    console.error('Error: ' + xhr.status + ' - ' + error);
                }
            });
        }

        function createNguoiDung(hoTen, ngaySinh, gioiTinh, soDienThoai, email, diaChi) {
            $.ajax({
                url: '../../../BackEnd/AdminBE/NguoiDungBE.php',
                type: 'POST',
                dataType: "json",
                data: {
                    hoTen: hoTen,
                    ngaySinh: ngaySinh,
                    gioiTinh: gioiTinh,
                    soDienThoai: soDienThoai,
                    email: email,
                    diaChi: diaChi
                },
                success: function(data) {
                    return data.status === 200;
                },
                error: function(xhr, status, error) {
                    console.error('Error: ' + xhr.status + ' - ' + error);
                }
            });
        }



    </script>

    <script>

        const loginButton = document.getElementById("signInButton");
        const tenDangNhap = document.getElementById("tenDangNhapLogin");
        const matKhau = document.getElementById("passwordLogin");
        loginButton.addEventListener("click", (event) => {
            event.preventDefault();
            if (tenDangNhap.value.trim() === ""){
                alert("Bạn không được để trống tên đăng nhập !!");
                tenDangNhap.focus();
                return
            }
            if (matKhau.value.trim() === ""){
                alert("Bạn không được để trống mật khẩu !!");
                matKhau.focus();
                return
            }
            checkTaiKhoan(tenDangNhap.value.trim())
        });

        
        
       // Hàm xử lý kiểm tra tài khoản
        function checkTaiKhoan(tenDangNhap) {
            $.ajax({
                url: '../../../BackEnd/AdminBE/TaiKhoanBE.php',
                type: 'GET',
                dataType: "json",
                async: false,
                data: {
                    tenDangNhap: tenDangNhap,
                    isLogin: true
                },
                success: function(data) {
                    // console.log(data);
                    // console.log(data.data.TrangThai);
                    if (data.status === 200 && data.data && data.data.MatKhau === matKhau.value) {
                        if (data.data.TrangThai == 0) {
                            alert("Tài khoản của bạn đã bị khóa !!");
                        } else {
                            alert("Đăng nhập thành công!");

                            quyen = data.data.Quyen
                            // Lưu dữ liệu vào localStorage
                            localStorage.setItem('key', JSON.stringify(data.data) );

                            if (quyen === "Admin"){
                                window.location.href = `../../AdminUI/QLTaiKhoan.php`;

                            }else if(quyen === "Manager"){
                                window.location.href = `../../ManagerUI/QLLoaiSanPham/QLLoaiSanPham.php`;

                            }else{
                                window.location.href = `../SignedHomePage/SignedHomePage.php`;

                            }

                            object = localStoeage.getItem('key');

                            // console.log(object);

                            // const bcrypt = require('bcryptjs');

                            // const saltRounds = 10; // Số vòng lặp để tạo salt

                            // // Mã hóa mật khẩu
                            // bcrypt.hash("123456", saltRounds, function(err, hash) {
                            //     if (err) {
                            //         console.error('Error:', err);
                            //     } else {
                            //         console.log('Mật khẩu đã được mã hóa:', hash);
                            //     }
                            // });



                        }
                    } else {
                        alert("Đăng nhập thất bại, hãy kiểm tra lại tên đăng nhập và mật khẩu !!");
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Lỗi:', error);
                    alert("Đã xảy ra lỗi khi kiểm tra tài khoản!");
                }
            });
        }
    </script>
    
  </body>
</html>
