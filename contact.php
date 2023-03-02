<?php
include('includes/config.php'); // Including The Config File

//Handling Form Request
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //file_put_contents("text.txt", $_POST);

  //Get The Data from post request

  $name = $_POST['uname']; // Sender Name
  $email = $_POST['email']; // Sender Email
  $phone = $_POST['number']; //Sender Phone Number
  $usermsg = htmlspecialchars($_POST['text']); // Message From Sender

  //Inserting To The Database

  //Sql Query
  $sql = "INSERT INTO `tbl_contact`( `sender_name`, `sender_phone`, `sender_email`, `message_content`) VALUES ('{$name}','{$phone}','{$email}','{$usermsg}')";
  //$query = $conn->query($sql);
  if ($conn->query($sql) === TRUE) {
    
    //Set the Succcess Message
    $msg = "Message Sent Success";
    $class="success"; 
    
  } else {
    
    //Set The Erorr Message
    $msg ="Failed To Send Message";
    $class="danger";
  }


}
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
include('includes/navbar.php');
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
<div class="container position-relative px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-7">
<div class="page-heading">
<h1>Contact Me</h1>
<span class="subheading">Have questions? I have answers.</span>
</div>
</div>
</div>
</div>
</header>
<!-- Main Content-->
<main class="mb-4">
<div class="container px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-7">
<p>
Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!
</p>
<p class="text-center text-<?php echo $class; ?>">
<?php echo $msg; ?>
</p>
<div class="my-5">
<form id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="form-floating">
<input class="form-control" id="name" type="text" placeholder="Enter your name..." name="uname" />
<label for="name">Name</label>
<div class="form-floating">
<input class="form-control" id="email" type="email" placeholder="Enter your email..." name="email" />
<label for="email">Email address</label>
</div>
<div class="form-floating">
<input class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." name="number" />
<label for="phone">Phone Number</label>
</div>
<div class="form-floating">
<textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required" name="text"></textarea>
<label for="message">Message</label>
<div class="invalid-feedback" data-sb-feedback="message:required">
A message is required.
</div>
</div>
<br />

<!-- Submit Button-->
<button class="btn btn-primary text-uppercase " id="submitButton" name="submit" type="submit">Send</button>
</form>
</div>
</div>
</div>
</div>
</main>
<!-- Footer-->
<?php
include('includes/footer.php');
?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>