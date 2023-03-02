<?php
//Start The Session
session_start();
ob_start();

//Importing The Config File Of The site
include "../includes/config.php";

//Checking User Logged In or Not
checksession();

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
<style type="text/css" media="all">
.btn-div {
position: absolute;
left: 50%;
transform: translateX(-50%);
display:;
}
.btn-div button {
color: #fff;
background-color: #0085a1;
border-color: #0085a1;
outline: none;
border: none;
padding: 1rem;
}
</style>
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
<h1>Admin Panel</h1>
</div>
</div>
</div>
</div>
</header>
<!-- Main Content-->
<div class="px-4 px-lg-5">
<h3 class="text-center">Recent Messages</h3>
<hr class="my-4" />
<div class="row gx-4 gx-lg-5 justify-content-center">

<div class="col-md-10 col-lg-8 col-xl-7">
<div class="table-responsive">
<table class="table table-hover" id="msg_table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Name</th>
<th scope="col">Email</th>
<th scope="col">Phone</th>
<th scope="col">Message</th>
<th scope="col">Date</th>
</tr>
</thead>
<tbody>
<tr class="text-center" id="msgpagination">
<td>
<div class="btn-div">

<button class="rounded m-0 p-1" id="msgbtn" data-id="">Load More</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>


<div class="mt-5">

<hr class="my-4" />
<div class="d-flex justify-content-between">
<h3 class="mt-3">Recent Posts</h3>
<a class="btn btn-danger rounded mb-3" href="add-post.php">Add Post</a>
</div>

<div class="table-responsive">
<table class="table table-hover" id="posts_table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Title</th>
<th scope="col">Content</th>
<th scope="col">Author</th>
<th scope="col">Slug</th>
<th scope="col">Image</th>
<th scope="col">Date</th>
<th scope="col">Delete</th>
</tr>
</thead>
<tbody>

<tr id='postpagination'>
<td>
<div class='btn-div'>
<button class='rounded m-0 p-1' data-id='' id='postbtn'>Load More</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>

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

<!--Js For Fetch Data-->
<script type="text/javascript" charset="utf-8" src="../js/manage-data.js">
</script>
</body>
</html>