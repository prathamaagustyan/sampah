<?php 
// mengaktifkan session pada php
session_start();
error_reporting(0);
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['usertype']=="user"){
	// buat session login dan username
	        $_SESSION['id'] = $id;
			$_SESSION['username'] = $username;
			$_SESSION['namalengkap'] = $nama;
			$_SESSION['email'] = $email;
			$_SESSION['poto'] = $poto;
			$_SESSION['usertype'] = "";
	// alihkan ke halaman dashboard admin
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=berandauser">';

	}else{
	
 
		// alihkan ke halaman login kembali
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index">';
	}	
}else{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index">';
}
 
?>