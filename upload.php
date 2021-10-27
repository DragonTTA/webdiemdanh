<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {

} else {
  header('location: index.php');
}
?>
<?php
include_once ('config.php');
$u = $_SESSION['user_session'];
$query = mysqli_query($conn, "SELECT * from `user` where username='$u'");
$row = mysqli_fetch_assoc($query);
$row['name'];
$n1=$row['name'];


if (isset($_POST['submit']) && isset($_POST['TA1'])) {
    if ($_FILES['uploadFile']['name'] != NULL) {
        
        // Kiểm tra file up lên có phải là ảnh không
        if ($_FILES['uploadFile']['type'] == "image/jpeg"||  $_FILES['uploadFile']['type'] == "image/jpg" ||  $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
            
            // Nếu là ảnh tiến hành code upload
            $path = "images/ta1/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = $_FILES['uploadFile']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                      // Insert ảnh vào cơ sở dữ liệu
            $sql = "INSERT INTO `img_ta1` (`name`,`image_url`) VALUES ('$n1','$image_url')";
            $smt = mysqli_prepare($conn, $sql);
            if (mysqli_stmt_execute($smt)) {
                
                header("location: Trangchu.php");
                echo 'đã tải ảnh';
                
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

}elseif((isset($_POST['submit']) && isset($_POST['KNM']))){
    if ($_FILES['uploadFile']['name'] != NULL) {
       
        // Kiểm tra file up lên có phải là ảnh không
        if ($_FILES['uploadFile']['type'] == "image/jpeg"||  $_FILES['uploadFile']['type'] == "image/jpg" ||  $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
            
            // Nếu là ảnh tiến hành code upload
            $path = "images/knm/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = $_FILES['uploadFile']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                      // Insert ảnh vào cơ sở dữ liệu
            $sql = "INSERT INTO `image_knm` (`name`,`image_url`) VALUES ('$n1','$image_url')";
            $smt = mysqli_prepare($conn, $sql);
            if (mysqli_stmt_execute($smt)) {
                
                header("location: Trangchu.php");
                echo 'đã tải ảnh';
                
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
   
}elseif((isset($_POST['submit']) && isset($_POST['PTTK']))){
    if ($_FILES['uploadFile']['name'] != NULL) {
     
        // Kiểm tra file up lên có phải là ảnh không
        if ($_FILES['uploadFile']['type'] == "image/jpeg"||  $_FILES['uploadFile']['type'] == "image/jpg" ||  $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
            
            // Nếu là ảnh tiến hành code upload
            $path = "images/pttk/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = $_FILES['uploadFile']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                      // Insert ảnh vào cơ sở dữ liệu
            $sql = "INSERT INTO `image_pttk` (`name`,`image_url`) VALUES ('$n1','$image_url')";
            $smt = mysqli_prepare($conn, $sql);
            if (mysqli_stmt_execute($smt)) {
                
                header("location: Trangchu.php");
                echo 'đã tải ảnh';
                
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
} elseif((isset($_POST['submit']) && isset($_POST['class']))){
    if ($_FILES['uploadFile']['name'] != NULL) {
        
        // Kiểm tra file up lên có phải là ảnh không
        if ($_FILES['uploadFile']['type'] == "image/jpeg"||  $_FILES['uploadFile']['type'] == "image/jpg" ||  $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
            
            // Nếu là ảnh tiến hành code upload
            $path = "Imagesauto/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = $_FILES['uploadFile']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                      // Insert ảnh vào cơ sở dữ liệu
            $sql = "INSERT INTO `image` (`name`,`image_url`) VALUES ('$n1','$image_url')";
            $smt = mysqli_prepare($conn, $sql);
            if (mysqli_stmt_execute($smt)) {
                
                header("location: Trangchu.php");
                echo 'đã tải ảnh';
                
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
    
    
}else{
    echo 'bạn chưa chọn lớp';
}

?>