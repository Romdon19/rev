<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable( {
"pageLength": 10,
} );
} );
</script>

<!--
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
-->
<!-- JS, Popper.js, and jQuery -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
	</body>
</html>