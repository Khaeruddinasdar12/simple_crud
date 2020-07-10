<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST')
  header('location:index.php');

require 'koneksi.php'; 
session_start();
$id = $_POST["id"];

  $query = mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id='$id' ");

  if ($query) {
		      	$_SESSION['status'] = 'success';
		      	$_SESSION['pesan'] = 'Berhasil Menghapus Data';
		      	header('location:admin.php');
		    } else { 
		    	$_SESSION['status'] = 'error';
		    	$_SESSION['pesan'] = 'Gagal Menghapus Data!';
		      	header('location:admin.php');
			}?>
?>