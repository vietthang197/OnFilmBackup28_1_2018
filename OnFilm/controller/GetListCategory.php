<?php
require_once "../models/ConnectDB.php";

$database = new DatabaseOnFilm();
$conn = $database ->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$table_name ="theloaiphim";
$sql = "SELECT * FROM $table_name";
$result_film = mysqli_query($conn,$sql);

if($result_film->num_rows <1){
    echo "No result";
}else{
    $table_category_html ="";
    $index =0;
    while ($rows = $result_film->fetch_assoc()){
        $index++;
        $id= $rows['id'];
        $theloai = $rows['tentheloai'];
        $category_row_html = '<tr><th>'.$index.'</th><th><input type="checkbox" name="phim_del" id="phim_delete" value="'.$id.'"/></th></th><th scope="row">'.$id.'</th><td>'.$theloai.'</td><td><a href="Change_category.php?id_category='.$id.'">sửa</a></td></tr>';
        $table_category_html .=$category_row_html;
    }
    echo $table_category_html;
    $conn->close();
}