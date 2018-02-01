<?php
require_once '../models/ConnectDB.php';
if(isset($_POST['submit'])){
    $theloai = $_POST['category'];
    $database = new DatabaseOnFilm();
    $conn = $database->connect();
    $database_name ="OnFilm";
    $table_theloaiphim = "theloaiphim";
    mysqli_select_db($conn,$database_name);

    $sql = "INSERT INTO $table_theloaiphim (tentheloai) VALUES('$theloai')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "<script>alert('Error!')</script>";
    }else{
        echo "<script>alert('Success!');</script>";
    }
    echo '<script>window.location.href = "FilmControl.php";</script>';

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
    <div class="container">
        <h2>Insert category of film</h2>
        <p>The form below contains two input elements; one of type text and one of type password:</p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" id="category" name="category" required/>
            </div>
            <button type="submit" name="submit" class="btn btn-classic">Add</button>
            <button onclick="cancel()" type="reset" name="reset" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>

</body>
<script>
function cancel() {
    window.location.href = "FilmControl.php";
}
</script>
</html>
