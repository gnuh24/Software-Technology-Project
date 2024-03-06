<?php

$arrWine = array(
    "sp01" => array(
        "Id" => "0001",
        "Ten" => "Rượu Hennessy VS chính hãng",
        "NongDo" => "10%",
        "DungTich" => "750ml",
        "Gia" => "820,000đ",
        "SoLuong" => "20",
        "Mota" => "This is rượu mạnh vl",
        "TrangThai" => "Còn hàng",
        "Img" => "./img/ruou-vang-contramaestre-punctum-2l.jpg",
        "IdThuongHieu" => "HE",
        "ThuongHieu" => "Hennessy",
        "IdQuocGia" => "FR",
        "QuocGia" => "Pháp",
    ),
    "sp02" => array(
        "Id" => "0002",
        "Ten" => "Chivas 18 Mizunara",
        "NongDo" => "40%",
        "DungTich" => "700ml",
        "Gia" => "2,200,000đ",
        "SoLuong" => "20",
        "Mota" => "This is rượu mạnh promax",
        "TrangThai" => "Còn hàng",
        "Img" => "./img/chivas-18-mizunara-nhap-khau-chinh-hang.jpg",
        "IdThuongHieu" => "CH",
        "ThuongHieu" => "Blended Whisky",
        "IdQuocGia" => "SC",
        "QuocGia" => "Scotland",
    ),
    "sp03" => array(
        "Id" => "0003",
        "Ten" => "Rượu Rum Malibu Original 700ml",
        "NongDo" => "40%",
        "DungTich" => "700ml",
        "Gia" => "425,000đ",
        "SoLuong" => "20",
        "Mota" => "This is rượu mạnh promax",
        "TrangThai" => "Còn hàng",
        "Img" => "./img/ruou-malibu.jpg",
        "IdThuongHieu" => "RU",
        "ThuongHieu" => "Rum",
        "IdQuocGia" => "ME",
        "QuocGia" => "Mexico",
    ),
    "sp04" => array(
        "Id" => "0004",
        "Ten" => "Rượu Vodka Absolut Elyx 1 Lít",
        "NongDo" => "40%",
        "DungTich" => "1000ml",
        "Gia" => "1,750,000đ",
        "SoLuong" => "20",
        "Mota" => "This is rượu mạnh promax",
        "TrangThai" => "Còn hàng",
        "Img" => "./img/ruou-absolut-elyx-vodka.jpg",
        "IdThuongHieu" => "AB",
        "ThuongHieu" => "Absolut",
        "IdQuocGia" => "SW",
        "QuocGia" => "Thụy Điển",
    ),
);

?>





<div class="product-tag product-list-container">
<div class="attrlist-actions">
<div class="container">
<div class="faceted-search-container" data-select2-id="select2-data-27-po28">
<div class="faceted-search" id="box_select_filter">
    <form action="Sanpham.php" method="get">
<div class="facet-group">
    <label class="facet-label">KHOẢNG GIÁ</label>
    <div id="facet-body-categoryid" class="facet-body">
        <select name="price_space" id="input_filter_price_space"  class="select2" value="<?php if(isset($_GET['Gia'])) {echo $_GET['Gia'];   }?>">
             <option class="list_filter_title toggleCtl change_btn_minus" value="">-- Tất cả --</option>
            <option value="90000-300000">90,000 - 300,000</option>
            <option value="300000-500000">300,000 - 500,000</option>
            <option value="500000-700000">500,000 - 700,000</option>
            <option value="700000-1000000">700,000 - 1,000,000</option>
            <option value="1000000-5000000">1,000,000 - 5,000,000</option>
            <option value="5000000-99999999"> > 5,000,000</option>
        </select>
    </div>
</div>
<div class="facet-group">
<label class="facet-label">THƯƠNG HIỆU</label>
<div class="facet-body">
<select name="attrs[]" class="select2" id="input_filter_brand" tabindex="0" aria-hidden="false" value="<?php if(isset($_GET["Idthuonghieu"])) {echo $_GET["Idthuonghieu"];} ?>">
<option class="list_filter_title toggleCtl change_btn_minus" value="">-- Tất cả --</option>
<option value="HE">Hennessy</option>
<option value="BW">Blended Whisky</option>
<option value="RU">Rum</option>
<option value="AB">Absolute</option>
</select>
</div>
</div>
<div class="facet-group">
<label class="facet-label">THỂ TÍCH</label>
<div class="facet-body">
<select name="attrs[]" class="select2" id="input_filter_volume" tabindex="0" aria-hidden="false"  value="<?php if(isset($_GET["Dungtich"])) {echo $_GET["Dungtich"];} ?>">
<option class="list_filter_title toggleCtl change_btn_minus" value="">-- Tất cả --</option>
<option value="0-499"> < 500ml </option>
<option value="500-750"> 500ml - 750ml </option>
<option value="1000-9999"> > 1000ml </option>
</select>
</div>
</div>
<div class="facet-group">
<label class="facet-label">NỒNG ĐỘ CỒN</label>
<div class="facet-body">
<select name="attrs[]" class="select2" id="input_filter_alcohol" tabindex="0" aria-hidden="false">
<option class="list_filter_title toggleCtl change_btn_minus" value="">-- Tất cả --</option>
</select>
</div>
</div>
<div class="facet-group">
<label class="facet-label">XUẤT XỨ</label>
<div class="facet-body">
<select name="attrs[]" class="select2" id="input_filter_" tabindex="0" aria-hidden="false">
<option class="list_filter_title toggleCtl change_btn_minus" value="" >-- Tất cả --</option>
</select>
</div>
</div>
<div class="facet-group">
<label class="facet-label">LOẠI VANG</label>
<div class="facet-body">
<select name="attrs[]" class="select2" id="input_filter_" tabindex="0" aria-hidden="false">
<option class="list_filter_title toggleCtl change_btn_minus" value="" >-- Tất cả --</option>
</select>
<div class="facet-group">
<input type="button" class="btn btn-outline-primary btn-filter" onclick="filterProducts()" value="Lọc">

</div>
</div>
</div>
<div class="input-group"> 
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search1" 
  value="<?php if(isset($_GET["serach1"])) {echo $_GET["serach1"];} ?>">
  <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



  <script>
   function filterProducts() {
        var priceSpaceSelect = document.getElementById('input_filter_price_space');
        var priceSpace = priceSpaceSelect.value;
        
        var brandSelect = document.getElementById('input_filter_brand');
        var brand = brandSelect.value;

        var volumeSelect = document.getElementById('input_filter_volume');
        var volume = volumeSelect.value;

        var searchInput = document.querySelector('input[name="search1"]');
        var search1 = searchInput.value;

        // Chuyển hướng trang với các tham số được chọn
        window.location.href = 'Sanpham.php?search1=' + encodeURIComponent(search1) + '&price_space=' + priceSpace + '&brand=' + brand + '&volume=' + volume;}




         // Kiểm tra xem trình duyệt có hỗ trợ History API hay không
    if (typeof window.history.replaceState === 'function') {
        // Xóa tham số truy vấn từ URL và thay đổi URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }

</script>