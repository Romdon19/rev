<?php
include('../naviii/index.php');
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

//check หมายเลขโทรศัพท์
$valid_form_tel = false;
$ckth_tel = (isset($_POST['tel']) && $_POST['tel']!="")?trim($_POST['tel']):NULL;
$charth_tel = "/^[0-9\s]+$/";
if(!is_null($ckth_tel) && preg_match($charth_tel,$ckth_tel))
{
$valid_form_tel = true;
}
else
{
echo"<script>
swal({
title: 'หมายเลขโทรศัพท์ ต้องเป็นตัวเลขอารบิคเท่านั้น!',
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

$ckth_tel_num=strlen($_POST['tel']);
if(strlen($ckth_tel_num!=10))
{
echo"<script>
swal({
title: 'ป้อนหมายเลขโทรศัพท์ไม่ครบ 10 หลัก!',
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

$tel_=trim($_POST['tel_']);

if($tel_!=$ckth_tel)
{
echo"<script>
swal({
title: 'เบอร์โทรมือถือไม่ตรงกัน!',
text: 'เบอร์โทรต้องตรงกันทั้งสองช่อง',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

$char = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$allchar = "";
for ($i=0; $i<=9; $i++)
{
$random = array_rand($char);
$allchar .= $char[$random];
}

$d=date("Ymd");
$t=time();
$n=(mt_rand());
$randomid=$allchar.$d.$t.$n;
$pname=trim($_POST['pname']);
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$email=trim($_POST['email']);
$tel=trim($_POST['tel']);
$chk=2;
$ran=(mt_rand());
$password=substr($ran,0,6);
$ip=$_SERVER["REMOTE_ADDR"];
$daterecord=date("Y-m-d H:i:s");
//
$resultemail=$object->Checkemail($email);
if(count($resultemail)>0)
{
echo"<script>
swal({
title: 'อีเมล์นี้มีแล้วในระบบแล้ว',
text: 'ตรวจสอบอีเมล์ที่ใช้ลงทะเบียน',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

$resulttel=$object->Checktel($tel);
if(count($resulttel)>0)
{
echo"<script>
swal({
title: 'เบอร์โทรนี้มีแล้วในระบบแล้ว',
text: 'ตรวจสอบเบอร์โทรที่ใช้ลงทะเบียน',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}
$object->Register(
$randomid,
$pname,
$fname,
$lname,
$email,
$tel,
$chk,
$password,
$ip,
$daterecord
)
;
$_SESSION['randomid']=$randomid;
echo"<script>window.location='../details/';</script>";
include('../f.php');
?>