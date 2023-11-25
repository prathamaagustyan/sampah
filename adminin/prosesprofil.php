<?php 
	session_start();
	error_reporting(0);
	?>

<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran
//menerima nilai dari kiriman form pendaftaran
$namae=$_POST["username"];
$jenis=$_POST["nama"];
$ttl=$_POST["email"];
$kelas=$_POST["alamat"];
$nis=$_POST["notelp"];
$alamat=$_POST["poto"];

$ekstensi =  array('png','jpg','docx','jpeg','[pdf]');
$filename = $_FILES['poto']['name'];
$ukuran = $_FILES['poto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profil?Peringatan=GAGAL!!!">';
}else{
	if($ukuran < 2044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['poto']['tmp_name'], 'poto/'.$filename);
	}else{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profil?Peringatan=Ukuran_Foto_Tidak_Sesuai!!!">';
	}
}

//Query input menginput data kedalam tabel anggota
$sql="update user set username='$namae',nama='$jenis',email='$ttl',alamat='$kelas',notelp='$nis',poto='$filename' where username='$_SESSION[username]'";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($connect,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil simpan data Murid";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profil">';
	exit;
  }
else {
	echo "Gagal simpan data Murid";
	exit;
}  

?>

