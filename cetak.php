<?php
session_start();
include "fpdf.php";
include "../koneksi.php";

$idp = $_REQUEST["idp"]; //thn penilaian

$pdf = new FPDF();
//halaman 1
$pdf->AddPage();

$pdf->Ln(5);
$pdf->SetFont('Times','B',12);
$query="SELECT * FROM pengadaan WHERE IDPENGADAAN='$IDPENGADAAN'";
$sql=mysqli_query($kon,$query);

$rr = mysqli_fetch_assoc($sql);

// $IDSUPPLIER = isset($rr['IDSUPPLIER']) ? $rr['IDSUPPLIER'] : false;
// $IDPEGAWAI = isset($rr['IDPEGAWAI']) ? $rr['IDPEGAWAI'] : false;
// $IDBARANG = isset($rr['IDBARANG']) ? $rr['IDBARANG'] : false;
// $TGLPENGADAAN = isset($rr['TGLPENGADAAN']) ? $rr['TGLPENGADAAN'] : false;
// $JUMLAHBARANGPENGADAAN = isset($rr['JUMLAHBARANGPENGADAAN']) ? $rr['JUMLAHBARANGPENGADAAN'] : false;
// $HARGABELI = isset($rr['HARGABELI']) ? $rr['HARGABELI'] : false;
// $SUBTOTALPENGADAAN = isset($rr['SUBTOTALPENGADAAN']) ? $rr['SUBTOTALPENGADAAN'] : false;


//$pdf->Cell(lebar,tinggi,'judul',border(1)/ndak(0),enter(1)/ndak(0),'C/L/R',false); //judul
$pdf->Cell(50,5,'Daftar Pemesanan'.$idp,'0','1','C',false); //judul

$pdf->Ln(15);
$pdf->SetFont('Times','',11);
// $pdf->Cell(0,5,'GAGAL PROSES PENGAJUAN','0','1','L',false);
$pdf->Ln(5);
$pdf->SetFont('Times','B',10);
$pdf->Cell(10,10,'Supplier.','LTR',0,'C',0); //1
$pdf->Cell(30,10,'Pegawai','LTR',0,'C',0);//2
$pdf->Cell(40,10,'Nama barang','LTR',0,'C',0);//3
$pdf->Cell(40,10,'tanggal pengadaan','LTR',0,'C',0);//4
$pdf->Cell(70,10,'Jumlah barang pengadaan','LTR',0,'C',0);//5
$pdf->Cell(70,10,'Harga beli','LTR',0,'C',0);//6
$pdf->Cell(70,10,'Subtotal','LTR',0,'C',0);//7

$no=1;
while($rr1=mysqli_fetch_array($rr,MYSQLI_NUM)){ 
$pdf->SetFont('Times','',10);
$pdf->Ln(10);
$sql = mysqli_query($kon,"SELECT NAMASUPPLIER FROM supplier WHERE IDSUPPLIER='$rr1[1]'");
while ($namasup=mysqli_fetch_assoc($sql)) {
$pdf->Cell(10,10,$namasup["NAMASUPPLIER"].".",1,0,'C',0);//1
}

$sql = mysqli_query($kon,"SELECT NAMAPEGAWAI FROM pegawai WHERE IDPEGAWAI='$rr2[2]'");
while ($namapeg=mysqli_fetch_assoc($sql)) {
$pdf->Cell(30,10,$namapeg["NAMAPEGAWAI"],1,0,'L',0);//2
}

$sql = mysqli_query($kon,"SELECT NAMABARANG FROM barang WHERE IDBARANG='$rr3[3]'");
while ($namabar=mysqli_fetch_assoc($sql)) {
$pdf->Cell(30,10,$namabar["NAMABARANG"],1,0,'L',0);//2
}
// if($ampeg1[3]=="0"){
//     $pdf->Cell(40,10,"Bekerja",1,0,'C',0);
// } else {
//     $pdf->Cell(40,10,"Tugas Belajar",1,0,'C',0); //4
// }
$pdf->Cell(70,10,$ampeg1[4],1,0,'C',0);//5
$no++;
}

$pdf->Ln(15);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'GAGAL PROSES SELEKSI KRITERIA','0','1','L',false);
$pdf->Ln(5);
$pdf->SetFont('Times','B',11);
$pdf->Cell(10,10,'No.','LTR',0,'C',0); //1
$pdf->Cell(30,10,'NIP','LTR',0,'C',0);//2
$pdf->Cell(30,10,'Nama','LTR',0,'C',0);//3
$pdf->Cell(20,10,'Nilai','LTR',0,'C',0);//4
$pdf->Cell(40,10,'Kedisiplinan','LTR',0,'C',0);//5
$pdf->Cell(60,10,'Penghargaan','LTR',0,'C',0);//6

$no=1;
while($ampeg2=mysqli_fetch_array($peg2,MYSQLI_NUM)){ 
$pdf->SetFont('Times','',10);
$pdf->Ln(10);
$pdf->Cell(10,10,$no.".",1,0,'C',0);//1
$pdf->Cell(30,10,$ampeg2[1],1,0,'L',0);//2
$pdf->Cell(30,10,$ampeg2[2],1,0,'C',0);//3
$pdf->Cell(20,10,$ampeg2[4],1,0,'C',0);//4
if($ampeg2[5]=="0"){
    $pdf->Cell(40,10,"Disiplin",1,0,'C',0);
} else {
    $pdf->Cell(40,10,"Pernah Dijatuhi Hukuman",1,0,'C',0); //5
}
$pdf->Cell(60,10,$ampeg2[6],1,0,'C',0);//6
$no++;
}

$pdf->Output('I','Laporan Gagal Seleksi Ke Pusat - '.$thn.'pdf');

?>