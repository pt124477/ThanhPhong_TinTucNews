<?php
    include_once("function.php");
    $idlt = $_GET["idlt"];

    // $kqTin = Get_All_Tin_Theo_LoaiTin($idlt);
    // Lấy trsng muốn xem 
    $p = isset($_GET["p"]) == true ? (int)$_GET["p"] : 1;
    // kiểm tra xem có phải bằng 0
    $p = ($_GET["p"] == 0) ? 1 : $_GET["p"];
    //So tin mot trang
    $soTin1Trang = 3;
    //Vi tri bat dau
    $form = ($p - 1) * $soTin1Trang;
    $kqTin = Get_Tin_Theo_Trang($idlt, $form, $soTin1Trang);

?>
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
</div>
<!-- Đâu vòng lặp -->
<?php
    while ($rowTin = mysqli_fetch_assoc($kqTin)) {
?>
    <div class="row-item row">
        <div class="col-md-3">

            <a href="Chi_tiet.php?id= <?php echo $rowTin["id"] ?>">
                <br>
                <img width="200px" height="200px" class="img-responsive" src="img/tintuc/<?php echo $rowTin["Hinh"]; ?>" alt="">
            </a>
        </div>

        <div class="col-md-9">
            <h3><?php echo $rowTin["TieuDe"]; ?></h3>
            <p><?php echo $rowTin["TomTat"]; ?></p>
            <a class="btn btn-primary" href="Chi_tiet.php?id= <?php echo $rowTin["id"] ?>">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <div class="break"></div>
    </div>

<?php
    }
?>
<!--Cuối vòng lặp-->
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