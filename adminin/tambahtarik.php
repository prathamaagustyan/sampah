<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('koneksi.php');

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

if (isset($_POST['simpan'])) {
    require_once("koneksi.php");

    $tanggal_tarik = $_POST['tanggal_tarik'];
    $username = $_POST['username'];
    $saldo = $_POST['saldo'];
    $tarik = $_POST['tarik'];
    $petugas = $_POST['petugas'];

    // Ambil saldo saat ini dari database
    $query_saldo = "SELECT saldo_user FROM user WHERE username = ?";
    $stmt_saldo = mysqli_prepare($connect, $query_saldo);
    mysqli_stmt_bind_param($stmt_saldo, "s", $username);
    mysqli_stmt_execute($stmt_saldo);
    mysqli_stmt_bind_result($stmt_saldo, $saldo_sekarang);
    mysqli_stmt_fetch($stmt_saldo);
    mysqli_stmt_close($stmt_saldo);

    // Periksa apakah saldo mencukupi untuk penarikan
    if ($saldo_sekarang >= $tarik) {
        $saldo_setelah_tarik = $saldo_sekarang - $tarik;

        // Gunakan prepared statement untuk menghindari SQL injection
        $query_update_saldo = "UPDATE user SET saldo_user = ? WHERE username = ?";
        $stmt_update_saldo = mysqli_prepare($connect, $query_update_saldo);
        mysqli_stmt_bind_param($stmt_update_saldo, "ss", $saldo_setelah_tarik, $username);
        $update_saldo_result = mysqli_stmt_execute($stmt_update_saldo);
        mysqli_stmt_close($stmt_update_saldo);

        if ($update_saldo_result) {
            // Simpan data penarikan ke dalam database
            $query_insert_penarikan = "INSERT INTO penarikan (tanggal_tarik, username, saldo, tarik, petugas) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert_penarikan = mysqli_prepare($connect, $query_insert_penarikan);
            mysqli_stmt_bind_param($stmt_insert_penarikan, "sssss", $tanggal_tarik, $username, $saldo, $tarik, $petugas);
            $insert_penarikan_result = mysqli_stmt_execute($stmt_insert_penarikan);
            mysqli_stmt_close($stmt_insert_penarikan);

            if ($insert_penarikan_result) {
                // Periksa apakah sudah ada saldo pada tanggal tersebut
                $query_check_saldo = "SELECT * FROM saldo WHERE tanggal_saldo = ? AND username = ?";
                $stmt_check_saldo = mysqli_prepare($connect, $query_check_saldo);
                mysqli_stmt_bind_param($stmt_check_saldo, "ss", $tanggal_tarik, $username);
                mysqli_stmt_execute($stmt_check_saldo);
                $result_check_saldo = mysqli_stmt_get_result($stmt_check_saldo);

                if (mysqli_num_rows($result_check_saldo) > 0) {
                    // Jika sudah ada saldo pada tanggal tersebut, lakukan update
                    $query_update_saldo = "UPDATE saldo SET saldo_keluar = saldo_keluar + ? WHERE tanggal_saldo = ? AND username = ?";
                    $stmt_update_saldo = mysqli_prepare($connect, $query_update_saldo);
                    mysqli_stmt_bind_param($stmt_update_saldo, "sss", $tarik, $tanggal_tarik, $username);
                    mysqli_stmt_execute($stmt_update_saldo);
                    mysqli_stmt_close($stmt_update_saldo);
                } else {
                    // Jika belum ada saldo pada tanggal tersebut, lakukan insert
                    $query_insert_saldo = "INSERT INTO saldo (tanggal_saldo, username, saldo_keluar, saldo_masuk) VALUES (?, ?, ?, 0)";
                    $stmt_insert_saldo = mysqli_prepare($connect, $query_insert_saldo);
                    mysqli_stmt_bind_param($stmt_insert_saldo, "sss", $tanggal_tarik, $username, $tarik);
                    mysqli_stmt_execute($stmt_insert_saldo);
                    mysqli_stmt_close($stmt_insert_saldo);
                }

                echo "<script>alert('Selamat berhasil input data!')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/sampah/adminin/tambahtarik'>";
            } else {
                $msg = "Failed to update status in the first table.";
                echo "<script>alert('$msg')</script>";
            }
        } else {
            echo "Gagal mengupdate saldo.";
        }
    } else {
        echo "<script>alert('Saldo tidak mencukupi untuk penarikan ini. !')</script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
      <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">

function cek_data() {
   var x=daftar_user.tanggal_tarik.value;
   
   if(x==""){
      alert("Maaf harap input tanggal tarik!");
      daftar_user.tanggal_tarik.focus(); 
      return false;
   }
    var p=daftar_user.nin.value;
    if (p =="p"){
      alert("Maaf harap input nomor induk nasabah!");
      return (false);
   }
   var x=daftar_user.saldo.value;

   if(x==""){
      alert("Maaf saldo Anda masih kosong!");
      daftar_user.saldo.focus(); 
      return false;
   }
   var x=daftar_user.jumlah_tarik.value;
   var angka = /^[0-9]+$/;

   if(x==""){
      alert("Maaf harap input jumlah penarikan!");
      daftar_user.jumlah_tarik.focus(); 
      return false;
   }
   if(!x.match(angka)){
      alert ("Maaf jumlah tarik harus di input angka!");
      daftar_user.jumlah_tarik.focus();
      return false;
   }else{
  confirm("Apakah Anda yakin sudah input data dengan benar?");
  }
   return true;
}


$(document).ready(function() {
    $('#username').on('change', function() {
        var username = $(this).val();
        if (username !== 'p') {
            $.ajax({
                type: 'POST',
                url: 'get_saldo.php', // Ganti dengan file PHP yang mengambil saldo dari database
                data: { username: username },
                success: function(response) {
                    $('#saldo').val(response);
                }
            });
        } else {
            $('#saldo').val('');
        }
    });
});


</script>
</head>

<body>

    <div class="container-scroller">
        <?php include 'navbar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <?php include 'sidebar.php';?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['username']; ?></h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                            class="text-primary">3 unread alerts!</span></h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuDate2">
                                                <a class="dropdown-item" href="#">January - March</a>
                                                <a class="dropdown-item" href="#">March - June</a>
                                                <a class="dropdown-item" href="#">June - August</a>
                                                <a class="dropdown-item" href="#">August - November</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Tarik</h4>
                                <p class="card-description">
                                    Form untuk tambah data tarikan
                                </p>
                                <form class="forms-sample" id="daftar_user" name='autoSumForm' action="" method="post" onsubmit="return cek_data()">
                                    <div class="form-group">
                                    <label for="exampleInputEmail3">Tanggal Penarikan</label>
                                        <input type="date" name="tanggal_tarik" class="form-control"
                                            placeholder="Contoh: Botol Plastik">
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="hidden" name="username" class="form-control"
                                            placeholder="Contoh: Botol Plastik"
                                            value="<?php echo $_SESSION['username'];?>">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Nama Sampah</label>
                                        <!-- <input type="text" name="nama_sampah" class="form-control"
                                            id="exampleInputEmail3" placeholder="Contoh: Botol Plastik"> -->
                                        <select class="js-example-basic-single w-100" name="username" id="username">
                                            <option value="p">---Pilih Username---</option>
                                            <?php 
            $query = mysqli_query($connect, "SELECT * FROM user where usertype=''");
            while ($row = mysqli_fetch_array($query)) {
              echo '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
            }
          ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Saldo User</label>
                                        <input type="text" placeholder="Otomatis terisi" style="cursor: not-allowed;" name="saldo" class="form-control saldo" id="saldo" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Jumlah Penarikan</label>
                                        <input type="text" class="form-control" placeholder="Masukan jumlah tarik" name="tarik" >
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail3">Username Petugas</label>
                                        <input type="text" class="form-control" style="cursor: not-allowed;" name="petugas" value="<?php echo $_SESSION["username"]; ?>" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2" name="simpan">Submit</button>
                                    <!-- <button class="btn btn-light">Cancel</button> -->
                                </form>
                                <script type="text/javascript">    
          <?php echo $jsArray; ?>  
          function changeValue(nama_sampah){
          console.log(dtsampah);  
          document.getElementById('harga_sampah').value = dtsampah[nama_sampah]['harga_sampah'];
          sum();  
          };

          function sum() {
          var txtFirstNumberValue = document.getElementById('berat').value;
          var txtSecondNumberValue = document.getElementById('harga_sampah').value;
          var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
          if (!isNaN(result)) {
             document.getElementById('total_harga').value = result;
          }
          }  

           </script>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                    template</a> from BootstrapDash. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                                with <i class="ti-heart text-danger ml-1"></i></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="vendors/chart.js/Chart.min.js"></script>
        <script src="vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="js/dataTables.select.min.js"></script>
        <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="js/dashboard.js"></script>
        <script src="js/Chart.roundedBarCharts.js"></script>
        <script src="js/select2.js"></script>
        <!-- End custom js for this page-->
</body>

</html>