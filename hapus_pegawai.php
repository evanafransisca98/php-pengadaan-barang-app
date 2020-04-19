<?php
$IDPEGAWAI=$_GET['id'];
include"koneksi.php";
$query="DELETE FROM pegawai WHERE IDPEGAWAI = '$IDPEGAWAI'";
$sql=mysqli_query($kon,$query);

if ($sql) {
	
	      header("Location: datapegawai.php");
    
}
?>image