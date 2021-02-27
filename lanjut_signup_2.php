<?php 
include 'koneksi.php';
session_start();
if (empty($_SESSION['email'])) {
	header("location:login.php?pesan=belum_login");
}

$id = $_GET['id'];
$nama_lengkap = $_POST['nama_lengkap'];
$nama_panggilan = $_POST['nama_panggilan'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
$kewarganegaraan = $_POST['warga'];
$hp = $_POST['hp'];
$lowongan = $_POST['lowongan'];


$query = mysqli_query($koneksi,"INSERT INTO form VALUES (NULL,'$nama_lengkap','$nama_panggilan','$ttl','$alamat','$kewarganegaraan','$hp','$lowongan','','','','','0','0','$id')") or die(mysqli_error($koneksi));

if (!empty($_FILES['ktp']['name'])) {
	echo "KTP";
	$ktp = 'img/KTP/'.md5($id).'K.png';
	move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp);
	$query = mysqli_query($koneksi,"UPDATE form SET ktp = '$ktp' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
}

if (!empty($_FILES['pasfoto']['name'])) {
	echo "PASFOTO";
	$pasfoto = 'img/PasFoto/'.md5($id).'P.png';
	move_uploaded_file($_FILES['pasfoto']['tmp_name'], $pasfoto);
	$query = mysqli_query($koneksi,"UPDATE form SET pas_foto = '$pasfoto' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
}

if (!empty($_FILES['transkrip']['name'])) {
	echo "Transkrip";
	$transkrip = 'img/Transkrip/'.md5($id).'T.png';
	move_uploaded_file($_FILES['transkrip']['tmp_name'], $transkrip);
	$query = mysqli_query($koneksi,"UPDATE form SET transkrip = '$transkrip' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
}

if (!empty($_FILES['ijazah']['name'])) {
	echo "IJAZAH";
	$ijazah = 'img/Ijazah/'.md5($id).'I.png';
	move_uploaded_file($_FILES['ijazah']['tmp_name'], $ijazah);
	$query = mysqli_query($koneksi,"UPDATE form SET ijazah = '$ijazah' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
}
header("location:dash_user.php");	
 ?>