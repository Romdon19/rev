<?php
include('../naviii/index.php');
//if(isset($_POST['submit'])){
$sizeid=trim($_POST['sizeid']);
$object->Deletesize($sizeid);
echo"<script>window.location.href = '../';</script>";
//}
include('../f.php');
?>