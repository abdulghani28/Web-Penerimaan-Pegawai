<?php 
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];

$query1 = mysqli_query($koneksi,"INSERT into user values (NULL,'$email','$password','$username','4')") or die(mysqli_error($koneksi));
header("location:login.php");	

 ?>