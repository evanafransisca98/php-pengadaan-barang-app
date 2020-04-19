<?php

$IDPENGADAAN = isset($_GET['id']) ? $_GET['id'] : false;

include"koneksi.php";
$query = "UPDATE pengadaan SET STATUS='1' WHERE IDPENGADAAN='$IDPENGADAAN' ";

 $sql=mysqli_query($kon,$query);


if ($sql) {
	
	     header("Location: permohonan.php");
    
}

 

else{
	echo '<script type="text/javascript">
	alert ("Gagal Tambah Data");
	</script>';
	//header("Location: databarang.php");

}



?>