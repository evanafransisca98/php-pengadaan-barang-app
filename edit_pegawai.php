<?php
$IDPEGAWAI=$_GET['id'];
include"koneksi.php";
$query="SELECT * FROM pegawai join jabatan on pegawai.IDJABATAN=jabatan.IDJABATAN where IDPEGAWAI='$IDPEGAWAI' ";
$sql=mysqli_query($kon,$query);

$rr = mysqli_fetch_assoc($sql);
// $IDBARANG = isset($rr['IDPEGAWAI']) ? $rr['IDPEGAWAI'] : false;
// $IDJABATAN = isset($rr['IDJABATAN']) ? $rr['IDJABATAN'] : false;
// $NAMAPEGAWAI = isset($rr['NAMAPEGAWAI']) ? $rr['NAMAPEGAWAI'] : false;
// $ALAMATPEGAWAI = isset($rr['ALAMATPEGAWAI']) ? $rr['ALAMATPEGAWAI'] : false;
// $TELPPEGAWAI = isset($rr['TELPPEGAWAI']) ? $rr['TELPPEGAWAI'] : false;
// $JENISKELAMIN = isset($rr['JENISKELAMIN']) ? $rr['JENISKELAMIN'] : false;
// $USERNAME = isset($rr['USERNAME']) ? $rr['USERNAME'] : false;
// $PASSWORD = isset($rr['PASSWORD']) ? $rr['PASSWORD'] : false;

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
								<h4>Data Pegawai</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<form action="proses_edit_pegawai.php" method="post">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Id Pegawai</label>
							<div class="col-sm-12 col-md-10">
								
								<input type="hidden" name="IDPEGAWAI" value="<?php echo $rr['IDPEGAWAI']; ?>">
							</div>
						</div>
						<div class="dropdown">
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" <?php echo $rr['IDJABATAN']; ?> ></a>
						</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Id Jabatan</label>
							<div class="col-sm-12 col-md-10">
								<select class="form-control" name="IDJABATAN">
                                <?php
                                         $sql = mysqli_query($kon,"SELECT * FROM Jabatan");
                                         while ($rrb=mysqli_fetch_assoc($sql)) {
                          
                                ?>
									<option value="<?php echo $rrb['IDJABATAN']; ?>" <?php if ($rr['IDJABATAN'] == $rrb['IDJABATAN']){ echo 'selected'; } ?>><?php echo $rrb['JABATAN']; ?></option>

								<?php 
								       }
								?>	
									
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="NAMAPEGAWAI" value="<?php echo $rr['NAMAPEGAWAI']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="ALAMATPEGAWAI" value="<?php echo $rr['ALAMATPEGAWAI']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Telp</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="TELPPEGAWAI" value="<?php echo $rr['TELPPEGAWAI']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="JENISKELAMIN" value="<?php echo $rr['JENISKELAMIN']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Username</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="USERNAME" value="<?php echo $rr['USERNAME']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="PASSWORD" value="<?php echo $rr['PASSWORD']; ?>">
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