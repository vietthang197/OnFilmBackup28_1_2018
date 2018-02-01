<?php
require_once "../models/ConnectDB.php";
$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$id = $_POST['id'];
$theloai= $_POST['ten_theloai'];

$table_category= "theloaiphim";
$sql = "UPDATE  $table_category
        SET tentheloai = '$theloai'
        WHERE id = $id";
$result = mysqli_query($conn,$sql);
$conn->close();
if(!$result){
    echo "<script>alert('Error!')</script>";
}else{
    echo "<script>alert('Success!');</script>";
}
echo '<script>window.location.href = "../admin/CategoryControl.php";</script>';
?>