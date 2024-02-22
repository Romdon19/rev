<?php
include('../naviii/index.php');
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
$email=trim($_POST['email']);
$tel=trim($_POST['tel']);
$resultemail=$object->Checkemail($email,$tel);
if (count($resultemail)>0)
{
foreach($resultemail as $rowemail)
{
$_SESSION['mid']=$rowemail['mid'];
echo"<script>window.location.href = '../mail/';</script>";
}
}
else
{
echo"<script>
swal({
title: 'ไม่พบข้อมูล!',
text: 'ตรวจสอบอีเมล์ เบอร์โทร',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

include('../f.php');
?>