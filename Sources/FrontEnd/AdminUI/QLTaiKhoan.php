

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="oneForAll.css" />
    <link rel="stylesheet" href="Admin.css" />

    <title>Quản lý tài khoản</title>
</head>

<body>
    <div id="root">
        <div>
            <div class="App">
                <div class="StaffLayout_wrapper__CegPk">

                    <div class="StaffHeader_wrapper__IQw-U">
                        <p class="StaffHeader_title__QxjW4">Dekanta</p>
                        <button id="logoutButton" class="StaffHeader_signOut__i2pcu" >
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket" class="svg-inline--fa fa-arrow-right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 2rem; height: 2rem; color: white">
                            <path fill="currentColor" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"></path>
                        </svg>
                        </button>
                    </div>

                    <div>
                        <div>
                            <div class="Manager_wrapper__vOYy">
                            <div style="width: 100%; padding-right: 2rem">
                                    <div class="wrapper">
                                        <div class="Admin_rightBar__RXnS9">
                                            <div style="display: flex; margin-bottom: 1rem; align-items: center;">
                                                <p class="Admin_title__1Tk48">Tài Khoản</p>
                                                <a href="FormCreateTaiKhoan.php" id="createAccountButton">Tạo Tài Khoản</a>
                                            </div>
                                        <div class="Admin_boxFeature__ECXnm">
                                            <div style="position: relative;">
                                                <input class="Admin_input__LtEE-" placeholder="Tìm kiếm tài khoản">
                                            </div>
                                            <select id="selectQuyen" style="height: 3rem; padding: 0.3rem;" >
                                                <option value="">Quyền Hạn : Tất Cả</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Member">Member</option>
                                            </select>
                                            <button id="searchButton" style="">Tìm kiếm</button>

                                        </div>

                                        <div class="Admin_boxTable__hLXRJ">
                                                <table class="Table_table__BWPy">
                                                    <thead class="Table_head__FTUog">
                                                        <tr>
                                                            <th class="Table_th__hCkcg">Mã Tài Khoản</th>
                                                            <th class="Table_th__hCkcg">Tên đăng nhập</th>
                                                            <th class="Table_th__hCkcg">Email</th>
                                                            <th class="Table_th__hCkcg">Ngày tạo</th>
                                                            <th class="Table_th__hCkcg">Trạng thái</th>
                                                            <th class="Table_th__hCkcg">Quyền</th>
                                                            <th class="Table_th__hCkcg">Thao tác</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="tableBody">
                                                        <?php
                                                            require_once "../../BackEnd/AdminBE/TaiKhoanBE.php";
                                                            require_once "../../BackEnd/AdminBE/NguoiDungBE.php";

                                                            $result = getAllTaiKhoan(1, "", null, null);
                                                            $totalPage = $result->totalPages;
                                                            $Ketqua = $result->data;

                                                            foreach ($Ketqua as $record) {
                                                                $trangThai = $record['TrangThai'] == 0 ? "Khóa" : "Hoạt động";
                                                                $ngayTao = date('H:i:s d/m/Y', strtotime($record['NgayTao']));
                                                                $buttonText = $record['TrangThai'] == 0 ? "Mở khóa" : "Khóa";
                                                                $buttonClass = $record['TrangThai'] == 0 ? "unlock" : "block";
                                                                $buttonData = $record['TrangThai'] == 0 ? "unlock" : "block";
                                                                echo ' 
                                                                    <form id="updateForm" method="post" action="FormUpdateTaiKhoan.php?maTaiKhoan=' . $record['MaTaiKhoan'] . '&quyen=' . $record['Quyen'] . '&hoTen=' . $record['HoTen'] . '&gioiTinh=' . $record['GioiTinh'] . '&email=' . $record['Email'] . '&ngaySinh=' . $record['NgaySinh'] . '&diaChi=' . $record['DiaChi'] . '&soDienThoai=' . $record['SoDienThoai'] . '">
                                                                        <tr>
                                                                            <td class="Table_data_quyen_' . ((int)$record['MaTaiKhoan'] % 2 !== 0 ? '1' : '2') . '" style="width: 130px;">' . $record['MaTaiKhoan'] . '</td>
                                                                            <td class="Table_data_quyen_' . ((int)$record['MaTaiKhoan'] % 2 !== 0 ? '1' : '2') . '">' . $record['TenDangNhap'] . '</td>
                                                                            <td class="Table_data_quyen_' . ((int)$record['MaTaiKhoan'] % 2 !== 0 ? '1' : '2') . '">' . $record['Email'] . '</td>
                                                                            <td class="Table_data_quyen_' . ((int)$record['MaTaiKhoan'] % 2 !== 0 ? '1' : '2') . '">' . $ngayTao . '</td>
                                                                            <td class="Table_data_quyen_' . ((int)$record['MaTaiKhoan'] % 2 !== 0 ? '1' : '2') . '">' . $trangThai . '</td>
                                                                            <td class="Table_data_quyen_' . ((int)$record['MaTaiKhoan'] % 2 !== 0 ? '1' : '2') . '">' . $record['Quyen'] . '</td>
                                                                            <td class="Table_data_quyen_' . ((int)$record['MaTaiKhoan'] % 2 !== 0 ? '1' : '2') . '">
                                                                                <button class="edit" onclick="update(' . $record['MaTaiKhoan'] . ', \'' . $record['Quyen'] . '\', \'' . $record['HoTen'] . '\', \'' . $record['GioiTinh'] . '\', \'' . $record['Email'] . '\', \'' . $record['NgaySinh'] . '\', \'' . $record['DiaChi'] . '\', \'' . $record['SoDienThoai'] . '\')">Sửa</button>
                                                                                <button class="' . $buttonClass . '" data-action="' . $buttonData . '">' . $buttonText . '</button>
                                                                            </td>
                                                                        </tr>
                                                                    </form>';
                                                            
                                                            }
                                                        ?>
                                                    </tbody>
                                                    
                                                </table>
                                        
                                            <div class="pagination">
                                                <?php
                                                    for ($i = 1; $i <= $totalPage; $i++) {
                                                        echo '<button class="pageButton" onclick="fetchDataAndUpdateTable(' . $i . ')">' . $i . '</button>';
                                                    }
                                                ?>
                                            </div>


                                        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Lắng nghe sự kiện click trên nút logout
    document.addEventListener('DOMContentLoaded', function() {
        var logoutButton = document.getElementById('logoutButton');
        if (logoutButton) {
            logoutButton.addEventListener('click', function() {
                localStorage.removeItem('key');
                window.location.href = '../../FrontEnd/MemberUI/Login/LoginUI.php';
            });
        }
    });

    // Hàm để xóa hết các dòng trong bảng
    function clearTable() {
        var tableBody = document.querySelector('.Table_table__BWPy tbody');
        tableBody.innerHTML = ''; // Xóa nội dung trong tbody
    }

    // Hàm getAllTaiKhoan
    function getAllTaiKhoan(page, search, quyen) {
        $.ajax({
            url: '../../BackEnd/AdminBE/TaiKhoanBE.php',
            type: 'GET',
            dataType: "json",
            data: {
                page: page,
                search: search,
                quyen: quyen
            },
            success: function(response) {
                var data = response.data;
                var tableBody = document.getElementById("tableBody"); // Lấy thẻ tbody của bảng
                var tableContent = ""; // Chuỗi chứa nội dung mới của tbody

                // Duyệt qua mảng dữ liệu và tạo các hàng mới cho tbody
                data.forEach(function(record) {
                    var trClass = (parseInt(record.MaTaiKhoan) % 2 !== 0) ? "Table_data_quyen_1" : "Table_data_quyen_2"; // Xác định class của hàng

                    var ngayTao = new Date(record.NgayTao);
                    var ngayTaoFormatted = ngayTao.toLocaleString();

                    // Xác định trạng thái và văn bản của nút dựa trên trạng thái của tài khoản
                    var buttonText = (record.TrangThai === 0) ? "Mở khóa" : "Khóa";
                    var buttonClass = (record.TrangThai === 0) ? "unlock" : "block";
                    var buttonData = (record.TrangThai === 0) ? "unlock" : "block";

                    var trContent = `
                    <form id="updateForm" method="post" action="FormUpdateTaiKhoan.php?maTaiKhoan=${record.MaTaiKhoan}&quyen=${record.Quyen}&hoTen=${record.HoTen}&gioiTinh=${record.GioiTinh}&email=${record.Email}&ngaySinh=${record.NgaySinh}&diaChi=${record.DiaChi}&soDienThoai=${record.SoDienThoai}">
                        <tr>
                            <td class="${trClass}" style="width: 130px;">${record.MaTaiKhoan}</td>
                            <td class="${trClass}">${record.TenDangNhap}</td>
                            <td class="${trClass}">${record.Email}</td>
                            <td class="${trClass}">${ngayTaoFormatted}</td>
                            <td class="${trClass}">${record.TrangThai === 0 ? "Khóa" : "Hoạt động"}</td>
                            <td class="${trClass}">${record.Quyen}</td>
                            <td class="${trClass}">
                                <button class="edit" onclick="update(${record.MaTaiKhoan}, '${record.Quyen}', '${record.HoTen}', '${record.GioiTinh}', '${record.Email}', '${record.NgaySinh}', '${record.DiaChi}', '${record.SoDienThoai}')">Sửa</button>
                                <button class="${buttonClass}" data-action="${buttonData}" onclick="handleLockUnlock(${record.MaTaiKhoan}, ${record.TrangThai}, '${record.Quyen}')">${buttonText}</button>
                            </td>
                        </tr>
                    </form>`

                    tableContent += trContent; // Thêm nội dung của hàng vào chuỗi tableContent
                });

                // Thiết lập lại nội dung của tbody bằng chuỗi tableContent
                tableBody.innerHTML = tableContent;

                // Tạo phân trang
                createPagination(page, response.totalPages);
            },

            error: function(xhr, status, error) {
                console.error('Lỗi khi gọi API: ', error);
            }
        });
    }

    // Hàm để gọi getAllTaiKhoan và cập nhật dữ liệu và phân trang
    function fetchDataAndUpdateTable(page, search, quyen) {
        //Clear dữ liệu cũ
        clearTable();

        // Gọi hàm getAllTaiKhoan và truyền các giá trị tương ứng
        getAllTaiKhoan(page, search, quyen);
    }

    // Khởi tạo trang hiện tại
    var currentPage = 1;
    fetchDataAndUpdateTable(currentPage, '', '');

    // Hàm để gọi getAllTaiKhoan và cập nhật dữ liệu và phân trang
    function fetchDataAndUpdateTable(page, search, quyen) {
        //Clear dữ liệu cũ
        clearTable();

        // Gọi hàm getAllTaiKhoan và truyền các giá trị tương ứng
        getAllTaiKhoan(page, search, quyen);
    }

    // Hàm tạo nút phân trang
    function createPagination(currentPage, totalPages) {
        var paginationContainer = document.querySelector('.pagination');
        var searchValue = document.querySelector('.Admin_input__LtEE-').value;
        var quyenValue = document.querySelector('#selectQuyen').value;

        // Xóa nút phân trang cũ (nếu có)
        paginationContainer.innerHTML = '';

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
                // Gọi hàm fetchDataAndUpdateTable khi người dùng click vào nút phân trang
                fetchDataAndUpdateTable(index + 1, searchValue, quyenValue); // Thêm 1 vào index để chuyển đổi về trang 1-indexed
            });
        });

        // Đánh dấu trang hiện tại
        paginationContainer.querySelector('.pageButton:nth-child(' + currentPage + ')').classList.add('active'); // Sửa lại để chỉ chọn trang hiện tại
    }

    // Hàm xử lý sự kiện khi select Quyen thay đổi
    document.querySelector('#selectQuyen').addEventListener('change', function() {
        var searchValue = document.querySelector('.Admin_input__LtEE-').value;
        var quyenValue = this.value;

        // Truyền giá trị của biến currentPage vào hàm fetchDataAndUpdateTable
        fetchDataAndUpdateTable(currentPage, searchValue, quyenValue);
    });

    // Hàm xử lý sự kiện khi nút tìm kiếm được click
    document.getElementById('searchButton').addEventListener('click', function() {
        var searchValue = document.querySelector('.Admin_input__LtEE-').value;
        var quyenValue = document.querySelector('#selectQuyen').value;

        // Truyền giá trị của biến currentPage vào hàm fetchDataAndUpdateTable
        fetchDataAndUpdateTable(currentPage, searchValue, quyenValue, '');
    });

    // Bắt sự kiện khi người dùng ấn phím Enter trong ô tìm kiếm
    document.querySelector('.Admin_input__LtEE-').addEventListener('keypress', function(event) {
        // Kiểm tra xem phím được ấn có phải là Enter không (mã phím 13)
        if (event.key === 'Enter') {
            // Ngăn chặn hành động mặc định của phím Enter (ví dụ: gửi form)
            event.preventDefault();

            // Lấy giá trị của ô tìm kiếm và của select quyền
            var searchValue = this.value;
            var quyenValue = document.querySelector('#selectQuyen').value;

            // Truyền giá trị của biến currentPage vào hàm fetchDataAndUpdateTable
            fetchDataAndUpdateTable(currentPage, searchValue, quyenValue);
        }
    });

    // Hàm xử lý sự kiện cho nút khóa / mở khóa
    function handleLockUnlock(maTaiKhoan, trangThai, quyen) {
        var newTrangThai = trangThai === 0 ? 1 : 0; // Đảo ngược trạng thái

        // Hiển thị hộp thoại xác nhận
        var confirmation = confirm(`Bạn có muốn ${newTrangThai === 0 ? 'khóa' : 'mở khóa'} tài khoản ${maTaiKhoan} không?`);

        // Kiểm tra xác nhận của người dùng
        if (confirmation) {
            // Gọi hàm updateTaiKhoan bằng Ajax
            $.ajax({
                url: '../../BackEnd/AdminBE/TaiKhoanBE.php',
                type: 'POST',
                dataType: "json",
                data: {
                    maTaiKhoan: maTaiKhoan,
                    trangThai: newTrangThai,
                    quyen: quyen
                },
                success: function(response) {
                    // Nếu cập nhật thành công, reload bảng
                    if (response.status === 200) {
                        alertContent = newTrangThai === 0 ? "khóa" : "mở khóa";
                        alert(`Bạn đã ${alertContent} thành công !!`);
                        fetchDataAndUpdateTable(currentPage, '', '');
                    } else {
                        console.error('Lỗi khi cập nhật tài khoản: ', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi gọi API: ', error);
                }
            });
        }
    }


    function update(maTaiKhoan, quyen, hoTen, gioiTinh, email, ngaySinh, diaChi, soDienThoai) {
        // Lấy ra form bằng id của nó
        var form =  document.querySelector("#updateForm");
        
        // Gửi form đi
        form.submit();

    }




</script>


</html>
