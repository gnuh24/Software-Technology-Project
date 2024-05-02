<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../AdminDemo.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../QLNhaCungCap/QLNhaCungCap.css" />

    <title>Cập nhật nhà cung cấp</title>
</head>

<body>
    <div id="root">
        <div>
            <div class="App">
                <div class="StaffLayout_wrapper__CegPk">
                    <div class="StaffHeader_wrapper__IQw-U">
                        <p class="StaffHeader_title__QxjW4">Dekanta</p>
                        <button class="StaffHeader_signOut__i2pcu">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket" class="svg-inline--fa fa-arrow-right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 2rem; height: 2rem; color: white"></svg>
                        </button>
                    </div>
                    <div>
                        <div>
                            <div class="Manager_wrapper__vOYy">
                                <div style="padding-left: 3%; width: 100%; padding-right: 2rem">
                                    <div class="wrapper">
                                        <div style="display: flex; padding-top: 1rem; align-items: center; gap: 1rem; padding-bottom: 1rem;"></div>
                                        <form id="submit-form" method="post">
                                            <input type="hidden" name="action" value="updateSupplier">
                                            <div class="boxFeature">
                                                <div>
                                                    <h2 style="font-size: 2.3rem">Cập nhật thông tin nhà cung cấp</h2>
                                                </div>
                                                <div>
                                                    <a style="font-family: Arial; font-size: 1.5rem; font-weight: 700; border: 1px solid rgb(140, 140, 140); background-color: white; color: rgb(80, 80, 80); padding: 1rem 2rem 1rem 2rem; border-radius: 0.6rem; cursor: pointer;" href="./QLNhaCungCap.php">Hủy</a>
                                                    <button id="updateSupplier_save" style="margin-left: 1rem; font-family: Arial; font-size: 1.5rem; font-weight: 700; color: white; background-color: rgb(65, 64, 64); padding: 1rem 2rem 1rem 2rem; border-radius: 0.6rem; cursor: pointer;">Lưu</button>
                                                </div>
                                            </div>
                                            <div class="boxTable">
                                                <div style="display: flex; padding: 0rem 1rem 0rem 1rem; justify-content: space-between;">
                                                    <div>
                                                        <?php

                                                        $MaNCC = "";
                                                        $TenNCC =  "";
                                                        $Email =  "";
                                                        $SoDienThoai =  "";

                                                        if (isset($_GET['MaNCC'])) {
                                                            // Lấy các tham số được gửi từ AJAX
                                                            $MaNCC = $_GET['MaNCC'];
                                                            $TenNCC = $_GET['TenNCC'];
                                                            $Email = $_GET['Email'];
                                                            $SoDienThoai = $_GET['SoDienThoai'];
                                                        }
                                                        echo '
                                                            <div style="padding-left: 1rem">

                                                                <div style="display: flex; gap: 2rem">
                                                                    <div>
                                                                        <p class="text">Mã nhà cung cấp<span style="color: red; margin-left: 10px;">🔒</span></p>
                                                                        <input style="user-select: none; pointer-events: none; caret-color: transparent;" id="MaNCC" class="input" name="MaNCC" readonly value="' . ($MaNCC) . '" />
                                                                    </div>
                                                                </div>

                                                                <p class="text">Nhà cung cấp</p>
                                                                <input id="TenNCC" class="input" type="text" name="TenNCC" style="width: 40rem" value="' . ($TenNCC) . '" />

                                                                <div style="display: flex; gap: 2rem">
                                                                    <div>
                                                                        <p class="text">Email</p>
                                                                        <input id="Email" class="input" name="Email" value="' . ($Email) . '" />
                                                                    </div>
                                                                </div>

                                                            
                                                                <div style="display: flex; gap: 2rem">
                                                                    <div>
                                                                        <p class="text">Số điện thoại</p>
                                                                        <input id="SoDienThoai" class="input" style="width: 30rem" name="SoDienThoai" value="' . ($SoDienThoai) . '" />
                                                                    </div>

                                                                </div>
                                                            </div>';

                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById("updateSupplier_save").addEventListener('click', function check(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của form

        let MaNCC = document.getElementById("MaNCC");
        let TenNCC = document.getElementById("TenNCC");
        let SoDienThoai = document.getElementById("SoDienThoai");
        let Email = document.getElementById("Email");


        if (!TenNCC.value.trim()) {
            alert("Tên nhà cung cấp không được để trống");
            TenNCC.focus();
            event.preventDefault();
            return;
        }
        if (!SoDienThoai.value.trim()) {
            alert("Số điện thoại không được để trống");
            SoDienThoai.focus();
            event.preventDefault();
            return;
        }
        //Kiểm tra tên nhà cung cấp
        // if (isTenNhaCungCapExists(TenNCC.value.trim())) {
        //     alert("Tên nhà cung cấp đã tồn tại");
        //     TenNCC.focus();
        //     event.preventDefault();
        //     return;
        // }

        //Bắt đầu cập nhật thông tin nhà cung cấp sau khi đã qua các bước xác nhận
        let isUpdateNhaCungCapComplete = updateNhaCungCap(
            MaNCC.value,
            TenNCC.value,
            SoDienThoai.value,
            Email.value)

        //Sau khi tạo xong chuyển về trang QLNhaCungCap
        alert("Cập nhật nhà cung cấp thành công !!");
        window.location.href = 'QLNhaCungCap.php';

    });

    function isTenNhaCungCapExists(value) {
        let exists = false;
        $.ajax({
            url: '../../../BackEnd/ManagerBE/NhaCungCapBE.php',
            type: 'GET',
            dataType: "json",
            async: false, // Đảm bảo AJAX request được thực hiện đồng bộ
            data: {
                TenNCC: value
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

    function updateNhaCungCap(MaNCC, TenNCC, Email, SoDienThoai) {
        $.ajax({
            url: '../../../BackEnd/ManagerBE/NhaCungCapBE.php',
            type: 'POST',
            dataType: "json",
            data: {
                MaNCC: MaNCC,
                TenNCC: TenNCC,
                Email: Email,
                SoDienThoai: SoDienThoai
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

</html>