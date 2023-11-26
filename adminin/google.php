<?php
// Include file gpconfig
include_once 'gpconfig.php';
error_reporting(E_ALL);
ini_set('display_errors', 10);
if(isset($_GET['code'])){
	$gclient->authenticate($_GET['code']);
	$_SESSION['token'] = $gclient->getAccessToken();
	header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gclient->setAccessToken($_SESSION['token']);
}

if ($gclient->getAccessToken()) {
	include 'koneksi.php';

	// Get user profile data from google
	$gpuserprofile = $google_oauthv2->userinfo->get();

	$nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google
	$email = $gpuserprofile['email']; // Ambil email Akun Google nya
	$poto = $gpuserprofile['picture']; // Ambil poto Akun Google nya

	// Buat query untuk mengecek apakah data user dengan email tersebut sudah ada atau belum
	// Jika ada, ambil id, username, dan nama dari user tersebut
	$sql = mysqli_query($connect, "SELECT id, username, nama, alamat, poto FROM user WHERE email='".$email."'");
	$user = mysqli_fetch_array($sql); // Ambil datanya dari hasil query tadi

	if(empty($user)){ // Jika User dengan email tersebut belum ada
		// Ambil username dari kata sebelum simbol @ pada email
		$ex = explode('@', $email); // Pisahkan berdasarkan "@"
		$username = $ex[0]; // Ambil kata pertama

		// Lakukan insert data user baru tanpa password
		mysqli_query($connect, "INSERT INTO user(username, nama, poto, email, alamat, koordinat, notelp, usertype, saldo_user) VALUES('".$username."', '".$nama."', '".$poto."', '".$email."', '".NULL."', '".NULL."', '".NULL."', '".NULL."', 0)");

		$id = mysqli_insert_id($connect); // Ambil id user yang baru saja di insert
	}else{
		$id = $user['id']; // Ambil id pada tabel user
		$alamat = $user['alamat']; // Ambil id pada tabel user
		$username = $user['username']; // Ambil username pada tabel user
		$nama = $user['nama']; // Ambil username pada tabel user
		$login = mysqli_query($connect,"select * from user where username='$username' and email='$email'");
		$data = mysqli_fetch_assoc($login);
	}
	if($data['usertype'] == "kasir"){
		// buat session login dan username
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $nama;
		$_SESSION['email'] = $email;
		$_SESSION['poto'] = $poto;
		$_SESSION['alamat'] = $alamat;
		$_SESSION['usertype'] = "kasir";
		// alihkan ke halaman dashboard admin
		header("location:berandakasir");

	}else if($data['usertype'] == "petugas"){
			// buat session login dan username
			$_SESSION['id'] = $id;
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $nama;
			$_SESSION['email'] = $email;
			$_SESSION['poto'] = $poto;
			$_SESSION['usertype'] = "petugas";
			// alihkan ke halaman dashboard admin
			header("location:beranda");}
	else if($data['usertype'] == ""){
			// buat session login dan username
			$_SESSION['id'] = $id;
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $nama;
			$_SESSION['email'] = $email;
			$_SESSION['poto'] = $poto;
			$_SESSION['usertype'] = "";
			// alihkan ke halaman dashboard admin
			header("location:berandauser");}
} else {
	$authUrl = $gclient->createAuthUrl();
	header("location: ".$authUrl);
}
?>
