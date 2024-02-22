<?php
include('../naviii/index.php');
//img
$pre=date("Ymd_his");
$num=(mt_rand());
$img=(isset($_REQUEST['img']) ? $_REQUEST['img'] : '');
$upload=$_FILES['img'];
$path="../../../images/";
$type=strrchr($_FILES['img']['name'],".");
$newname=$num.$pre.$type;
$path_copy=$path.$newname;
$path_link="images/".$newname;

$size=$_FILES['img']['size'];
if($size>2000000)
{
echo"<script>
swal({
title: 'ไฟล์ใหญ่เกินขนาดที่กำหนด!',
text: 'ตรวจสอบขนาดไฟล์',
icon: 'warning'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}
elseif(($type!=".png")AND($type!=".jpg")AND($type!=".jpeg")AND($type!=".PNG")AND($type!=".JPG")AND($type!=".JPEG")AND($type!=".Png")AND($type!=".Jpg")AND($type!=".Jpeg")){
echo"<script>
swal({
title: 'อัปโหลดได้เฉพาะไฟล์ png, jpg, jpeg!',
text: 'ตรวจสอบประเภทของไฟล์',
icon: 'error'
}).then(function() {
// Redirect the user
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}
$sdid=trim($_POST['sdid']);
$object->Upimg($sdid,$newname);
move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);
echo"<script>history.back();</script>";
include('../../f.php');
?>