<?php
include('../naviii/index.php');
if(isset($_POST['submit'])){
	$sizename=trim($_POST['sizename']);
	$sizeck=1;
	$ck=$object->Cksizename($sizename);
if(count($ck)!=0){
echo"<script>
swal({
title: 'ข้อมูลซ้ำ!',
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

if($sizename!='')
{
$st=substr($sizename,0,1);
$st1=substr($sizename,1,1);
$st2=substr($sizename,2,1);
$st3=substr($sizename,3,1);
$st4=substr($sizename,4,1);
$st5=substr($sizename,5,1);
$st6=substr($sizename,6,1);
$st7=substr($sizename,7,1);
$st8=substr($sizename,8,1);
$st9=substr($sizename,9,1);
$st10=substr($sizename,10,1);
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

if($sizename!='')
{
$st=substr($sizename,0,1);
$st1=substr($sizename,1,1);
$st2=substr($sizename,2,1);
$st3=substr($sizename,3,1);
$st4=substr($sizename,4,1);
$st5=substr($sizename,5,1);
$st6=substr($sizename,6,1);
$st7=substr($sizename,7,1);
$st8=substr($sizename,8,1);
$st9=substr($sizename,9,1);
$st10=substr($sizename,10,1);
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

if($sizename!='')
{
$ls=substr($sizename,-0,1);
$ls1=substr($sizename,-1,1);
$ls2=substr($sizename,-2,1);
$ls3=substr($sizename,-3,1);
$ls4=substr($sizename,-4,1);
$ls5=substr($sizename,-5,1);
$ls6=substr($sizename,-6,1);
$ls7=substr($sizename,-7,1);
$ls8=substr($sizename,-8,1);
$ls9=substr($sizename,-9,1);
$ls10=substr($sizename,-10,1);
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
	$object->Regissize($sizename,$sizeck);
	echo"<script>window.location='../';</script>";
}
include('../f.php');
?>