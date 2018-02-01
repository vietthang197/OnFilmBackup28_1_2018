<?php
require_once "../models/ConnectDB.php";
$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$phim_id = $_POST['id_phim'];
$linkfilm = $_POST['link_film'];
$tenphim= $_POST['ten_phim'];
$theloai = $_POST['the_loai_phim'];
$link_image_phim = $_POST['image_phim'];
$nam_san_xuat = $_POST['nam_san_xuat'];
$thoi_luong_phim = $_POST['thoi_luong_phim'];
$quocgia = $_POST['quoc_gia'];
$do_phan_giai = $_POST['do_phan_giai'];
$dao_dien = $_POST['dao_dien'];
$dien_vien = $_POST['dien_vien'];
$noi_dung = $_POST['noi_dung'];

$table_film = "film";
$sql = "UPDATE  $table_film
        SET theloai = $theloai,link = '$linkfilm',tenphim = '$tenphim',link_image_phim = '$link_image_phim', nam_san_xuat = $nam_san_xuat, thoi_luong_phim = '$thoi_luong_phim', quocgia= '$quocgia', do_phan_giai = '$do_phan_giai', dao_dien = '$dao_dien', dien_vien = '$dien_vien', noi_dung = '$noi_dung'
        WHERE id = $phim_id";
$result = mysqli_query($conn,$sql);
$conn->close();
if(!$result){
    echo "<script>alert('Error!')</script>";
}else{
    echo "<script>alert('Success!');</script>";
}
echo '<script>window.location.href = "../admin/FilmControl.php";</script>';
?>
