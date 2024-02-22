<?php
include('../naviii/index.php');
$aid=trim($_POST['aid']);
$ran=(mt_rand());
$upass=substr($ran,0,6);
$object->Resetadmin($aid,$upass);
echo"<script>window.location.href = '../';</script>";
include('../f.php');
?>