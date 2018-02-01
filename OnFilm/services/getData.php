<?php
require_once "../models/ConnectDB.php";

$database_onfilm = new DatabaseOnFilm();
$conn = $database_onfilm ->connect();
$database_name = "OnFilm";
$table_film = "film";
mysqli_select_db($conn,$database_name);
$table_theloai = "theloaiphim";
$sql = "SELECT tf.id as id,tl.tentheloai as theloai,tf.theloai as category_id,tf.link as link,tf.tenphim as tenphim,tf.link_image_phim as iframe 
FROM $table_film as tf LEFT JOIN $table_theloai as tl ON tf.theloai = tl.id";
$result_film = mysqli_query($conn,$sql);
$arr_film = array();

$arr_data_theloai_1 = array();
$arr_data_theloai_2 = array();
$arr_data_theloai_3 = array();
$arr_data_theloai_4 = array();
$arr_data_theloai_5 = array();
$arr_data_theloai_6 = array();
$arr_data_theloai_7 = array();
$arr_data_theloai_8 = array();
$arr_data_theloai_9 = array();
$arr_data_theloai_10 = array();
$arr_data_theloai_11 = array();
$arr_data_theloai_12 = array();


while($row = $result_film->fetch_array()){
    $id = $row['id'];
    $theloai = $row['theloai'];
    $link = $row['link'];
    $tenphim = $row['tenphim'];
    $iframe = $row['iframe'];
    $category_id = $row['category_id'];
//    $all_data_film = new All_Data_Phim($category_id,$theloai,new Film($id,$theloai,$link,$tenphim,$iframe));
    switch ($category_id){
        case 17:
            array_push($arr_data_theloai_1,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 18:
            array_push($arr_data_theloai_2,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 19:
            array_push($arr_data_theloai_3,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 20:
            array_push($arr_data_theloai_4,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 21:
            array_push($arr_data_theloai_5,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 22:
            array_push($arr_data_theloai_6,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 23:
            array_push($arr_data_theloai_7,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 24:
            array_push($arr_data_theloai_8,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 25:
            array_push($arr_data_theloai_9,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 26:
            array_push($arr_data_theloai_10,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 27:
            array_push($arr_data_theloai_11,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
        case 28:
            array_push($arr_data_theloai_12,new Film($id,$theloai,$link,$tenphim,$iframe) );
            break;
    }

}

array_push($arr_film,new All_Data_Phim(17,"Phim hành động",$arr_data_theloai_1));
array_push($arr_film,new All_Data_Phim(18,"Phim hài hước",$arr_data_theloai_2));
array_push($arr_film,new All_Data_Phim(19,"Phim cổ trang",$arr_data_theloai_3));
array_push($arr_film,new All_Data_Phim(20,"Phim viễn tưởng",$arr_data_theloai_4));
array_push($arr_film,new All_Data_Phim(21,"Phim võ thuật",$arr_data_theloai_5));
array_push($arr_film,new All_Data_Phim(22,"Phim thần thoại",$arr_data_theloai_6));
array_push($arr_film,new All_Data_Phim(23,"Phim hình sự",$arr_data_theloai_7));
array_push($arr_film,new All_Data_Phim(24,"Phim hoạt hình",$arr_data_theloai_8));
array_push($arr_film,new All_Data_Phim(25,"Video game",$arr_data_theloai_9));
array_push($arr_film,new All_Data_Phim(26,"Phim tâm lý",$arr_data_theloai_10));
array_push($arr_film,new All_Data_Phim(27,"Phim kinh dị",$arr_data_theloai_11));
array_push($arr_film,new All_Data_Phim(28,"Phim thể thao - âm nhạc",$arr_data_theloai_12));
echo json_encode($arr_film);

class All_Data_Phim{
    var $category_id;
    var $category_name;
    var $data;

    /**
     * All_Data_Phim constructor.
     * @param $category_id
     * @param $category_name
     * @param $data
     */
    public function All_Data_Phim($category_id, $category_name, $data)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->data = $data;
    }


}

class Film{
    var $id;
    var $theloai;
    var $link;
    var $tenphim;
    var $iframe;

    function Film($id, $theloai, $link, $tenphim, $iframe){
        $this->id = $id;
        $this->theloai = $theloai;
        $this->link = $link;
        $this->tenphim = $tenphim;
        $this->iframe = $iframe;
    }
}
$conn->close();