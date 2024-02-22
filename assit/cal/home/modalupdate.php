<!-- Bootstrap Modals -->
<!-- Modal -UPDATE- -->
<div class="modal fade" id="modalupdate<?php echo $row['calid']; ?>" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"><b>แก้ไขชื่อเรียก</b></h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
	<div class="modal-body">
			<form action="../update/" method="post">
			<?php $calid=$row['calid'];?>
			<input type="hidden"  name="calid" value="<?php echo $calid; ?>"/>
			<div class="row" style="padding:12px 12px 6px 12px;">
			<div class="col-md-12">
			<h5 style="text-align:center;">แบบฟอร์มแก้ไขข้อมูล</h5>

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
				<select name="size" class="form-select" required>
				<option selected value="<?php echo $row['size']?>"><?php echo $row['size']?></option>
				<?php
				$resultsize=$object->Readsize();
				if(count($resultsize)>0){
				foreach($resultsize as $rowsize){
				?>
				<option value="<?php echo $rowsize['sizename'] ?>"><?php echo $rowsize['sizename'] ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				</div>
				</div>
				</div>

				</div>
				</div>
					<div class="text-center">
					<button type="submit" class="btn btn-outline-primary"><img src="../../../images/accept.png" width="24"> บันทึก</button>
					</div>
				</form>
	</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-light" data-bs-dismiss="modal"><img src="../../../images/close.png" width="24"> ปิด</button>
			</div>
	</div>
	</div>
</div>
<!--CLOSE Modal UPDATE-REGISTER -->