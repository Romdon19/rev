<?php
include('../naviii/index.php');
$aid=trim($_POST['aid']);
$object->Deleteadmin($aid);
echo"<script>window.location.href = '../';</script>";
include('../f.php');
?>