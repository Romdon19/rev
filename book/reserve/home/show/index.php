<?php
error_reporting(0);
include('../naviiii/index.php');
$timeArr = array(
"08:00",
"09:00",
"10:00",
"11:00",
"12:00",
"13:00",
"14:00",
"15:00",
"16:00",
"17:00",
"18:00"
);
$resultbookcal=$object->Bookcal($calid);
foreach ($resultbookcal as $rowcal){
$cal[] = array(
	'calid'=>$rowcal['calid'],
	'calcode' => $rowcal['calcode'],
	'calname' => $rowcal['calname'],
	'calsize'=>$rowcal['calsize'],
	'calcate' => $rowcal['calcate']
);
}
$resultbookdate=$object->Booking($dateselect);
foreach ($resultbookdate as $rowdate){
$booking[$rowdate['calid']][]=array(
	'start_time'=>$rowdate['start_time'],
	'end_time'=>$rowdate['end_time'],
	'topic'=>$rowdate['topic']
);
}
Class SetTimeObject 
{
public $startPx;
public $diff;
public $leftMin = 0;
public function getWidthPos($startTime, $endTime){
$s = explode(":", $startTime);
$this->startPx = ((int)$s[0] * 100) + (int)$s[1];
list($sTime1, $sTime2) = explode(":", $startTime);
list($eTime1, $eTime2) = explode(":", $endTime);
$sTime = (float)$sTime1.".". ($sTime2*100)/100;
$eTime = (float)$eTime1.".". ($eTime2*100)/100;
$this->diff = ($eTime - $sTime);
$l = ($this->startPx - 700) - $this->leftMin;
$w = ($this->diff * 100);
return array('left' => $l, 'width' => $w);
}
}
foreach($cal as $row)    
?>
<!--
<hr>
<div class="row" style="text-align:center;padding: 6px 6px;">
<div class="col-md-12">
<h3><b>รหัส <?php echo $row['calcode'] ?> : ชื่อเรียก <?php echo $row['calname'] ?></b></h3>
<h4>วันที่ <?php echo substr($dateselect,8,2)?> <?php echo $thaimonth[(substr($dateselect,5,2)-1)]?> <?php echo (substr($dateselect,0,4)+543)?></h4>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<h5 style="text-align: center;font-weight:bold;padding: 0px 0px 24px 0px;">
<font color="green">พื้นที่สีเขียว</font> = ว่าง || <font color="red">พื้นที่สีแดง</font> = ไม่ว่าง
</h5>
</div>
</div>
-->
<br>
<?php include('tablebook.php'); ?>
<h4 style="text-align: center;font-weight:bold;padding: 12px 0px 0px 0px;">ระบุการจองตามแบบฟอร์ม</h4>
<form id="form2" name="form2" method="post" action="../record/">
<input type="hidden"  name="bookdate"  id="bookdate" value="<?php echo $dateselect ?>"/>
<input type="hidden"  name="calid"  id="calid" value="<?php echo $row['calid']?>"/>
    
	<div class="row" style="padding:12px 12px;">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h5 style="text-align: left;font-weight:bold;">ชื่อเรื่อง/หัวข้อ :</h5>
	<input type="text" name="topic" id="toopic" class="form-control" placeholder="" required>
	</div>
	<div class="col-md-2"></div>
	</div>
    
		<div class="row" style="padding:12px 12px;">
		<div class="col-md-2"></div>
		<div class="col-md-4">
		<h5 style="text-align: left;font-weight:bold;padding: 0px 0px 6px 0px;">เวลาเริ่มต้น :</h5>
		<select style="text-align: left;padding: 4px 0px 8px 10px;" name="sid" id="sid" class="form-control"required>
		<option style="text-align: left;" value="">เลือกเวลาเริ่มต้น</option>
		<option style="text-align: left;" value="8">08.00</option>
		<option style="text-align: left;" value="9">09.00</option>
		<option style="text-align: left;" value="10">10.00</option>
		<option style="text-align: left;" value="11">11.00</option>
		<option style="text-align: left;" value="12">12.00</option>
		<option style="text-align: left;" value="13">13.00</option>
		<option style="text-align: left;" value="14">14.00</option>
		<option style="text-align: left;" value="15">15.00</option>
		<option style="text-align: left;" value="16">16.00</option>
		<option style="text-align: left;" value="17">17.00</option>
		</select>
		</div>
		<div class="col-md-4">
		<h5 style="text-align: left;font-weight:bold;padding: 0px 0px 6px 0px;">เวลาสิ้นสุด :</h5>
		<h4>
		<select style="text-align: left;padding: 4px 0px 8px 10px;" name="eid" disabled="disabled" id="eid" class="form-control" required>
		<option style="text-align: left;">กรุณาเลือกเวลาเริ่มต้นก่อน</option>
		</select>
		</h4>
		</div>
		<div class="col-md-2"></div>
		</div>
<div class="row">     
<div class="col-md-12" style="padding: 10px 12px;text-align: center;">
<button style="font-weight:bold;" type="submit" name="submit" id="submit" class="btn btn-outline-primary"><img src="../../../images/book.png" width="24"> ยืนยันการจอง</button>
<!--<a style="font-weight:bold;" href="../../" class="btn btn-outline-danger"><img src="../../../images/close.png" width="32"> ปิด</a>-->
</div>
</div>
</form>
<style type="text/css">
	#snaptarget
	{
	height: 80px;
	background: #6F6;
	}

	td.cal
	{
	width : 176px;
	text-align : center;
	font-weight : bold;
	background: #FFC;
	font-size:16px;
	color:#00C;
	}

	.td_time
	{
	height : 20px;
	}

	.td_time div
	{
	text-align : right;
	float : left;
	width : 100px;
	border-left : 1px solid #00C;
	background: #FFC;
	font-size:12px;
	color:#00C;
	}

	.draggable2
	{
	background: #F00;
	border: 2px solid #AAAAAA;
	color: #FFFFFF;
	float : left;
	height : 80px;
	line-height : 20px;
	padding : 6px;
	overflow : hidden;
	text-align : center;
	font-size:10px;
	position : relative;
	}
</style>
<script>
	$(function(){
	$("#sid").change(function(){
	var tid=$(this).val();
	$.get("show/bkbook.php",{atid:tid},function(data){
	$("#eid").children().remove().end();
	$("#eid").children().end().append(data);
	$("#eid").removeAttr('disabled');
	})
	})
	});
</script>