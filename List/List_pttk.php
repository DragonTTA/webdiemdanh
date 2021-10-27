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

<body style="overflow: scroll; overflow-x: hidden;">
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
				<h1>Phân tích thiết kế</h1>
				<?php
				//tạo kếy nối
				
				include('config.php');
				$sql = "SELECT * from `pttk` ";
				$result = $conn->query($sql);

			
				?>
				<!-- dùng hàm foreach để lọc từng phần tử theo dạng key => value với biến truyền vào là một mảng -->

				<div id="Files">
					<div class="table" style=" text-align: center;" width=1258px;>
						<table border="1">
							<tr>
								<td width=80px; text-alie>ID</td>
								<td width=250px>Họ và tên</td>
								<td width=250px>Date/Time</td>
								
							</tr>
							<?php foreach ($result as $key => $value) : ?>
								<!-- foreeach lọc dũ liệu , với 1 giá trị $value, nó lặp 1 lần -->
								<!-- với $value =1  -->
								<tr>
									<td>
										<?php echo $value['id']; ?>
									</td>
									
									<td width="200px">
										<?php echo $value['name']; ?>
									</td>
									<td width="200px">
										<?php echo $value['date-time']; ?>
									</td>
									
								</tr>
							<?php endforeach ?>

						</table>
				</div>

				<p style="margin-top:62%; margin-left: 47%;width: 100%;">© Học viện kĩ thuật mật mã | Design by <a href="https://www.facebook.com/profile.php?id=100005335969441">TrongThien</a> </p>
			</div>
		</div>
	</div>
</body>

</html>