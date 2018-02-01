<?php
session_start();
require_once "../models/ConnectDB.php";
if(isset($_POST['submit'])){
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];
    $table_name ="accounts";
    $database_name ="OnFilm";

    $connect_db = new DatabaseOnFilm();
    $conn = $connect_db->connect();
    mysqli_select_db($conn,$database_name);

    $sql = "SELECT * FROM $table_name WHERE username = '$user_username'";
    $result_password = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result_password) == 1){
        while ($rows = $result_password->fetch_assoc()){
            if($rows['passwd'] == $user_password && $rows['isadmin']==true){
                $_SESSION['active'] = "active";
                $_SESSION['id_user'] = $rows['id'];
                echo '<script>location.href = "../admin/Control.php"</script>';
                exit;
            }else{
                echo "<script language=\"JavaScript\">\n";
                echo "alert('Password was incorrect!');\n";
                echo "window.location='../admin/AdminTools.php'";
                echo "</script>";
                exit;
            }
        }
    }else{
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Username was incorrect!');\n";
        echo "window.location='../admin/AdminTools.php'";
        echo "</script>";
        exit;
    }
    $conn->close();

}else{
    echo "You are not loggin";
}