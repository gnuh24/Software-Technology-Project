<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banruou";

// // Tạo kết nối
// $conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
// if ($conn->connect_error) {
//   die("Kết nối database thất bại: " . $conn->connect_error);
// }

// Xử lý hành động
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case "them":
      // Lấy dữ liệu từ form
      $tenloai = $_POST['tenloai'];
      $mota = $_POST['mota'];
      $hinh = $_FILES['hinh']['name'];

      // Thêm dữ liệu vào database
      $sql = "INSERT INTO loairuou (tenloai, mota, hinh) VALUES ('$tenloai', '$mota', '$hinh')";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thêm mới loại sản phẩm rượu thành công!'); window.location.href='danhsach.php';</script>";
      } else {
        echo "<script>alert('Lỗi: " . $conn->error . "'); window.location.href='them.php';</script>";
      }

      // Upload hình ảnh
      if ($hinh != "") {
        move_uploaded_file($_FILES['hinh']['tmp_name'], "uploads/" . $hinh);
      }
      break;

    case "sua":
      // Lấy id từ URL
      $id = $_GET['id'];

      // Lấy dữ liệu từ form
      $tenloai = $_POST['tenloai'];
      $mota = $_POST['mota'];
      $hinh = $_FILES['hinh']['name'];

      // Cập nhật dữ liệu vào database
      $sql = "UPDATE loairuou SET tenloai='$tenloai', mota='$mota', hinh='$hinh' WHERE id=$id";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật loại sản phẩm rượu thành công!'); window.location.href='danhsach.php';</script>";
      } else {
        echo "<script>alert('Lỗi: " . $conn->error . "'); window.location.href='sua.php?id=$id';</script>";
      }

      // Upload hình ảnh
      if ($hinh != "") {
        move_uploaded_file($_FILES['hinh']['tmp_name'], "uploads/" . $hinh);
      }
      break;

    case "xoa":
      // Lấy id từ URL
      $id = $_GET['id'];

      // Xóa dữ liệu khỏi database
      $sql = "DELETE FROM loairuou WHERE id=$id";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa loại sản phẩm rượu thành công!'); window.location.href='danhsach.php';</script>";
      } else {
        echo "<script>alert('Lỗi: " . $conn->error . "'); window.location.href='danhsach.php';</script>";
      }
      break;
  }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquor Brands</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Liquor Brands.css">
</head>
<body> 
<div class="container">
    <div class="col-lg-5">
    <div class="headerad"> DANH SÁCH LOẠI SẢN PHẨM RƯỢU</div>
      <br><br><br><br>

      <!-- Bảng hiển thị các loại sản phẩm rượu --> 
        <table border="1">
          <thead>
          <tr>
          <th class="text-center">Tên loại sản phẩm</th>
          <th class="text-center">Mô tả</th>
          <th class="text-center">Hình ảnh</th>
          <th class="text-center">Chỉnh sửa</th>
          </tr>
          </thead>
          <tr>
          <td class="text-center">Vang Đỏ Vistana Cabernet Sauvignon</td>
          <td class="text-center">Nó là rượu</td>
          <td><img src="./img/VangDo.jpg" width="100"></td>
          <td class="align-middle"><a href="sua.php?id=1">Sửa</a>  
          <a href="xoa.php?id=1">Xóa</a></td>
          </tr>
          <tr>
          <td class="text-center">Vang Trắng Moscato Dolce Guarini</td>
          <td class="text-center">Nó là rượu</td>
          <td><img src="./img/VangY.jpg" width="100"></td>
          <td class="align-middle"><a href="sua.php?id=2">Sửa</a>  
          <a href="xoa.php?id=2">Xóa</a></td>
          </tr>
          <tr>
          <td class="text-center">Whisky Liqueurs</td>
          <td class="text-center">Nó là rượu</td>
          <td><img src="./img/Whisky.jpg" width="100"></td>
          <td class="align-middle"><a href="sua.php?id=2">Sửa</a>  
          <a href="xoa.php?id=2">Xóa</a></td>
          </tr>
          <tr>
          <td class="text-center">Cognac Tesseron Composition Fine Champagne</td>
          <td class="text-center">Nó là rượu</td>
          <td><img src="./img/Cognac.jpg" width="100"></td>
          <td class="align-middle"><a href="sua.php?id=2">Sửa</a>  
          <a href="xoa.php?id=2">Xóa</a></td>
          </tr>
          <tr>
          <td class="text-center">Bowmans Virginia Vodka</td>
          <td class="text-center">Nó là rượu</td>
          <td><img src="./img/vodka.jpg" width="100"></td>
          <td class="align-middle"><a href="sua.php?id=2">Sửa</a>  
          <a href="xoa.php?id=2">Xóa</a></td>
          </tr>
        </table> 
    </div>



    <!-- Bảng tạo mới loại sản phẩm rượu -->
    <div class="col-lg-4">
      <form action="them.php" method="post" id="frmnhapsp">
      <h3>Tạo mới loại sản phẩm rượu</h3>
        <div class="containbox">
        <label for="productType">
        Tên loại sản phẩm: <input type="text" name="tenloai" id="productType">
      </label>
        
        <label for="describe">
        Mô tả: <textarea name="mota" id="describe"></textarea>
      </label>
        
        <label for="img">
        Hình ảnh: <input type="file" name="hinh" id="img" value="Chọn hình">
        </label>
        <br><br>
        <input type="submit" value="Thêm mới">
        </div>
      </form>
    </div>
  



   <!-- Bảng sửa loại sản phẩm rượu -->
  <div class="model">
    <div class="model-content">
      <form action="sua.php?id=1" method="post">
      <h1>Sửa loại sản phẩm rượu</h1>
      <div class="containbox">
          <label for="productType">
          Tên loại sản phẩm: <br> <input type="text" name="tenloai" id="productType">
        </label>
          <br>

          <label for="describe">
          Mô tả: <br> <textarea name="mota" id="describe"></textarea>
        </label>
          <br>

          <label for="img">
          Hình ảnh: <br> <input type="file" name="hinh" id="img" value="Chọn hình">
          </label>
          <br><br>

          <input type="submit" value="Cập nhật"><br>
          </div>
      </form>
    </div>
  </div>
</body>
</html>