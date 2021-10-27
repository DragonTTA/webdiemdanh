<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {

} else {
  header('location: index.php');
}
?>
<html>
<?php
include 'config.php';
if (isset($_POST['sign-in'])) {
    $secretkey = '6LffFXAcAAAAAH5yAADnzecED3vSUsuMpnpQ-l8I';
    $response = $_POST['g-repcaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response";
    $f = file_get_contents($url);
    $data = json_decode($f);
    if (!$data->success == true) {
        $u = $_POST['account'];
        $p = $_POST['password'];
        

        $sql = "SELECT * FROM admin WHERE username ='$u' && password ='$p'";
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            header("location: admin.php");
            $_SESSION['user_session'] =  $u;
            $_SESSION['password_session'] =  $p;
        } else {
            require_once 'index.php';
        }
    } else {
        header("location: admin.php");
    }
}


?>

</html>