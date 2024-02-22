<?php
include('../navi/index.php');
?>
<br>
<h5 style="text-align: center;"><b>ผู้ดูแลระบบ</b></h5>
	<form action="../checkadmin/" method="post">
	<div class="row" style="text-align: center;padding: 24px 24px">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">Username</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="text"  name="uname" class="form-control" placeholder="" maxlength="12" required>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="mb-3">
        <div class="row">
        <div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">Password</span></div>
        <div class="col-md-8" style="padding:0px 0px;">
        <div class="form-group">
        <div class="input-group">
        <input type="password"  name="upass" class="form-control" placeholder="" maxlength="6" required>
        </div>
        </div>
        </div>
        </div>
        </div>
	</div>
    <div class="col-md-4">        
    </div>
	
		<div style="text-align: center;display: block;margin: auto;padding: 24px 0px 0px 0px;">
		<button style="padding: 6px 36px 6px 36px;color: black;" type="submit" class="btn btn-outline-primary"><img src="../images/accept.png" height="24"> ยืนยัน</button>
		</div>
    </div>
	</form>
<?php
include('../f.php');
?>