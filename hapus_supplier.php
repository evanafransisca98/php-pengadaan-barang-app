<?php
$IDSUPPLIER=$_GET['id'];
include"koneksi.php";
$query="DELETE FROM supplier WHERE IDSUPPLIER = '$IDSUPPLIER'";
$sql=mysqli_query($kon,$query);

if ($sql) {
	
	      header("Location: datasupplier.php");
    
}
?>image