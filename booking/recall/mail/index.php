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
foreach ($resmid as $rowmid)
$email=$rowmid['email'];
$fname=$rowmid['fname'];
$lname=$rowmid['lname'];
$tel=$rowmid['tel'];
$password=$rowmid['password'];


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
		
	<table style='width:200px;'>

		<tr>
	   <th colspan='2'><b>Details</b></th>
	   </tr>

	   <tr>
		<td style='width:100px;color: red;'>Username</td>
		<td style='width:100px;color: red;'>$tel</td>
		</tr>

		<tr>
		<td style='width:100px;'>Password</td>
		<td style='width:100px;'>$password</td>
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
$mail->Subject = "เปลี่ยนรหัสผ่าน";
$mail->MsgHTML($body);
$mail->AddAddress("$email");
if(!$mail->Send())
{?>
<br>
<h3 style="text-align: center;padding: 12px 0px 12px 0px"><b>ไม่สามารถส่งอีเมล์ได้</b></h3>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10"><h5 style="text-align: center;line-height: 32px;"><b>เรียน คุณ<?php echo $rowmid['fname']; ?> <?php echo $rowmid['lname']; ?></b></h5>
</div>
<div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10" style="text-align: center;line-height: 32px;">
<h5><b>ระบบยังไม่สามารถส่งอีเมล์ได้ในตอนนี้</b></h5>

<h5><font color="red">กรุณาลองใหม่ในภายหลัง หรือแจ้งผู้ดูแลระบบ</font></h5>
<h4>โปรดจำรหัสผ่านใหม่ คือ <font color="red"><b><?php echo $rowmid['password']; ?></b></font></h4>
</div>
<div class="col-md-1"></div>
</div>

</div>
<div class="col-md-4"></div>
</div>

<?php
}
else
{
//echo"<script>window.location.href = '../line/';</script>";
echo"<script>
swal({
title: 'สำเร็จ',
text: 'ระบบส่ง รหัสผ่าน ไปยังอีเมล์ท่านแล้ว',
icon: 'success'
}).then(function() {
// Redirect the user
window.location.href = '../../';
console.log('The Ok Button was clicked.');
});
</script>";
include('../f.php');
}
?>