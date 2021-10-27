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
                    <li class="breadcrumb-item"><a href="admin.php">Home</a> <a a href="List_img.php"> <i class="fa fa-angle-right list-breadcrumb" style="font-size:18px; color:red;"> Danh sách</i></a></li>
                </ol>
                <table border="1" width=1258px; style="text-align:center;">
                    Thông tin chi tiết ảnh
                    <tr>
                        <td style="color:red;">ID</td>
                        <td style="color:red;">Url</td>
                        <td style="color:red;">Tên</td>
                        
                    </tr>
                    <?php


                    if ($_SESSION['class'] == 'Toán A1') {
                        include('config.php');

                        $id = $_GET['id'];
                        $sql = "SELECT * from `img_ta1` where id ='$id' ";
                        $result = $conn->query($sql);
                    }
                    // check dữ liệu trả về từ db
                    // echo "<pre>";// chuẩn hóa dữ liệu
                    // var_dump($result);

                    //check dữ liệu lấy ra php, ko có chức năng hiển thị ra html
                    if ($_SESSION['class'] == 'Kĩ năng mềm') {
                        include('config.php');

                        $id = $_GET['id'];
                        $sql1 = "SELECT * from `image_knm` where id ='$id' ";
                        $result = $conn->query($sql1);
                    }
                    if ($_SESSION['class'] == 'Phân tích thiết kế hệ thống') {
                        include('config.php');

                        $id = $_GET['id'];
                        $sql2 = "SELECT * from `image_pttk` where id ='$id' ";
                        $result = $conn->query($sql2);
                    }
                    if ($_SESSION['class'] != "" && $_SESSION['class'] != "Kĩ năng mềm" && $_SESSION['class'] != "Phân tích thiết kế hệ thống" && $_SESSION['class'] != "Toán A1") {
                        include('config.php');

                        $id = $_GET['id'];
                        $sql3 = "SELECT * from `image` where id ='$id' ";
                        $result = $conn->query($sql3);
                    }

                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['image_url']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            
                        </tr>
                    <?php
                        $_n = $row['name'];
                        $img = $row['image_url'];
                    }
                    function getCoord($expr)
                    {
                        $expr_p = explode('/', $expr);
                        return $expr_p[0] / $expr_p[1];
                    }
                    // echo "<pre>";
                    // var_dump($img);

                    $exif = exif_read_data("http://localhost:8080/thuctap/" . $img, 0, true);
                    //Xử lí thời gian
                    
                   
                    //xử lí GPS
                    if (empty($exif['GPS'])) {
                       
                        
                        // Redirect to the main with the error
                        echo '<br>Không có vị trí';
                        echo '<br>Chưa điểm danh';
                        exit();
                    }
                    if (empty($exif["IFD0"]["DateTime"])) {
                        echo '</br>Ảnh không có thời gian';
                    }else{
                    $time1 = strtotime($exif["IFD0"]["DateTime"]);
                    $_created=date('Y-m-d H:i:s ', $time1 );
                    $date2 = date('Y-m-d ', $time1);
                    $time2 = date('H:i:s', $time1);
                    }




                    // Latitude
                    $latitude['degrees'] = getCoord($exif['GPS']['GPSLatitude'][0]);
                    $latitude['minutes'] = getCoord($exif['GPS']['GPSLatitude'][1]);
                    $latitude['seconds'] = getCoord($exif['GPS']['GPSLatitude'][2]);

                    $latitude['minutes'] += 60 * ($latitude['degrees'] - floor($latitude['degrees']));
                    $latitude['degrees'] = floor($latitude['degrees']);

                    $latitude['seconds'] += 60 * ($latitude['minutes'] - floor($latitude['minutes']));
                    $latitude['minutes'] = floor($latitude['minutes']);

                    // Longitude
                    $longitude['degrees'] = getCoord($exif['GPS']['GPSLongitude'][0]);
                    $longitude['minutes'] = getCoord($exif['GPS']['GPSLongitude'][1]);
                    $longitude['seconds'] = getCoord($exif['GPS']['GPSLongitude'][2]);

                    $longitude['minutes'] += 60 * ($longitude['degrees'] - floor($longitude['degrees']));
                    $longitude['degrees'] = floor($longitude['degrees']);

                    $longitude['seconds'] += 60 * ($longitude['minutes'] - floor($longitude['minutes']));
                    $longitude['minutes'] = floor($longitude['minutes']);


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
                            <?= $latitude['degrees'] ?><sup>o</sup>
                            <?= $latitude['minutes'] ?>'
                            <?= $latitude['seconds'] ?>''
                        </p>

                        <p>
                            Kinh độ: <i style="margin-left:10px"></i>

                            <?= $exif['GPS']['GPSLongitudeRef'] == 'W' ? '-' : '' ?>
                            <?= $longitude['degrees'] ?><sup>o</sup>
                            <?= $longitude['minutes'] ?>'
                            <?= $longitude['seconds'] ?>''
                        </p>
                        <h1>Thời gian của ảnh</h1>

                        Ngày:<i style="margin-left:10px"></i>
                        <?= $date2 ?>
                        <br>
                        Giờ:<i style="margin-left:10px"></i>
                        <?= $time2 ?>


                        </p>
                        <?php
                        $_SESSION['latitudeD'];
                        $_SESSION['latitudeM'];
                        $_SESSION['latitudeS'];
                        $_SESSION['longtitudeD'];
                        $_SESSION['longtitudeM'];
                        $_SESSION['longtitudeS'];
                        $_SESSION['time1'];
                        $_SESSION['time2'];
                        
                        // echo '<pre>';
                        // var_dump($exif);
                        if ($_SESSION['time1'] <= $time1 && $_SESSION['class'] == 'Phân tích thiết kế hệ thống' && $latitude['degrees'] == $_SESSION['latitudeD'] && $latitude['minutes'] == $_SESSION['latitudeM'] && $latitude['seconds'] == $_SESSION['latitudeS']  && $longitude['degrees'] == $_SESSION['longtitudeD'] && $longitude['minutes'] == $_SESSION['longtitudeM'] && $longitude['seconds'] == $_SESSION['longtitudeS']) {
                            # code...
                            $sql = "INSERT INTO `pttk` (`name`, `date-time`) VALUES ('$_n','$_created')";
                            $smt = mysqli_prepare($conn, $sql);
                            if (mysqli_stmt_execute($smt)) {

                                header("location: ./List/List_pttk.php");
                            }
                        }
                        if ($_SESSION['time1'] <= $time1 && $time1 <= $_SESSION['time2'] && $_SESSION['class'] == 'Kĩ năng mềm' && $latitude['degrees'] == $_SESSION['latitudeD'] && $latitude['minutes'] == $_SESSION['latitudeM'] && $latitude['seconds'] == $_SESSION['latitudeS']  && $longitude['degrees'] == $_SESSION['longtitudeD'] && $longitude['minutes'] == $_SESSION['longtitudeM'] && $longitude['seconds'] == $_SESSION['longtitudeS']) {
                            # code...
                            $sql1 = "INSERT INTO `knm` (`name`, `date-time`) VALUES ('$_n','$_created')";
                            $smt1 = mysqli_prepare($conn, $sql1);
                            if (mysqli_stmt_execute($smt1)) {

                                header("location: ./List/List_knm.php");
                            }
                        }
                        if ($_SESSION['time1'] <= $time1 && $time1 <= $_SESSION['time2'] && $_SESSION['class'] != '' && $_SESSION['class'] != "Kĩ năng mềm" && $_SESSION['class'] != "Phân tích thiết kế hệ thống" && $_SESSION['class'] != "Toán A1" && $latitude['degrees'] == $_SESSION['latitudeD'] && $latitude['minutes'] == $_SESSION['latitudeM'] && $latitude['seconds'] == $_SESSION['latitudeS']  && $longitude['degrees'] == $_SESSION['longtitudeD'] && $longitude['minutes'] == $_SESSION['longtitudeM'] && $longitude['seconds'] == $_SESSION['longtitudeS']) {
                            # code...
                            $sql3 = "INSERT INTO `tuchon` (`name`, `date-time`) VALUES ('$_n','$_created')";
                            $smt3 = mysqli_prepare($conn, $sql3);
                            if (mysqli_stmt_execute($smt3)) {

                                header("location: ./List/List_tuchon.php");
                            }
                        }
                        if ($_SESSION['time1'] <= $time1 && $time1 <= $_SESSION['time2'] && $_SESSION['class'] == 'Toán A1' && $latitude['degrees'] == $_SESSION['latitudeD'] && $latitude['minutes'] == $_SESSION['latitudeM'] && $latitude['seconds'] == $_SESSION['latitudeS']  && $longitude['degrees'] == $_SESSION['longtitudeD'] && $longitude['minutes'] == $_SESSION['longtitudeM'] && $longitude['seconds'] == $_SESSION['longtitudeS']) {
                            # code...
                            $sql2 = "INSERT INTO `ta1` (`name`, `date-time`) VALUES ('$_n','$_created')";
                            $smt2 = mysqli_prepare($conn, $sql2);
                            if (mysqli_stmt_execute($smt2)) {

                                header("location: ./List/List_ta1.php");
                            }
                        } else {
                            echo "Chưa điểm danh";
                        }


                        ?>

                        <p>
                            <a href="https://maps.google.com/maps?q=<?= $exif['GPS']['GPSLatitudeRef'] == 'S' ? '-' : '' ?>
<?= $latitude['degrees'] ?>+<?= $latitude['minutes'] ?>'+
<?= $latitude['seconds'] ?>'',+<?= $exif['GPS']['GPSLongitudeRef'] == 'W' ? '-' : '' ?>
<?= $longitude['degrees'] ?>+<?= $longitude['minutes'] ?>'+<?= $longitude['seconds'] ?>'
'" target="_blank">Show on the map</a>
                        </p>



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