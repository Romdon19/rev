<?php
include('../naviii/index.php');
	$categoryid=trim($_POST['categoryid']);
	$calcode=trim($_POST['calcode']);
	$calname=trim($_POST['calname']);
	$size=trim($_POST['size']);
	$chk=0;
	$daterecord=date("Y-m-d H:i:s");
		$resultcalcode=$object->Checkcalcode($calcode);
		if(count($resultcalcode)>0)
		{
		echo"<script>
		swal({
		title: 'รหัสซ้ำ',
		text: 'ตรวจสอบ',
		icon: 'warning'
		}).then(function() {
		// Redirect the user
		history.back();
		console.log('The Ok Button was clicked.');
		});
		</script>";
		exit();
		}
if($calname!='')
{
$st=substr($calname,0,1);
$st1=substr($calname,1,1);
$st2=substr($calname,2,1);
$st3=substr($calname,3,1);
$st4=substr($calname,4,1);
$st5=substr($calname,5,1);
$st6=substr($calname,6,1);
$st7=substr($calname,7,1);
$st8=substr($calname,8,1);
$st9=substr($calname,9,1);
$st10=substr($calname,10,1);
if($st=='<' OR $st1=='<' OR $st2=='<' OR $st3=='<' OR $st4=='<' OR $st5=='<' OR $st6=='<' OR $st7=='<' OR $st8=='<' OR $st9=='<' OR $st10=='<')
{
echo"<script>
swal({
title: 'สวัสดีแฮคเกอร์',
text: 'เสียใจด้วยไม่สามารถแฮคได้',
icon: 'warning'
}).then(function() {
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();				
}
}

if($calname!='')
{
$st=substr($calname,0,1);
$st1=substr($calname,1,1);
$st2=substr($calname,2,1);
$st3=substr($calname,3,1);
$st4=substr($calname,4,1);
$st5=substr($calname,5,1);
$st6=substr($calname,6,1);
$st7=substr($calname,7,1);
$st8=substr($calname,8,1);
$st9=substr($calname,9,1);
$st10=substr($calname,10,1);
if($st=='<' OR $st1=='<' OR $st2=='<' OR $st3=='<' OR $st4=='<' OR $st5=='<' OR $st6=='<' OR $st7=='<' OR $st8=='<' OR $st9=='<' OR $st10=='<')
{
echo"<script>
swal({
title: 'สวัสดีแฮคเกอร์',
text: 'เสียใจด้วยไม่สามารถแฮคได้',
icon: 'warning'
}).then(function() {
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();				
}
}

if($calname!='')
{
$ls=substr($calname,-0,1);
$ls1=substr($calname,-1,1);
$ls2=substr($calname,-2,1);
$ls3=substr($calname,-3,1);
$ls4=substr($calname,-4,1);
$ls5=substr($calname,-5,1);
$ls6=substr($calname,-6,1);
$ls7=substr($calname,-7,1);
$ls8=substr($calname,-8,1);
$ls9=substr($calname,-9,1);
$ls10=substr($calname,-10,1);
if($ls=='>' OR $ls1=='>' OR $ls2=='>' OR $ls3=='>' OR $ls4=='>' OR $ls5=='>' OR $ls6=='>' OR $ls7=='>' OR $ls8=='>' OR $ls9=='>' OR $ls10=='>')
{
echo"<script>
swal({
title: 'สวัสดีแฮคเกอร์',
text: 'เสียใจด้วยไม่สามารถแฮคได้',
icon: 'warning'
}).then(function() {
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();				
}
}
$object->Registercal($categoryid,$calcode,$calname,$size,$chk,$daterecord);
echo"<script>window.location='../';</script>";
include('../f.php');
?>