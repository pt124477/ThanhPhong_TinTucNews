    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                            $sl = Get_Slides();
                            while($row = mysqli_fetch_assoc($sl)){
                                $active ="";
                                if($row["id"]==1){
                                    $active ="active";
                                }
                        ?>
                        <div class="item <?php echo $active ?>">
                            <img class="slide-image" src="img/slide/<?php echo $row["Hinh"] ?>" alt="">
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            <?php
                include_once("menu.php");
            ?>
                <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">
                            Tin tức
                        </h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <?php
                        $sl = Get_All_theloai();
                        while($row = mysqli_fetch_assoc($sl)){
                            $kq = Get_loaitin_theloai($row["id"]);
                            if(mysqli_num_rows($kq)>0){
                        
                        ?>
					    <div class="row-item row">
		                	<h3>
		                		<a href="#">  <?php echo $row["Ten"] ?></a> |
                                <?php
                                    while($row2 = mysqli_fetch_assoc($kq)){
                                ?>     
		                		<small><a href="loaitin.php?idlt=<?php echo $row2["id"] ?>"><i><?php echo $row2["Ten"] ?></i></a>/</small>
                                <?php
                                    }
                                ?>
		                	</h3>
		                	<div class="col-md-12 border-right">
                                <?php
                                    $row3 = Get_tintuc_theloai($row["id"]);
                                    $tt = mysqli_fetch_assoc($row3);
                                ?>
		                		<div class="col-md-3">
			                        <a href="Chi_tiet.php?id=<?php echo $tt["id"] ?>">
			                            <img class="img-responsive" src="img/tintuc/<?php echo $tt["Hinh"] ?>" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-9">
			                        <h3><?php echo $tt["TieuDe"] ?></h3>
			                        <p><?php echo $tt["TomTat"] ?></p>
			                        <a class="btn btn-primary" href="Chi_tiet.php?id=<?php echo $tt["id"] ?>">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
                                <?php
                                ?>
		                	</div>

							<div class="break"></div>
		                </div>
		                <!-- end item -->
                        <?php
                            }}
                        ?>

					</div>
	            </div>
        	</div>
            <?php

            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->


