<?php
  include_once 'koneksi.php';
  $id = $_GET['id'];
  $idpengadaan = $_GET['idpengadaan'];
  $query="DELETE FROM detail_pengadaan WHERE IDDETAILPENGADAAN = '$id'";
  $sql=mysqli_query($kon,$query);

  
   if ($sql) {
       header("Location: edit_pengadaan.php?id='$idpengadaan'");
    }



?>