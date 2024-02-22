<?php
include('../naviii/index.php');
$sdid=trim($_POST['sdid']);
$office=trim($_POST['office']);
$title=trim($_POST['title']);
$admin=trim($_POST['admin']);
$rootmail=trim($_POST['rootmail']);
$rootpass=trim($_POST['rootpass']);
$hostmail=trim($_POST['hostmail']);
$durl=trim($_POST['durl']);
$footer1=trim($_POST['footer1']);
$footer2=trim($_POST['footer2']);
$num=trim($_POST['num']);
$object->Updatesetupdata($sdid,$office,$title,$admin,$rootmail,$rootpass,$hostmail,$durl,$footer1,$footer2,$num);
echo"<script>window.location.href = '../';</script>";
include('../f.html');
?>