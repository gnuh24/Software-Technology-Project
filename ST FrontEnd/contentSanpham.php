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
        "IdThuongHieu" => "BW",
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
    "sp05" => array(
        "Id" => "0005",
        "Ten" => "Rượu Vodka Absolut Elyx 1 Lít",
        "NongDo" => "40%",
        "DungTich" => "1000",
        "Gia" => "750,000đ",
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

// Hàm lọc và tìm kiếm sản phẩm// Hàm lọc và tìm kiếm sản phẩm
function filterAndSearchProducts($arrWine) {
    // Biến chứa kết quả tìm kiếm
    $searchResults = $arrWine;

    // Kiểm tra xem có yêu cầu tìm kiếm hay không
    if(isset($_GET["search1"]) && !empty($_GET["search1"])) {
        // Tìm kiếm sản phẩm dựa trên từ khóa
        $searchResults = array();
        foreach($arrWine as $key => $value) {
            $productName = strtolower($value['Ten']);
            $productDescription = strtolower($value['Mota']);
            $searchTerm = strtolower($_GET["search1"]);
            if(strpos($productName, $searchTerm) !== false || strpos($productDescription, $searchTerm) !== false) {
                $searchResults[] = $value;
            }
        }
    }

    error_log('After search: ' . count($searchResults) . ' products found');

    // Lấy các giá trị lọc từ giao diện người dùng
    $priceRange = isset($_GET['price_space']) ? $_GET['price_space'] : '';
    $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
    $volumeFilter = isset($_GET['volume']) ? $_GET['volume'] : '';

    // Lọc sản phẩm dựa trên các tiêu chí
    $filteredProducts = filterProducts($searchResults, $priceRange, $brandFilter, $volumeFilter);

    error_log('After filter: ' . count($filteredProducts) . ' products found');

    // Trả về kết quả lọc và tìm kiếm
    return $filteredProducts;
}


function filterProducts($products, $priceRange, $brandFilter, $volumeFilter) {  
    $filteredProducts = array();

    foreach ($products as $key => $product) {
        $price = intval(str_replace(',', '', substr($product['Gia'], 0, -2)));
        $priceValid = true;
        if (!empty($priceRange)) {
            $priceValid = false;
            $priceBounds = explode('-', $priceRange);
            if (count($priceBounds) == 2) {
                $minPrice = intval($priceBounds[0]);
                $maxPrice = intval($priceBounds[1]);
                if ($price >= $minPrice && $price <= $maxPrice) {
                    $priceValid = true;
                }
            }
        }

        $brandValid = true;
        if (!empty($brandFilter)) {
            if ($product['IdThuongHieu'] != $brandFilter) {
                $brandValid = false;
            }
        }

        $volumeValid = true;
        if (!empty($volumeFilter)) {
            if ($product['DungTich'] != $volumeFilter) {
                $volumeValid = false;
            }
        }

        if ($priceValid && $brandValid && $volumeValid) {
            $filteredProducts[$key] = $product;
        }
    }

    return $filteredProducts;
}

// Lấy danh sách sản phẩm đã lọc và tìm kiếm
$filteredProducts = filterAndSearchProducts($arrWine);
 ?>

<div class="products-wrapper">
    <div class="container">
        <div class="active-filters-container">
            <div class="filter-text-items" id="filter_box"></div>
        </div>
        <style>
            #list_pro_filter .col-sm-3:nth-child(4n + 1) {
                clear: both;
            }
        </style>
        <div id="list_pro_filter">
            <div class="row">
                <?php
                if(!empty($filteredProducts)) {
                    foreach($filteredProducts as $result) {
                        // Hiển thị thông tin sản phẩm phù hợp với tìm kiếm
                        echo '<div class="col-xs-6 col-sm-3">';
                        echo '<div class="product_inner">';
                        echo '<div class="wrap_figure">';
                        echo '<a href="https://ruoutot.net/san-pham/ruou-vang-bich-la-roca-3-lit-5-lit">';
                        echo '<figure><img loading="lazy" alt="Rượu Vang Bịch La roca (3 lít – 5 lít)" class="lozad safelyLoadImage" data-src="https://ruoutot.net/s/uploads/products/1616068009-bich-la-roca-3l.jpg?w=355&amp;h=475&amp;fit=crop" onerror="this.onerror=null; this.src=\'/images/placeholder.jpg\';" src="'.$result["Img"].'"></figure>';
                        echo '<span class="product_labels"></span>';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="text_widget">';
                        echo '<h3><a href="https://ruoutot.net/san-pham/ruou-vang-bich-la-roca-3-lit-5-lit">'.$result["Ten"].'</a></h3>';
                        echo '<div class="pro_price">';
                        echo '<strong class="listed_price">'.$result["Gia"].'</strong>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    // Nếu không có kết quả tìm kiếm hoặc lọc
                    echo 'Không tìm thấy sản phẩm nào phù hợp với yêu cầu của bạn.';
                }
                ?>
            </div>
        </div>
    </div>
</div>