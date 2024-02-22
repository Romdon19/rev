<?php
session_start();
include('../navi/index.php');
$object=new CRUD();
$uname=trim($_POST['uname']);
$upass=trim($_POST['upass']);
$res=$object->Loginadmin($uname,$upass);
if(count($res)>0){
foreach($res as $row){
if($row['cls']=='ผู้ดูแลหลัก')
{
$_SESSION['aid']=$row['aid'];
$_SESSION['aname']=$row['apname'].$row['afname'].' '.$row['alname'];
echo "<script type='text/javascript'>";
echo "window.location='../admin/'";
echo "</script>";
}
elseif($row['cls']=='ผู้ดูแลรอง')
$_SESSION['aid']=$row['aid'];
$_SESSION['aname']=$row['apname'].$row['afname'].' '.$row['alname'];
echo "<script type='text/javascript'>";
echo "window.location='../assit/'";
echo "</script>";
}
}
else
{
echo"<script>
swal({
title: 'ไม่พบข้อมูล!',
text: 'ตรวจสอบชื่อผู้ใช้งานและรหัสผ่านให้ถูกต้อง',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
}
include('../f.php');
?>