<?php
include_once 'koneksi.php';
  $idpengadaan = $_POST['idpengadaan'];
  $idbarang = $_POST['idbarang'];
  $jumlahbarang = $_POST['jumlah'];
  $hargabeli = $_POST['hargabeli'];
  $totalhargabeli = $_POST['totalhargabeli']; 
//preparestatement oop
  //masukan detail  
    // $sqlbarang = $mysqli->prepare("INSERT INTO detail_pengadaan (IDPENGADAAN, IDBARANG, JUMLAHBARANGPENGADAAN) VALUES (?, ?, ?)");
    // $sqlbarang->bind_param('iii', $idpengadaan, $idbarang, $jumlahbarang);
    
    //kurangi stok
   // $sqlupdate = "UPDATE stok SET stok=stok-$jumlahbarang WHERE IDBARANG='$idbarang'";
   // $mysqli->query($sqlupdate);


$query="INSERT INTO detail_pengadaan (IDPENGADAAN, IDBARANG, JUMLAHBARANGPENGADAAN, HARGABELI, SUBTOTALPENGADAAN) VALUES ('$idpengadaan', '$idbarang', '$jumlahbarang', '$hargabeli', '$totalhargabeli')";
$sql=mysqli_query($kon,$query);


    if($sql){
    	echo 1;
    }else{
    	echo 0;
    }
    

?>