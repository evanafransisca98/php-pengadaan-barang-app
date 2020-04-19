<?php

$IDPEGAWAI = isset($_POST['IDPEGAWAI']) ? $_POST['IDPEGAWAI'] : false;
$IDJABATAN = isset($_POST['IDJABATAN']) ? $_POST['IDJABATAN'] : false;
// $JABATAN = isset($_POST['JABATAN']) ? $_POST['JABATAN'] : false;
$NAMAPEGAWAI = isset($_POST['NAMAPEGAWAI']) ? $_POST['NAMAPEGAWAI'] : false;
$ALAMATPEGAWAI = isset($_POST['ALAMATPEGAWAI']) ? $_POST['ALAMATPEGAWAI'] : false;

$TELPPEGAWAI = isset($_POST['TELPPEGAWAI']) ? $_POST['TELPPEGAWAI'] : false;
$JENISKELAMIN = isset($_POST['JENISKELAMIN']) ? $_POST['JENISKELAMIN'] : false;
$USERNAME = isset($_POST['USERNAME']) ? $_POST['USERNAME'] : false;
$PASSWORD = isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : false;



include"koneksi.php";
$query = "INSERT INTO PEGAWAI (IDPEGAWAI,IDJABATAN,NAMAPEGAWAI,ALAMATPEGAWAI,TELPPEGAWAI,JENISKELAMIN,USERNAME,PASSWORD) VALUES ('$IDPEGAWAI','$IDJABATAN','$NAMAPEGAWAI','$ALAMATPEGAWAI','$TELPPEGAWAI','$JENISKELAMIN','$USERNAME','$PASSWORD')";

 $sql=mysqli_query($kon,$query);

if ($sql) {
	$sql = mysqli_query($kon,'SELECT max(IDPEGAWAI) IDPEGAWAI FROM PEGAWAI');
	while ($rr=mysqli_fetch_assoc($sql)) {
             $IDPEGAWAI = $rr['IDPEGAWAI'];
          }

    $subquery1 = "INSERT INTO jabatan ('JABATAN') values ('$JABATAN')";

	$sql=mysqli_query($kon,$subquery1);
    if ($sql) {
	     header("Location: datapegawai.php");
    }	
}

 

else{
	echo '<script type="text/javascript">
	alert ("Gagal Tambah Data");
	</script>';
	//header("Location: datapegawai.php");

}

?>