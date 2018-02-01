<?php
    require_once "../models/ConnectDB.php";

    $database = new DatabaseOnFilm();
    $conn = $database ->connect();

    $database_name = "OnFilm";
    mysqli_select_db($conn,$database_name);

    $table_name ="film";
    $sql = "SELECT fi.id as id,fi.link as link,fi.tenphim as tenphim,fi.link_image_phim as link_image_phim,fi.nam_san_xuat as namsx,
fi.thoi_luong_phim as thoiluongphim,fi.quocgia as quocgia,fi.do_phan_giai as dophangiai,fi.dao_dien as daodien,fi.dien_vien as dienvien,
fi.noi_dung as noidung,th.tentheloai as theloai 
      FROM $table_name as fi LEFT  JOIN theloaiphim as th ON fi.theloai = th.id";
    $result_film = mysqli_query($conn,$sql);

    if($result_film->num_rows <1){
        echo "No result";
    }else{
        $table_film_html ="";
        $index =0;
        while ($rows = $result_film->fetch_assoc()){
            $index++;
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
            $film_row_html = '<tr><th>'.$index.'</th><th><input type="checkbox" name="phim_del" id="phim_delete" value="'.$id_film.'"/></th></th><th scope="row">'.$id_film.'</th><td>'.$theloai_film.'</td><td>'.$tenphim.'</td><td><textarea disabled style="width: 120px;">'.$link_film.'</textarea></td><td><textarea disabled style="width: 120px;">'.$iframe.'</textarea></td><td>'.$namsx.'</td><td>'.$thoiluongphim.'</td><td>'.$quocgia.'</td><td>'.$dophangiai.'</td><td><textarea disabled style="width: 120px;">'.$daodien.'</textarea></td><td><textarea disabled style="width: 120px;">'.$dienvien.'</textarea></td><td><textarea disabled style="width: 120px;">'.$noidung.'</textarea></td><td><a href="Change_film.php?id_phim='.$id_film.'">sửa</a></td></tr>';
            $table_film_html .=$film_row_html;
        }
        echo $table_film_html;
        $conn->close();
    }