<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {
} else {
	header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/fonts/themify-icons/themify-icons.css">
</head>

<body style="overflow: scroll;overflow-x: hidden;">
	<script src="main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>



	<div id="main">
    <div id="header">
			<ul id="nav">
			<li><a href="../Trangchu.php">Home</a></li>
				<li><a href="../Edit_pass.php">Đổi mật khẩu</a></li>
				<li><a href="List.php">Xem danh sách</a></li>
				<li>
					<a href="../Logout.php">Logout
						<i class="nav-arrow-down ti-shift-left"></i>
					</a>

				</li>
			</ul>
		</div>
		<div id="slider" style="background: url('https://img4.thuthuatphanmem.vn/uploads/2020/08/01/anh-nen-mau-xam-2k-dep-nhat_055858734.jpg')top  /100% no-repeat;">
			<div class="text-content">
				<div style="">
					<h1 style="margin-right: 33px;">Xem danh sách <i style="font-size: 28px;" class="ti-book"></i></h1>
					<?php
					//tạo kếy nối
					include('config.php');
					$sql = "SELECT * from `image_check` ";
					$result = $conn->query($sql);
                    
					?>
					<table style="margin-top:15px;font-family:Arial, Helvetica, sans-serif;" border="1">
							<tr>
								<td width=50px>STT</td>
								<td width=200px>Tên lớp học</td>
								
								
								<td width=150px>Chọn lớp học</td>

							</tr>
							<?php foreach ($result as $key => $value) : ?>
								<!-- foreeach lọc dũ liệu , với 1 giá trị $value, nó lặp 1 lần -->
								<!-- với $value =1  -->
								<tr>
									<td>
										<?php echo $value['id']; 
                                        ?>
									</td>
									<td width=350px>
										<?php echo $value['class']; ;
										
										?>
									</td>
									<td>
										<a href="Files_List_Check.php?class=<?php echo $value['class'];?>">Chọn</a>
									</td>
                                        
								</tr>
                                
							<?php endforeach ?>
                            <?php
                            
                            ?>

						</table>

				</div>

				<p style="margin-top:45%; margin-left: 47%;width: 100%;">© Học viện kĩ thuật mật mã | Design by <a href="https://www.facebook.com/profile.php?id=100005335969441">TrongThien</a> </p>
			</div>
		</div>
	</div>
</body>

</html>