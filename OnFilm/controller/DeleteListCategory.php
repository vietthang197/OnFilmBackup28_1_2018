<?php
require_once "../models/ConnectDB.php";
$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$category_id = $_GET['id'];


$table_category = "theloaiphim";
$sql = "DELETE FROM $table_category WHERE id IN ($category_id)";
$result = mysqli_query($conn,$sql);
$conn->close();
if(!$result){
echo "<script>alert('Error!')</script>";
}else{
echo "<script>alert('Success!');</script>";
}
echo '<script>window.location.href = "../admin/CategoryControl.php";</script>';