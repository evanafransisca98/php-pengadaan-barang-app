<?php
 
  $start_date = @$_GET['start_date'];
  $finish_date = @$_GET['finish_date'];
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Print Data</h2>

<table>
        <tr>
        <!-- <th class="table-plus datatable-nosort">ID Barang</th> -->
        <th>No</th>
        <th>Bukti Bayar</th>
        <th>Tgl Pengadaan</th>
        <th>Barang</th>
        <th>Jumlah Barang</th>
        <th>Harga Barang</th>
        <th>total Harga</th>
        <th>Tgl Diterima</th>
        
      </tr>
  <?php include"koneksi.php";                
                              //Data mentah yang ditampilkan ke tabel   
                              if ($start_date != '' || $finish_date != '') {
                                  $query = "SELECT detail_pengadaan.*, pengadaan.IMGBAYAR, pengadaan.TGLPENGADAAN, pengadaan.TGLPEMBAYARAN, barang.NAMABARANG FROM detail_pengadaan LEFT JOIN pengadaan ON pengadaan.IDPENGADAAN = detail_pengadaan.IDPENGADAAN LEFT JOIN barang ON barang.IDBARANG = detail_pengadaan.IDBARANG
                     WHERE pengadaan.STATUS_PEMBAYARAN = '1' AND pengadaan.TGLPENGADAAN >= '$start_date' AND  pengadaan.TGLPENGADAAN <= '$finish_date'";
                                  $sql = mysqli_query($kon,$query);
                              
                              
                              $no = 1;
                              while ($rr=mysqli_fetch_assoc($sql)) {
                                $id = $rr['IDPENGADAAN'];
                                ?>
              <tbody>
                <tr>
              <td><?php echo  $no++; ?></td>
              <td>
                <?php if($rr['IMGBAYAR']){ ?>
                <a href="uploads/<?php echo $rr['IMGBAYAR']; ?>"  target="_blank"><img src="uploads/<?php echo $rr['IMGBAYAR']; ?>" style="width: 50px; height: 50px;"></a>
                <?php }else{ ?>
                Tidak Ada Gambar
                <?php } ?>
              </td>
              <td><?php echo  date('d-m-Y', strtotime($rr['TGLPENGADAAN'])); ?></td>
              <td><?php echo  $rr['NAMABARANG']; ?></td>
              <td><?php echo  $rr['JUMLAHBARANGPENGADAAN']; ?></td>
                            <td><?php echo $rr['HARGABELI'];?></td>
                            <td><?php echo $rr['SUBTOTALPENGADAAN'];?></td>
                            <td><?php echo $rr['TGLPEMBAYARAN'];?></td>
                           
                  
                </tr>

                <?php
                                
                                }
                              } 
                              ?> 


              
                             </tbody>

</table>

</body>
</html>
