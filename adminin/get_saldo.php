<?php
include('koneksi.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $query = mysqli_query($connect, "SELECT saldo_user FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($query);
    $saldo = $row['saldo_user'];

    echo $saldo;
}
?>
