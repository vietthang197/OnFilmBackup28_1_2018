<?php
require_once "../models/ConnectDB.php";
$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$phim_id = $_GET['id'];


$table_film = "film";
$sql = "DELETE FROM $table_film WHERE id IN ($phim_id)";
$result = mysqli_query($conn,$sql);
$conn->close();
if(!$result){
    echo "<script>alert('Error!')</script>";
}else{
    echo "<script>alert('Success!');</script>";
}
echo '<script>window.location.href = "../admin/FilmControl.php";</script>';