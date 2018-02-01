<?php
require_once "../admin/checklogin.php";
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../admin/FilmControl.php">List Phim</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../admin/CategoryControl.php">List Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/InsertFilm.php">Insert Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/InsertCategory.php">Insert category</a>
            </li>
        </ul>
    </nav>
</div>



<div class="container">
    <table class="table" style="margin-top: 10px;">
        <thead class="thead-inverse">
        <tr>
            <th>Index</th>
            <th><button id="btn_delete_phim">Multi delete</button></th>
            <th>ID</th>
            <th>Thể loại</th>
        </tr>
        </thead>
        <tbody>
        <?php include "../controller/GetListCategory.php";?>
        </tbody>
    </table>
</div>

</body>
<script>

    $('#btn_delete_phim').click(function () {
        var id_phim="";

        var atLeastOneIsChecked = $('input:checkbox[name="phim_del"]:checked') ;
        if(atLeastOneIsChecked.length ===0){
            alert("Bạn chưa chọn thể loại nào để xóa!");
            return false;
        }else{
            var conf = confirm("Bạn có muốn xóa thể loại đã chọn ?");
            if(conf){
                var i=0;
                for(i=0;i<atLeastOneIsChecked.length;i++){
                    if(i<atLeastOneIsChecked.length-1){
                        id_phim+=atLeastOneIsChecked[i].value+",";
                    }else{
                        id_phim+=+atLeastOneIsChecked[i].value;
                    }
                }
            }else{
                return false;
            }
        }
        window.location.href ="../controller/DeleteListCategory.php?id="+id_phim;
    });
</script>