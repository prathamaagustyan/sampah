<?php include('adminin/koneksi.php'); ?>
<?php
   session_start();
   error_reporting(0);
   include('adminin/koneksi.php');
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	header("location: index"); // Kita Redirect ke halaman index.php karena belum login
}
if (isset($_POST['simpan'])) {
    require_once("adminin/koneksi.php");
    // Loop through each card to process the form data
    foreach ($_POST['card'] as $id_sampah => $card) {
        $tanggal_setor = $card['tanggal_setor'];
        $username = $card['username'];
        $nama_sampah = $card['nama_sampah'];
        $berat = isset($card['berat']) ? $card['berat'] : 0;
        $harga_sampah = $card['harga_sampah'];
        $total_harga = isset($card['total_harga']) ? $card['total_harga'] : 0;
        $status = $card['status'];

        // Insert data to the database for the selected card
        if (!empty($berat) && !empty($total_harga)) {
        $query = "INSERT INTO setorkan(id_setor,tanggal_setor,username,nama_sampah,berat,harga_sampah,total_harga,status) 
                  VALUE (NULL,'$tanggal_setor','$username','$nama_sampah','$berat','$harga_sampah','$total_harga','$status')";
        $queryact = mysqli_query($connect, $query);
    }
}
  
    echo "<script>alert('Selamat berhasil input data!')</script>";
  
    echo "<meta http-equiv='refresh'
     content='0; url=http://localhost/sampah/testkan.php'>";
  
   }
   ?>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f9f6f2;
    }

    .card-img-topp {
        border-radius: 40px;
        padding: 20px;
    }

    .card {
        border-radius: 30px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
    }

    .card-body {
        padding: 25px;
        margin-top: -15px;
    }

    .btn-primary {
        border-radius: 50px;
        width: 120px;
    }

    .btn-primary:hover {
        background-color: black;
        border: none;
    }

    h3,
    h5 {
        color: rgb(0, 91, 228);
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form class="forms-sample" method="post">
        <div class="container py-5">

            <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                <?php
$tampilPeg = mysqli_query($connect, "SELECT * FROM sampah");

// Check if there are rows in the result set
if (mysqli_num_rows($tampilPeg) > 0) {
    while ($peg = mysqli_fetch_array($tampilPeg)) {
?>
                <div class="col">
                    <div class="card">
                        <img src="images/fotosampah/gotongroyong5.jpeg" class="card-img-topp" alt="...">
                        <div class="card-body">
                            <input type="hidden" name="card[<?= $peg['id_sampah'] ?>][tanggal_setor]" class="form-control"
                                placeholder="Contoh: Botol Plastik" value="<?php echo date("Y-m-d");?>">
                            <input type="hidden" name="card[<?= $peg['id_sampah'] ?>][username]" class="form-control"
                                placeholder="Contoh: Botol Plastik" value="<?php echo $_SESSION['username'];?>">
                                <input type="hidden" name="card[<?= $peg['id_sampah'] ?>][nama_sampah]" value="<?= $peg['nama_sampah'] ?>">
                                    <input type="hidden" name="card[<?= $peg['id_sampah'] ?>][harga_sampah]" value="<?= $peg['harga_sampah'] ?>">
                            <h5 class="card-title"><?=$peg['nama_sampah']?></h5>
                            <p class="card-text">
                                <strong><?php echo "Rp. ".number_format($peg['harga_sampah'], 2, ",", ".")   ?></strong>
                            </p>
                            <input type="text" class="form-control" name="card[<?= $peg['id_sampah'] ?>][berat]" placeholder="Masukkan berat sampah"
                                oninput="updateTotalHarga(this, this.parentElement.querySelector('.total-harga'), <?= $peg['harga_sampah'] ?>)">
                            <br>
                            <input type="hidden" name="card[<?= $peg['id_sampah'] ?>][total_harga]" class="total-harga-input">
                            <h3 class="total-harga">Total: Rp. 0</h3>
                            <input type="hidden" name="card[<?= $peg['id_sampah'] ?>][status]" class="form-control" id="exampleInputEmail3"
                                            placeholder="Contoh: Botol Plastik" value="Belum di Verifikasi">
                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h3>
                            <button name="simpan" class="btn btn-primary">Setor</button>
                        </div>
                    </div>

                </div>
                <?php
    }
} else {
    echo "No data found";
}?>
            </div>

        </div>
    </form>
    <script>
        function hitungTotalHarga(berat, hargaPerKg) {
            var totalHarga = berat * hargaPerKg;
            return totalHarga.toFixed(0);
        }

        function updateTotalHarga(inputElement, totalHargaElement, hargaPerKg) {
            var berat = parseFloat(inputElement.value) || 0;
            var totalHarga = hitungTotalHarga(berat, hargaPerKg);
            // Format totalHarga as currency (Rp.)
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            totalHargaElement.innerText = 'Total: ' + formatter.format(totalHarga);

             // Update the hidden input field value
        var hiddenInput = inputElement.parentElement.querySelector('.total-harga-input');
        hiddenInput.value = totalHarga;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>