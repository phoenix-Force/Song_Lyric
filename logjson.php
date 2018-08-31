<?php
include 'connection.php';
session_start();
if(isset($_SESSION["user_name"])){
    $tmpuser=$_SESSION["user_name"];
    $sel="SELECT * FROM login WHERE username='$tmpuser'";
    $arr=array();
    $rs=$con->query($sel);
    $rss=mysqli_fetch_assoc($rs);
    $arr[]=$rss;
    echo json_encode($arr);
}
?>