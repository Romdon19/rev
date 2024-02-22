<?php
include('../naviii/index.php');
$mid=trim($_POST['mid']);
$pname=trim($_POST['pname']);
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$ran=(mt_rand());
$password=substr($ran,0,6);
$object->Updatemember($mid,$pname,$fname,$lname,$password);
echo"<script>window.location.href = '../';</script>";
include('../f.php');
?>