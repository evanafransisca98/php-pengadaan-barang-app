<?php 
/* Proses Logout :
Hapus Session User Lalu Arahkan ke Halaman Login
*/
session_start();
session_destroy();
header("location:index.php");
?><meta http-equiv = "refresh" content = "0;url=index.php" />