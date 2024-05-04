<header class="Home-container-header">
    <div id="Home-over-Header">
        <img id="Home-img" src="img/logoWine.jpg" alt="" />
        <form id="search" class="input__wrapper" method="post" action="GuestProduct.php">
            <input id="searchSanPham" name="searchFromAnotherPage" type="text" class="search-input" placeholder="Tìm kiếm" required=""/>
            <button id="filter-button"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>   
        <div id="Home-login">Login</div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    // Sự kiện tìm kiếm search 
    document.getElementById("filter-button").addEventListener("click", (event) => {
        event.preventDefault();
        const form = document.getElementById("search");
        const searchValue  = document.getElementById("searchSanPham").value;
        if (searchValue != ""){
            form.action = `GuestProduct.php?searchFromAnotherPage=${searchValue}`;
            form.submit();
        }else{
            Swal.fire({
                    title: 'Lỗi!',
                    text: 'Bạn cần phải nhập gì đó vào thanh tìm kiếm trước khi ấn nút tìm kiếm.',
                    icon: 'error',
                    confirmButtonText: 'OK'
            });
        }
        
    });
</script>