<?php 
include 'koneksi.php';
session_start();
if (empty($_SESSION['email'])) {
	header("location:login.php?pesan=belum_login");
}

$user_id = $_SESSION['user_id'];
$query = mysqli_query($koneksi,"DELETE FROM form WHERE user_id = '$user_id'") or die (mysqli_error($koneksi));
$query1 = mysqli_query($koneksi,"DELETE FROM user WHERE user_id = '$user_id'") or die (mysqli_error($koneksi));

header("location:logout.php?pesan=hapus");
?>