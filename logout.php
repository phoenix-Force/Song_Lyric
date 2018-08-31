<?php
include 'connection.php';
session_start();
echo $_SESSION["user_name"];
if(isset($_SESSION["user_name"])){
    //session_abort();
    unset($_SESSION['user_name']);
    //echo "destroyed";
}
?>