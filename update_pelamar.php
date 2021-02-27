<?php 
include 'koneksi.php';

$id = $_GET['id'];
$pesan = $_GET['pesan'];
$query = mysqli_query($koneksi,"SELECT * FROM form WHERE user_id = '$id'") or die (mysqli_error($koneksi));

if ($pesan == "terima_form") {
	$query = mysqli_query($koneksi,"UPDATE form SET acc_form = '1' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
	$query1 = mysqli_query($koneksi,"UPDATE user SET role_id = '3' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
	date_default_timezone_set('Asia/Jakarta');
	$tgl = date('Y/m/d 8:0:0');
	$tgl1 = date('Y/m/d H:i:s', strtotime($tgl . ' + ' . 4 . ' days '));
	$query2 = mysqli_query($koneksi, "INSERT INTO wawancara VALUES (NULL, 'Ruang Seminar Informatika UPN Veteran Yogyakarta Kampus 2', '$tgl1', '$id')")or die(mysqli_error($koneksi));
}
elseif ($pesan == "tolak_form") {
	$query = mysqli_query($koneksi,"UPDATE form SET acc_form = '2' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
}
elseif ($pesan == "terima_wawancara") {
	$query = mysqli_query($koneksi,"UPDATE form SET acc_wawancara = '1' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
}
elseif ($pesan == "tolak_wawancara") {
	$query = mysqli_query($koneksi,"UPDATE form SET acc_wawancara = '2' WHERE user_id = '$id'") or die(mysqli_error($koneksi));
}
header("location:dash_admin.php");
?>