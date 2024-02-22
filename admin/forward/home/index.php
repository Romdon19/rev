<?php
include('../naviii/index.php');
?>
<br>
<div class="row">
<h5 style="text-align:center;"><b>รายการจองล่วงหน้า</b></h5>
</div>

<div class="row" style="padding: 6px 6px;">
<div class="col-md-12">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
	<tr>
	<td align="center" width="5%">ลำดับ</td>
	<td align="center" width="10%">วันที่</td>
	<td align="center" width="10%">เวลา</td>
	<td align="center" width="40%">เรื่อง</td>
	<td align="center" width="20%">ชื่อเรียก</td>
	<td align="center" width="5%">PDF</td>
	<td align="center" width="5%">แก้ไข</td>
	<td align="center" width="5%">ยกเลิก</td>
	</tr>
	</thead>
	<tbody>
	<?php
	if (count($resultforward)> 0)
	{
	$i = 1;
	foreach ($resultforward as $row){
	?>
	<tr>
	<td align="center"><?php echo $i; ?></td>
	<td align="center"><?php echo substr($row['bookdate'],8,2)?> <?php echo $thmonth[(substr($row['bookdate'],5,2)-1)]?> <?php echo (substr($row['bookdate'],2,2)+43)?></td>
	<td align="center"><?php echo $row['start_time'];?>.00 น. - <?php echo $row['end_time']; ?>.00 น.</td>
	<td align="left"><?php echo $row['topic']; ?></td>
	<td align="left"><?php echo $row['calname']; ?></td>
	<td style="text-align: center;"><a href ="../../../print/inform.php?bookid=<?=$row["bookid"];?>" class="btn btn-outline-danger" target="_blank"> <img src="../../../images/iconpdf.png" width="24"></a></td>
	<?php $d=date("Y-m-d"); if ($row['bookdate']<= $d)
	{
	echo '<td align="center" style="color:green"><img src="../../../images/can.png" width="32"></td>'; 
	}
	else 
	{?> 
	<td align="center">
	<a href ="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#add_new_modal<?php echo $row["bookid"];  ?>" data-id=""> <img src="../../../images/upd.png" width="24"></a>

	<div class="modal fade" id="add_new_modal<?php echo $row["bookid"];  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title" id="exampleModalLabel"><b>แก้ไขข้อมูล</b></h4>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
	<form id="form" action="../update/" method="post">
	<input type="hidden" name="bookid" id="bookid" value="<?php echo $row['bookid']; ?>" />

					<div class="col-md-12" style="padding:0px 18px;">
					<div class="mb-3">
					<div class="row">
					<div class="col-md-2" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ชื่อเรื่อง/หัวข้อ</span></div>
					<div class="col-md-10" style="padding:0px 0px;">
					<div class="form-group">
					<div class="input-group">
					<textarea type="text" name="topic" id="topic" rows="2" class="form-control"><?php echo $row['topic']; ?></textarea>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-outline-warning"><img src="../../../images/accept.png" width="24"> อัปเดท</button>
						</div>
					</form>
	</div>

				<div class="modal-footer">
				<button type="button" class="btn btn-light" data-bs-dismiss="modal"><img src="../../../images/close.png" width="24"> ปิด</button>
				</div>
		</div>
		</div>

	</td>

	<?php } ?>

	<?php $d=date("Y-m-d"); if ($row['bookdate']<= $d)

	{
	echo '<td align="center" style="color:green"><img src="../../../images/can.png" width="32"></td>'; 
	}

	else 

	{?> 
	<td align="center">

	<a href ="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delmodal<?php echo $row["bookid"];  ?>" data-id=""> <img src="../../../images/del.png" width="24"></a>

	<div class="modal fade" id="delmodal<?php echo $row["bookid"];  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title" id="exampleModalLabel"><b>ยกเลิกการจอง</b></h4>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
	<form id="form" action="../delete/" method="post">
	<input type="hidden" name="bookid" id="bookid" value="<?php echo $row['bookid']; ?>" />

					<div class="col-md-12" style="padding:0px 18px;">
					<div class="mb-3">
					<div class="row">
					<div class="col-md-2" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ชื่อเรื่อง/หัวข้อ</span></div>
					<div class="col-md-10" style="padding:0px 0px;">
					<div class="form-group">
					<div class="input-group">
					<textarea type="text" name="topic" id="topic" rows="2" class="form-control"><?php echo $row['topic']; ?></textarea>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-outline-danger"><img src="../../../images/accept.png" width="24"> ยกเลิกการจอง</button>
						</div>
	</form>
	</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-light" data-bs-dismiss="modal"><img src="../../../images/close.png" width="24"> ปิด</button>
				</div>
	</div>
	</div>
	</td>
	<?php } ?>
	</tr>
	<?php $i++; }  ?>
	</tbody>
	<?php } ?>
	</table>
</div>
<?php
include('../f.php');
?>