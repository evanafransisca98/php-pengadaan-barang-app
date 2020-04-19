<?php

$IDSUPPLIER = isset($_POST['IDSUPPLIER']) ? $_POST['IDSUPPLIER'] : false;

$NAMASUPPLIER = isset($_POST['NAMASUPPLIER']) ? $_POST['NAMASUPPLIER'] : false;
$ALAMATSUPPLIER = isset($_POST['ALAMATSUPPLIER']) ? $_POST['ALAMATSUPPLIER'] : false;
$TELPSUPPLIER = isset($_POST['TELPSUPPLIER']) ? $_POST['TELPSUPPLIER'] : false;

include"koneksi.php";
$query = "UPDATE supplier SET NAMASUPPLIER = '$NAMASUPPLIER',ALAMATSUPPLIER = '$ALAMATSUPPLIER', TELPSUPPLIER = '$TELPSUPPLIER' WHERE IDSUPPLIER = '$IDSUPPLIER'";
$sql=mysqli_query($kon,$query);

if ($sql) {

	     header("Location: datasupplier.php");
    
}
else{
	echo '<script type="text/javascript">
	alert ("Gagal Edit Data");
	</script>';
	//header("Location: databarang.php");

}

?>