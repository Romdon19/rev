<?php
include('../naviii/index.php');
$bookid=trim($_POST['bookid']);
$object->Deletebook($bookid);
echo"<script>
swal({
title: 'ยกเลิกการจองสำเร็จ',
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