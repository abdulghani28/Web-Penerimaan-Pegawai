<?php 
include 'koneksi.php';

$id = $_GET['id'];
$nama_lengkap = $_POST['nama_lengkap'];
$nama_panggilan = $_POST['nama_panggilan'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
$kewarganegaraan = $_POST['warga'];
$hp = $_POST['hp'];
$ktp = $_POST['ktp'];
$pasfoto = $_POST['pasfoto'];

if (isset($_FILES['ktp']) && isset($_FILES['pasfoto'])) {
	$ktp = 'img/KTP/'.md5($id).'K.png';
	$pasfoto = 'img/PasFoto/'.md5($id).'P.png';
	move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp);
	move_uploaded_file($_FILES['pasfoto']['tmp_name'], $pasfoto);
	$query = mysqli_query($koneksi,"INSERT into form values (NULL,'$nama_lengkap','$nama_panggilan','$ttl','$alamat','$kewarganegaraan','$hp','$ktp','$pasfoto','0','0','$id')") or die(mysqli_error($koneksi));
}
else{
$query = mysqli_query($koneksi,"insert into form values (NULL,'$nama_lengkap','$nama_panggilan','$ttl','$alamat','$kewarganegaraan','$hp','','','0','$id')") or die(mysqli_error($koneksi));
}
header("location:login.php");	
 ?>