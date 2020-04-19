<?php
$IDSUPPLIER=$_GET['id'];
include"koneksi.php";
$query="SELECT * FROM supplier where IDSUPPLIER='$IDSUPPLIER'";
$sql=mysqli_query($kon,$query);

$rr = mysqli_fetch_assoc($sql);
// $IDSUPPLIER = isset($rr['IDSUPPLIER']) ? $rr['IDSUPPLIER'] : false;

// $NAMASUPPLIER = isset($rr['NAMASUPPLIER']) ? $rr['NAMASUPPLIER'] : false;
// $ALAMATSUPPLIER = isset($rr['ALAMATSUPPLIER']) ? $rr['ALAMATSUPPLIER'] : false;
// $TELPSUPPLIER = isset($rr['TELPSUPPLIER']) ? $rr['TELPSUPPLIER'] : false;

?>
<!DOCTYPE html>
<html>
<head> 
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Data Supplier</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Data Supplier</li>
								</ol>
							</nav>
						</div>
						
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<form action="proses_edit_supplier.php" method="post">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Id Supplier</label>
							<div class="col-sm-12 col-md-10">
								
								<input type="hidden" name="IDSUPPLIER" value="<?php echo $rr['IDSUPPLIER']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Supplier</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="NAMASUPPLIER" value="<?php echo $rr['NAMASUPPLIER']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Alamat Supplier</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="ALAMATSUPPLIER" value="<?php echo $rr['ALAMATSUPPLIER']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Telp Supplier</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="TELPSUPPLIER" value="<?php echo $rr['TELPSUPPLIER']; ?>">
							</div>
						</div>
						
					    <div class="modal-footer">
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  <input type="submit" name="save" class="btn btn-primary" value="Save">
					    </div>

					</form>
				</div>
				
				<!-- Simple Datatable End -->
				<!-- INI MODAL SAYa -->

				
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
</body>
</html>