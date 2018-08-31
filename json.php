<?php
include 'connection.php';
$sel="SELECT * FROM sinfo";
$arr=array();
$rs=$con->query($sel);
while($row=$rs->fetch_assoc()){
      $arr[]=$row;
}
echo json_encode($arr);
//echo $_REQUEST['callback'].'('.json_encode($arr).')';
?>
