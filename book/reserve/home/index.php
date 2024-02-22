<?php
include('../naviii/index.php');
?>
<br>
<h5 style="text-align: center;"><b>ตรวจสอบ</b></h5>
<div class="row" style="padding:6px 6px;">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="row row-cols-1 row-cols-md-2 g-2">
				<div class="col-md-4" style="padding:0px 18px;">
				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">วันที่</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<input type="text" name="dateselect" id="dateselect" autocomplete="off" class="form-control" placeholder="คลิก">
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="col-md-4" style="padding:0px 18px;">
				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ประเภท</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<select name="categoryid" id="categoryid" class="form-select" required>
				<option selected disabled value="">คลิก</option>
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
				</div>

				<div class="col-md-4" style="padding:0px 18px;">
				<div class="mb-3">
				<div class="row">
				<div class="col-md-4" style="padding:0px 0px;"><span class="input-group-text" style="display:block;margin: auto;">ชื่อเรียก</span></div>
				<div class="col-md-8" style="padding:0px 0px;">
				<div class="form-group">
				<div class="input-group">
				<select name="calid" id="calid" class="form-select">
				<option selected disabled value="">คลิก</option>
				<?php
				$result=$object->Readcal();
				if(count($result)>0){
				foreach($result as $row){
				?>
				<option value="<?php echo $row['calid'] ?>"><?php echo $row['calname'] ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>

				<script type="text/javascript">
				$('#categoryid').change(function(){
				var categoryid=$(this).val();

				$.ajax({
				type: "POST",
				url: "cal.php",
				data: {categoryid:categoryid},
				success: function(data){
				$('#calid').html(data);
				}
				});
				});
				</script>
</div>
</div>
<div class="col-md-2"></div>
</div>

	<div class="row">
	<div class="col-md-12" style="text-align:center;">  
	<button type="submit" name="submit" id="submit" class="btn btn-outline-info"><img src="../../../images/search.png" width="18"> ค้นหา</button>
	</div>
	</div>

<div class="row">
<div class="col-md-12">
<div class="records_content"></div>
</div>
</div>

		<script type="text/javascript">
        $(document).ready(function()
        {
        $('#submit').click(function(){
        myAjax();
        });
        }
        );

        function myAjax()
        {
        var dateselect=$('#dateselect').val();
        var categoryid=$('#categoryid').val();
        var calid=$('#calid').val();
        $.post('check/index.php', {dateselect:dateselect,categoryid:categoryid,calid:calid},
        function(data)
        {
        $('.records_content').html(data);
        }
        );
        }

        $( function() {
        $( "#dateselect" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "2022:2100",
        minDate:1,
        monthNamesShort: [ "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม" ]
        });
        });

        </script>
<?php
include('../f.php');
?>