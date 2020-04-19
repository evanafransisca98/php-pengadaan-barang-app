<?php
include_once 'koneksi.php';

$id_data = isset($_POST['id_data']) ? $_POST['id_data'] : 46;
//tampilkan temporary
$query = "SELECT p.*, b.NAMABARANG FROM detail_pengadaan p, barang b WHERE p.IDBARANG = b.IDBARANG AND p.IDDETAILPENGADAAN ='$id_data'";

$resulttemp = mysqli_query($kon,$query);

@$tombol = $_REQUEST['dari'];

if($resulttemp){
    $no=0;
    while ($row=$resulttemp->fetch_assoc()){
    	$data[] = $row;
    }
    echo json_encode($data);
}else{
	echo 0;
}

?>