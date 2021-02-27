<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>IT Corporation</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="css/agency.min.css" rel="stylesheet">
</head>
<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-link">
            <button class="btn btn-outline-warning btn-sm"><a class="nav-link js-scroll-trigger" href="login_admin.php"> Login as Admin</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <header class="masthead">
      <div class="intro-text" style="margin-top:-100px">
<center>
<h1>LOGIN</h1>
	<?php 
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") { echo "Login gagal! Username dan password salah!"; }
		else if ($_GET['pesan'] == "logout") { echo "Anda telah berhasil logout."; }
		else if ($_GET['pesan'] == "belum_login") { echo "Anda harus login untuk mengakses halaman selanjutnya!"; }
		else if ($_GET['pesan'] == "hapus") { echo "Akun anda berhasil dihapus"; } } ?>
	<div class="container col-5">
<table class="table">
	<form method="POST" action="cek_login.php">
		<tr>
			<td>
			    <label for="exampleInputEmail1" class="text-light">Email address</label>
    			<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			</td>
		</tr>  
  	<tr>
			<td>
			    <label for="exampleInputPassword1" class="text-light">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</td>
		</tr>
  <tr>
  	<td>
		<button type="submit" class="btn btn-primary">Login</button>
	  <a href="index.php"><button class="btn btn-info">Back</button></a>
    </td>
  </tr>
</form>
</table>
  <a class="text-center" href="signup_1.php">Don't Have an Account ?</a>
</div>
</center>


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