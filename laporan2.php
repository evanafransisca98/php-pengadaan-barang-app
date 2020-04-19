<?php
 
  $start_date = @$_GET['start_date'];
  $finish_date = @$_GET['finish_date'];
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
	<?php include('include/sidebar1.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Laporan Pengadaan</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Laporan Pengadaan</li>
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

				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					
					<div class="row">
					  	<div class="col-md-12 col-sm-12">
					  			<div class="modal-header">
                        
                        <h4 class="modal-title">Filter</h4>
                      </div>
                      <div class="modal-body">
                        <form method="GET" action="laporan2.php">
                            <div class="box-body">
                  
                              <div class="form-group">
                                <label for="nama">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo @$start_date; ?>">
                              </div>
                              <div class="form-group">
                                <label for="nama">Finish Date</label>
                                <input type="date" class="form-control" id="finish_date" name="finish_date" value="<?php echo @$finish_date; ?>">
                              </div>
                           </div>
                            <!-- /.box-body -->
                            <div class="box-footer">            
                             <button type="submit" value="submit" class="btn btn-primary">Load Data</button>               
                            </div>
                          </form>
                      </div>
					  	</div>	
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
									<th>Bukti Bayar</th>
									<th>Tgl Pengadaan</th>
									<th>Barang</th>
									<th>Jumlah Barang</th>
									<th>Harga Barang</th>
									<th>total Harga</th>
									<th>Tgl Diterima</th>
									
								</tr>
							</thead>
							<?php include"koneksi.php";                
                              //Data mentah yang ditampilkan ke tabel   
                              if ($start_date != '' || $finish_date != '') {
                              	  $query = "SELECT detail_pengadaan.*, pengadaan.IMGBAYAR, pengadaan.TGLPENGADAAN, pengadaan.TGLPEMBAYARAN, barang.NAMABARANG FROM detail_pengadaan LEFT JOIN pengadaan ON pengadaan.IDPENGADAAN = detail_pengadaan.IDPENGADAAN LEFT JOIN barang ON barang.IDBARANG = detail_pengadaan.IDBARANG
								     WHERE pengadaan.STATUS_PEMBAYARAN = '1' AND pengadaan.TGLPENGADAAN >= '$start_date' AND  pengadaan.TGLPENGADAAN <= '$finish_date'";
                               	  $sql = mysqli_query($kon,$query);
                              
                              
                              $no = 1;
                              while ($rr=mysqli_fetch_assoc($sql)) {
                                $id = $rr['IDPENGADAAN'];
                                ?>
							<tbody>
								<tr>
							<td><?php echo  $no++; ?></td>
							<td><img src="uploads/<?php echo $rr['IMGBAYAR']; ?>" style="width: 50px; height: 50px;"></td>
							<td><?php echo  date('d-m-Y', strtotime($rr['TGLPENGADAAN'])); ?></td>
							<td><?php echo  $rr['NAMABARANG']; ?></td>
							<td><?php echo  $rr['JUMLAHBARANGPENGADAAN']; ?></td>
                            <td><?php echo $rr['HARGABELI'];?></td>
                            <td><?php echo $rr['SUBTOTALPENGADAAN'];?></td>
                            <td><?php echo $rr['TGLPEMBAYARAN'];?></td>
                           
									
								</tr>

								<?php
                                
                                }
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
						
							<div class="modal fade bs-example-modal-lg" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<!-- <h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4> -->
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
										<form action="tambah_barang.php" method="post">
											<!-- <div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">ID Barang</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="IDBARANG">
												</div>
											</div> -->
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Jenis Barang</label>
												<div class="col-sm-12 col-md-10">
													<select class="form-control" name="IDJENISBARANG">
                                                    <?php
                                                             $sql = mysqli_query($kon,"SELECT * FROM JENISBARANG");
                                                             while ($rr=mysqli_fetch_assoc($sql)) {
                                              
                                                    ?>
														<option value="<?php echo $rr['IDJENISBARANG']; ?>"><?php echo $rr['JENISBARANG']; ?></option>

													<?php 
													       }
													?>	
														
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="NAMABARANG">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Harga Barang</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="HARGAJUALBARANG">
												</div>
											</div>
											<!-- <div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">ID Stok</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="IDSTOK">
												</div>
											</div> -->
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Tgl Stok</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="TGLSTOK">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Stok</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="stok">
												</div>
											</div>
											
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