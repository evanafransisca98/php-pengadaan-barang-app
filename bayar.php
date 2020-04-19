<?php

include"koneksi.php";

$IDPENGADAAN = isset($_POST['IDPENGADAAN']) ? $_POST['IDPENGADAAN'] : false;
$IDSUPPLIER = isset($_POST['IDSUPPLIER']) ? $_POST['IDSUPPLIER'] : false;
$IDPEGAWAI = isset($_POST['IDPEGAWAI']) ? $_POST['IDPEGAWAI'] : false;
$TGLPENGADAANX = isset($_POST['TGLPENGADAAN']) ? $_POST['TGLPENGADAAN'] : false;
$TOTALHARUSDIBAYAR = isset($_POST['SUBTOTALPENGADAAN']) ? $_POST['SUBTOTALPENGADAAN'] : false;

$TGLPENGADAAN = date('Y-m-d', strtotime($TGLPENGADAANX));

$SUBTOTALPENGADAAN = isset($_POST['SUBTOTALPENGADAAN']) ? $_POST['SUBTOTALPENGADAAN'] : false;

$jumlahbarang = isset($_POST['JUMLAHBARANGPENGADAAN']) ? $_POST['JUMLAHBARANGPENGADAAN'] : false;
//$jumlahstok = isset($_POST['jumlahstok']) ? $_POST['jumlahstok'] : false;
$idbarang = isset($_POST['IDBARANG']) ? $_POST['IDBARANG'] : false;
$jumlahstok = "SELECT STOK from stok WHERE IDBARANG='$idbarang'";

$query = "INSERT INTO pembayaran_pengadaan ( IDBAYARPENGADAAN, IDPENGADAAN,TGLBAYARPENGADAAN, TOTALPENGELUARAN, STATUS_PEMBAYARAN) VALUES ('','$IDPENGADAAN', date(now()),'$TOTALHARUSDIBAYAR', '1')";

$sql=mysqli_query($kon,$query);

$stok_b=$jumlahstok+$jumlahbarang;
$query1 = "UPDATE stok set STOK='$stok_b' where IDBARANG='$idbarang' ";
$sql1=mysqli_query($kon,$query1);

if ($sql && $sql1) {
	
	    header("Location: pemesanan.php");
    
}

 

else{
	echo '<script type="text/javascript">
	alert ("Gagal Tambah Data");
	</script>';
	//header("Location: databarang.php");

}



?>