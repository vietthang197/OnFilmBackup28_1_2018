<?php
require_once "../models/ConnectDB.php";

$id_film_request  = $_GET['id_film_request'];

$database_onfilm = new DatabaseOnFilm();
$conn = $database_onfilm ->connect();
$database_name = "OnFilm";
$table_film = "film";
mysqli_select_db($conn,$database_name);
$table_theloai = "theloaiphim";

$sql = "SELECT fi.id as id,tl.tentheloai as theloai,fi.theloai as category_id,fi.link as link,fi.tenphim as tenphim,fi.link_image_phim as iframe,fi.nam_san_xuat as namsx,
fi.thoi_luong_phim as thoiluongphim,fi.quocgia as quocgia,fi.do_phan_giai as dophangiai,fi.dao_dien as daodien,fi.dien_vien as dienvien,
fi.noi_dung as noidung 
FROM $table_film as fi LEFT JOIN $table_theloai as tl ON fi.theloai = tl.id WHERE fi.id = $id_film_request";

$result_film = mysqli_query($conn,$sql);
$arr_film = array();

while($row = $result_film->fetch_array()){
    $id = $row['id'];
    $theloai = $row['theloai'];
    $link = $row['link'];
    $tenphim = $row['tenphim'];
    $iframe = $row['iframe'];
    $namsx = $row['namsx'];
    $thoiluongphim = $row['thoiluongphim'];
    $quocgia = $row['quocgia'];
    $dophangiai = $row['dophangiai'];
    $daodien = $row['daodien'];
    $dienvien = $row['dienvien'];
    $noidung = $row['noidung'];
    array_push($arr_film,new Film($id,$theloai,$link,$tenphim,$iframe,$namsx,$thoiluongphim,$quocgia,$dophangiai,$daodien,$dienvien,$noidung));
    echo json_encode($arr_film);

}

class Film{
    var $id;
    var $theloai;
    var $link;
    var $tenphim;
    var $iframe;
    var $namsx;
    var $thoiluongphim ;
    var $quocgia;
    var $dophangiai ;
    var $daodien;
    var $dienvien;
    var $noidung ;

    /**
     * Film constructor.
     * @param $id
     * @param $theloai
     * @param $link
     * @param $tenphim
     * @param $iframe
     * @param $namsx
     * @param $thoiluongphim
     * @param $quocgia
     * @param $dophangiai
     * @param $daodien
     * @param $dienvien
     * @param $noidung
     */
    public function Film($id, $theloai, $link, $tenphim, $iframe, $namsx, $thoiluongphim, $quocgia, $dophangiai, $daodien, $dienvien, $noidung)
    {
        $this->id = $id;
        $this->theloai = $theloai;
        $this->link = $link;
        $this->tenphim = $tenphim;
        $this->iframe = $iframe;
        $this->namsx = $namsx;
        $this->thoiluongphim = $thoiluongphim;
        $this->quocgia = $quocgia;
        $this->dophangiai = $dophangiai;
        $this->daodien = $daodien;
        $this->dienvien = $dienvien;
        $this->noidung = $noidung;
    }


}