<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {

} else {
  header('location: index.php');
}
?>
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
        $sql = "SELECT * FROM user WHERE username ='$u' && password ='$p'";

        $rs = mysqli_query($conn, $sql);

        if (mysqli_num_rows($rs) > 0) {
            //cài session
            $_SESSION['user_session'] =  $u;
            $_SESSION['password_session'] =  $p;
            

            //đưa đến trang chủ
            header("location: Trangchu.php");
        } else {
           header("location: index.php");
        }
    } else {
        header("location: index.php");

    }
}


?>

