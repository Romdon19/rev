<?php
include('../naviii/index.php');
$aid=trim($_POST['aid']);
$apname=trim($_POST['apname']);
$afname=trim($_POST['afname']);
$alname=trim($_POST['alname']);
$upass=trim($_POST['upass']);
$cls=trim($_POST['cls']);
$object->Updateadmin($aid,$apname,$afname,$alname,$upass,$cls);
echo"<script>window.location.href = '../';</script>";
include('../f.php');
?>