<?php
$IDPENGADAAN=$_GET['id'];
include"koneksi.php";
$query="DELETE FROM pengadaan WHERE IDPENGADAAN = '$IDPENGADAAN'";
$sql=mysqli_query($kon,$query);

if ($sql) {
	
	$query="DELETE FROM detail_pengadaan WHERE IDPENGADAAN = '$IDPENGADAAN'";
    $sql=mysqli_query($kon,$query);
    if ($sql) {
	      header("Location: pengadaanbarang.php");
    }
}else{
	echo "asemmm hapus header gagal";
}

?>