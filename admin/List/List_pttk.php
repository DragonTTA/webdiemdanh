<?php
session_start();
if (isset($_SESSION['user_session']) && isset($_SESSION['password_session'])) {
} else {
	header('location: index.php');
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Thực tập </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link rel="../stylesheet" href="css/morris.css" type="text/css" />
	<!-- Graph CSS -->
	<link href="../css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<script src="../js/jquery-2.1.4.min.js"></script>
	<!-- //jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->

				<!--heder end here-->
				<ol class="breadcrumb" style="box-shadow: 0 0 10px rgba(5, 15,5,0.3);">
					<li class="breadcrumb-item"><a href="../admin.php">Home</a> <a href="List.php"> <i class="fa fa-angle-right list-breadcrumb" style="font-size:18px; color:red;"> Môn học</i></a></li>
				</ol>
				<h1> Phân tích thiết kế hệ thống</h1>
				<?php
				//tạo kếy nối
				
				include('config.php');
				$sql = "SELECT * from `pttk` ";
				$result = $conn->query($sql);

				// check dữ liệu trả về từ db
				// echo "<pre>";// chuẩn hóa dữ liệu
				// var_dump($result);

				// //check dữ liệu lấy ra php, ko có chức năng hiển thị ra html
				// while($row = $result->fetch_assoc()){
				//         echo $row['id']."<br>";
				//         echo $row['name']."<br>";
				//         echo $row['image_url']."<br>";
				//         echo $row['created']."<br>";
				// }
			     
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

				</div>

				<script>
					$(document).ready(function() {
						var navoffeset = $(".header-main").offset().top;
						$(window).scroll(function() {
							var scrollpos = $(window).scrollTop();
							if (scrollpos >= navoffeset) {
								$(".header-main").addClass("fixed");
							} else {
								$(".header-main").removeClass("fixed");
							}
						});

					});
				</script>
				<!-- /script-for sticky-nav -->
				<!--inner block start here-->
				<div class="inner-block">

				</div>
				<!--inner block end here-->
				<!--copy rights start here-->
				<div class="copyrights" style="background-color: #edecec;">
					<p style="margin-top:29%">© Học viện kĩ thuật mật mã | Design by <a href="https://www.facebook.com/profile.php?id=100005335969441">TrongThien</a> </p>
				</div>
				<!--COPY rights end here-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<div class="sidebar-menu">
			<header class="logo1">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
			</header>
			<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
			<div class="menu">
				<ul id="menu">
					<li><a href="../admin.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span>
							<div class="clearfix"></div>
						</a></li>

					<li><a href="../gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Gallery</span>
							<div class="clearfix"></div>
						</a></li>

					<li id="menu-academico"><a href="calendar.php"><i class="fa fa-file-text-o"></i> <span>Calendar</span>
							<div class="clearfix"></div>
						</a>
					</li>
					<li><a href="../Logout.php"><i class="fa fa-sign-out"></i><span>Logout</span>
							<div class="clearfix"></div>
						</a></li>

				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- /Bootstrap Core JavaScript -->
	<!-- morris JavaScript -->
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.js"></script>
	<script>
		$(document).ready(function() {
			//BOX BUTTON SHOW AND CLOSE
			jQuery('.small-graph-box').hover(function() {
				jQuery(this).find('.box-button').fadeIn('fast');
			}, function() {
				jQuery(this).find('.box-button').fadeOut('fast');
			});
			jQuery('.small-graph-box .box-close').click(function() {
				jQuery(this).closest('.small-graph-box').fadeOut(200);
				return false;
			});

			//CHARTS
			function gd(year, day, month) {
				return new Date(year, month - 1, day).getTime();
			}

			graphArea2 = Morris.Area({
				element: 'hero-area',
				padding: 10,
				behaveLikeLine: true,
				gridEnabled: false,
				gridLineColor: '#dddddd',
				axes: true,
				resize: true,
				smooth: true,
				pointSize: 0,
				lineWidth: 0,
				fillOpacity: 0.85,
				data: [{
						period: '2014 Q1',
						iphone: 2668,
						ipad: null,
						itouch: 2649
					},
					{
						period: '2014 Q2',
						iphone: 15780,
						ipad: 13799,
						itouch: 12051
					},
					{
						period: '2014 Q3',
						iphone: 12920,
						ipad: 10975,
						itouch: 9910
					},
					{
						period: '2014 Q4',
						iphone: 8770,
						ipad: 6600,
						itouch: 6695
					},
					{
						period: '2015 Q1',
						iphone: 10820,
						ipad: 10924,
						itouch: 12300
					},
					{
						period: '2015 Q2',
						iphone: 9680,
						ipad: 9010,
						itouch: 7891
					},
					{
						period: '2015 Q3',
						iphone: 4830,
						ipad: 3805,
						itouch: 1598
					},
					{
						period: '2015 Q4',
						iphone: 15083,
						ipad: 8977,
						itouch: 5185
					},
					{
						period: '2016 Q1',
						iphone: 10697,
						ipad: 4470,
						itouch: 2038
					},
					{
						period: '2016 Q2',
						iphone: 8442,
						ipad: 5723,
						itouch: 1801
					}
				],
				lineColors: ['#ff4a43', '#a2d200', '#22beef'],
				xkey: 'period',
				redraw: true,
				ykeys: ['iphone', 'ipad', 'itouch'],
				labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
				pointSize: 2,
				hideHover: 'auto',
				resize: true
			});


		});
	</script>
</body>

</html>