<?php
$IDBARANG=$_GET['id'];
include"koneksi.php";
$query="DELETE FROM barang WHERE IDBARANG = '$IDBARANG'";
$sql=mysqli_query($kon,$query);

if ($sql) {
	$query="DELETE FROM stok WHERE IDBARANG = '$IDBARANG'";
    $sql=mysqli_query($kon,$query);
    if ($sql) {
	      header("Location: databarang.php");
    }
}
?>image