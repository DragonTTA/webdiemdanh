<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {
} else {
  header('location: index.php');
}
?>
<?php
include_once('config.php');
if (isset($_REQUEST['id']) and $_REQUEST['id'] != "" && $_SESSION['class']=='Toán A1') {
  $id = $_GET['id'];
  $sql = "DELETE FROM img_ta1 WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo 'xoá thành công';
  } else {
    echo "Error updating record: " . $conn->error;
  }
  header("location: List_img.php");
  $conn->close();
}if (isset($_REQUEST['id']) and $_REQUEST['id'] != "" && $_SESSION['class']=='Kĩ năng mềm') {
  $id = $_GET['id'];
  $sql1 = "DELETE FROM image_knm WHERE id='$id'";
  if ($conn->query($sql1) === TRUE) {
    echo 'xoá thành công';
  } else {
    echo "Error updating record: " . $conn->error;
  }
  header("location: List_img.php");
  $conn->close();
}if (isset($_REQUEST['id']) and $_REQUEST['id'] != "" && $_SESSION['class']=='Phân tích thiết kế hệ thống') {
  $id = $_GET['id'];
  $sql2 = "DELETE FROM image_pttk WHERE id='$id'";
  if ($conn->query($sql2) === TRUE) {
    echo 'xoá thành công';
  } else {
    echo "Error updating record: " . $conn->error;
  }
  header("location: List_img.php");
  $conn->close();
}if (isset($_REQUEST['id']) and $_REQUEST['id'] != "" ){
  $id=$_GET['id'];
  $sql3= "DELETE FROM image WHERE id='$id'";
  if ($conn->query($sql3) === TRUE) {
    echo 'xoá thành công';
  } else {
    echo "Error updating record: " . $conn->error;
  }
  header("location: List_img.php");
  $conn->close();
}
?>