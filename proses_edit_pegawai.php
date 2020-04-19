<?php

$IDPEGAWAI = isset($_POST['IDPEGAWAI']) ? $_POST['IDPEGAWAI'] : false;

$IDJABATAN = isset($_POST['IDJABATAN']) ? $_POST['IDJABATAN'] : false;
$NAMAPEGAWAI = isset($_POST['NAMAPEGAWAI']) ? $_POST['NAMAPEGAWAI'] : false;
$ALAMATPEGAWAI = isset($_POST['ALAMATPEGAWAI']) ? $_POST['ALAMATPEGAWAI'] : false;
$TELPPEGAWAI = isset($_POST['TELPPEGAWAI']) ? $_POST['TELPPEGAWAI'] : false;
$JENISKELAMIN = isset($_POST['JENISKELAMIN']) ? $_POST['JENISKELAMIN'] : false;
$USERNAME = isset($_POST['USERNAME']) ? $_POST['USERNAME'] : false;
$PASSWORD = isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : false;


include"koneksi.php";
$query = "UPDATE pegawai SET NAMAPEGAWAI = '$NAMAPEGAWAI',ALAMATPEGAWAI = '$ALAMATPEGAWAI',TELPPEGAWAI = '$TELPPEGAWAI', JENISKELAMIN = '$JENISKELAMIN', USERNAME = '$USERNAME', PASSWORD = '$PASSWORD' WHERE IDPEGAWAI = '$IDPEGAWAI'";
$sql=mysqli_query($kon,$query);
$query = "UPDATE jabatan SET IDJABATAN = '$IDJABATAN' WHERE IDPEGAWAI = '$IDPEGAWAI'";
    //$sql1=mysqli_query($kon,$query1);
if ($sql) {
	     header("Location: datapegawai.php");
}
else{
	echo '<script type="text/javascript">
	alert ("Gagal Edit Data");
	</script>';
	//header("Location: databarang.php");

}

?>