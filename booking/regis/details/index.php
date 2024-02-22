<?php
include('../naviii/index.php');
$randomid=$_SESSION['randomid'];
	if($_SESSION['randomid']=='')
	{
	echo "<script>window.location='../logout/'</script>";
	}
$resultrandomid=$object->Readrandomid($randomid);
foreach($resultrandomid as $row)
?>
<br>
<h5 style="text-align: center;"><b>รายละเอียด</b></h5>
<input type="hidden"  name="mid" value="<?php echo $row['mid']; ?>" />
<div class="row" style="text-align: center;padding: 6px 6px;">
<div class="col-md-4"></div>
<div class="col-md-4">
<table class="table table-striped table-bordered" style="width:100%">
	<tr>
	<td>ชื่อ - สกุล</td>
	<td><?php echo $row['pname'] ?><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></td>
	</tr>

	<tr>
	<td>อีเมล์</td>
	<td><?php echo $row['email'] ?></td>
	</tr>
	
	<tr>
	<td>เบอร์โทร</td>
	<td><?php echo $row['tel'] ?></td>
	</tr>
</table>

</div>
<div class="col-md-4"></div>
</div>

<div style="text-align:center;padding: 6px 6px;">
<h6><b>ตรวจสอบข้อมูลให้ถูกต้อง</b></h6>
<h6><font color="red">ระบบจะส่ง รหัสผ่าน ให้ทางอีเมล์</font></h6>
</div>

<p style="text-align: center;padding: 2px 0px 0px 0px;">
<a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalupdate<?php echo $row['mid']; ?>" data-id=""><img src="../../../images/upd.png" width="24"> แก้ไขข้อมูล</a>
<a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['mid']; ?>" data-id=""><img src="../../../images/del.png" width="24"> ยกเลิก</a>
<a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalverify<?php echo $row['mid']; ?>" data-id=""><img src="../../../images/accept.png" width="24"> ยืนยันข้อมูล</a>
</p>
<?php
include 'modalupdate.php';
include 'modaldelete.php';
include 'modalverify.php';
include '../f.php';
?>