<?php 
include 'koneksi.php';
session_start();
if (empty($_SESSION['email'])) {
	header("location:login.php?pesan=belum_login");
}
$user_id = $_SESSION['user_id'];
$query = mysqli_query($koneksi,"SELECT * FROM form JOIN user ON form.user_id = user.user_id WHERE form.user_id = '$user_id'") or die (mysqli_error($koneksi));
$row = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IT Corporation</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">
</head>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="dash_user.php">Dashboard</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-link">
            <button class="btn btn-outline-warning btn-sm"><a class="nav-link js-scroll-trigger" href="logout.php"> Log Out</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<header class="masthead">
		<br><br><br><br><br><br>
<h2 style="margin-bottom: 30px; margin-top: -20px">Edit Form</h2>
<div class="container col-10 bg-muted rounded">
	<div class="container col-8">
<table class="table" style="margin-top: 10px">
<form  method="POST" action="update_profile.php"  enctype="multipart/form-data" class="form-group">
<div class="row">
	<div class="col-sm-6">
		<div class="row">
			Username
			: <input type="text" class="form-control" disabled name="username" value="<?= $row->username ?>">
			
		
			E-Mail
			: <input type="text" class="form-control" disabled name="email" value="<?= $row->email ?>" >
			
		
			Full Name
			: <input type="text" class="form-control" name="nama_lengkap" value="<?= $row->nama_lengkap ?>">
			
		
			Nick Name
			: <input type="text" name="nama_panggilan" class="form-control" value="<?= $row->nama_panggilan ?>">
			
		
			Place and Date of Birth
			: <input type="text" class="form-control" name="ttl" value="<?= $row->ttl ?>">
			
		
			Address
			: <input type="text" class="form-control" name="alamat" value="<?= $row->alamat ?>">
			
		
			Nationality
			: <input type="text" class="form-control" name="warga" value="<?= $row->kewarganegaraan ?>">
			
		
			Phone Number
			: <input type="text" class="form-control" name="hp" value="<?= $row->no_hp ?>">
		</div>
	</div>
	<div class="col-sm-6" >
			
		
			Selected Vacancy
			: <input type="text" class="form-control" name="lowongan" disabled value="<?= $row->lowongan ?>">
			
		
				<?php 
					if ($row->ktp == NULL) {
				?>
					KTP
					: <input type="file" name="ktp" class="form-control" accept="image/*">
				<?php
					}
					else{
				?>
					KTP
					: KTP Sudah Di Upload <br><input type="file" name="ktp" class="form-control" accept="image/*">
				<?php
					}
				?>
			
		
				<?php 
					if ($row->pas_foto == NULL) {
				?>
					Photo
					: <input type="file" name="pasfoto" class="form-control" accept="image/*">
				<?php
					}
					else{
				?>
					Photo
					: Photo has been uploaded <br><input type="file" class="form-control" name="pasfoto" accept="image/*">
				<?php
					}
				?>
			
		
				<?php 
					if ($row->transkrip == NULL) {
				?>
					Transcript
					: <input type="file" name="transkrip" class="form-control" accept="image/*">
				<?php
					}
					else{
				?>
					Transcript
					: Transcript has been uploaded <br><input type="file" class="form-control" name="transkrip" accept="image/*">
				<?php
					}
				?>
			
		
				<?php 
					if ($row->ijazah == NULL) {
				?>
					Certificate
					: <input type="file" name="ijazah" class="form-control" accept="image/*">
				<?php
					}
					else{
				?>
					Certificate
					: Certificate has been uploaded <br><input type="file" class="form-control" name="ijazah" accept="image/*">
				<?php
					}
				?>
			</div>
			<br>
			<div class="container col-2">
			<input type="Submit" name="submit" class="form-control btn btn-warning text-light" style="margin-top: 30px" value="Edit">
		</div>
	</form>			
		</table>
      </div>
    </div>
    <br>
</div>
  </header>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>
  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; ITCorp 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#" class="text-dark">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#" class="text-dark">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</html>