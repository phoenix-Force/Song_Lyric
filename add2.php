<?php
    include 'connection.php';
    $arr=array();
    
    if(isset($_POST['sname']))
    {
        $sname=addslashes($_POST['sname']);
        $artist=addslashes($_POST['artist']);
        $lyric=addslashes($_POST["lyric"]);
        $des=addslashes($_POST["des"]);

        $ifilename=time().$_FILES["img"]["name"];
        $tmpname=$_FILES["img"]["tmp_name"];
        $ifolder=("img/".$ifilename);
        move_uploaded_file($tmpname,$ifolder);

        $sfilename=time().$_FILES["song"]["name"];
        $tmpname=$_FILES["song"]["tmp_name"];
        $sfolder=("adio/".$sfilename);
        move_uploaded_file($tmpname,$sfolder);
        $ins="INSERT INTO sinfo (sname,artist,img,song,lyric,des) VALUES ('$sname','$artist','$ifilename','$sfilename','$lyric','$des')";
        $con->query($ins);
        
    }
    $sel="SELECT * FROM sinfo";
    $rs=$con->query($sel);
    while($row=$rs->fetch_assoc())
    {
       $arr[]=$row;
    }
    echo json_encode($arr);
?>