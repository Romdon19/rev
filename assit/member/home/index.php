<?php
include('../naviii/index.php');
?>
<br>
<div class="row">
<h5 style="text-align:center;"><b>สมาชิก</b></h5>
<div class="col-md-12" style="text-align: center;">
<a style="padding: 4px 24px 4px 24px;" href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalcreate" data-id=""><img src="../../../images/add.png" width="24"></a>
<?php
include('../modalcreate/index.php');
?>
</div>
</div>

	<div class="row" style="padding: 6px 6px;">
	<div class="col-md-12">
	<div class="table">
	<table id="example" class="table table-bordered" style="width:100%">
	<thead>
	<tr>
	<th style="text-align: center;">ลำดับ</th>
	<th style="text-align: center;">ชื่อ - นามสกุล</th>
	<th style="text-align: center;">อีเมล์</th>
	<th style="text-align: center;">เบอร์โทร</th>
	<th style="text-align: center;">รหัสผ่าน</th>
	<th style="text-align: center;">ดำเนินการ</th>
	</tr> 
	</thead>
	<tbody>
	<?php
	if(count($resultmember)>0)
	{
	$i=1;
	foreach($resultmember as $row)
	{
	?>
	<tr>
	<td style="text-align:center;"><?php echo $i;?></td>
	<td style="text-align: justify-all;"><?php echo $row['pname'];?><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
	<td style="text-align: justify-all;"><?php echo $row['email'];?></td>
	<td style="text-align: center;"><?php echo $row['tel'];?></td>
	<td style="text-align: center;"><?php echo $row['password'];?></td>
	<td style="text-align: center;">
	<a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalreset<?php echo $row['mid']; ?>" data-id=""><img src="../../../images/close.png" width="24"> Reset</a>
	<a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalupdate<?php echo $row['mid']; ?>" data-id=""><img src="../../../images/upd.png" width="24"> Edit</a>
	<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['mid'];?>" data-id=""><img src="../../../images/del.png" width="24"> Delete</a>
	<?php
	include('../modalreset/index.php');
	include('../modalupdate/index.php');
	include('../modaldelete/index.php');
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