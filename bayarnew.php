<?php

$IDPENGADAAN = isset($_POST['IDPENGADAAN']) ? $_POST['IDPENGADAAN'] : false;

$target_dir = "uploads/";

echo $_FILES["fileToUpload"]["name"];
$uploadOk = 1;

$filename = $_FILES['fileToUpload']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$image_name = time().'.'.$ext;
$target_file = $target_dir .$image_name;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

include"koneksi.php";

$imgbayar = $_FILES["fileToUpload"]["name"];

$query = "UPDATE pengadaan SET STATUS_PEMBAYARAN='1', TGLPEMBAYARAN=date(now()), IMGBAYAR='$image_name' WHERE IDPENGADAAN='$IDPENGADAAN' ";

 $sql=mysqli_query($kon,$query);


if ($sql) {
		 $sql = mysqli_query($kon,"SELECT * FROM detail_pengadaan WHERE IDPENGADAAN='$IDPENGADAAN'");
		 while ($rr=mysqli_fetch_assoc($sql)) {
		 	$query1 = "UPDATE stok set STOK=STOK+$rr[JUMLAHBARANGPENGADAAN] where IDBARANG=$rr[IDBARANG] ";
			$sql1 = mysqli_query($kon,$query1);
		 }

	     header("Location: pemesanan.php");
    
}

 

else{
	echo $query;
	echo '<script type="text/javascript">
	alert ("Gagal Update Data");
	</script>';

}



?>