<?php
require_once "../models/ConnectDB.php";

$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);
$table_theloaiphim = "theloaiphim";
$sql = "SELECT * FROM $table_theloaiphim";
$result_theloaiphim = mysqli_query($conn,$sql);

$html_select_theloai = '';
while ($rows = $result_theloaiphim->fetch_assoc()){
    $id = $rows['id'];
    $theloai = $rows['tentheloai'];
    $html_select_theloai .= '<option value="'.$id.'">'.$theloai.'</option>';
}

$table_theloaiphim = "theloaiphim";
$sql = "SELECT * FROM $table_theloaiphim";
$result_theloaiphim = mysqli_query($conn,$sql);

$html_select_theloai = '';
while ($rows = $result_theloaiphim->fetch_assoc()){
    $id = $rows['id'];
    $theloai = $rows['tentheloai'];
    $html_select_theloai .= '<option value="'.$id.'">'.$theloai.'</option>';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Insert Film control</h2>
    <p>The form below contains two input elements; one of type text and one of type password:</p>
    <form action="../controller/ActionFilm.php" method="post">
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" class="form-control" id="link" name="Linkfilm" required>
        </div>
        <div class="form-group">
            <label for="tenphim">Tên phim:</label>
            <input type="text" class="form-control" id="tenphim" name="tenphim" required>
        </div>
        <div class="form-group">
            <label for="linkanh">Ảnh (link)</label>
            <input type="text" class="form-control" id="linkanh" name="linkanh" required>
        </div>
        <div class="form-group">
            <label for="sel1">Thể loại:</label>
            <select name="categoryfilm" class="form-control" id="sel1" required>
                <?php echo $html_select_theloai;?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
        <button onclick="cancel()" type="reset" name="reset" class="btn btn-danger">Cancel</button>
    </form>
</div>

</body>
<script>
    function cancel() {
        window.location.href = "FilmControl.php";
    }
</script>
</html>
