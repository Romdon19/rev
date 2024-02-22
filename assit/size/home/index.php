<?php
include('../naviii/index.php');
?>
<br>
<div class="row">
<h5 style="text-align:center;"><b>ขนาด / ลักษณะ / รูปร่าง</b></h5>
<div class="col-md-12" style="text-align: center;">
<a style="padding: 4px 24px 4px 24px;" href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalcreate" data-id=""><img src="../../../images/add.png" width="24"></a>
<?php
include('modalcreate.php');
?>
</div>
</div>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<div class="table">
	<table id="example" class="table table-bordered" style="width:100%">
	<thead>
	<tr>
	<th style="text-align: center;">ลำดับ</th>
	<th style="text-align: center;">ขนาด / ลักษณะ / รูปร่าง</th>
	<th style="text-align: center;">ดำเนินการ</th>
	</tr> 
	</thead>
	<tbody>
	<?php
	if(count($resultsize)>0)
	{
	$i=1;
	foreach($resultsize as $row)
	{
	?>
	<tr>
	<td style="text-align:center;"><?php echo $i;?></td>
	<td style="text-align: justify-all;"><?php echo $row['sizename'];?></td>
	<td style="text-align: center;">
	<a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalupdate<?php echo $row['sizeid']; ?>" data-id=""><img src="../../../images/upd.png" width="24"></a>
	<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['sizeid'];?>" data-id=""><img src="../../../images/del.png" width="24"></a>
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
	<div class="col-md-4"></div>
</div>
<!--
	<div style="text-align: center;display: block;margin: auto;">
	<a href="../../" class="btn btn-primary"><img src="../../../images/mainmenu.png" width="24"> กลับหน้าหลัก</a>
	</div>
-->
<?php
include('../f.php');
?>