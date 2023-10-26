<?php
    include_once("function.php");
    $idlt = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Khoa Pham</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
        <?php
                include_once("nav.php");

        ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php
                $loaitin = Get_LoaiTin($idlt);
                $row = mysqli_fetch_assoc($loaitin);
            ?>
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $row["TieuDe"] ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Nguyễn Đình Hiệp</a>
                </p>
            
                <!-- Preview Image -->
                <img style="width: 100%;" class="img-responsive" src="img/tintuc/<?php echo $row["Hinh"] ?>" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>
                <hr>

                <!-- Post Content -->
                <p class="lead"> <?php echo $row["TomTat"] ?></p>
                <p><?php echo $row["NoiDung"] ?></p>
               
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php 
                        $hienthi_comment = Get_comment_user($idlt);
                        while($row_comment = mysqli_fetch_assoc($hienthi_comment)){
                    ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $row_comment["name"] ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $row_comment["NoiDung"] ?>
                    </div>
                </div>
                <?php
                        }
                ?>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body" style="padding :0px">

                        <!-- item -->
                        <?php 
                            $tinlienqua = Get_tintuc_4_lienquan($row["idLoaiTin"]);
                            while($rowlienquan = mysqli_fetch_assoc($tinlienqua)){
                        ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5" style="padding:4px">
                                <a href="Chi_tiet.php?id=<?php echo $rowlienquan["id"] ?>">
                                    <img class="img-responsive" src="img/tintuc/<?php echo $rowlienquan["Hinh"] ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7"  style="padding:4px">
                                <a href="loaitin.php?idlt=<?php echo $rowlienquan["idLoaiTin"] ?>"><b><?php echo $rowlienquan["Ten"] ?></b></a>
                                <p style="font-weight: 300;"><?php echo $rowlienquan["TieuDe"] ?></p>
                            </div>
                            
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body" style="padding :0px">

                        <!-- item -->
                        <?php 
                            $tinnoibat = Get_tintuc_4_noibat($row["idLoaiTin"]);
                            while($rownoibat = mysqli_fetch_assoc($tinnoibat)){
                        ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5" style="padding:4px">
                                <a href="Chi_tiet.php?id=<?php echo $rownoibat["id"] ?>">
                                    <img class="img-responsive" src="img/tintuc/<?php echo $rownoibat["Hinh"] ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7"  style="padding:4px">
                                <a href="loaitin.php?idlt=<?php echo $rownoibat["idLoaiTin"] ?>"><b><?php echo $rownoibat["Ten"] ?></b></a>
                                <p style="font-weight: 300;"><?php echo $rownoibat["TieuDe"] ?></p>
                            </div>
                            
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <?php
                            }
                        ?>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <?php

include_once("footer.php"); 
        ?>

    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>

</body>

</html>
