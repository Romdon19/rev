<?php
include('../navii/index.php');
?>
<br>
<div class="row">
<h5 style="text-align:center;"><b>ค้นหา</b></h5>
</div>

<div class="row" style="padding: 6px 12px 0px 12px;text-align: center;">
    <div class="col-md-3" style="text-align: center;"></div>
    <div class="col-md-3">
    <div class="form-group">
    <div class="input-group mb-3">
    <span class="input-group-text">วันที่เริ่มต้น&nbsp;&nbsp;&nbsp;</span>
    <input type="text" size="30" name="dates" id="dates" class="form-control" autocomplete="off" class="form-control" placeholder="คลิก" required>
    </div>
    </div>
    </div>
    
    <div class="col-md-3">
    <div class="form-group">
    <div class="input-group mb-3">
    <span class="input-group-text">วันที่สิ้นสุด&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <input type="text" size="30" name="datef" id="datef" class="form-control" autocomplete="off" class="form-control" placeholder="คลิก" required>
    </div>
    </div>
    </div>
    <div class="col-md-3" style="text-align: center;"></div>
</div>

<div class="row">
	<div class="col-md-12" style="text-align:center;padding: 4px 0px 0px 0px;">  
	<button type="submit" name="submit" id="submit" class="btn btn-outline-info"><img src="../../images/search.png" width="24"> ค้นหา</button>
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
        var dates= $('#dates').val();
        var datef= $('#datef').val();
        $.post('check.php', {dates:dates,datef:datef},
        function(data)
        {
        $('.records_content').html(data);
        }
        );
        }

        $( function() {
        $( "#dates" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "2022:2100",
         /*maxDate:0,
       minDate:1,*/
        monthNamesShort: [ "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม" ]
        });
        });

        $( function() {
        $( "#datef" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "2022:2100",
        /*maxDate:0,
        minDate:1,*/
        monthNamesShort: [ "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม" ]
        });
        });
        </script>

<?php
include('../f.php');
?>