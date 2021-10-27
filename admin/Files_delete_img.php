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
  $sql = "DELETE FROM image_check WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo 'xoá thành công';
  } else {
    echo "Error updating record: " . $conn->error;
  }
  header("location: Files_List_img.php");
  $conn->close();
}
?>