<?php
include('../naviii/index.php');
?>
<div class="row" style="padding: 12px 6px 0px 6px;">
<div class="col-md-4"></div>
<div class="col-md-4">
<table id="example" class="table table-striped table-bordered" style="width:100%">

<thead>
<h5 style="text-align: center;">เวลาสิ้นสุด</h5>
<tr>
<td align="center">ลำดับ</td>
<td align="center">ID</td>
<td align="center">เวลาเริ่ม</td>
<td align="center">เวลาสิ้นสุด</td>
</tr>
</thead>
<tbody>
<?php
if (count($resultendtime)> 0)
{
$i = 1;
foreach ($resultendtime as $row){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $row['eid']; ?></td>
<td align="center"><?php echo $row['sid']; ?>.00</td>
<td align="center"><?php echo $row['etime'];?></td>
</tr>
<?php $i++; } ?>
</tbody>
<?php } ?>
</table>
</div>
<div class="col-md-4"></div>
</div>

	<p style="text-align: center;display: block;margin: auto;padding: 0px 36px 36px 36px;">
	<a href="../../" class="btn btn-primary"><img src="../../../images/mainmenu.png" width="24"> กลับหน้าหลัก</a>
	</p>
<?php
include('../f.php');
?>