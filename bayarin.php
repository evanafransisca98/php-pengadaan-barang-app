<?php

include"koneksi.php";

// $IDPENGADAAN = isset($_POST['IDPENGADAAN']) ? $_POST['IDPENGADAAN'] : false;
// $IDSUPPLIER = isset($_POST['IDSUPPLIER']) ? $_POST['IDSUPPLIER'] : false;
// $IDPEGAWAI = isset($_POST['IDPEGAWAI']) ? $_POST['IDPEGAWAI'] : false;
// $TGLPENGADAANX = isset($_POST['TGLPENGADAAN']) ? $_POST['TGLPENGADAAN'] : false;
// $TOTALHARUSDIBAYAR = isset($_POST['SUBTOTALPENGADAAN']) ? $_POST['SUBTOTALPENGADAAN'] : false;

// $TGLPENGADAAN = date('Y-m-d', strtotime($TGLPENGADAANX));

// $SUBTOTALPENGADAAN = isset($_POST['SUBTOTALPENGADAAN']) ? $_POST['SUBTOTALPENGADAAN'] : false;

@$BARANG_ID = $_REQUEST['idbarang'];
@$JMLH_B = $_REQUEST['jumlah'];
@$idpengadaan = $_REQUEST['pengadaanid'];
@$subtotal = $_REQUEST['total']; 

$query = "INSERT INTO pembayaran_pengadaan ( IDBAYARPENGADAAN, IDPENGADAAN,TGLBAYARPENGADAAN, TOTALPENGELUARAN, STATUS_PEMBAYARAN) VALUES ('','$idpengadaan', date(now()),'$subtotal', '1')";
$sql=mysqli_query($kon,$query);

$STOK_L = mysqli_query($kon,"SELECT STOK from stok WHERE IDBARANG='$BARANG_ID'");
$STOK_B = $STOK_L + $JMLH_B;

// $query1 = "INSERT INTO stok ( IDSTOK, IDBARANG,TGLSTOK, STOK, JUMLAHPERUBAHAN) VALUES ('3','$BARANG_ID', date(now()),'$STOK_B', '1')";
// $sql1 = mysqli_query($kon,$query2);

$query1 = "UPDATE stok set STOK='$STOK_B' where IDBARANG='$BARANG_ID' ";
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