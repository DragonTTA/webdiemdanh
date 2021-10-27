
<html>
<?php
include 'config.php';
if(isset($_POST['signUp']) && $_POST['username'] !='' && $_POST['password'] != '' && $_POST['repassword'] != ''){
$u=$_POST['username'];
$p=$_POST['password'];
$rp=$_POST['repassword'];
$name =$_POST['account'];

    if($_POST['password']==$_POST['repassword']){
     header("location: dangki.html");
    }
$sql = "SELECT * FROM user WHERE username ='$u'";

$old = mysqli_query($conn,$sql);
if(mysqli_num_rows($old)>0){
    header("location: dangki.html");
}else{
$sql1 ="INSERT INTO  user ( name, username, password) VALUES ('$name','$u','$p')";
mysqli_query($conn,$sql1);
}
}
else{
   echo"dang ki that bai";
    }
    
?>
</html>