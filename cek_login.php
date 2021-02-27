<?php 
	include 'koneksi.php';
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	$data = mysqli_query($koneksi,"select * from user where email = '$email' and password = '$password'") or die (mysqli_error($query));
	$row = mysqli_fetch_object($data);

	$cek = mysqli_num_rows($data);

	if ($cek > 0) {
		$username = $row->username;
		$user_id = $row->user_id;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['status'] = "login";
		if ($row->role_id == '3' || $row->role_id == '4') {
			header("location:dash_user.php");
		}
		else{
			header("location:login.php?pesan=gagal");
		}
	}
	else{
		header("location:login.php?pesan=gagal");
	}

 ?>