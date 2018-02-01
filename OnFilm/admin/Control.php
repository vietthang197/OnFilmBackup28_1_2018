<?php
require_once "../admin/checklogin.php";

?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<style>
    .bs-calltoaction{
        position: relative;
        width:auto;
        padding: 15px 25px;
        border: 1px solid black;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .bs-calltoaction > .row{
        display:table;
        width: calc(100% + 30px);
    }

    .bs-calltoaction > .row > [class^="col-"],
    .bs-calltoaction > .row > [class*=" col-"]{
        float:none;
        display:table-cell;
        vertical-align:middle;
    }

    .cta-contents{
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .cta-title{
        margin: 0 auto 15px;
        padding: 0;
    }

    .cta-desc{
        padding: 0;
    }

    .cta-desc p:last-child{
        margin-bottom: 0;
    }

    .cta-button{
        padding-top: 10px;
        padding-bottom: 10px;
    }

    @media (max-width: 991px){
        .bs-calltoaction > .row{
            display:block;
            width: auto;
        }

        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:block;
            vertical-align:middle;
            position: relative;
        }

        .cta-contents{
            text-align: center;
        }
    }



    .bs-calltoaction.bs-calltoaction-default{
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .bs-calltoaction.bs-calltoaction-primary{
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }

    .bs-calltoaction.bs-calltoaction-info{
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }

    .bs-calltoaction.bs-calltoaction-success{
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }

    .bs-calltoaction.bs-calltoaction-warning{
        color: #fff;
        background-color: #f0ad4e;
        border-color: #eea236;
    }

    .bs-calltoaction.bs-calltoaction-danger{
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }

    .bs-calltoaction.bs-calltoaction-primary .cta-button .btn,
    .bs-calltoaction.bs-calltoaction-info .cta-button .btn,
    .bs-calltoaction.bs-calltoaction-success .cta-button .btn,
    .bs-calltoaction.bs-calltoaction-warning .cta-button .btn,
    .bs-calltoaction.bs-calltoaction-danger .cta-button .btn{
        border-color:#fff;
    }
</style>
<body>
<h2 style="text-align: center;margin-top: 10px;">OnFilm tools</h2>
<div class="container">
    <div class="col-sm-12">

        <div class="bs-calltoaction bs-calltoaction-default">
            <div class="row">
                <div class="col-md-9 cta-contents">
                    <h1 class="cta-title">Quản lý User</h1>
                    <div class="cta-desc">
                        <p>Thao tác với user.</p>
                        <p>Xem thống kê về user.</p>
                        <p>Thao tác với tài khoản admin.</p>
                    </div>
                </div>
                <div class="col-md-3 cta-button">
                    <a href="#" class="btn btn-lg btn-block btn-default">Quản lý</a>
                </div>
            </div>
        </div>

        <div class="bs-calltoaction bs-calltoaction-primary">
            <div class="row">
                <div class="col-md-9 cta-contents">
                    <h1 class="cta-title">Quản lý Phim</h1>
                    <div class="cta-desc">
                        <p>Thêm sửa xóa phim.</p>
                        <p>Thống kê phim.</p>
                    </div>
                </div>
                <div class="col-md-3 cta-button">
                    <a href="../admin/FilmControl.php" class="btn btn-lg btn-block btn-primary">Quản lý</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
