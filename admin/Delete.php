<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {
} else {
    header('location: index.php');
}
?>
<?php
include_once('config.php');
if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo 'xoá thành công';
    } else {
        echo "lỗi" . $conn->error;
    }
    header("location: User.php");
    $conn->close();
}
?>