<?php
require_once "../models/ConnectDB.php";
$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$linkfilm = $_POST['Linkfilm'];
$tenphim= $_POST['tenphim'];
$theloai = $_POST['categoryfilm'];


$link_image_phim = $_POST['linkanh'];

$table_film = "film";
$sql = "INSERT INTO $table_film(link,tenphim,theloai,link_image_phim) VALUES('$linkfilm','$tenphim',$theloai,'$link_image_phim')";
$result = mysqli_query($conn,$sql);
$conn->close();
if(!$result){
    echo "<script>alert('Error!')</script>";
}else{
    echo "<script>alert('Success!');</script>";
}
echo '<script>window.location.href = "../admin/FilmControl.php";</script>';
?>

