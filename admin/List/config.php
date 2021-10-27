<?php
//khai bao db
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "diemdanh";

//tao connection co ten $ten_connection
$conn = new mysqli($servername,$user,$password,$dbname);

//kiem tra connection
if($conn -> connect_error){
    die("failed: ".$conn->connect_error);
}
?>  