<?php
include('../naviii/index.php');
$email=$_POST['email'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo"<script>
swal({
title: 'รูปแบบอีเมล์ไม่ถูกต้อง!',
text: 'ตรวจสอบรูปแบบอีเมล์',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

$valid_form_newpassword = false;
$ckth_newpassword = (isset($_POST['newpassword']) && $_POST['newpassword']!="")?trim($_POST['newpassword']):NULL;
$charth_newpassword = "/^[0-9\s]+$/";
if(!is_null($ckth_newpassword) && preg_match($charth_newpassword,$ckth_newpassword))
{
$valid_form_newpassword = true;
}
else
{
echo"<script>
swal({
title: 'รหัสผ่านต้องเป็นตัวเลขอารบิคเท่านั้น!',
text: 'ตรวจสอบการป้อนข้อมูล',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

$ckth_newpassword_num=strlen($_POST['newpassword']);
if(strlen($ckth_newpassword_num!=6))
{
echo"<script>
swal({
title: 'รหัสผ่านไม่ครบ 5 หลัก!',
text: 'ตรวจสอบการป้อนข้อมูล',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

$email=trim($_POST['email']);
$password=trim($_POST['password']);
$newpassword=trim($_POST['newpassword']);
$newpassword_=trim($_POST['newpassword_']);

if($newpassword!=$newpassword_)
{
echo"<script>
swal({
title: 'รหัสผ่านใหม่และยืนยันรหัสผ่านต้องตรงกัน',
text: 'ตรวจสอบรหัสผ่านใหม่ให้ตรงกัน',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

$res=$object->Ckpassword($email,$password);
if(count($res)>0)
{
foreach ($res as $row){
$_SESSION['mid']=$row['mid'];
$mid=$row['mid'];
$object->Upnewpassword($mid,$newpassword);
echo"<script>window.location.href = '../mail/';</script>";
}
}
else
{
echo"<script>
swal({
title: 'อีเมล์หรือรหัสผ่าน (เดิม) ไม่ถูกต้อง',
text: 'ตรวจสอบอีเมล์ รหัสผ่าน (เดิม)',
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