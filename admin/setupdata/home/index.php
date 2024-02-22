<?php
include('../naviii/index.php');
?>
<br>
<h5 style="text-align: center;"><b>ตั้งค่าระบบ</b></h5>
<div style="text-align:center;padding: 6px 6px;">
<a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_img<?php echo $rowsetup['sdid']; ?>" data-id=""><img src="../../../images/chpng.png" width="24"> เปลี่ยนรูปโลโก้</a>
</div>

<div class="row" style="padding:12px 12px;">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="table">
<table class="table table-bordered" style="width:100%">

<tr>
<td>ชื่อองค์กร/หน่วยงาน</td>
<td><?php echo $rowsetup['office'];?></td>
</tr>

<tr>
<td>ชื่อระบบ</td>
<td><?php echo $rowsetup['title'];?></td>
</tr>

<tr>
<td>Token Line Admin</td>
<td><?php echo $rowsetup['admin'];?></td>
</tr>

<tr>
<td>อีเมล์ระบบ</td>
<td><?php echo $rowsetup['rootmail'];?></td>
</tr>

<tr>
<td>Password อีเมล์ระบบ</td>
<td><?php echo $rowsetup['rootpass'];?></td>
</tr>

<tr>
<td>Host ส่งออกอีเมล์</td>
<td><?php echo $rowsetup['hostmail'];?></td>
</tr>

<tr>
<td>โดเมนเนม URL</td>
<td><?php echo $rowsetup['durl'];?></td>
</tr>

<tr>
<td>คำลงท้าย 1</td>
<td><?php echo $rowsetup['footer1'];?></td>
</tr>

<tr>
<td>คำลงท้าย 2</td>
<td><?php echo $rowsetup['footer2'];?></td>
</tr>

<tr>
<td>กำหนดสิทธิการจอง / วัน</td>
<td><?php echo $rowsetup['num'];?></td>
</tr>

</table>
</div>
</div>
<div class="col-md-3"></div>
</div>
<div style="text-align:center;">
<h6>หมายเหตุ : อีเมล์ระบบควรสร้างจาก Hosting Domain ที่ใช้งานระบบจริง</h6>
<h6>ไม่แนะนำให้ใช้ Gmail ในการส่งเมล์ออกจากระบบ</h6>
</div>
<br>
<p style="text-align: center;display: block;margin: auto;padding: 0px 0px 6px 0px;">
<a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalupdate<?php echo $rowsetup['sdid']; ?>" data-id=""><img src="../../../images/upd.png" width="24"> อัปเดทข้อมูล</a> 
</p>
<?php
include('../modalupdate/index.php');
include('../f.php');
?>