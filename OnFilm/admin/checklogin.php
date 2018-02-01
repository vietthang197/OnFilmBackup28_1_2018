<?php
session_start();
if(!isset($_SESSION['active']) && !isset($_SESSION['id'])){
    echo "<script language=\"JavaScript\">\n";
    echo "alert('You are not loggin!');\n";
    echo "window.location='../admin/AdminTools.php'";
    echo "</script>";
    exit;
}