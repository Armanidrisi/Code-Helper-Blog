<?php
//Start The Session
session_start();
ob_start();

//Importing The Config File Of The site
include "../includes/config.php";

//Checking User Logged In or Not
checksession();

//Handle The Post Request
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //Get the Data from post request
  $oldpass = $_POST['old']; //Old Password
  $newpass = $_POST['new']; //New Password
  $email = $_SESSION['admin-email'];
  //Check The Details And Update The Password
  $sql = "SELECT * FROM `tbl_admin` WHERE `email`='$email' && `password`='$oldpass'";
  $query = $conn->query($sql);
  if ($query->num_rows > 0) {
    $change = $conn->query("UPDATE tbl_admin SET password='$newpass' WHERE email='$email'");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="Arman Idrisi" />
<title>Dashboard - <?php echo $sitename; ?></title>
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="../css/styles.css" rel="stylesheet" />
<!--Tinymce Cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.2/tinymce.min.js"></script>

</head>
<body>
<!-- Navigation-->
<?php
//Include The Navbar File
include("../includes/admin-navbar.php");
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('../assets/img/home-bg.jpg')">
<div class="container position-relative px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-7">
<div class="site-heading">
<h1>Change Password</h1>
</div>
</div>
</div>
</div>
</header>
<!-- Main Content-->
<div class="px-4 px-lg-5">
<h3 class="text-center">Change Password</h3>
<hr class="my-4" />
<div class="row gx-4 gx-lg-5 justify-content-center">

<div class="col-md-10 col-lg-8 col-xl-7">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="title" class="form-label">Old Password</label>
<input type="text" name="old" class="form-control" id="old">
</div>
<div class="mb-3">
<label for="title" class="form-label">New Password</label>
<input type="password" name="new" class="form-control" id="new">
</div>
<div class="mb-3">
<button class="btn btn-primary" type="submit">Change Password</button>
</div>
</form>
</div>
</div>
</div>
<!-- Footer-->
<?php
//Include The footer File
include("../includes/footer.php");
?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!--JQuery Cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Core theme JS-->
<script src="../js/scripts.js"></script>
</script>
</body>
</html>