<?php
include('../navii/index.php');
?>
<br>
<h5 style="text-align:center;"><b>Dashboard</b></h5>
<div class="row" style="padding:6px 6px;">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="row row-cols-1 row-cols-md-3 g-1">

	<div class="col">
	<div class="card h-50">
	<div class="card bg-light">
	<div class="card-body text-center">
	<p class="card-text"><h5 class="card-title"><b>ค้นหารายการจอง</b></h5></p>
	<img src="../../images/srch.png" height="30">
	<p class="card-text"><h5>วันที่ เริ่มต้น - สิ้นสุด</h5></p>
	<a href="../search/" class="btn btn-outline-primary" style="padding: 6px 50px 6px 50px;"> คลิก </a>
	</div>
	</div>
	</div>
	</div>

	<div class="col">
	<div class="card h-50">
	<div class="card bg-light">
	<div class="card-body text-center">
	<p class="card-text"><h5 class="card-title"><b>รายการจองวันนี้</b></h5></p>
	<img src="../../images/datenow.png" height="30">
	<p class="card-text"><h5>จำนวน <?php echo count($resultdatenow);?> รายการ</h5></p>
	<a href="../datenow/" class="btn btn-outline-primary" style="padding: 6px 50px 6px 50px;"> คลิก </a>
	</div>
	</div>
	</div>
	</div>

	<div class="col">
	<div class="card h-50">
	<div class="card bg-light">
	<div class="card-body text-center">
	<p class="card-text"><h5 class="card-title"><b>รายการจองล่วงหน้า</b></h5></p>
	<img src="../../images/forward.png" height="30">
	<p class="card-text"><h5>จำนวน <?php echo count($resultforward);?> รายการ</h5></p>
	<a href="../forward/" class="btn btn-outline-primary" style="padding: 6px 50px 6px 50px;"> คลิก </a>
	</div>
	</div>
	</div>
	</div>

	<div class="col">
	<div class="card h-50">
	<div class="card bg-light">
	<div class="card-body text-center">
	<p class="card-text"><h5 class="card-title"><b>สมาชิก</b></h5></p>
	<img src="../../images/member.png" height="30">
	<p class="card-text"><h5>จำนวน <?php echo count($resultmember);?> คน</h5></p>
	<a href="../member/" class="btn btn-outline-primary" style="padding: 6px 50px 6px 50px;"> คลิก </a>
	</div>
	</div>
	</div>
	</div>

	<div class="col">
	<div class="card h-50">
	<div class="card bg-light">
	<div class="card-body text-center">
	<p class="card-text"><h5 class="card-title"><b>ผู้ดูแลระบบ</b></h5></p>
	<img src="../../images/login.png" height="30">
	<p class="card-text"><h5>จำนวน <?php echo count($resultassit);?> คน</h5></p>
	<a href="../assit/" class="btn btn-outline-primary" style="padding: 6px 50px 6px 50px;"> คลิก </a>
	</div>
	</div>
	</div>
	</div>
	<div class="col">
	<div class="card h-50">
	<div class="card bg-light">
	<div class="card-body text-center">
	<p class="card-text"><h5 class="card-title"><b>ตั้งค่าระบบ</b></h5></p>
	<img src="../../images/setup.png" height="30">
	<p class="card-text"><h5>จำนวน 11 รายการ</h5></p>
	<a href="../setupdata/" class="btn btn-outline-primary" style="padding: 6px 50px 6px 50px;"> คลิก </a>
	</div>
	</div>
	</div>
	</div>
</div>
</div>
<div class="col-md-1"></div>
</div>

<?php
include('../f.php');
?>