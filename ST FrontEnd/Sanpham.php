<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content - Type" content ="text/html; charswt-utf-8"/>
<style src="./css/mywebCSS.css"></style>
<style>
    .col-xs-6:hover .text_widget ,.col-sm-3:hover,.text_widget 
{
color: white;
 background-color: #b42222; /* Đổi màu nền khi hover */;

}
    </style>
<style>
    .container {
    max-width: 1200px;
    width: 100% !important;
    margin: 0 auto;
}
.container, .container-fluid {
    padding-right: 15px;
    padding-left: 15px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
      .facet-group {
      
        margin-right: 20px; /* Điều chỉnh khoảng cách giữa các phần tử */
        font-family: "Helve",Arial, Helvetica, sans-serif;
        display: inline-block;
    }
    .faceted-search {
        background-color: #f6f6f6; /* Đặt màu nền xám cho thanh chứa filter */
        padding: 10px; /* Thêm padding để tạo khoảng trống xung quanh */
        margin-bottom: 20px; /* Thêm margin để tạo khoảng cách với phần content dưới */
        display: flex; /* Sử dụng flexbox */
    justify-content: center; /* Căn giữa nội dung theo chiều ngang */
    } 
    select
    {
        
        width: 150px; 
    height: 50px;
    font-size: 16px;

}

/* ---CSS phần product---*/
#products-wrapper {
    margin-top: 20px; /* Thêm margin top để tạo khoảng cách với phần filter */
}
.product-inner {
    border: 3px solid black ;
    margin: 0 0 30px;
}   
.product_inner .wrap_figure {
    position: relative;
    overflow: hidden; /* Thêm thuộc tính này để xử lý vấn đề border không hiển thị */
    position: relative; /* Thêm thuộc tính này để xử lý vấn đề border không hiển thị */}

    .product_inner .wrap_figure figure {
    height: 355px;
    position: relative;}

    .product_inner .wrap_figure figure img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    max-height: 100%;
}

    img {
        height: 100%;
    object-fit: cover; /* Chỉnh sửa để fit hình vào kích thước của figure */
}
a
{
    color: black;
    text-decoration: none;

}
.product_inner .text_widget {
    background: #f2f2f2;
    padding: 20px;
}
.col-xs-6, .col-sm-3 {
    margin-bottom: 20px; /* Thêm margin-bottom để tạo khoảng cách dưới cho các phần tử */
    margin-left: 20px;
    border: 3px solid #dfdfdf ;
    background-color: #f2f2f2;
}
.col-sm-3
{
    width: 30%;
}
.col-xs-6 {
    width: 20%;
}
.product_inner .text_widget h3 a {
    color: #262626;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    -webkit-line-clamp: 3;
    overflow: hidden;
    min-height: 68px;
    max-height: 70px;
}
.product_inner .text_widget h3 {
    text-align: center;
    font-size: 18px;
    line-height: 23px;
    margin: 0 0 10px;
    font-family: svn-medium;
}
.product_inner .text_widget .pro_price {
    text-align: center;
    font-size: 19px;
    line-height: 23px;
}
.product_inner .text_widget .pro_price .listed_price {
    font-family: svn-bold;
    color: red;
    margin: 0 10px 0 0;}
strong
{
    font-weight: 700;
}
figure {
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
}
body, figure {
    margin: 0;
}
figure {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 40px;
    margin-inline-end: 40px;
}
.product_labels {
    position: absolute;
    top: 14px;
    right: 7px;
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-end;
}
</style>


    <link rel="stylesheet" href="./bootstrap-5.2.1-dist/css/bootstrap-grid.min.css">

</head>
</head>
<body id="body">
    <?php
      require"filter.php";
      require"contentSanpham.php";
    ?>
<script src="js/mywebJS'.js"></script>

</body>
</html>