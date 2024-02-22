<?php
$dates=$_POST['dates'];
$datef=$_POST['datef'];
$resultlistcheck=$object->Listcheck($dates,$datef);
?>
<!--
<hr>
<div class="row" style="padding: 12px 12px 12px 12px;text-align: center;">
<div class="col-md-12">
<h5><b>การจองใช้งาน</b></h5>
 <h6><font color="blue">วันที่ <?php echo substr($dates,8,2)?> <?php echo $thmonth[(substr($dates,5,2)-1)]?> <?php echo (substr($dates,0,4)+543-(2500))?></font> <b>ถึง</b> <font color="red">วันที่ <?php echo substr($datef,8,2)?> <?php echo $thmonth[(substr($datef,5,2)-1)]?> <?php echo (substr($datef,0,4)+543-(2500))?></font></h6>
</div>
</div>
-->

<div class="row" style="padding: 6px 6px 6px 6px;">
<div class="col-md-12">
<table id="example" class="table table-striped" style="width:100%">
<thead>
<tr>
<td align="center" width="5%">ลำดับ</td>
<td align="center" width="25%">ชื่อเรียก</td>
<td align="center" width="40%">เรื่อง</td>
<td align="center" width="10%">ผู้จอง</td>
<td align="center" width="10%">เวลา</td>
<td align="center" width="10%">วันที่</td>
</tr>
</thead>
<tbody>
<?php
if (count($resultlistcheck)> 0)
{
$i = 1;
foreach ($resultlistcheck as $row){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="left"><?php echo $row['calname']; ?></td>
<td align="left"><?php echo $row['topic']; ?></td>
<td align="left"><?php echo $row['pname']; ?><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
<td align="center"><?php echo $row['start_time']; ?>.00 น. - <?php echo $row['end_time']; ?>.00 น.</td>
<td align="center"><?php echo substr($row['bookdate'],8,2)?> <?php echo $thmonth[(substr($row['bookdate'],5,2)-1)]?> <?php echo (substr($row['bookdate'],0,4)+543-(2500))?></td>
</tr>
<?php $i++; } ?>
</tbody>
<?php } ?>
</table>
</div>
</div>
		
<script type="text/javascript">
$(document).ready(function() {
var table = $('#example').DataTable( {
"pageLength": 25,
lengthChange: false,
buttons: [ 'copy', 'excel' ]
} );
table.buttons().container()
.appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>