<?php 
  require 'koneksi.php'; 
  error_reporting(0);
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pendaftaran App - Admin</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!-- <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->
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
        <a class="nav-link" href="index.php" >Pendaftaran</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="#" >Admin Panel</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container col-md-10">
  <br>
  <a href="index.php"><button class="btn btn-outline-primary btn-sm">+ Tambah data</button></a>
  <br>
  <br>
  <?php
 if ($_SESSION['status'] == 'success') {
  ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['pesan']; ?>
  </div>
  <?php
 } 
  if ($_SESSION['status'] == 'error'){
  ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $_SESSION['pesan']; ?>
  </div>
  <?php
 } else {
    session_destroy();
 }
?>

  <div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Agama</th>
      <th scope="col">Sekolah Asal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    $query = mysqli_query($koneksi, "select * from pendaftar");
    while ($value = mysqli_fetch_assoc($query)) {
    
  ?>
    <tr>
      <th scope="row"> <?php echo $no++; ?> </th>
      <td> <?php echo $value['nama']; ?> </td>
      <td> <?php echo $value['alamat']; ?> </td>
      <td> <?php echo $value['jkel']; ?> </td>
      <td> <?php echo $value['agama']; ?> </td>
      <td> <?php echo $value['asal_sekolah']; ?> </td>
      <td><div class="row">
          <form method="post" action="edit.php"> 
            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
            <button type="submit" class="btn btn-outline-info btn-sm">Edit</button>
          </form> 
          <form method="post" action="hapus.php" onsubmit="return confirm('Yakin menghapus data ?');"> 
            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
            <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
          </form>
          </div>
      </td>
    </tr>
    <tr>
    <?php
      } 
    ?>
  </tbody>
</table>
</div>

</div>


</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>