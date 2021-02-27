<?php 

	session_start();
	session_destroy();
	$pesan = $_GET['pesan'];
	if ($pesan == "hapus") {
		header("location:login.php?pesan=hapus");
	}
	else{
		header("location:login.php?pesan=logout");
	}
 ?>