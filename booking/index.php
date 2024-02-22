<?php
include('../navi/index.php');
?>
<br>
<h5 style="text-align: center;"><b>เข้าสู่ระบบจอง</b></h5>
	<form action="../checkmember/" method="post">
	<div class="row" style="text-align: center;padding: 24px 24px">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ระบุเบอร์โทร</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text"  name="tel" class="form-control" placeholder="" maxlength="10" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ระบุรหัสผ่าน</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="password"  name="password" class="form-control" placeholder="" maxlength="6" required>
        </div>
        </div>
        </div>
        </div>
        </div>
	</div>
	<div class="col-md-4"></div>
    	<div style="text-align: center;display: block;margin: auto;padding: 24px 0px 0px 0px;">
		<button style="padding: 6px 36px 6px 36px;color: black;" type="submit" class="btn btn-outline-primary"><img src="../images/accept.png" height="24"> ยืนยัน</button>
		</div>
</div>
</form>

<hr>
<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="row" style="text-align:center;">
        <div class="col-md-4"><a href="#" data-bs-toggle="modal" data-bs-target="#modalregis" data-id="">ลงทะเบียน</a></div>
        <div class="col-md-4"><a href="#" data-bs-toggle="modal" data-bs-target="#modalremem" data-id="">ลืมรหัสผ่าน</a>
        </div>
        <div class="col-md-4"><a href="#" data-bs-toggle="modal" data-bs-target="#modalrecall" data-id="">เปลี่ยนรหัสผ่าน</a>
        </div>
        </div>
        </div>
        <div class="col-md-4"></div>
</div>
    <style type="text/css">
       .col-md-6 a:link {
            color: black;
            }
            /* visited link */
        .col-md-4 a:visited {
            color: black;
            }
            /* mouse over link */
        .col-md-4 a:hover {
            color: blue;
            }
            /* selected link */
        .col-md-6 a:active {
            color: red;
            }
    </style>

<!-- Modal - Regis -->
<div class="modal fade" id="modalregis" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"><b>ลงทะเบียน</b></h4>
<!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
</div>
<div class="modal-body">
<form action="regis/create/" method="post">
<div class="row" style="padding:12px 12px 6px 12px;">
<div class="col-md-12"> 
        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">คำนำหน้า</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <select name="pname" class="form-select" required>
        <option selected disabled value="">คลิก</option>
        <option value="นาย">นาย</option>
        <option value="นาง">นาง</option>
        <option value="นางสาว">นางสาว</option>
        </select>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ชื่อ</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text"  name="fname" class="form-control" placeholder="" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">นามสกุล</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text"  name="lname" class="form-control" placeholder="" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">อีเมล์</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text" name="email" class="form-control" placeholder="" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">เบอร์โทรมือถือ</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text" name="tel" class="form-control" placeholder="" maxlength="10" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ยืนยันเบอร์โทร</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="password" name="tel_" class="form-control" placeholder="ระบุเบอร์โทร อีกครั้ง" maxlength="10" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
          <div class="text-center">
          <button type="submit" class="btn btn-outline-primary"><img src="../images/accept.png" width="24"> ยืนยัน</button>
          </div>
  </form>
  </div>
      <div class="modal-footer" style="padding:12px 0px;">
      <button type="button" class="btn btn-light" data-bs-dismiss="modal"><img src="../images/close.png" width="24"> ปิด</button>
      </div>
</div>
</div>
</div>
<!--CLOSE Modal Regis -->

<!-- Modal - Remem -->
<div class="modal fade" id="modalremem" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"><b>ลืมรหัสผ่าน</b></h4>
<!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
</div>
<div class="modal-body">
<form action="remem/check/" method="post">
<div class="row" style="padding:12px 12px 6px 12px;">
<div class="col-md-12"> 
        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ระบุอีเมล์</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text"  name="email" class="form-control" placeholder="" maxlength="30" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ระบุเบอร์โทร.</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text"  name="tel" class="form-control" placeholder="" maxlength="10" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
          <div class="text-center">
          <button type="submit" class="btn btn-outline-primary"><img src="../images/accept.png" width="24"> ส่งข้อมูล</button>
          </div>
  </form>
  </div>
      <div class="modal-footer" style="padding:12px 0px;">
      <button type="button" class="btn btn-light" data-bs-dismiss="modal"><img src="../images/close.png" width="24"> ปิด</button>
      </div>
</div>
</div>
</div>
<!--CLOSE Modal Remem -->

<!-- Modal - Recall -->
<div class="modal fade" id="modalrecall" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"><b>เปลี่ยนรหัสผ่าน</b></h4>
<!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
</div>
<div class="modal-body">
<form action="recall/check/" method="post">
<div class="row" style="padding:12px 12px 6px 12px;">
<div class="col-md-12">
        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ระบุอีเมล์</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text"  name="email" class="form-control" placeholder="" maxlength="30" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ระบุรหัสผ่านเดิม</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="type"  name="password" class="form-control" placeholder="" maxlength="6" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">กำหนดรหัสผ่านใหม่</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="type"  name="newpassword" class="form-control" placeholder="" maxlength="6" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ยืนยันรหัสผ่านใหม่</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="password"  name="newpassword_" class="form-control" placeholder="" maxlength="6" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
          <div class="text-center">
          <button type="submit" class="btn btn-outline-primary"><img src="../images/accept.png" width="24"> บันทึก</button>
          </div>
</form>
</div>
      <div class="modal-footer" style="padding:12px 0px;">
      <button type="button" class="btn btn-light" data-bs-dismiss="modal"><img src="../images/close.png" width="24"> ปิด</button>
      </div>
</div>
</div>
</div>
<!--CLOSE Modal Recall -->



<?php
include('../f.php');
?>