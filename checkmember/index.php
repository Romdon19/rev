<?php
session_start();
include('../navi/index.php');

$tel=trim($_POST['tel']);
$password=trim($_POST['password']);

$res=$object->Loginmember($tel,$password);
if(count($res)>0){
foreach($res as $row){
$_SESSION['mid']=$row['mid'];
$_SESSION['mname']=$row['pname'].$row['fname'].' '.$row['lname'];
echo "<script type='text/javascript'>";
echo "window.location='../book/';";
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