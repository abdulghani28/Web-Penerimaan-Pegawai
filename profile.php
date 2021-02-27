<?php 
include 'koneksi.php';
session_start();
if (empty($_SESSION['email'])) {
	header("location:login.php?pesan=belum_login");
}
$user_id = $_SESSION['user_id'];
$query = mysqli_query($koneksi,"SELECT * FROM form JOIN user ON form.user_id = user.user_id WHERE form.user_id = '$user_id'") or die (mysqli_error($koneksi));
$row = mysqli_fetch_object($query);
$cek = 0;
if ($row->nama_lengkap != "") { $cek++; }
if ($row->nama_panggilan != "") { $cek++; }
if ($row->ttl != "") { $cek++; }
if ($row->alamat != "") { $cek++; }
if ($row->kewarganegaraan != "") { $cek++; }
if ($row->no_hp != "") { $cek++; }
if ($row->lowongan != "") { $cek++; }
if ($row->ktp != "") { $cek++; }
if ($row->pas_foto != "") { $cek++; }
if ($row->transkrip != "") { $cek++; }
if ($row->ijazah != "") { $cek++; }
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
      <div class="intro-text" style="margin-top:-200px">
      	<div class="container col-7">
	<h2 align="center"> Profile </h2>
	<?php 
		if ($cek < 11) {
	?>
			<h5 align="left">Please Complete Your Profile to Continue Registration</h5>
	<?php
		}
	?>
	<div class="row" style="margin: 20px">
		<div class="col-3 card border border-warning rounded" style=" background-color:rgba(100,100,100,0.5);border-radius: 50px;">
			<div style="margin-top: 10px; margin-bottom: 7px;">
				<img align="left" src="<?= $row->pas_foto ?>" width="180px" class="card-img-top">
			</div>
			<div class="text-left">Username :</div> 
			<div style="font-size: 14px" class="text-left"><?= $row->username ?></div>
			<div class="text-left">E-Mail : </div>
			<div style="font-size: 11px" class="text-left"> <?= $row->email ?></div>
		</div>
		<div class="col-9 text-left">
			<table class="table text-light">
				<tr>
					<td>Full Name</td>
					<td>: <?= $row->nama_lengkap ?></td>
				</tr>
				<tr>
					<td>Nick Name</td>
					<td>: <?= $row->nama_panggilan ?></td>
				</tr>
				<tr>
					<td>Place and Date of Birth</td>
					<td>: <?= $row->ttl ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>: <?= $row->alamat ?></td>
				</tr>
				<tr>
					<td>Nationality</td>
					<td>: <?= $row->kewarganegaraan ?></td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td>: <?= $row->no_hp ?></td>
				</tr>
				<tr>
					<td>Selected Vacancies</td>
					<td>: <?= $row->lowongan ?></td>
				</tr>
				<tr>
					<td>KTP</td>
					<td> 
						<?php 
							if ($row->ktp != NULL){
						?>
							<h5 class="badge badge-success text-wrap">✓</h5>
						<?php 
							}
							else{
						?>
							<h5 class=" badge badge-danger text-wrap">x</h5>
						<?php 	
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Photo</td>
					<td> 
						<?php 
							if ($row->pas_foto != NULL){
						?>
							<h5 class="badge badge-success text-wrap">✓</h5>
						<?php 
							}
							else{
						?>
							<h5 class=" badge badge-danger text-wrap">x</h5>
						<?php 	
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Transcript</td>
					<td> 
						<?php 
							if ($row->transkrip != NULL){
						?>
							<h5 class="badge badge-success text-wrap">✓</h5>
						<?php 
							}
							else{
						?>
							<h5 class=" badge badge-danger text-wrap">x</h5>
						<?php 	
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Certificate</td>
					<td> 
						<?php 
							if ($row->ijazah != NULL){
						?>
							<h5 class="badge badge-success text-wrap">✓</h5>
						<?php 
							}
							else{
						?>
							<h5 class=" badge badge-danger text-wrap">x</h5>
						<?php 	
							}
						?>
					</td>
				</tr>
				<tr></tr>
				<tr>
				</tr>
			</table>
		</div>
	</div>
	<div class="container col-6 text-left">
		<span>
			<a href="edit_profile.php"><button class="btn btn-info" style="margin-top: 5px;">Edit</button></a></span>
			<span>
			<a href="dash_user.php"><button class="btn btn-danger" style="margin-top:5px">Back</button></a></span>
	</div>
</div>
    </div>
  </header>

<?php 

?>

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
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</html>