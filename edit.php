<?php 
if ($_SERVER['REQUEST_METHOD'] != 'POST')
  header('location:index.php');
require 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran App - Edit</title>
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
        <a class="nav-link " href="admin.php" >Admin Panel</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container col-md-8">
	<br>
  <?php 

    $query = mysqli_query($koneksi, "select * from pendaftar where id = '$_POST[id]' "); 
    $value = mysqli_fetch_assoc($query);
    // print_r($value);
  ?>
<form action="editSubmit.php" method="post">
  <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama : </label>
    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $value['nama']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat : </label>
    <textarea class="form-control" rows="2" name="alamat"><?php echo $value['alamat']; ?></textarea>
  </div>
  <div class="row">
    <div class="col-md-6">
  <div class="form-group"> 
    <label for="exampleFormControlSelect1">Jenis Kelamin : </label><br>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jkel" id="inlineRadio1" value="L" <?php if($value['jkel'] == 'L') echo "checked"; ?> >
  <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jkel" id="inlineRadio2" value="P" <?php if($value['jkel'] == 'P') echo "checked"; ?> >
  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
</div>
</div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama">
      <option value="islam" <?php if($value['agama'] == 'islam') echo "selected"; ?> >Islam</option>
      <option value="protestan" <?php if($value['agama'] == 'protestan') echo "selected"; ?>>Kristen Protestan</option>
      <option value="katolik" <?php if($value['agama'] == 'katolik') echo "selected"; ?>>Kristen Katolik</option>
      <option value="buddha" <?php if($value['agama'] == 'buddha') echo "selected"; ?>>Buddha</option>
      <option value="hindu" <?php if($value['agama'] == 'hindu') echo "selected"; ?>>Hindu</option>
      <option value="kong hu cu" <?php if($value['agama'] == 'kong hu cu') echo "selected"; ?>>Kong Hu Cu</option>
    </select>
  </div>
  </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Asal Sekolah : </label>
    <input type="text" class="form-control" placeholder="Smkn 1 Bone" value="<?php echo $value['asal_sekolah']; ?>" name="asal_sekolah">
  </div>
  <div class="form-group">
    <input type="submit" name="submit" class="form-control btn btn-outline-primary" value="+ Update"> 
  </div>
</form>
</div>


</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>