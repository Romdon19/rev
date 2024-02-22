<?php
include('../navi/index.php');
?>
<br>
<h5 style="text-align: center;"><b>รายการจองวันที่ <?php echo substr($ckdate,8,2)?> <?php echo $thaimonth[(substr($ckdate,5,2)-1)]?> <?php echo (substr($ckdate,0,4)+543)?></b></h5>
<div class="row" style="padding: 0px 6px 0px 6px;">
<div class="col-md-12">
<table id="example" class="table table-striped table-bordered" style="width:100%">

<thead>

<tr>
<td align="center" width="3%">ลำดับ</td>
<td align="center" width="50%">เรื่อง</td>
<td align="center" width="20%">ชื่อเรียก</td>
<td align="center" width="12%">เวลา</td>
<td align="center" width="15%">ผู้จอง</td>
</tr>

</thead>
<tbody>
  
<?php
if (count($resultbooking)> 0)
{
$i = 1;
foreach ($resultbooking as $row){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="left"><?php echo $row['topic']; ?></td>
<td align="left"><?php echo $row['calname']; ?></td>
<td align="center"><?php echo $row['start_time']; ?>.00 น. - <?php echo $row['end_time']; ?>.00 น.</td>
<td align="left"><?php echo $row['pname']; ?><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
</tr>
<?php $i++; }  ?>
</tbody>
<?php } ?>
</table>
</div>
</div>

<?php
include('../f.php');
?>
