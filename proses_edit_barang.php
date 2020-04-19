<?php

$IDBARANG = isset($_POST['IDBARANG']) ? $_POST['IDBARANG'] : false;

$NAMABARANG = isset($_POST['NAMABARANG']) ? $_POST['NAMABARANG'] : false;
$HARGAJUALBARANG = isset($_POST['HARGAJUALBARANG']) ? $_POST['HARGAJUALBARANG'] : false;
$STOK = isset($_POST['STOK']) ? $_POST['STOK'] : false;

include"koneksi.php";
$query = "UPDATE barang SET NAMABARANG = '$NAMABARANG',HARGAJUALBARANG = '$HARGAJUALBARANG' WHERE IDBARANG = '$IDBARANG'";
$sql=mysqli_query($kon,$query);

if ($sql) {
	$query = "UPDATE stok SET STOK = '$STOK' WHERE IDBARANG = '$IDBARANG'";
    $sql=mysqli_query($kon,$query);
    if ($sql) {
	     header("Location: databarang.php");
    }
}
else{
	echo '<script type="text/javascript">
	alert ("Gagal Edit Data");
	</script>';
	//header("Location: databarang.php");

}

?>