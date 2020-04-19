<?php

include"koneksi.php";
$id = $_POST['idpengadaan'];

$query="SELECT SUM(SUBTOTALPENGADAAN) AS SUBTOTALPENGADAAN FROM detail_pengadaan WHERE IDPENGADAAN='$id'";
$sql=mysqli_query($kon,$query);
$rr = mysqli_fetch_assoc($sql);
echo $rr['SUBTOTALPENGADAAN'];
?>