<?php
$dateselect=$_POST['dateselect'];
$categoryid=$_POST['categoryid'];
$calid=$_POST['calid'];

if($_POST['dateselect']=="")
{
echo"<script>
swal({
title: 'เลือกวันที่ + ประเภท + ชื่อเรียก',
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

if($_POST['categoryid']=="")
{
echo"<script>
swal({
title: 'เลือกวันที่ + ประเภท + ชื่อเรียก',
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

if($_POST['calid']=="")
{
echo"<script>
swal({
title: 'เลือกวันที่ + ประเภท + ชื่อเรียก',
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

if($dateselect!='' AND $categoryid!=''  AND $calid!='')
	{
	include '../show/index.php';
	}
?>