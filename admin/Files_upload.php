<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {

} else {
  header('location: index.php');
}
?>
<?php
include_once ('config.php');
if (isset($_POST['submit'])) {
    if ($_FILES['uploadFile']['name'] != NULL) {
        $class=$_POST['class'];
        // Kiểm tra file up lên có phải là ảnh không
        if ($_FILES['uploadFile']['type'] == "image/jpeg"||  $_FILES['uploadFile']['type'] == "image/jpg" ||  $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
            
            // Nếu là ảnh tiến hành code upload
            $path = "admin/images/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = $_FILES['uploadFile']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                      // Insert ảnh vào cơ sở dữ liệu
            $sql = "INSERT INTO `image_check` (`class`,`image_url`) VALUES ('$class','$image_url')";
            $smt = mysqli_prepare($conn, $sql);
            if (mysqli_stmt_execute($smt)) {
                echo 'đã tải ảnh';
                header("location: Files_List_img.php");
                
                
            } else {   
                echo 'Không thể thêm được ảnh';
            }
        } else {
            // Không phải file ảnh
            echo "Kiểu file không phải là ảnh";
        }
    } else {
        echo "Bạn chưa chọn ảnh upload";
    }
    
}
?>