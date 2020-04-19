<?php

include"koneksi.php";

$query="SELECT MAX(IDPENGADAAN) as id FROM pengadaan";
$sql=mysqli_query($kon,$query);
$data = mysqli_fetch_assoc($sql);
$IDPENGADAAN = $data['id'] + 1;

$query="SELECT * FROM barang left join stok on barang.IDBARANG=stok.IDBARANG ";
$sql=mysqli_query($kon,$query);

$rr = mysqli_fetch_assoc($sql);

$IDSUPPLIER = isset($rr['IDSUPPLIER']) ? $rr['IDSUPPLIER'] : false;
$IDPEGAWAI = isset($rr['IDPEGAWAI']) ? $rr['IDPEGAWAI'] : false;
$TGLPENGADAAN = isset($rr['TGLPENGADAAN']) ? $rr['TGLPENGADAAN'] : false;
$JUMLAHBARANGPENGADAAN = isset($rr['JUMLAHBARANGPENGADAAN']) ? $rr['JUMLAHBARANGPENGADAAN'] : false;
$HARGABELI = isset($rr['HARGABELI']) ? $rr['HARGABELI'] : false;
$SUBTOTALPENGADAAN = isset($rr['SUBTOTALPENGADAAN']) ? $rr['SUBTOTALPENGADAAN'] : false;
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
								<h4>Data Pengadaan</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Data Pengadaan</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<!-- <div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								
							</div> -->
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					
					<form action="detailpengadaan.php" method="post">
						<div class="form-group row">
							
							<div class="col-sm-12 col-md-10">
								
								<input type="hidden" name="IDPENGADAAN" id="IDPENGADAAN" value="<?php echo $IDPENGADAAN; ?>">
							</div>
						</div>
						<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Supplier</label>
						<div class="col-sm-12 col-md-10">
							<select class="form-control" name="IDSUPPLIER">
                            <?php
                                     $sql = mysqli_query($kon,"SELECT * FROM Supplier");
                                     while ($rr=mysqli_fetch_assoc($sql)) {
                      
                            ?>
								<option value="<?php echo $rr['IDSUPPLIER']; ?>"><?php echo $rr['NAMASUPPLIER']; ?></option>

							<?php 
							       }
							?>	
								
							</select>
						</div>
					</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">PEGAWAI</label>
							<div class="col-sm-12 col-md-10">
							<input type="hidden" name="IDPEGAWAI" value="<?php echo $_SESSION['id']; ?>">
							<input class="form-control" type="text" name="NAMAPEGAWAI" value="<?php echo $_SESSION['username']; ?>" readOnly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">TGLPENGADAAN</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="TGLPENGADAAN" value="<?php echo date('d-m-Y'); ?>">
							</div>
						</div>
						
					    <!-- Large modal -->
					

						<!-- <div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label"> Barang</label>
												<div class="col-sm-12 col-md-10">
													<select class="form-control" name="IDBARANG">
                                                    <?php
                                                             $sql = mysqli_query($kon,"SELECT * FROM barang");
                                                             while ($rr=mysqli_fetch_assoc($sql)) {
                                              
                                                    ?>
														<option value="<?php echo $rr['IDBARANG']; ?>"><?php echo $rr['NAMABARANG']; ?></option>

													<?php 
													       }
													?>	
														
													</select>
												</div>
											</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">JUMLAH BARANG</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="JUMLAHBARANGPENGADAAN">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">HARGA BELI</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="HARGABELI">
							</div>
						</div>
						 -->
						 <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">SUBTOTAL</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" id="SUBTOTALPENGADAAN" name="SUBTOTALPENGADAAN" readonly="true">
							</div>
						</div>
                        

                        <div class="form-group row">
                        	<div class="col-sm-12 col-md-10">
							<button type="button" id="tambahdetail" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Tambah Detail Barang</button>
						    </div>
						</div>
                        
                        <div class="box-header">
					      <h3 class="box-title">Detail Barang</h3>
					    </div>
					    <div class="box-body no-padding">
					      <table class="table table-condensed">
					        <tr>
					          <th>No</th>
					          <th>Nama</th>
					          <th>Jumlah Pengadaan</th>
					          <th>Harga Beli Satuan</th>
					          <th>Harga Beli Total</th>
					          <th>Action</th>
					        </tr>
					        <tbody id="isidetail">
					          
					        </tbody>
					        
					      </table>
					    </div> 

						<input type="submit" name="save" class="btn btn-primary" value="Proses Transaksi">
					    <!-- Large modal -->
					


					</form>
				</div>
				
				<!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        
                        <h4 class="modal-title">Masukan Barang</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" id="detailinput" role="form">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="nik">Nama Barang:</label>
                                <select class="form-control" name="IDBARANG" id="IDBARANG">
                                <option value="">--Pilih Barang--</option>
                                <?php
                                         $sql = mysqli_query($kon,"SELECT * FROM barang");
                                         while ($rr=mysqli_fetch_assoc($sql)) {
                          
                                ?>
									<option value="<?php echo $rr['IDBARANG']; ?>"><?php echo $rr['NAMABARANG']; ?></option>

								<?php 
								       }
								?>	
									
								</select>
                              </div>
                              <div class="form-group">
                                <label for="nama">Informasi Stock</label>
                                <input type="number" class="form-control" id="stok" name="stok" readonly>
                              </div>
                              <div class="form-group">
                                <label for="nama">Jumlah</label>
                                <input type="number" class="form-control" id="jumlahbarang" name="jumlahbarang" required>
                              </div>
                              <div class="form-group">
                                <label for="nama">Harga Beli Satuan</label>
                                <input type="number" class="form-control" id="hargabeli" name="hargabeli" required>
                              </div>
                              <div class="form-group">
                                <label for="nama">Total Harga Beli</label>
                                <input type="number" class="form-control" id="totalhargabeli" name="totalhargabeli" readonly>
                              </div>
                           </div>
                            <!-- /.box-body -->
                            <div class="box-footer">            
                             <button type="submit" class="btn btn-primary" name="tambahbarang" value="simpan" id="tambahbarang">Tambah Barang</button>               
                            </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
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

		
//saat tambah barang detail save
        var btntambahdetail = $('#tambahdetail');
        btntambahdetail.click(function(e){
        	$('#detailinput')[0].reset();
        })

		var bttambahbarang = $('#tambahbarang');
	    
	    bttambahbarang.click(function(e){
           
	       var idpengadaan = <?php echo $IDPENGADAAN; ?>;
	       var idbarang = $('#IDBARANG').val();
	       var jumlahbarang = $('#jumlahbarang').val();
	       var jumlahstok = $('#stok').val();
	       var hargabeli = $('#hargabeli').val();
	       var totalhargabeli = $('#totalhargabeli').val();
	       
	       if ((idbarang == '')||(jumlahbarang == '')) { 
	          alert("Barang Atau Jumlah Belum Dimasukan!!!");
	       }else{       
	        $.ajax({
	           url:'insertdetail.php',
	           method:'POST',
	           data:{idpengadaan:idpengadaan, idbarang:idbarang, jumlah:jumlahbarang, hargabeli:hargabeli, totalhargabeli:totalhargabeli},
	           success:function(hasil){
	             console.log(hasil);
	             if (hasil==1){
	                $('#myModal').modal('hide');   
	                $('#idbarang').val('');
	                $('#jumlahbarang').val('');
	                $('#stok').val('');
	                getdatadetail(idpengadaan);
	             }else{
	                alert("Tambah Detail Gagal");
	             }
	           }           

	        });
	        
	      }

	      e.preventDefault();
	    });

	    //informasi stok

	    $('#IDBARANG').on('change', function(){
		   var id = $(this).val();
		   $.ajax({
		     url:'cekbarang.php',
		     method:'POST',
		     data:{idbarang:id},
		     success:function(data){
		     $('#stok').val(data);
		     } 

		   });
		   $.ajax({
		     url:'cekhargabarang.php',
		     method:'POST',
		     data:{idbarang:id},
		     success:function(data){
		     $('#hargabeli').val(data);
		     } 

		   });

		});

		//kalkulasi harga beli

		$('#hargabeli').on('keyup', function(){
		   var jumlahbarang = $('#jumlahbarang').val();
	       var hargabeli = $('#hargabeli').val();
	       var totalhargabeli = jumlahbarang * hargabeli;
	       $('#totalhargabeli').val(totalhargabeli);
        
		});

		$('#jumlahbarang').on('keyup', function(){
		   var jumlahbarang = $('#jumlahbarang').val();
	       var hargabeli = $('#hargabeli').val();
	       var totalhargabeli = jumlahbarang * hargabeli;
	       $('#totalhargabeli').val(totalhargabeli);
        
		});

		//saat get detail
        getdatadetail(<?php echo $IDPENGADAAN; ?>);
		function getdatadetail(idpengadaanparam){
		  var idpengadaan = idpengadaanparam;
		    $.ajax({
		      url:'getdetail.php?dari=tambah_pengadaan',
		      method:'POST',
		      data:{idpengadaan: idpengadaan},
		      success:function(data){
		        console.log(data);
	
		        $('#isidetail').html(data);
		      }
		    });

		    $.ajax({
			     url:'ceksubtotal.php',
			     method:'POST',
			     data:{idpengadaan: idpengadaan},
			     success:function(data){
			        $('#SUBTOTALPENGADAAN').val(data);
			     } 

			   });

		}


	</script>
</body>
</html>