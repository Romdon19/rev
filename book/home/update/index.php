<?php
include('../naviii/index.php');
$bookid=trim($_POST['bookid']);
$topic=trim($_POST['topic']);
$object->Updatetopic($bookid,$topic);
echo"<script>
swal({
title: 'แก้ไขเรียบร้อย',
text: '',
icon: 'success'
}).then(function() {
// Redirect the user
window.location='../';
console.log('The Ok Button was clicked.');
});
</script>";
include('../f.php');
?>