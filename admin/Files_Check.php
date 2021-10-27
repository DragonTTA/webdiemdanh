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
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
</head>

<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content" style="margin-right:129px;">
            <div class="mother-grid-inner">
                <!--header start here-->

                <!--heder end here-->
                <ol class="breadcrumb" style="box-shadow: 0 0 10px rgba(5, 15,5,0.3);">
                    <li class="breadcrumb-item"><a href="admin.php">Home</a><a href="Files_List_img.php"><i class="fa fa-angle-right list-breadcrumb" style="font-size:18px; color:red;">Class</i></a><a a href="Files_List_img.php"> <i class="fa fa-angle-right list-breadcrumb" style="font-size:18px; color:blue;">Class List</i></a><i class="fa fa-angle-right list-breadcrumb" style="font-size:18px;">Images</i></li>
                </ol>
                <table border="1" width=1258px; style="text-align:center;">
                    Thông tin chi tiết ảnh
                    <tr>
                        <td style="color:red;">ID</td>
                        <td style="color:red;">Url</td>
                        <td style="color:red;">Tên lớp</td>
                        
                    </tr>
                    <?php
                    include('config.php');

                    $id = $_GET['id'];
                    $sql = "SELECT * from `image_check` where id ='$id' ";
                    $result = $conn->query($sql);
                    // check dữ liệu trả về từ db
                    // echo "<pre>";// chuẩn hóa dữ liệu
                    // var_dump($result);

                    //check dữ liệu lấy ra php, ko có chức năng hiển thị ra html

                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['image_url']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                          
                        </tr>
                        
                    <?php
                        $_SESSION['class']=$row['class'];
                        
                        $img = $row['image_url'];
                    }
                    function getCoord($expr)
                    {
                        $expr_p = explode('/', $expr);
                        return $expr_p[0] / $expr_p[1];
                    }
                    // echo "<pre>";
                    // var_dump($img);

                    $exif = exif_read_data("http://localhost:8080/thuctap/" .$img, 0, true);
                        
                        //Xử lí thời gian  
                        $time = strtotime($exif [ "IFD0" ] [ "DateTime" ]) ;   
                        $date= date('Y-m-d ',$time); //lấy ngày tháng năm
                        $time1 =date('H:i:s',$time);//lấy giờ phút giây
                        $time2 = strtotime ( '+3hour' ,  $time  ) ;//thời gian của ảnh hiện tại trừ đi 2h
                        //Tạo biến để so sánh giờ vào lớp;
                        $_SESSION['time1']=$time;
                        
                        $_SESSION['time2']=$time2;
                        
                        //xử lí GPS
                    if (empty($exif['GPS'])) {
                        if(empty($exif["IFD0"]["DateTime"])){
                            echo '</br>ảnh không có thời gian';
                            }
                        // Redirect to the main with the error
                        echo '<br>Không có vị trí';
                        
                        exit();
                    }

                   

                    // Latitude
                    $latitude1 = getCoord($exif['GPS']['GPSLatitude'][0]);
                    $latitude2 = getCoord($exif['GPS']['GPSLatitude'][1]);
                    $latitude3 = getCoord($exif['GPS']['GPSLatitude'][2]);

                    $latitude2 += 60 * ($latitude1 - floor($latitude1));
                    $latitude1 = floor($latitude1);

                    $latitude3 += 60 * ($latitude2 - floor($latitude2));
                    $latitude2 = floor($latitude2);

                    // Longitude
                    $longitude1 = getCoord($exif['GPS']['GPSLongitude'][0]);
                    $longitude2 = getCoord($exif['GPS']['GPSLongitude'][1]);
                    $longitude3 = getCoord($exif['GPS']['GPSLongitude'][2]);

                    $longitude2 += 60 * ($longitude1 - floor($longitude1));
                    $longitude1 = floor($longitude1);

                    $longitude3 += 60 * ($longitude2 - floor($longitude2));
                    $longitude2 = floor($longitude2);

                    $_SESSION['latitudeD']=$latitude1;
                    $_SESSION['latitudeM']=$latitude2;
                    $_SESSION['latitudeS']=$latitude3; 
                    $_SESSION['longtitudeD']=$longitude1;
                    $_SESSION['longtitudeM']=$longitude2;
                    $_SESSION['longtitudeS']=$longitude3;
                   
                    // 
                    ?>
                    <!DOCTYPE HTML>
                    <html lang="en-US">

                    <head>
                        <m-eta charset="UTF-8">
                            <title>Check</title>
                    </head>

                    <body>
                        
                        <h1>Toạ độ</h1>
                        <p>

                            Vĩ độ: <i style="margin-left:27px"></i>

                            <?= $exif['GPS']['GPSLatitudeRef'] == 'S' ? '-' : '' ?>
                            <?= $latitude1 ?><sup>o</sup>
                            <?= $latitude2 ?>'
                            <?= $latitude3 ?>''
                        </p>

                        <p>
                            Kinh độ: <i style="margin-left:10px"></i>

                            <?= $exif['GPS']['GPSLongitudeRef'] == 'W' ? '-' : '' ?>
                            <?= $longitude1 ?><sup>o</sup>
                            <?= $longitude2 ?>'
                            <?= $longitude3 ?>''
                        </p>
                        <h1>Thời gian của ảnh</h1>
                        <p>
                            Ngày:<i style="margin-left:10px"></i>
                            <?=  $date ?>
                            <br>
                            Giờ: <i style="margin-left:10px"></i>
                            <?=  $time1 ?>
                            
                          
                        </p>
                        <p>
                            <a href="https://maps.google.com/maps?q=<?= $exif['GPS']['GPSLatitudeRef'] == 'S' ? '-' : '' ?>
<?= $latitude1 ?>+<?= $latitude2 ?>'+
<?= $latitude3 ?>'',+<?= $exif['GPS']['GPSLongitudeRef'] == 'W' ? '-' : '' ?>
<?= $longitude1 ?>+<?= $longitude2 ?>'+<?= $longitude3 ?>'
'" target="_blank">Show on the map</a>
                        </p>
                        <div>
                            <a href="list_img.php">Xem danh sách</a>
                        </div>



                        </tr>
                </table>

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