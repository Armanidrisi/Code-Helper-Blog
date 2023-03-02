<?php
//Including The Config Fail
include('includes/config.php'); // Include Config File Of Site
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="Arman Idrisi" />
<title>Home - <?php echo $sitename; ?></title>
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
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
<div class="container position-relative px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-7">
<div class="site-heading">
<h1><?php echo $sitename; ?></h1>
<span class="subheading">A Blog For Coders...</span>
</div>
</div>
</div>
</div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
<h3 class="text-center mb-4">Latest Articles</h3>
<hr />
<div class="col-md-10 col-lg-8 col-xl-7">
<!-- Post preview-->
<?php
//Fetching The Posts From Database And Showing On homepage

$sql = "SELECT * FROM tbl_posts ORDER BY id DESC LIMIT 5";
$query = $conn->query($sql);
while ($data = $query->fetch_assoc()) {
$title = $data['post_title'];
$content = substr($data['post_content'], 0, 200);
$author = $data['post_author'];
$slug = $data['post-slug'];
$date = date_create($data['post_date']);
$df = date_format($date, "d-M-Y");
echo "<div class='post-preview'>
<h3>
$title
</h3>
<p class='post-subtitle'>
$content..........
</p>

<p class='post-meta'>
By $author - $df
</p>
<a class='btn btn-primary' href='blogpost.php?post=$slug'>Read More →</a>
</div><hr class='my-4'>";
//print_r($data);
}
?>
<!-- Divider
<hr class="my-4" />-->
<!-- Pager-->
<div class="d-flex justify-content-center mb-4">
<a class="btn btn-primary text-uppercase" href="blog.php">All Posts →</a>
</div>
</div>
</div>
</div>
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