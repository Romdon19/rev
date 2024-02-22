<?php
include('../naviii/index.php');
//if(isset($_POST['submit'])){
$calid=trim($_POST['calid']);
$object->Deletecal($calid);
echo"<script>window.location.href = '../';</script>";
//}
include('../f.php');
?>