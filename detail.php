<?php 
include 'koneksi.php';
session_start();
if (empty($_SESSION['email'])) {
	header("location:login.php?pesan=belum_login");
}
$user_id = $_SESSION['user_id'];

$query = mysqli_query($koneksi,"SELECT * FROM form JOIN user ON form.user_id = user.user_id WHERE user.user_id = '$user_id'") or die (mysqli_error($koneksi));
$row = mysqli_fetch_object($query);
if ($row->acc_form == "1" && $row->acc_wawancara == "0") 
{
	$query = mysqli_query($koneksi,"SELECT * FROM ((form JOIN user ON form.user_id = user.user_id) JOIN wawancara ON form.user_id = wawancara.user_id) WHERE user.user_id = '$user_id'") or die (mysqli_error($koneksi));
	$row = mysqli_fetch_object($query);
}
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
	<div  style="background-size:cover; background-image: url('img/header-bg.jpg');">

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
  <div class="container col-9">
  <section>
	<h2 align="center" class="text-light"> Status </h2>
	<div class="row" style="margin: 20px">
		<div class="col-2 card border border-warning rounded"style=" background-color:rgba(100,100,100,0.5);border-radius: 50px;">
			<div style="margin-top: 10px; margin-bottom: 7px;">
				<img align="left" src="<?= $row->pas_foto ?>" width="180px" class="card-img-top">
			</div>
			<div class="text-left text-light">Username :</div> 
			<div style="font-size: 14px" class="text-left text-light"><?= $row->username ?></div>
			<div class="text-left text-light">E-Mail : </div>
			<div style="font-size: 11px" class="text-left text-light"> <?= $row->email ?></div>
		</div>
		<div class="col-10 text-left">
			<table class="table text-light" >
				<tr>
					<td>Full Name</td>
					<td>: <?= $row->nama_lengkap ?></td>
				</tr>
				<tr>
					<td>Nama Panggilan</td>
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
		<?php 
			if ($row->acc_form == "1" && $row->acc_wawancara == "0") 
			{
		?>
				<tr>
					<td>Interview's Location</td>
					<td>: <?= $row->lokasi ?></td>
				</tr>
				<tr>
					<td>Interview's Time</td>
					<td>: <?= $row->waktu ?></td>
				</tr>
		<?php
			}
		?>

		<tr>
			<?php
			if ($cek == 11) {
			 	
				if ($row->acc_form == "0" && $row->acc_wawancara == "0") {
			?>
				<td colspan="3" style="background: #696969; color: #ffffff; padding: 10px;" align="center"> PENDING </td>
			<?php
				}
				elseif ($row->acc_form == "1" && $row->acc_wawancara == "0") {
			?>
				<td colspan="3" style="background: #696969; color: #ffffff; padding: 10px;" align="center"> WAITING FOR INTERVIEW </td>
			<?php
				}
				elseif($row->acc_form == "1" && $row->acc_wawancara == "1"){
			?>
				<td colspan="3" style="background: #67c767; color: #ffffff; padding: 10px;" align="center"> ACCEPTED </td>
			<?php	
				}
				elseif ($row->acc_form == "2") {
			?>
				<td colspan="3" style="background: #ed4242; color: #ffffff; padding: 10px;" align="center"> DECLINED </td>
			<?php
				}
				elseif ($row->acc_form == "2" && $row->acc_wawancara == "2") {
			?>
				<td colspan="3" style="background: #ed4242; color: #ffffff; padding: 10px;" align="center"> DECLINED </td>
			<?php
				}
				elseif ($row->acc_form == "1" && $row->acc_wawancara == "2") {
			?>
				<td colspan="3" style="background: #ed4242; color: #ffffff; padding: 10px;" align="center"> DECLINED </td>
			<?php
				}
				else {
			?>
				<td colspan="3" style="background: #dbb344; color: #ffffff; padding: 10px;" align="center"> Profile Not Complete </td>
			<?php
				}
			}
			?>
		</tr>
	</table>
</div>
	<div class="container col-8">
		<a class="text-left" href="dash_user.php"><button class="btn btn-info">Back</button></a>
	</div>
	</div>
	</section>
	</div>
</div>
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
    <div class="container-fluid bg-light">
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