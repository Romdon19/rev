<?php
include('../naviii/index.php');
	$apname=trim($_POST['apname']);
	$afname=trim($_POST['afname']);
	$alname=trim($_POST['alname']);
	$uname=trim($_POST['uname']);
	$ran=(mt_rand());
	$upass=substr($ran,0,6);
	$cls=trim($_POST['cls']);
	$chk=1;
	$ip=$_SERVER["REMOTE_ADDR"];
	$createdate=date("Y-m-d H:i:s");
		$resultuname=$object->Checkuname($uname);
		if(count($resultuname)>0)
		{
		echo"<script>
		swal({
		title: 'Username มีแล้วในระบบแล้ว',
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
$object->Createassit($apname,$afname,$alname,$uname,$upass,$cls,$chk,$ip,$createdate);
echo"<script>window.location='../';</script>";
include('../f.php');
?>