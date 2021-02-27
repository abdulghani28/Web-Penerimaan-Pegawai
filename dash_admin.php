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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="dash_admin.php">Dashboard</a>
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

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
<section style="margin-top: -300px">
<div class="container text-left">
<?php 
print "<h5>Hi, ".$_SESSION['username']."</h5>";
$username = $_SESSION['username'];
$query = mysqli_query($koneksi,"SELECT * FROM form JOIN user ON form.user_id = user.user_id") or die (mysqli_error($koneksi));
 ?>
 </div>
  <h2 class="text-center">Dashboard Admin</h2>
 <div class="container col-10" style="margin-top: -80px">
</section>
  <div class="container col-3">
<center>
  <input type="text" id="input" class="form-control border-warning text-light" style="background-color:rgba(20,20,20,0.5)" placeholder="Search..."></div><br><br><br>
  <table class=" table table-dark  border border-warning rounded text-left table-hover" style="  margin-top: -50px; margin-bottom: 50px;background-color:rgba(20,20,20,0.5);border-radius: 50px">
  	<thead class="bg-dark" >
      <tr>
    		<th class="border border-warning rounded">No</th>
    		<th class="border border-warning rounded">Username</th>
    		<th class="border border-warning rounded">Applicant's Name</th>
        <th class="border border-warning rounded">Option</th>
        <th class="border border-warning rounded">Status</th>
  	  </tr>
    </thead>

  	<?php 
  		$i = 1;
  		while($row = mysqli_fetch_object($query)) { 
  	?>
    <tbody id="table">
  		<tr class="border border-warning rounded">
  			<td class="border border-warning rounded"> <?= $i ?> </td>
  			<td class="border border-warning rounded"><?= $row->username ?></td>
  			<td class="border border-warning rounded"><?= $row->nama_lengkap ?></td>
  			<td align="center" class="border border-warning rounded">
  				<?php 
  				if ($row->acc_wawancara == '0' && $row->acc_form == '0') {
  				?>
  					<button class="btn btn-secondary btn-sm "><a class="text-light" href="detail_admin.php?id=<?= $row->user_id ?>">Detail</a></button>
  				<?php	
  				}
  				else if ($row->acc_form == '1' && $row->acc_wawancara == '0') {
  				?>
            <button class="btn btn-secondary btn-sm "><a class="text-light" href="detail_admin.php?id=<?= $row->user_id ?>">Detail</a></button>
  				<?php
  				}
  				else if ($row->acc_form == '1' && $row->acc_wawancara == '1'){
  				?>
            <button class="btn btn-secondary btn-sm "><a class="text-light" href="detail_admin.php?id=<?= $row->user_id ?>">Detail</a></button>
  				<?php
  				}
  				else if ($row->acc_form == '2' || $row->acc_wawancara == '2'){
  				?>
            <button class="btn btn-secondary btn-sm "><a class="text-light" href="detail_admin.php?id=<?= $row->user_id ?>">Detail</a></button>
  				<?php
  				}
  				?>
  			</td>
        <td align="center">
          <?php
          if ($row->acc_form == '1' && $row->acc_wawancara == '1'){
          ?>
            <button class="btn btn-success text-light btn-sm ">Accepted</button>
          <?php
          }
          else if ($row->acc_form == '0' && $row->acc_wawancara == '0'){
          ?>
            <button class="btn btn-secondary text-light btn-sm " style="padding-left: 12px ; padding-right: 12px;"> Pending </button>
          <?php
          }
          else if ($row->acc_form == '2' || $row->acc_wawancara == '2'){
          ?>
            <button class="btn btn-danger text-light btn-sm ">Declined</button>
          <?php
          }
          else if ($row->acc_form == '1' && $row->acc_wawancara == '0'){
          ?>
            <button class="btn btn-warning text-light btn-sm ">Interview</button>
          <?php
          } 
          ?>
        </td>
  		</tr>
      </tbody>
  	<?php $i++; } ?>
  </table>
  </div>
  </center>
  </div>
      </div>
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
  <script>
  $(document).ready(function(){
    $("#input").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>

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