<?php

$IDSUPPLIER = isset($_POST['IDSUPPLIER']) ? $_POST['IDSUPPLIER'] : false;
$NAMASUPPLIER = isset($_POST['NAMASUPPLIER']) ? $_POST['NAMASUPPLIER'] : false;
// $JABATAN = isset($_POST['JABATAN']) ? $_POST['JABATAN'] : false;
$ALAMATSUPPLIER = isset($_POST['ALAMATSUPPLIER']) ? $_POST['ALAMATSUPPLIER'] : false;
$TELPSUPPLIER = isset($_POST['TELPSUPPLIER']) ? $_POST['TELPSUPPLIER'] : false;

// $TELPPEGAWAI = isset($_POST['TELPPEGAWAI']) ? $_POST['TELPPEGAWAI'] : false;
// $JENISKELAMIN = isset($_POST['JENISKELAMIN']) ? $_POST['JENISKELAMIN'] : false;
// $USERNAME = isset($_POST['USERNAME']) ? $_POST['USERNAME'] : false;
// $PASSWORD = isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : false;



include"koneksi.php";
$query = "INSERT INTO supplier (IDSUPPLIER,NAMASUPPLIER,ALAMATSUPPLIER,TELPSUPPLIER) VALUES ('$IDSUPPLIER','$NAMASUPPLIER','$ALAMATSUPPLIER','$TELPSUPPLIER')";

 $sql=mysqli_query($kon,$query);
 if($sql){
 		header("Location: datasupplier.php");
 	}

// if ($sql) {
// 	$sql = mysqli_query($kon,'SELECT max(IDSUPPLIER) IDSUPPLIER FROM supplier');
// 	while ($rr=mysqli_fetch_assoc($sql)) {
//              $IDSUPPLIER = $rr['IDSUPPLIER'];
//           }

//     $subquery1 = "INSERT INTO jabatan (JABATAN) values ('$JABATAN')";

// 	$sql=mysqli_query($kon,$subquery1);
//     if ($sql) {
// 	     header("Location: datapegawai.php");
//     }	
// }

 

else{
	echo '<script type="text/javascript">
	alert ("Gagal Tambah Data");
	</script>';
	//header("Location: datapegawai.php");

}

?>