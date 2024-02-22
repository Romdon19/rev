<?php
include('../naviii/index.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mid=$_SESSION['mid'];

$rootmail=$rowsetup['rootmail'];
$rootpass=$rowsetup['rootpass'];
$hostmail=$rowsetup['hostmail'];
$office=$rowsetup['office'];
$title=$rowsetup['title'];
$footer1=$rowsetup['footer1'];
$footer2=$rowsetup['footer2'];
$noreply='no-reply-'.$rowsetup['rootmail'];

$resmid=$object->Ckmid($mid);
foreach ($resmid as $rowsetupmid)
$email=$rowsetupmid['email'];
$fname=$rowsetupmid['fname'];
$lname=$rowsetupmid['lname'];
$tel=$rowsetupmid['tel'];
$password=$rowsetupmid['password'];

// Load Composer's autoloader
require '../../../vendor/autoload.php';

$mail = new PHPMailer();

$body = "
<!doctype html>
	<html lang='en'>
	<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx' crossorigin='anonymous'>
	
	<title>$office</title>
	</head>
		<style>
			table, th, td {
		  	border: 1px solid blue;
		  	border-collapse: collapse;
			}
		</style>
	<body style='font-family:sans-serif;'>
		<h2 style='text-align:justify;color:#3399FF;'><b>$office</b></h2>
		<h3 style='text-align:justify;'>$title</h3>
		
	<table style='width:600px;'>

		<tr>
	   <th colspan='2'><b>Details</b></th>
	   </tr>

	   <tr>
		<td style='width:300px;color: red;'>Username</td>
		<td style='width:300px;color: red;'>$tel</td>
		</tr>

		<tr>
		<td style='width:300px;'>Password</td>
		<td style='width:300px;'>$password</td>
		</tr>
	</table>
	<br>
		<h3 style='text-align:justify;'>$footer1</h3>
		<h4 style='text-align:justify;'>$footer2</h4>
	</body>
	</html>
";
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = $hostmail;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = false;
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
$mail->Username = $rootmail;
$mail->Password = $rootpass;
$mail->setFrom($noreply,$title);
$mail->Subject = "แจ้งรหัสผ่าน";
$mail->MsgHTML($body);
$mail->AddAddress("$email");
if(!$mail->Send())
{include('../naviii/index.php');?>
<h4 style="text-align: center;padding: 12px 0px 12px 0px"><b>ไม่สามารถส่งอีเมล์ได้</b></h4>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<div style="padding: 36px 36px 6px 36px; background: white;">

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10"><h5 style="text-align: center;line-height: 32px;"><b>เรียน คุณ<?php echo $rowmid['fname']; ?> <?php echo $rowmid['lname']; ?></b></h5>
</div>
<div class="col-md-1"></div>
</div>

<div class="row" style="padding: 24px 0px 18px 0px;">
<div class="col-md-1"></div>
<div class="col-md-10"><h6 style="text-align: center;line-height: 32px;">
<b>ระบบยังไม่สามารถส่งอีเมล์ได้ในตอนนี้</b>
<br>
<font color="red">กรุณาลองใหม่ในภายหลัง หรือแจ้งผู้ดูแลระบบ</font>
<!--<br>โปรดจำรหัสผ่านของท่าน คือ <font color="red"><b><?php echo $rowsetup['password']; ?></b></font>--></h6>
</div>
<div class="col-md-1"></div>
</div>

<div style="text-align:center;padding: 25px 0px 25px 0px;">
<a href ="../logout/" class="btn btn-primary"><img src="../../images/home.png" width="24"> กลับหน้าหลัก</a>
</div>

</div>
</div>
<div class="col-md-4"></div>
</div>

<?php
}
else
{
echo"<script>
swal({
title: 'บันทึกข้อมูลเรียบร้อย',
text: 'ระบบส่ง รหัสผ่าน ไปยังอีเมล์ท่านแล้ว',
icon: 'success'
}).then(function() {
// Redirect the user
window.location.href = '../logout/';
console.log('The Ok Button was clicked.');
});
</script>";
include('../f.php');
}
?>