<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $conn=mysqli_connect('localhost','root','','ProductType',3306) or die("Connection Failed:".mysqli_connect_error());
    if(isset($_POST['tenloai']) && isset($_POST['mota']) && isset($_POST['hinh'])) {
    $tenloai=$_POST['tenloai'];
    $mota=$_POST['mota'];
    $hinh=$_POST['hinh'];

    $sql="INSERT INTO `protype`(`tenloai`,`mota`,`hinh`) VALUES(`$tenloai`,`$mota`,`$hinh`)";

    $query=mysqli_query($conn,$sql);
    if($query){
        echo "Tiến vào thành công";
    }
    else{
        echo "Lỗi xảy ra";
    }
  }
}
?>