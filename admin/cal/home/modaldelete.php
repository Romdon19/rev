<!-- Bootstrap Modals -->
<!-- Modal - DELETE -->
<div class="modal fade" id="modaldelete<?php echo $row['calid']; ?>" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"><b>ลบชื่อเรียก</b></h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
	<div class="modal-body">
			<form action="../delete/" method="post">
			<?php $calid=$row['calid'];?>
			<input type="hidden"  name="calid" value="<?php echo $calid; ?>"/>
			<div class="row" style="padding:12px 12px 6px 12px;">
			<div class="col-md-12">
			<h5 style="text-align:center;">แบบฟอร์มลบข้อมูล</h5>
	
				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ประเภท</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<select name="categoryid" class="form-select" required>
				<option value="<?php echo $row['categoryid'] ?>"><?php echo $row['categoryname'] ?></option>
				<?php
				$resultcategory=$object->Readcategory();
				if(count($resultcategory)>0){
				foreach($resultcategory as $rowcategory){
				?>
				<option value="<?php echo $rowcategory['categoryid'] ?>"><?php echo $rowcategory['categoryname'] ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">รหัส</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text"  name="calcode" class="form-control" placeholder="" value="<?php echo $row['calcode']?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ชื่อเรียก</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text"  name="calname" class="form-control" placeholder="" value="<?php echo $row['calname']?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ขนาด / ลักษณะ / รูปร่าง</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<select name="calsize" class="form-select" required>
				<option selected value="<?php echo $row['calsize']?>"><?php echo $row['calsize']?></option>
				<option value="ใหญ่">ใหญ่</option>
				<option value="กลาง">กลาง</option>
				<option value="เล็ก">เล็ก</option>
				<option value="มาตรฐาน">มาตรฐาน</option>
				<option value="ไม่มี">ไม่มี</option>
				</select>
				</div>
				</div>
				</div>

				</div>
				</div>
					<div class="text-center">
					<button type="submit" class="btn btn-outline-danger"><img src="../../../images/del.png" width="24"> ยืนยันลบ</button>
					</div>
				</form>
	</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-light" data-bs-dismiss="modal"><img src="../../../images/close.png" width="24"> ปิด</button>
			</div>
	</div>
	</div>
</div>
<!--ปิด Modal DELETE-->