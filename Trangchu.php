<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {
} else {
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
</head>

<body style="overflow: hidden;">
  <script src="main.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>



  <div id="main">
    <div id="header">
      <ul id="nav">
        <li><a href="Trangchu.php">Home</a></li>
        <li><a href="Edit_pass.php">Đổi mật khẩu</a></li>
        <li><a href="List/List.php">Xem danh sách</a></li>
        <li>
          <a href="./Logout.php">Logout
            <i class="nav-arrow-down ti-shift-left"></i>
          </a>

        </li>
      </ul>
    </div>
    <div id="slider" style="background: url('https://img4.thuthuatphanmem.vn/uploads/2020/08/01/anh-nen-mau-xam-2k-dep-nhat_055858734.jpg')top  /100% no-repeat;">
      <div class="text-content">
        <div class="text-heading">
          <h1 style="margin-right: 33px;">Tải ảnh Lên <i style="font-size: 28px;" class="ti-instagram"></i></h1>
          <form method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="uploadFile" placeholder="Tải ảnh lên" style="width:281px; height:38px;">
            <br>
            <div style="margin-right: 195px;">
            <input type="checkbox" name="TA1">Toán A1</input><br>
            </div>
            <div style="margin-right: 151px;">
            <input type="checkbox" name="KNM">Kĩ năng mềm</input><br>
            </div>
            <div style="margin-right: 36px;">
            <input type="checkbox" name="PTTK">Phân tích thiết kế hệ thống</input><br>
            </div>
            <input type="text" name="class" placeholder="Nhập lớp" style="width: 250px; height:25px;margin-right: 28px;"><br>
            <button type="submit" name="submit" value="Upload" style="width: 100px;height:26px;margin-right:177px;margin-top:5.5px">Điểm danh</button>
          </form>
          
        </div>
        <p style="margin-top:29%; margin-left: 47%;width: 100%;">© Học viện kĩ thuật mật mã | Design by <a href="https://www.facebook.com/profile.php?id=100005335969441">TrongThien</a> </p>
      </div>
    </div>
  </div>
</body>

</html>