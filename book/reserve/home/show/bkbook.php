<?php
include('../naviiii/index.php');
$sid=$_GET['atid'];
$bk=$object->Bkbook($sid);
if (count($bk) > 0) {
foreach ($bk as $row){
$stringoption.='<option value="'.$row['numend'].'">'.$row['etime'].'</option>';
}
echo $stringoption;
}
?>