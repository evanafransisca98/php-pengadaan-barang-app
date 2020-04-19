<?php 
session_start();
include "koneksi.php";
if (isset($_POST['login'])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$cek_user = mysqli_query($kon,"SELECT * FROM pegawai WHERE USERNAME ='$user' AND PASSWORD = '$pass'");
		if (mysqli_num_rows($cek_user)==1){
			$hasil = mysqli_fetch_array($cek_user);
			// Simpan Session USER
			$_SESSION['user'] = $hasil['6'];
			$_SESSION['id'] = $hasil['0'];
	        $_SESSION['username'] = $hasil['2'];

			if($hasil['1']=='01'){
			    header("location:dashboard.php");
			}if($hasil['1']=='02'){
				header("location:dashboard1.php");		
			}
	}else{
		header("Location:index.php?pesan=Maaf username atau password Anda salah.");
	}
	
}
?><meta http-equiv = "refresh" content = "0;url=index.php" />