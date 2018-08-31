<?php


    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $con=mysqli_connect("localhost","root","hawk","hybrid");
        $tm=time();
        $ifilename=$tn.addslashes($_FILES["img"]["name"]);

        $tmpname=$_FILES["img"]["tmp_name"];
        $ifolder=addslashes("img/".$ifilename);
        move_uploaded_file($tmpname,$ifolder);

        $ins="INSERT INTO imgs SET name='$name' img='$ifilename'" ;
        $con->query($ins);
    }

?>