<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST')
  header('location:index.php');

	session_start();
	require 'koneksi.php'; 
	if(isset($_POST['submit'])) {
		$id 			= $_POST['id'];
	  	$nama 			= $_POST['nama'];
		$asal_sekolah 	= $_POST['asal_sekolah'];
		$alamat 		= $_POST['alamat'];
		$jkel 			= $_POST['jkel'];
		$agama 			= $_POST['agama'];

		  	$query  = mysqli_query($koneksi, "update pendaftar set nama='$nama', asal_sekolah='$asal_sekolah', alamat='$alamat', jkel='$jkel', agama='$agama' where id ='$id' ");
		    if ($query) {
		      	$_SESSION['status'] = 'success';
		      	$_SESSION['pesan'] = 'Berhasil Mengubah Data';
		      	header('location:admin.php');
		    } else { 
		    	$_SESSION['status'] = 'error';
		    	$_SESSION['pesan'] = 'Gagal Mengubah Data!';
		      	header('location:admin.php');
			}
	}
?>