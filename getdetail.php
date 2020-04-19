<?php
include_once 'koneksi.php';

$idpengadaan = isset($_POST['idpengadaan']) ? $_POST['idpengadaan'] : false;
//tampilkan temporary
$query = "SELECT p.*, b.NAMABARANG FROM detail_pengadaan p, barang b WHERE p.IDBARANG = b.IDBARANG AND p.IDPENGADAAN ='$idpengadaan'";

$resulttemp = mysqli_query($kon,$query);

@$tombol = $_REQUEST['dari'];

if($resulttemp){
    $no=0;
    while ($row=$resulttemp->fetch_assoc()){
    	$no++;
    	echo "<tr>
    	      <td>$no</td>
    	      
    	      <td>$row[NAMABARANG]</td>
    	      <td>$row[JUMLAHBARANGPENGADAAN]</td>
              <td>$row[HARGABELI]</td>
              <td>$row[SUBTOTALPENGADAAN]</td>
              <td><span class='editdetail' id='$row[IDDETAILPENGADAAN]'><a class='btn btn-warning'>Edit</a></span>
              </td>
              <td><span class='hapusdetail' id='$row[IDDETAILPENGADAAN]'><a class='btn btn-danger' href='hapusdetail.php?id=$row[IDDETAILPENGADAAN]&idpengadaan=$row[IDPENGADAAN]'>Delete</a></span>";
              if(($tombol == 'tambah_pengadaan') || ($tombol == 'edit_pengadaan1')){
        echo "&nbsp;";
              }else{
        echo "&nbsp;";
              }
        echo "<td>
    	      </tr>";
    }
}else{
	echo 0;
}

?>