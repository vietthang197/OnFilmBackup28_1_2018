<?php
require_once '../models/ConnectDB.php';
$id_phim = $_GET['id_phim'];

$database = new DatabaseOnFilm();
$conn = $database->connect();

$database_name = "OnFilm";
mysqli_select_db($conn,$database_name);

$table_name ="film";
$sql = "SELECT fi.id as id,fi.link as link,fi.tenphim as tenphim,fi.link_image_phim as link_image_phim,fi.nam_san_xuat as namsx,
fi.thoi_luong_phim as thoiluongphim,fi.quocgia as quocgia,fi.do_phan_giai as dophangiai,fi.dao_dien as daodien,fi.dien_vien as dienvien,
fi.noi_dung as noidung,th.tentheloai as theloai 
      FROM $table_name as fi LEFT  JOIN theloaiphim as th ON fi.theloai = th.id WHERE fi.id = $id_phim";
$result_film = mysqli_query($conn,$sql);
$table_film_html ="";
$theloai_film="";
$theloai_film_id =0;
if($result_film->num_rows <1){
    echo "No result";
}else{

    while ($rows = $result_film->fetch_assoc()){
        $id_film = $rows['id'];
        $link_film = $rows['link'];
        $theloai_film = $rows['theloai'];
        $tenphim = $rows['tenphim'];
        $iframe = $rows['link_image_phim'];
        $namsx = $rows['namsx'];
        $thoiluongphim = $rows['thoiluongphim'];
        $quocgia = $rows['quocgia'];
        $dophangiai = $rows['dophangiai'];
        $daodien = $rows['daodien'];
        $dienvien = $rows['dienvien'];
        $noidung = $rows['noidung'];
        $film_row_html = "<input type='hidden' name='id_phim' value='$id_phim'/><label>Tên phim </label><input type='text' name='ten_phim' value='$tenphim'><br/><br/><label>Link image phim </label><input type='text' name='image_phim' value='$iframe'><br/><br/><label>Link  phim </label><input type='text' name='link_film' value='$link_film'>
<br/><br/><label>Năm sản xuất: </label><input type='text' name='nam_san_xuat' value='$namsx'><br/><br/><label>Thời lượng phim: </label><input type='text' name='thoi_luong_phim' value='$thoiluongphim'>
<br/><br/><label>Quốc gia: </label><input type='text' name='quoc_gia' value='$quocgia'><br/><br/><label>Độ phân giải: </label><input type='text' name='do_phan_giai' value='$dophangiai'>
<br/><br/><label>Đạo diễn: </label><input type='text' name='dao_dien' value='$daodien'><br/><br/><label>Diễn viên: </label><input type='text' name='dien_vien' value='$dienvien'>
<br/><br/><label>Nội dung: </label><input type='text' name='noi_dung' value='$noidung'>";
        $table_film_html .=$film_row_html;
    }

}
$table_theloaiphim = "theloaiphim";
$sql = "SELECT * FROM $table_theloaiphim";
$result_theloaiphim = mysqli_query($conn,$sql);

$html_select_theloai = '';
while ($rows = $result_theloaiphim->fetch_assoc()){
    $id = $rows['id'];
    $theloai = $rows['tentheloai'];
    if($theloai == $theloai_film){
        $html_select_theloai .= '<option value="'.$id.'" selected>'.$theloai.'</option>';
    }else{
        $html_select_theloai .= '<option value="'.$id.'">'.$theloai.'</option>';
    }
}
?>
<h3>Update film form</h3>
<form action="../controller/UpdatePhim.php" method="post">
    <?php echo $table_film_html.'<br><br><label>Thể loại phim </label><select name="the_loai_phim">'.$html_select_theloai.'</select>';?>
    <br><br><button type="submit" name="submit" >update</button>
    <button onclick="cancel()" type="reset" name="reset">Cancel</button>
</form>
<script>
    function cancel() {
        window.location.href = "FilmControl.php";
    }
</script>