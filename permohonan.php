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
	<?php include('include/sidebar1.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Permohonan Pengadaan</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Permohonan Pengadaan</li>
								</ol>
							</nav>
						</div>
						<!-- <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								
							</div>
						</div> -->
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					
					<div class="row">
						<table class="data-table stripe hover nowrap">

							<thead>
								<tr>
									<!-- <th class="table-plus datatable-nosort">ID Barang</th> -->
									<th>No</th>
									<th>Supplier</th>
									<th>Pegawai</th>
									<th>Tgl Pengadaan</th>
									<th>Total Harus Dibayar</th>
									<th>Status</th>
									
									
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<?php include"koneksi.php";                
                              //Data mentah yang ditampilkan ke tabel    
                              $sql = mysqli_query($kon,"SELECT pengadaan.*, supplier.NAMASUPPLIER, pegawai.NAMAPEGAWAI FROM pengadaan LEFT JOIN supplier ON supplier.IDSUPPLIER = pengadaan.IDSUPPLIER LEFT JOIN pegawai ON pegawai.IDPEGAWAI = pengadaan.IDPEGAWAI where pengadaan.status=''");

                              
                              
                              $no = 1;
                              while ($rr=mysqli_fetch_assoc($sql)) {
                                $id = $rr['IDPENGADAAN'];
                                ?>
							<tbody>
								<tr>
							<!-- <td><?php echo  $rr['IDBARANG']; ?></td> -->
							<td><?php echo  $no++; ?></td>
							<td><?php echo  $rr['NAMASUPPLIER']; ?></td>
							<td><?php echo  $rr['NAMAPEGAWAI']; ?></td>
                            <td><?php echo  date('d-m-Y', strtotime($rr['TGLPENGADAAN'])); ?></td>
                            <td><?php echo $rr['TOTALHARUSDIBAYAR'];?></td>
                            <td><?php echo $rr['STATUS'] ? $rr['STATUS'] : 'Waiting Approve'; ?></td>
                            
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="permohonan_edit.php?id=<?php echo $rr['IDPENGADAAN']; ?>"><i class="fa fa-pencil"></i> Edit</a>
												
											</div>
										</div>
									</td>
								</tr>

								<?php
                                
                              }
                              ?> 


							
                             </tbody>
							
						</table>
					</div>
				</div>
				
				<!-- Simple Datatable End -->
				<!-- INI MODAL SAYa -->

				<!-- Large modal -->
					<!-- <div class="col-md-4 col-sm-12">
						<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
						
							
						</div>
					</div> -->

		     	<!-- ini akhir modal -->
				
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