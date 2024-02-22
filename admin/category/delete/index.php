<?php
include('../naviii/index.php');
//if(isset($_POST['submit'])){
$categoryid=trim($_POST['categoryid']);
$object->Deletecategory($categoryid);
echo"<script>window.location.href = '../';</script>";
//}
include('../f.php');
?>