<?php

$IDPENGADAAN = isset($_POST['IDPENGADAAN']) ? $_POST['IDPENGADAAN'] : false;
$IDSUPPLIER = isset($_POST['IDSUPPLIER']) ? $_POST['IDSUPPLIER'] : false;
$IDPEGAWAI = isset($_POST['IDPEGAWAI']) ? $_POST['IDPEGAWAI'] : false;
$TGLPENGADAAN = isset($_POST['TGLPENGADAAN']) ? $_POST['TGLPENGADAAN'] : false;
$TOTALHARUSDIBAYAR = isset($_POST['SUBTOTALPENGADAAN']) ? $_POST['SUBTOTALPENGADAAN'] : false;

$TGLPENGADAAN = date('Y-m-d', strtotime($TGLPENGADAAN));

$SUBTOTALPENGADAAN = isset($_POST['SUBTOTALPENGADAAN']) ? $_POST['SUBTOTALPENGADAAN'] : false;


include"koneksi.php";
$query = "INSERT INTO pengadaan (IDPENGADAAN,IDSUPPLIER,IDPEGAWAI,TGLPENGADAAN,TOTALHARUSDIBAYAR ) VALUES ('$IDPENGADAAN','$IDSUPPLIER','$IDPEGAWAI','$TGLPENGADAAN','$TOTALHARUSDIBAYAR')";

 $sql=mysqli_query($kon,$query);

if ($sql) {
	
	     header("Location: pengadaanbarang.php");
    
}

 

else{
	echo $query;
	//header("Location: databarang.php");

}



?>