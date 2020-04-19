<?php

$IDJENISBARANG = isset($_POST['IDJENISBARANG']) ? $_POST['IDJENISBARANG'] : false;
$NAMABARANG = isset($_POST['NAMABARANG']) ? $_POST['NAMABARANG'] : false;
$HARGAJUALBARANG = isset($_POST['HARGAJUALBARANG']) ? $_POST['HARGAJUALBARANG'] : false;
$idstok = isset($_POST['idstok']) ? $_POST['idstok'] : false;
$TGLSTOK = isset($_POST['TGLSTOK']) ? $_POST['TGLSTOK'] : false;
$STOK = isset($_POST['stok']) ? $_POST['stok'] : false;


include"koneksi.php";
$query = "INSERT INTO barang (IDBARANG,IDJENISBARANG,NAMABARANG,HARGAJUALBARANG) VALUES ('$IDBARANG','$IDJENISBARANG','$NAMABARANG','$HARGAJUALBARANG')";

 $sql=mysqli_query($kon,$query);

if ($sql) {
	$sql = mysqli_query($kon,'SELECT max(IDBARANG) IDBARANG FROM barang LIMIT 1');
	while ($rr=mysqli_fetch_assoc($sql)) {
             $IDBARANG = $rr['IDBARANG'];
          }

    $subquery1 = "INSERT INTO stok (IDBARANG,TGLSTOK,STOK) values ('$IDBARANG', '$TGLSTOK','$STOK')";

	$sql=mysqli_query($kon,$subquery1);
    if ($sql) {
	     header("Location: databarang.php");
    }	
}

 

else{
	echo '<script type="text/javascript">
	alert ("Gagal Tambah Data");
	</script>';
	//header("Location: databarang.php");

}

?>