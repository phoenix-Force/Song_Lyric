<?php



$arr=array();
if(isset($_POST["sname"]) && isset($artist=$_POST["artist"]) && isset($artist=$_POST["lyric"])  && isset($artist=$_POST["des"]))
{
    $con=mysqli_connect("localhost","root","hawk","project");

    $sname=$_POST["sname"];
    $artist=$_POST["artist"];
    $lyric=addcslashes($_POST["lyric"]);
    $des =addcslashes($_POST["des"]);


    $filename =$_FILES["img"]["name"];
    $tmpname =$_FILES["img"]["tmp_name"];
    $ifolder ="img/".$filename;
    move_uploaded_file($tmpname,$folder);

    $filename =$_FILES["song"]["name"];
    $tmpname =$_FILES["song"]["tmp_name"];
    $sfolder ="audio/".$filename;
    move_uploaded_file($tmpname,$folder);

    $ins="INSERT INTO frm sinfo values('$sname','$artist','$ifolder','$sfolder','$lyric','$des')";
    
    $con->query($ins);
}
else{
    echo "Please insert All the value"
}

$sel="SELECT * FROM sinfo";
$rs=$con->query($sel);
while($row=$rs->fetch_assoc())
{
   $arr[]=$row;
}

echo json_encode($arr);

?>