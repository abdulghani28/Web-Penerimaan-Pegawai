<?php 
include 'koneksi.php';
session_start();
if (empty($_SESSION['email'])) {
	header("location:login.php?pesan=belum_login");
}
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
  <section >

<div class="container col-10">
<h1 class="text-light text-center">Welcome</h1>

<?php 
$user_id = $_SESSION['user_id'];
$data = mysqli_query($koneksi,"select * from form where user_id = '$user_id'") or die (mysqli_error($query));
$row = mysqli_fetch_object($data);
$cek = mysqli_num_rows($data);?>
          <div class="team-member">
            <center>
              <?php if ($row->pas_foto != ""  ): ?>
                <img class="col-2 card border border-warning" src="<?= $row->pas_foto ?>">
              <?php endif ?>
            </center>
            <h4 class="text-white"><?=$_SESSION['username']?></h4>
          </div>
        </div>
<?php
if ($cek > 0) 
{
?>
<center><section class="text-center" style="margin-bottom: -150px;margin-top: -150px">
<?php 
  if(($row->acc_form == "0" && $row->acc_wawancara == "0") || ($row->acc_form == "1" && $row->acc_wawancara == "0")){
?>
	<a href="profile.php"><button class="btn btn-primary">Profile</button></a>
<?php
  }

?>
	<a href="detail.php"><button class="btn btn-success">Status</button></a>
<?php 
	if(($row->acc_form == "0" && $row->acc_wawancara == "0") || ($row->acc_form == "1" && $row->acc_wawancara == "0")){
?>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Cancel Registration
</button>
</section>
</center>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are You Sure ?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        You will lose your account
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="cancel.php"><button class="btn btn-success">Yes</button></a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>
<?php
	}
}
else
{
?>
<section style="margin-bottom: -150px; margin-top: -130px">
	<center><a href="signup_2.php"><button class="btn btn-primary text-center" style="margin-top: -100px">Registration</button></a></center>
</section>
<?php
}
?>
</div>
</section>
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