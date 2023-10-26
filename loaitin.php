<?php
    include_once("function.php");
    $idlt = $_GET["idlt"];
    $p =isset($_GET["p"])==true ? (int)$_GET["p"] :1 ;
    $soTin1Trang =3;
    $from = ($p -1) * $soTin1Trang;
    $kqtin = Get_Tin_Theo_Trang($idlt,$from,$soTin1Trang);
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
    <script src="js/jquery-3.6.4.min.js"></script>

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
                 include_once("menu.php");
                ?>

            <div class="col-md-9 ">
                <div class="Ajax_loaitin panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                     <?php 
                        $hienthiten = Get_theloai_loaitin($idlt);
                        $row123 = mysqli_fetch_assoc($hienthiten);

                    ?>
                        <ol class="breadcrumb">
                            <li><a href=""><?php echo $row123["TenTL"] ?></a></li>
                            <li><a href=""><?php echo $row123["TenLT"] ?></a></li>
                            
                         
                        </ol>
                    </div>
                    <div id="chothem_tin">
                    <?php
                        while($row = mysqli_fetch_assoc($kqtin)){
                    ?>
                        <div class="row-item row demclass">
                            <div class="col-md-3">

                                <a href="Chi_tiet.php?id=<?php echo $row["id"] ?>">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="img/tintuc/<?php echo $row["Hinh"] ?>" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3><?php echo $row["TieuDe"] ?></h3>
                                <p><?php echo $row["TomTat"] ?></p>
                                <a class="btn btn-primary" href="Chi_tiet.php?id=<?php echo $row["id"] ?>">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>

                        <?php
                        }
                        ?>
                    </div>
                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <!-- Phân trang -->
                                <?php
                                    $disabled = $p ==1 ? "disabled" :"";
                                ?>
                                <li class="<?php echo $disabled ?>" >
                                    <a  href="loaitin_page.php?idlt=<?php echo $idlt; ?>&p=<?php echo 1; ?>">&laquo;</a>
                                </li>
                                <li class="<?php echo $disabled ?>">
                                     <a class=" <?php echo $disabled ?> "id="prev" href="loaitin_page.php?idlt=<?php echo $idlt; ?>&p=<?php echo $p -1; ?>">&lsaquo;</a>
                                </li> 
                                <?php
                                $row_count = ceil(mysqli_num_rows(Get_ALL_Tin_Theo_LoaiTin($idlt))/$soTin1Trang);
                                $offset =3;
                                $tuTrang =max($p - $offset,1);
                                $denTrang =min($p + $offset,$row_count);
                                    for ($i= $tuTrang; $i <= $denTrang ; $i++) { 
                                        $active ="";
                                        if($p==$i){
                                            $active ="active";
                                        }
                                ?>
                                <li class=" <?php echo $active ?>" >
                                    <a href="loaitin_page.php?idlt=<?php echo $idlt;?>&p=<?php echo $i;?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    $disabled = $p ==$row_count ? "disabled" :"";
                                ?>
                                <li class="<?php echo $disabled ?>" >
                                    <a href="loaitin_page.php?idlt=<?php echo $idlt; ?>&p=<?php echo $row_count; ?>">&rsaquo;</a>
                                </li> 
                                <li class="<?php echo $disabled ?>" >
                                    <a href="loaitin_page.php?idlt=<?php echo $idlt; ?>&p=<?php echo $row_count; ?>">&raquo;</a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    <script>
        $(document).ready(function(){
            // function XuLy(){
            //     p++;
            //     var querystring = windown.location.serach;
            //     var params = new URLSearchParams(querystring);
            //     var idlt = params.get('idlt');
            //     var url ="xulyloaitin.php?idlt=" + idlt +"&p="+p;
            //     $.get(url,function(data){
            //         $('.Ajax_loaitin').append(data);
            //     });
            // }
            // var p=0;
            // XuLy();
            // $(document).on("click","button.",XuLy)
            $(document).on("click",".pagination a",function(e){
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url,function(data){
                    $('.Ajax_loaitin').html(data);
                });
            });
        });
    </script>
</body>

</html>

