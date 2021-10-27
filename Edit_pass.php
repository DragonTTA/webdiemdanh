<?php
include 'config.php';
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

<body>
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
          <?php
          // Kết nối Database
          include 'config.php';
          $u = $_SESSION['user_session'];
          $query = mysqli_query($conn, "SELECT * from `user` where username='$u'");
          $row = mysqli_fetch_assoc($query);
          ?>
          <table>
            <form method="POST" class="form">
              <h2>Đổi mật khẩu<i class="ti-lock"></i></h2>
              <div style="margin-top:15px;">
                <label>Username:</label><label style="margin-left:10px;"><?php echo $row['username']; $_SESSION['name_session']=$row['username']?></label><br />
              </div>
              <div style="margin-top:15px;">
                <label>Tên:</label> <label style=""><?php echo $row['name']; ?></label><br />
              </div>
              <div style="margin-top:15px;">
                <label> <input type="password" name="password" placeholder="Password hiện tại" style="width: 220px; height:25px;border-radius:5px"></label><br />
              </div>
              <div style="margin-top:15px;">
                <input type="password" name="password1" placeholder="Password mới" style="width: 220px; height:25px;border-radius:5px"><br />
              </div>
              <div style="margin-top:15px;">
                <input type="password" name="password2" placeholder="Nhập lại password mới " style="width: 220px; height:25px;border-radius:5px"><br />
              </div>
              <div>
                <input type="submit" value="Update" name="update_user" style="margin-top:7px; width:83px; height:32px;border-radius:5px;">
              </div>
                <?php
                include 'config.php';
                if (isset($_POST['update_user'])) {
                  $u = $_SESSION['user_session'];
                  $p = $_POST['password'];
                  $p1 = $_POST['password1'];
                  $p2 = $_POST['password2'];
                  $sql = "SELECT * FROM user WHERE username ='$u' && password ='$p'";
                  $rs = mysqli_query($conn, $sql);
                  if ((mysqli_num_rows($rs) > 0) && $p1 == $p2) {



                    // Create connection
                    // $conn = new mysqli("localhost", "root", "", "data");
                    // // Check connection
                    // if ($conn->connect_error) {
                    // die("Connection failed: " . $conn->connect_error);
                    // }

                    $sql = "UPDATE `user` SET password='$p1' WHERE username='$u'";

                    if ($conn->query($sql) === TRUE) {
                      echo "Cập nhật thành công";
                    } else {
                      echo "Cập nhật thất bại: " . $conn->error;
                    }
                  }else{
                    echo 'Cập nhật thất bại';
                  }
                  $conn->close();
                }
                ?>


            </form>
          </table>
          
        </div>
        <p style="margin-top:29%; margin-left: 47%;width: 100%;">© Học viện kĩ thuật mật mã | Design by <a href="https://www.facebook.com/profile.php?id=100005335969441">TrongThien</a> </p>
      </div>
    </div>
</body>

</html>