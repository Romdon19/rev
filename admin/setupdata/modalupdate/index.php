<!-- Bootstrap Modals -->
<!-- Modal -UPDATE- -->
<div class="modal fade" id="modalupdate<?php echo $rowsetup['sdid']; ?>" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"><b>อัปเดทข้อมูลระบบ</b></h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
	<div class="modal-body">
				<form action="../update/" method="post">
				<?php $sdid=$rowsetup['sdid'];?>
				<input type="hidden"  name="sdid" value="<?php echo $sdid; ?>"/>
				<div class="row" style="padding:12px 12px 6px 12px;">
				<div class="col-md-12">
				<h5 style="text-align:center;">แบบฟอร์มอัปเดทข้อมูล</h5>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ชื่อองค์กร/หน่วยงาน</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="office" class="form-control" value="<?php echo $rowsetup['office'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ชื่อระบบ</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="title" class="form-control" value="<?php echo $rowsetup['title'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">Token Line Admin</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="admin" class="form-control" value="<?php echo $rowsetup['admin'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">อีเมล์ระบบ</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="rootmail" class="form-control" value="<?php echo $rowsetup['rootmail'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">Password อีเมล์ระบบ</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="rootpass" class="form-control" value="<?php echo $rowsetup['rootpass'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">Host ส่งออกอีเมล์</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="hostmail" class="form-control" value="<?php echo $rowsetup['hostmail'];?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">Domain name Project</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="durl" class="form-control" value="<?php echo $rowsetup['durl'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">คำลงท้าย 1</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="footer1" class="form-control" value="<?php echo $rowsetup['footer1'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">คำลงท้าย 2</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="footer2" class="form-control" value="<?php echo $rowsetup['footer2'] ?>">
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">กำหนดสิทธิการจอง / วัน</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="number" name="num" class="form-control" value="<?php echo $rowsetup['num'] ?>">
				</div>
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
</div>
<!--CLOSE Modal UPDATE-REGISTER -->

<!-- Modal -- อัปเดทโลโก้ -->
<div class="modal fade" id="modal_img<?php echo $rowsetup['sdid'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">

<div style="text-align: center;padding: 24px 0px 6px 0px;">
<h4><b>อัปโหลดโลโก้</b></h4>
</div>

<form action="../upimg/" method="post" enctype="multipart/form-data">
<input type="hidden"  name="sdid" value="<?php echo $rowsetup['sdid']; ?>" />
              
<div class="modal-body">

<div class="col-md-12" style="text-align: center;"> 
<div class="form-group">
<label>อัปโหลดโลโก้ ไฟล์ .jpg .png .jpeg ขนาดไม่เกิน 500k</label>
<div class="input-group" style="text-align: center;display: block;margin: auto;padding: 12px 0px 0px 0px;">
<input type="file" name="img" required>
</div>
</div>
</div>

</div>

<p style="text-align: center;padding: 12px 0px 0px 0px;">
<button type="submit" name="submit" id="submit" class="btn btn-warning">
<img src="../../../images/upload.png" width="24"> อัปโหลด</button>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><img src="../../../images/close.png" width="24"> ปิด</button>
</p>

</div>

</div>

</form>

</div>
</div>
</div>
<!--CLOSE Modal-อัปเดทโลโก้ -->