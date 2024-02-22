<?php
require("../db/genpdf.php");
$object=new CRUD();
$bookid=$_GET['bookid'];
$res=$object->Readbookpdf($bookid);
foreach($res as $row){
$nid=substr($row['bookid'],0,4);
$pid=sprintf("%06d",$row['bookid']);
$bookid=$nid.'-'.$pid;
$bookid=$row['bookid'];
$mname=$row['fname'].' '.$row['lname'];
$calcode=$row['calcode'];
$calname=$row['calname'];
$start_time=$row['start_time'];
$end_time=$row['end_time'];
$topic=$row['topic'];
//$bookdate=substr($row['bookdate'],8,2).' '.$thmonth[(substr($row['bookdate'],5,2)-1)].' '.substr($row['bookdate'],2,2)+43;
$ip=$row['ip'];
$chk=$row['chk'];
//$up_date=substr($row['up_date'],8,2).' '.$thmonth[(substr($row['up_date'],5,2)-1)].' '.substr($row['up_date'],2,2)+43;
}
$resultsetup=$object->Readsetup();
foreach($resultsetup as $rowsetup){
$office=$rowsetup['office'];
$title=$rowsetup['title'];
$img=$rowsetup['img'];
}

$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

$van=substr($row['bookdate'],8,2);
$duen=$thaimonth[(substr($row['bookdate'],5,2)-1)];
$pee=substr($row['bookdate'],2,2)+43;
/*$tt=strtotime($row['bookdate']);
$time=date("H:i:s", $tt);
*/

$upvan=substr($row['up_date'],8,2);
$upduen=$thaimonth[(substr($row['up_date'],5,2)-1)];
$uppee=substr($row['up_date'],2,2)+43;

$nvan=substr(date("Y-m-d"),8,2);
$nduen=$thaimonth[(substr(date("Y-m-d"),5,2)-1)];
$npee=substr(date("Y-m-d"),0,4)+543;
$ntime=date("H:i:s");

require('../pdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage('P');
$pdf->AddFont('THSarabun','','THSarabun.php');
$pdf->AddFont('THSarabun Bold','','THSarabun Bold.php');

$pdf->Image('../images/'.$img.'',94,6,24);

$pdf->SetY(28);
$pdf->SetFont('THSarabun Bold','',20);
$pdf->Cell(0,10,iconv('utf-8','cp874',''.$office.''),0,1,'C');
$pdf->SetY(38);
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(0,10,iconv('utf-8','cp874',''.$title.''),0,1,'C');
$pdf->SetY(48);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(0,10,iconv('utf-8','cp874','เลขที่จอง '.$bookid.''),0,1,'R');
$pdf->Cell(0,10,iconv('utf-8','cp874','วันที่ทำรายการ '.$upvan.' '.$upduen.' '.$uppee.''),0,1,'R');

$pdf->SetY(68);
$pdf->SetX(18);
$pdf->SetFont('THSarabun','',16);
$pdf->MultiCell(0,10,iconv('utf-8','cp874','เรื่อง  ตอบรับการจอง'),0,'L');

$pdf->SetY(80);
$pdf->SetX(18);
$pdf->SetFont('THSarabun','',16);
$pdf->MultiCell(0,10,iconv('utf-8','cp874','เรียน  คุณ'.$mname.''),0,'L');

$pdf->SetY(90);
$pdf->SetX(10);
$pdf->SetFont('THSarabun Bold','',16);
$pdf->MultiCell(0,10,iconv('utf-8','cp874','ระบบยืนยันการจองของท่านแล้วตามตารางรายละเอียด'),0,'C');

$pdf->SetY(100);
$pdf->Setx(55);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(50,10,iconv('utf-8','cp874','รหัส'),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',''.$calcode.''),1,0,'C');
$pdf->SetY(110);
$pdf->Setx(55);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(50,10,iconv('utf-8','cp874','จองใช้วันที่'),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',''.$van.' '.$duen.' '.$pee.''),1,0,'C');
$pdf->SetY(120);
$pdf->Setx(55);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(50,10,iconv('utf-8','cp874','เวลา'),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',''.$start_time.'.00 น. - '.$end_time.'.00 น.'),1,0,'C');

$pdf->SetY(132);
$pdf->SetX(10);
$pdf->SetFont('THSarabun','',16);
$pdf->MultiCell(0,10,iconv('utf-8','cp874','ชื่อเรียก : '.$calname.' '),0,'C');

$pdf->SetY(142);
$pdf->SetX(10);
$pdf->SetFont('THSarabun','',16);
$pdf->MultiCell(0,10,iconv('utf-8','cp874','หัวข้อ : '.$topic.' '),0,'C');



$pdf->Output();
?>