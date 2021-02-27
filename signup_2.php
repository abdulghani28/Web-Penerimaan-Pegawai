<?php 
include 'koneksi.php';
session_start();
if (empty($_SESSION['email'])) {
	header("location:login.php?pesan=belum_login");
}

$email = $_SESSION['email'];
$query = mysqli_query($koneksi,"select * from user where email = '$email'") or die(mysqli_error($koneksi));
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
<h2 style="margin-bottom: 30px; margin-top: -20px">Application Form</h2>
<div class="container col-10 bg-muted rounded">
	<div class="container col-8">
<table class="table" style="margin-top: 10px">
<form  method="POST" action="lanjut_signup_2.php?id=<?=$row->user_id?>"  enctype="multipart/form-data" class="form-group">
<div class="row">
	<div class="col-sm-6">
		<div class="row">
			Full Name
			: <input type="text" class="form-control" required name="nama_lengkap" >
			Nick Name
			: <input class="form-control" type="text" required name="nama_panggilan">
			Place and Date of Birth
			<input type="text" required class="form-control" name="ttl">
			Address
			: <input type="text" required name="alamat" class="form-control">
			Nationality
			: <input class="form-control" type="text" required name="warga">
			Phone Number
			: <input type="text" class="form-control" required name="hp">
	</div>
	</div>
	<div class="col-sm-6">
			Vacancies
			: 
				<select name="lowongan" required class="form-control">
					<option value="SQL Developer">SQL Developer</option>
					<option value="UI/UX Designer">UI/UX Designer</option>
					<option value="Web Developer">Web Developer</option>
					<option value="Android Developer">Android Developer</option>
					<option value="IT Support">IT Support</option>
					<option value="IT Tester Application">IT Tester Application</option>
				</select>
			KTP
			: <input type="file" name="ktp" accept="image/*" class="form-control">
			Photo
			: <input type="file" name="pasfoto" accept="image/*" class="form-control ">

			Last Text Scores Transcript
			: <input type="file" name="transkrip" accept="image/*" class="form-control">
			Last Certificate
			: <input type="file" name="ijazah" accept="image/*" class="form-control">
	</div>
<br>
<div class="container col-2">
		<input type="submit" name="submit"  class="form-control btn btn-warning text-light" style="margin-top: 30px" value="Submit">
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