<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active" style="font-size: 24px;">
            Thể loại
        </li>
        <?php
            $sl = Get_All_theloai();
            while($row = mysqli_fetch_assoc($sl)){
                $kq = Get_loaitin_theloai($row["id"]);
                if(mysqli_num_rows($kq)>0){
            
        ?>
        <li href="#" class="list-group-item menu1">
            <?php echo $row["Ten"] ?>
        </li>
        <ul>
            <?php
                while($row2 = mysqli_fetch_assoc($kq)){
            ?>        
            <li class="list-group-item">
                <a href="loaitin.php?idlt=<?php echo $row2["id"] ?>"> <?php echo $row2["Ten"] ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
        
        <?php
                }}
        ?>
    </ul>
</div>
