<?php
include('../naviii/index.php');
if(isset($_POST['categoryid'])){  
$categoryid=trim($_POST['categoryid']);
$res=$object->Readcalid($categoryid);
if(count($res)>0){
echo'<option value="">คลิก</option>';
foreach($res as $row){
echo'<option value="'.$row['calid'].'">'.$row['calname'].'</option>';
}
}
}
?>