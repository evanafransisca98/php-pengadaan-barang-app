<?php

$kon=mysqli_connect("localhost","root","");
if(!$kon)
echo "Koneksi ke db gagal, ".mysqli_error();
$konek = mysqli_select_db($kon,"evana");
?>