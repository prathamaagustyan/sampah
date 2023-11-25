<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$nama=$_POST["nama"];
$username=$_POST["username"];
$password=$_POST["password"];
$photo=$_POST["email"];
$photoa=$_POST["usertype"];

//Query input menginput data kedalam tabel anggota
  $sql="insert into user (username,password,nama,email,usertype) values
		('$username','$password','$nama','$photo','$photoa')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($connect,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil simpan data anggota";
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index">';
	exit;
  }
else {
	echo "Gagal simpan data anggota";
	exit;
}  

?>