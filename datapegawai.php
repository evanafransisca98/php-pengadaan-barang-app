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
					<div class="clearfix mb-20">
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_pegawai" type="button">Tambah Data</a>	
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">

							<thead>
								<tr>
									<!-- <th class="table-plus datatable-nosort">ID Barang</th> -->
									<th>No</th>
									<th>Nama Pegawai</th>
									<th>Alamat Alamat</th>
									<th>Telp Pegawai</th>

									
									
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<?php include"koneksi.php";                
                              //Data mentah yang ditampilkan ke tabel    
                              $sql = mysqli_query($kon,"SELECT * FROM pegawai");
                              
                              
                              $no = 1;
                              while ($rr=mysqli_fetch_assoc($sql)) {
                                $id = $rr['IDPEGAWAI'];
                                ?>
							<tbody>
								<tr>
							
							<td><?php echo  $no++; ?></td>
							<td><?php echo  $rr['NAMAPEGAWAI']; ?></td>
							<td><?php echo  $rr['ALAMATPEGAWAI']; ?></td>
                            <td><?php echo  $rr['TELPPEGAWAI']; ?></td>

                            
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="edit_pegawai.php?id=<?php echo $rr['IDPEGAWAI']; ?>"><i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" href="hapus_pegawai.php?id=<?php echo $rr['IDPEGAWAI']; ?>"><i class="fa fa-trash"></i> Delete</a>
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
					<div class="col-md-4 col-sm-12">
						<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
						
							<div class="modal fade bs-example-modal-lg" id="modal_tambah_pegawai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
										<form action="tambah_pegawai.php" method="post">
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">ID Pegawai</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="IDPEGAWAI">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label"> Jabatan</label>
												<div class="col-sm-12 col-md-10">
													<select class="form-control" name="JABATAN">
                                                    <?php
                                                             $sql = mysqli_query($kon,"SELECT * FROM Jabatan");
                                                             while ($rr=mysqli_fetch_assoc($sql)) {
                                              
                                                    ?>
														<option value="<?php echo $rr['JABATAN']; ?>"><?php echo $rr['JABATAN']; ?></option>

													<?php 
													       }
													?>	
														
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Nama pegawai</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="NAMAPEGAWAI">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Alamat Pegawai</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="ALAMATPEGAWAI">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Telp Pegawai</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="TELPPEGAWAI">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">JK Pegawai</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="JENISKELAMIN">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Username Pegawai</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="USERNAME">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Password Pegawai</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="Password" name="pASSWORD">
												</div>
											</div>

											<!-- <div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">ID Stok</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="IDSTOK">
												</div>
											</div> -->
											
											
										    <div class="modal-footer">
											  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											  <input type="submit" name="save" class="btn btn-primary" value="Save">
										    </div>

										</form>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>

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