<?php
  error_reporting(0);
  session_start();

  if(isset($_POST['submit']) ) {
    $nama       = $_POST['nama'];
    $asal_sekolah   = $_POST['asal_sekolah'];
    $alamat     = $_POST['alamat'];
    $jkel       = $_POST['jkel'];
    $agama      = $_POST['agama'];

    if(empty($nama) || empty($asal_sekolah) || empty($alamat) || empty($jkel) || empty($agama)) {
      $_SESSION['nama_old'] = $nama;
      $_SESSION['asal_sekolah_old'] = $asal_sekolah;
      $_SESSION['alamat_old'] = $alamat;
      $_SESSION['jkel_old'] = $jkel;
      $_SESSION['agama_old'] = $agama;
      $_SESSION['status'] = 'error';
      $_SESSION['pesan'] = 'Semua kolom wajib diisi!';
          header('location:index.php');
    } else {
      include 'koneksi.php';
        $query  = mysqli_query($koneksi, "insert into pendaftar (nama, alamat, jkel, agama, asal_sekolah) values('$nama', '$alamat', '$jkel', '$agama', '$asal_sekolah') ");
        if ($query) {
            $_SESSION['status'] = 'success';
            $_SESSION['pesan'] = 'Berhasil Menambah Data';
            // header('location:admin.php');
            header('location:index.php');
        } else { 
          $_SESSION['status'] = 'error';
          $_SESSION['pesan'] = 'Gagal Menambah Data!';
            header('location:index.php');
      }
    }
  } else {
    session_destroy();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran App - Daftar</title>
  
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Pendaftaran App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Navbar kiri -->
    <ul class="navbar navbar-nav mr-auto" >
   </ul>
    <!-- End navbar kiri -->

  <!-- navbar kanan -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="#" >Pendaftaran</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="admin.php" >Admin Panel</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container col-md-8">
    <h1 class="display-4">Pendaftaran App</h1>
    <p class="lead">Masukkan data diri Anda :</p>
<br>
<?php
 if (isset($_SESSION['status']) && $_SESSION['status'] == 'success') {
  ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['pesan']; ?>
  </div>
  <?php
 } 
  if (isset($_SESSION['status']) && $_SESSION['status'] == 'error'){
  ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $_SESSION['pesan']; ?>
  </div>
  <?php
 }
?>
<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama : </label>
    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php if(isset($_SESSION['nama_old'])) echo $_SESSION['nama_old']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat : </label>
    <textarea class="form-control" rows="2" name="alamat"><?php if(isset($_SESSION['alamat_old'])) echo $_SESSION['alamat_old']; ?> </textarea>
  </div>
  <div class="row">
    <div class="col-md-6">
  <div class="form-group"> 
    <label for="exampleFormControlSelect1">Jenis Kelamin : </label><br>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" checked
  <?php if(isset($_SESSION['jkel_old']) &&  $_SESSION['jkel_old'] == 'L') echo "checked"; ?> name="jkel" id="inlineRadio1" value="L">
  <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" 
  <?php if(isset($_SESSION['jkel_old']) && $_SESSION['jkel_old'] == 'P') echo "checked"; ?> name="jkel" id="inlineRadio2"  value="P"
   >
  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
</div>
</div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama">
      <option value="islam" <?php if(isset($_SESSION['agama']) && $_SESSION['agama_old'] == 'islam') echo "selected"; ?> >Islam</option>
      <option value="protestan" <?php if(isset($_SESSION['agama']) && $_SESSION['agama_old'] == 'protestan') echo "selected"; ?>>Kristen Protestan</option>
      <option value="katolik" <?php if(isset($_SESSION['agama']) && $_SESSION['agama_old'] == 'katolik') echo "selected"; ?>>Kristen Katolik</option>
      <option value="buddha" <?php if(isset($_SESSION['agama']) && $_SESSION['agama_old'] == 'buddha') echo "selected"; ?>>Buddha</option>
      <option value="hindu" <?php if(isset($_SESSION['agama']) && $_SESSION['agama_old'] == 'hindu') echo "selected"; ?>>Hindu</option>
      <option value="kong hu cu" <?php if(isset($_SESSION['agama']) && $_SESSION['agama_old'] == 'kong hu cu') echo "selected"; ?>>Kong Hu Cu</option>
    </select>
  </div>
  </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Asal Sekolah : </label>
    <input type="text" class="form-control" placeholder="Smkn 1 Bone" name="asal_sekolah" value="<?php if(isset($_SESSION['asal_sekolah_old'])) echo $_SESSION['asal_sekolah_old']; ?>">
  </div>
  <div class="form-group">
    <input type="submit" name="submit" class="form-control btn btn-outline-primary" value="Daftar">
  </div>
</form>
</div>


</div>

</body>
</html>