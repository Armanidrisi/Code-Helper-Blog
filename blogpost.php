<?php
//Including The Config Fail
include('includes/config.php'); // Include Config File Of Site

$slug = $_GET['post']; // Getting The Post Slug To find The Post from Database

//Find The Data From Database Using Slug
$sql = "SELECT * FROM tbl_posts WHERE `post-slug`='$slug'"; //SQL Command
$query = $conn->query($sql); //SQL Query
$data = $query->fetch_assoc(); //Fetch Data In Associative array
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Contact - <?php echo $sitename; ?></title>
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<?php
//Including Navbar From navbar.php

include('includes/navbar.php'); //Include The Navbar Component From navbar.php
?>
<!-- Page Header-->
<?php
//Check The Error
if (!$slug) {
include("includes/error.php"); //Show the Error
} elseif (!$data) {
include("includes/error.php"); //Show the Error
} else {
$img = $data['post_header'];
?>
<header class="masthead" style="background:url('admin/uploads/<?php echo $img ?>');background-size:cover;">
<div class="container position-relative px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-7">
<div class="post-heading">
<h2><?php echo $data['post_title']; ?></h2>
<p>
</p>
<p style="font-size:14px;">
By <?php echo $data['post_author']; ?> - <?php $date = date_create($data['post_date']);
echo $df = date_format($date, "d-M-Y"); ?>
</p>
</div>
</div>
</div>
</div>
</header>
<!-- Post Content-->
<article class="mb-4">
<div class="container px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-7">
<h1><?php echo $data['post_title']; ?></h1>
<?php echo $data['post_content']; ?>
</div>
</div>
</div>
</article>
<?php
} ?>
<!-- Footer-->
<?php
//Including footer From footer.php

include('includes/footer.php'); //Include The footer Component From footer.php
?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>