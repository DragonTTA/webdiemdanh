<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
                    include('config.php');
                    $class= $_GET['class'];
                    if($class=='Toán A1'){
                    
                    header('Location: List_ta1.php');
                   }
                   if($class=='Phân tích thiết kế hệ thống'){
                       header('location: List_pttk.php');
                   }
                   if($class=='Kĩ năng mềm'){
                    
                    header('Location: List_knm.php');
                   }
                   if($class !='' && $class !='Kĩ năng mềm' && $class !='Phân tích thiết kế hệ thống' && $class !='Toán A1'){
                    
                    header('Location: List_tuchon.php');
                   }
                
                ?>
                    
</body>
</html>