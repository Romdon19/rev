<?php
include('../naviii/index.php');
?>
<br>
<div class="row">
<h5 style="text-align:center;"><b>ชื่อเรียก</b></h5>
<div class="col-md-12" style="text-align: center;">
<a style="padding: 4px 24px 4px 24px;" href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalcreate" data-id=""><img src="../../../images/add.png" width="24"></a>
<?php
include('modalcreate.php');
?>
</div>
</div>

<div class="row" style="padding:6px 6px;">
	<div class="col-md-12">
	<div class="table">
	<table id="example" class="table table-bordered" style="width:100%">
	<thead>
	<tr>
	<th style="text-align: center;">ลำดับ</th>
	<th style="text-align: center;">ประเภท</th>
	<th style="text-align: center;">รหัส</th>
	<th style="text-align: center;">ชื่อเรียก</th>
	<th style="text-align: center;">ขนาด / ลักษณะ / รูปร่าง</th>
	<th style="text-align: center;">ดำเนินการ</th>
	</tr> 
	</thead>
	<tbody>
	<?php
	if(count($resultcal)>0)
	{
	$i=1;
	foreach($resultcal as $row)
	{
	?>
	<tr>
	<td style="text-align:center;"><?php echo $i;?></td>
	<td style="text-align: justify-all;"><?php echo $row['categoryname'];?></td>
	<td style="text-align: justify-all;"><?php echo $row['calcode'];?></td>
	<td style="text-align: justify-all;"><?php echo $row['calname'];?></td>
	<td style="text-align: center;"><?php echo $row['size'];?></td>
	<td style="text-align: center;">
	<a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalupdate<?php echo $row['calid']; ?>" data-id=""><img src="../../../images/upd.png" width="24"></a>
	<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['calid'];?>" data-id=""><img src="../../../images/del.png" width="24"></a>
	<?php
	include('modalupdate.php');
	include('modaldelete.php');
	?>
	</td>
	</tr>
	<?php $i++; } ?>
	</tbody>
	<?php } ?>
	</table>
	</div>
	</div>
</div>
<?php
include('../f.php');
?>