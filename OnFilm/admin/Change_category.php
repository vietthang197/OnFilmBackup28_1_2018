<?php
require_once '../models/ConnectDB.php';
$id_category = $_GET['id_category'];

$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$table_name ="theloaiphim";
$sql = "SELECT * FROM $table_name WHERE id = $id_category";
$result_film = mysqli_query($conn,$sql);
$table_film_html ="";
$theloai_film="";
$theloai_film_id =0;
if($result_film->num_rows <1){
    echo "No result";
}else{

    while ($rows = $result_film->fetch_assoc()){
        $id= $rows['id'];
        $theloai = $rows['tentheloai'];
        $film_row_html = "<input type='hidden' name='id' value='$id'/><label>Tên thể loại </label><input type='text' name='ten_theloai' value='$theloai'><br/><br/>";
        $table_film_html .=$film_row_html;
    }

}

?>
<h3>Update category form</h3>
<form action="../controller/UpdateCategory.php" method="post">
    <?php echo $table_film_html.'<br><br>';?>
    <br><br><button type="submit" name="submit" >update</button>
    <button onclick="cancel()" type="reset" name="reset">Cancel</button>
</form>
<script>
    function cancel() {
        window.location.href = "CategoryControl.php";
    }
</script>