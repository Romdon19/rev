<?php
include('../naviii/index.php');
if(isset($_POST['submit'])){
$mid=trim($_POST['mid']);
$object->Delete(
$mid
)
;
echo"<script>
swal({
title: 'ยกเลิกข้อมูลเรียบร้อย',
text: '',
icon: 'success'
}).then(function() {
// Redirect the user
window.location.href = '../../';
console.log('The Ok Button was clicked.');
});
</script>";
}
include('../f.php');
?>