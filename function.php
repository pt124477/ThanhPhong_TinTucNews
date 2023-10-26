<?php
    function Connect(){
        return mysqli_connect("localhost","root","","db_tintuc");
    }
    function Disconnect($conn){
        mysqli_close($conn);
    }
    function Get_Slides(){
        $conn = Connect();
        $sql ="SELECT * FROM slide";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    function Get_All_theloai(){
        $conn = Connect();
        $sql ="SELECT * FROM theloai";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    function Get_theloai_loaitin($id){
        $conn = Connect();
        $sql ="SELECT theloai.Ten AS TenTL, loaitin.ten AS TenLT 
        FROM theloai INNER JOIN loaitin on theloai.id = loaitin.idTheLoai where loaitin.id = $id";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    function Get_loaitin_theloai($id){
        $conn = Connect();
        $sql ="SELECT * FROM loaitin WHERE idTheLoai = $id";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    function Get_tintuc_theloai($id){
        $conn = Connect();
        $sql ="SELECT tintuc.* FROM tintuc INNER JOIN loaitin on loaitin.id = tintuc.idloaitin WHERE loaitin.idtheloai = $id and NoiBat =1 LIMIT 0,1 ";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    function Get_ALL_Tin_Theo_LoaiTin($idlt){
        $conn= Connect();
        $sql ="SELECT * FROM tintuc WHERE idloaitin = $idlt";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    //hàm thứ 7 truy vấn các tin theo trang
    function Get_Tin_Theo_Trang($idlt,$from,$soTin1Trang){
        $conn= Connect();
        $sql ="SELECT * FROM tintuc WHERE idloaitin = $idlt LIMIT $from,$soTin1Trang";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    function Get_LoaiTin($id){
        $conn= Connect();
        $sql ="SELECT * FROM tintuc WHERE id = $id";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    function Get_comment_user($id){
        $conn= Connect();
        $sql ="SELECT comment.NoiDung , users.name FROM comment INNER JOIN tintuc ON tintuc.id = comment.idTinTuc INNER JOIN users ON users.id = comment.idUser WHERE tintuc.id = $id";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

    // Hàm lấy 4 tin liên quan
    function Get_tintuc_4_lienquan($id){
        $conn = Connect();
        $sql ="SELECT tintuc.* , loaitin.Ten FROM tintuc INNER JOIN loaitin on loaitin.id = tintuc.idloaitin WHERE tintuc.idLoaiTin = $id LIMIT 1,4 ";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }
    // Hàm lấy 4 tin nổi bật
    function Get_tintuc_4_noibat($id){
        $conn = Connect();
        $sql ="SELECT tintuc.* , loaitin.Ten FROM tintuc INNER JOIN loaitin on loaitin.id = tintuc.idloaitin WHERE tintuc.idLoaiTin = $id and NoiBat = 1 LIMIT 0,4 ";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

?>