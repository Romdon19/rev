<?php
include('../naviii/index.php');
$mid=$_SESSION['mid'];
$res=$object->Readline($mid);
foreach ($res as $row)
$name=$row['pname'].$row['fname'].' '.$row['lname'];
$email=$row['email'];
$tel=$row['tel'];
$password=$row['password'];

$admin=$rowsetup['admin'];

$line_api = 'https://notify-api.line.me/api/notify';
$access_token = $admin;
$str = $row;    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

$message_data = array(
 'message' => "ลงทะเบียนใหม่"."\n
 ชื่อ : ".$name."\n
 อีเมล์ : ".$email."\n
 เบอร์โทร : ".$tel."\n
 รหัสผ่าน : ".$password
);

$result = send_notify_message($line_api, $access_token, $message_data);
//print_r($result);

function send_notify_message($line_api, $access_token, $message_data)
{
$headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $line_api);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
// Check Error
if(curl_error($ch))
{
$return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) ); 
}
else
{
$return_array = json_decode($result, true);
}
curl_close($ch);
return $return_array;
}

echo"<script>window.location.href = '../mail/';</script>";
exit();

include('../f.php');
?>