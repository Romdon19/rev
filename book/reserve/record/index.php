<?php
include('../naviii/index.php');
if(isset($_POST['submit'])){
$mid=$_SESSION['mid'];
$calid=$_POST['calid'];
$sid=$_POST['sid'];
$eid=$_POST['eid'];
$topic=trim($_POST['topic']);
$bookdate=$_POST['bookdate'];
$ip=$_SERVER["REMOTE_ADDR"];
$add_date = date("Y-m-d H:i:s");
$now_date = date("Y-m-d");
	$nd=$now_date;
	$ncuty=substr($nd,0,4);
	$ncutm=substr($nd,5,2);
	$ncutd=substr($nd,8,2);
	$nbd=$ncuty.$ncutm.$ncutd;
		$d=$bookdate;
		$cuty=substr($d,0,4);
		$cutm=substr($d,5,2);
		$cutd=substr($d,8,2);
		$bd=$cuty.$cutm.$cutd;

function utf8_strlen($topic)
{
$c = strlen($topic);
$l = 0;
for ($i = 0; $i < $c; ++$i)
{
if ((ord($topic[$i]) & 0xC0) != 0x80)
{
++$l;
}
}
return $l;
}
$topicutf8=utf8_strlen($topic); 
if($topicutf8<=10)
{
echo"<script>
swal({
title: 'หัวข้อเรื่องสั้นเกินไป!',
text: 'หัวข้อเรื่องต้องประกอบด้วยอักขระ 10 ตัวอักษรขึ้นไป',
icon: 'warning'
}).then(function() {
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();				
}

if($topic!='')
{
$st=substr($topic,0,1);
$st1=substr($topic,1,1);
$st2=substr($topic,2,1);
$st3=substr($topic,3,1);
$st4=substr($topic,4,1);
$st5=substr($topic,5,1);
$st6=substr($topic,6,1);
$st7=substr($topic,7,1);
$st8=substr($topic,8,1);
$st9=substr($topic,9,1);
$st10=substr($topic,10,1);
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

if($bd<=$nbd)
{
echo"<script>
swal({
title: 'ผิดเงื่อนไข!',
text: 'ไม่สามารถจองวันที่ปัจจุบันหรือย้อนหลังได้',
icon: 'warning'
}).then(function() {
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();				
}

$ckt=$object->Cktime($bookdate,$calid,$sid,$eid);
foreach ($ckt as $row){
if($row!="")
{
echo"<script>
swal({
title: 'ไม่สามารถจองได้!',
text: 'ช่วงเวลา วันที่ ซ้ำ หรือ คาบเกี่ยวกัน',
icon: 'warning'
}).then(function() {
history.back();
console.log('The Ok Button was clicked.');
});
</script>";
exit();				
}
}

$ckd=$object->Ckbookdate($bookdate,$mid);
if (count($ckd) > 0) {
foreach ($ckd as $row){
if($row['total']>=$rowsetup['num']){
echo"<script>
swal({
title: 'ไม่สามารถจองได้',
text: 'ท่านได้ใช้โควต้าการจองครบแล้ว',
icon: 'warning'
}).then(function() {
window.location.href = '../../';
console.log('The Ok Button was clicked.');
});
</script>";
exit();
}
}
}

$object->Addbooking(
$mid,
$calid,
$sid,
$eid,
$topic,
$bookdate,
$ip
)
;

$ck=$object->Ckid($mid,$calid,$bookdate,$sid,$eid);
foreach ($ck as $row)
{
if($_SESSION['bookid']=$row['bookid'])
{
echo"<script>
swal({
title: 'ทำรายการจองสำเร็จ!',
text: 'ระบบยอมรับการจองแล้ว',
icon: 'success'
}).then(function() {
// Redirect the user
window.location.href = '../../';
console.log('The Ok Button was clicked.');
});
</script>";
/*echo"<script LANGUAGE='JavaScript' CHARSET='UTF-8'>window.location.href = 'sndmail.php';</script>";*/
}
else
{
echo"<script>
swal({
title: 'ไม่สามารถจองได้!',
text: 'แจ้งผู้ดูแลระบบ',
icon: 'error'
}).then(function() {
// Redirect the user
window.location.href = '../../';
console.log('The Ok Button was clicked.');
});
</script>";
}
}

}

include('../f.php');
?>