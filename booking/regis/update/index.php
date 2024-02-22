<?php
include('../naviii/index.php');
if(isset($_POST['submit'])){
$valid_form_fname = false;
$ckth_fname = (isset($_POST['fname']) && $_POST['fname']!="")?trim($_POST['fname']):NULL;
$charth_fname = "/^[ก-๙,เ\s]+$/";
if(!is_null($ckth_fname) && preg_match($charth_fname,$ckth_fname))
{
$valid_form_fname = true;
}
else
{
echo"<script>
swal({
title: 'ชื่อ ต้องเป็นอักขระภาษาไทยเท่านั้น!',
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

$valid_form_lname = false;
$ckth_lname = (isset($_POST['lname']) && $_POST['lname']!="")?trim($_POST['lname']):NULL;
$charth_lname = "/^[ก-๙,เ\s]+$/";
if(!is_null($ckth_lname) && preg_match($charth_lname,$ckth_lname))
{
$valid_form_lname = true;
}
else
{
echo"<script>
swal({
title: 'นามสกุล ต้องเป็นอักขระภาษาไทยเท่านั้น!',
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

//*check email
$email=$_POST['email'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo"<script>
swal({
title: 'รูปแบบอีเมล์ไม่ถูกต้อง!',
text: 'ตรวจสอบรูปแบบ email',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

$mid=trim($_POST['mid']);
$pname=trim($_POST['pname']);
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$email=trim($_POST['email']);
$object->Updatemember(
$mid,
$pname,
$fname,
$lname,
$email
)
;
echo"<script>window.location.href = '../details/';</script>";
}
include('../f.php');
?>