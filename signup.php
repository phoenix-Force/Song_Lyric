<?php
    include 'connection.php';
    $arr=array();
    if(isset($_POST['sign_up_name']) && isset($_POST['sign_up_user_name']) && isset($_POST["sign_up_mail"])&&isset($_POST["sign_up_cpw"]) && isset($_FILES["sign_up_img"]["name"]))
    {

        $sign_up_name=addslashes($_POST['sign_up_name']);
        $sign_up_user_name=addslashes($_POST['sign_up_user_name']);
        $sign_up_mail=addslashes($_POST['sign_up_mail']);
        $sign_up_cpw=addslashes($_POST["sign_up_cpw"]);
        $sign_up_gender=addslashes($_POST["gender"]);

        $sign_up_filename=time().$_FILES["sign_up_img"]["name"];
        $sign_up_tmpname=$_FILES["sign_up_img"]["tmp_name"];
        $sign_folder=("profile/".$sign_up_filename);
        move_uploaded_file($sign_up_tmpname,$sign_folder);

        $ins="INSERT INTO login (name,username,email,gender,pphoto,pass) VALUES ('$sign_up_name','$sign_up_user_name','$sign_up_mail','$sign_up_gender','$sign_up_filename','$sign_up_cpw')";
        $con->query($ins);


    }
    $sel="SELECT * FROM login";
    $rs=$con->query($sel);
    while($row=$rs->fetch_assoc())
    {
       $arr[]=$row;
    }
    
    echo json_encode($arr);


?>