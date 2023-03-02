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
  $title = $_POST['title']; //Post Title
  $content = $_POST['content']; //Post content
  $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))); //Generate The Url Slug From Title
  $author = $_SESSION['admin']; //Author Name Getting From Session
  $img = $_FILES['image']['name']; //Image Name
  $tmp = $_FILES['image']['tmp_name']; //Image Tmp name

  //Upload The Image
   move_uploaded_file($tmp, "uploads/$img");

  //Insert To The Database
  $sql = "INSERT INTO `tbl_posts`(`post_title`, `post_content`, `post-slug`, `post_author`, `post_header`) VALUES ('$title','$content','$slug','$author','$img')"; //Sql Command
  $query = $conn->query($sql); //SQL Query 
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
<h1>Add Post</h1>
</div>
</div>
</div>
</div>
</header>
<!-- Main Content-->
<div class="px-4 px-lg-5">
<h3 class="text-center">Add New Post</h3>
<hr class="my-4" />
<div class="row gx-4 gx-lg-5 justify-content-center">

<div class="col-md-10 col-lg-8 col-xl-7">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="title" class="form-label">Post Title</label>
<input type="text" name="title" class="form-control" id="title">
</div>
<div class="mb-3">
<label for="image" class="form-label">Header Image</label>
<input class="form-control" type="file" id="image" name="image" accept="image/*">
</div>
<div class="mb-3">
<textarea name="content" id="content"></textarea>
</div>
<div class="mb-3">
<button class="btn btn-primary" type="submit">Add</button>
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
<script type="text/javascript" charset="utf-8">
tinymce.init({
selector: "#content",
plugins:
"advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste help wordcount",
toolbar:
"undo redo | h3 | h2 | h1 | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | link image | charmap emoticons | preview fullscreen | forecolor backcolor | removeformat | code | help"

});

</script>
</body>
</html>