<?php

include"koneksi.php";
$id = $_POST['idbarang'];

$query="SELECT * FROM barang WHERE IDBARANG='$id'";
$sql=mysqli_query($kon,$query);
$rr = mysqli_fetch_assoc($sql);
echo $rr['HARGAJUALBARANG'];
?>