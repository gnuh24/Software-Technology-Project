<header class="Home-container-header">
    <div id="Home-over-Header">
        <img id="Home-img" src="../GuestPage/img/logoWine.jpg" alt="" />
        <form id="search" class="input__wrapper" method="post" action="SignedProduct.php">
            <?php
                if (isset($_GET['searchFromAnotherPage'])) {
                    echo '<input value="' . $_GET['searchFromAnotherPage'] . '" id="searchSanPham" type="text" class="search-input" placeholder="Tìm kiếm" required/>';
                } else {
                    echo '<input id="searchSanPham" type="text" class="search-input" placeholder="Tìm kiếm" required/>';
                }
            ?>                    
            <button id="filter-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            <div class="header-option" onclick="toCart()"><i class="fa-solid fa-cart-shopping"></i></div>
            <div class="header-option"><a href="Profile.php"><i class="fa-solid fa-user"></i></a></div>
            <div class="header-option" onclick="logout()"><a href="../Login/LoginUI.php"><i class="fa-solid fa-right-from-bracket"></i></a></div>
        </form>
    </div>
</header>
<script>

    //Click vào ảnh về trang chủ
    document.getElementById("Home-img").addEventListener("click", function () {
        // Chuyển hướng về trang chủ khi click vào hình ảnh
        window.location.href = "SignedHomePage.php";
    });

    

    //Sự kiện giỏ hàng
    function toCart() {
        const form = document.getElementById("search");
        if (form) {
            // Lấy dữ liệu từ localStorage
            const localStorageData = JSON.parse(localStorage.getItem("key"));
            const maTaiKhoan = localStorageData.MaTaiKhoan;

            // Thêm MaTaiKhoan vào action của form
            form.action = "Cart.php?maTaiKhoan=" + maTaiKhoan;
            // Gửi form đi
            form.submit();
        } else {
            console.error("Form not found!");
        }
    }


    //Sự kiện nút logout
    function logout() {
        localStorage.removeItem("key");
    }
</script>