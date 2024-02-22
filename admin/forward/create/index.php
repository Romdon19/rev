<?php
include('../naviii/index.php');
	$roomcode=trim($_POST['roomcode']);
	$roomname=trim($_POST['roomname']);
	$roomsize=trim($_POST['roomsize']);
	$roomcate=trim($_POST['roomcate']);
	$chk=0;
	$daterecord=date("Y-m-d H:i:s");
		$resultroomcode=$object->Checkroomcode($roomcode);
		if(count($resultroomcode)>0)
		{
		echo"<script>
		swal({
		title: 'รหัสห้องนี้มีแล้วในระบบแล้ว',
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
$object->Registerroom($roomcode,$roomname,$roomsize,$roomcate,$chk,$daterecord);
echo"<script>window.location='../';</script>";
include('../f.php');
?>