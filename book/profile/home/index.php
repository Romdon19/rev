<?php
include('../naviii/index.php');
?>
<br>
<h5 style="text-align: center;"><b>ข้อมูลส่วนตัว</b></h5>
<input type="hidden"  name="mid" value="<?php echo $row['mid']; ?>" />
<div class="row" style="text-align: center;padding: 6px 6px;">
<div class="col-md-4"></div>
<div class="col-md-4">

<table class="table table-striped table-bordered" style="width:100%">
	<tr>
	<td>ชื่อ - สกุล</td>
	<td align="left"><?php echo $row['pname'] ?><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></td>
	</tr>

	<tr>
	<td>อีเมล์</td>
	<td align="left"><?php echo $row['email'] ?></td>
	</tr>
	
	<tr>
	<td>เบอร์โทร</td>
	<td align="left"><?php echo $row['tel'] ?></td>
	</tr>

	<tr>
	<td>รหัสผ่าน</td>
	<td align="left"><?php echo $row['password'] ?></td>
	</tr>
</table>

</div>
<div class="col-md-4"></div>
</div>

<div style="text-align: center;padding: 6px 6px;">
<a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalupdate<?php echo $row['mid']; ?>" data-id=""><img src="../../../images/upd.png" width="24"> แก้ไขข้อมูล</a>
</div>
<?php
include 'modalupdate.php';
include '../f.php';
?>