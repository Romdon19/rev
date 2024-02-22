<?php
$ckdate=date("Y-m-d");
include('../navsearch/index.php');

if($_POST['dates']<=$ckdate)
{
echo"<script>
swal({
title: 'ผิดเงื่อนไข',
text: 'เลือกวันที่ย้อนหลังหรือวันที่ปัจจุบัน',
icon: 'warning'
}).then(function() {
// Redirect the user
window.location.href = 'index.php';
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

if($_POST['dates']=="")
{
echo"<script>
swal({
title: 'เลือกวันที่เริ่มต้น',
text: 'คลิกเลือก',
icon: 'warning'
}).then(function() {
// Redirect the user
window.location.href = 'index.php';
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}

if($_POST['datef']=="")
{
echo"<script>
swal({
title: 'เลือกวันที่สิ้นสุด',
text: 'คลิกเลือก',
icon: 'warning'
}).then(function() {
// Redirect the user
window.location.href = 'index.php';
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}
$dates=$_POST['dates'];
$datef=$_POST['datef'];
$res=$object->Numcheck($dates,$datef);
if(count($res)>0)
{
include 'show.php';
}
else
{
include 'shownone.php';
}
?>