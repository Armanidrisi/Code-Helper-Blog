<?php
//Start The Session
session_start();
ob_start();

//Importing The Config File Of The site
include "../includes/config.php";

//Handle The Post Request
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  //Get the credentials from POST Request
  $email = $conn->real_escape_string($_POST['email']);//Get The Email Address
  $pass = $conn->real_escape_string($_POST['password']); //Get the Password

  //Select The Data From Database
  $sql = "SELECT * FROM `tbl_admin` WHERE `email`='$email' && `password`='$pass'"; //SQL Command
  $query = $conn->query($sql); //SQL Query
  //print_r($query->fetch_assoc());

  //Check whether User Exists Or not
  if ($query->num_rows > 0) {
    //Fetch Dats
    $data = $query->fetch_assoc();


    //show success message
    $msg = "Login Successful";
    $col = "success";

    //set the session and Redirect To Dashboard
    $_SESSION['admin'] = $data['name'];
    $_SESSION['admin-email'] = $email;
    ?>
    <meta http-equiv="refresh" content="2 url=index.php" />
  <?php
} else {
  $msg = "Please Enter Valid Details";
  $col = "danger";
}
}

//Checking The Whether User Logged In or Not
if (isset($_SESSION['admin'])) {
header('location:index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.108.0">
<title>Admin Login</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">





<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
html,
body {
height: 100%;
}

body {
display: flex;
align-items: center;
padding-top: 40px;
padding-bottom: 40px;
background-color: #f5f5f5;
}

.form-signin {
max-width: 330px;
padding: 15px;
}

.form-signin .form-floating:focus-within {
z-index: 2;
}

.form-signin input[type="email"] {
margin-bottom: -1px;
border-bottom-right-radius: 0;
border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
margin-bottom: 10px;
border-top-left-radius: 0;
border-top-right-radius: 0;
}
.bd-placeholder-img {
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none;
}

@media (min-width: 768px) {
.bd-placeholder-img-lg {
font-size: 3.5rem;
}
}

.b-example-divider {
height: 3rem;
background-color: rgba(0, 0, 0, .1);
border: solid rgba(0, 0, 0, .15);
border-width: 1px 0;
box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.b-example-vr {
flex-shrink: 0;
width: 1.5rem;
height: 100vh;
}

.bi {
vertical-align: -.125em;
fill: currentColor;
}

.nav-scroller {
position: relative;
z-index: 2;
height: 2.75rem;
overflow-y: hidden;
}

.nav-scroller .nav {
display: flex;
flex-wrap: nowrap;
padding-bottom: 1rem;
margin-top: -1px;
overflow-x: auto;
text-align: center;
white-space: nowrap;
-webkit-overflow-scrolling: touch;
}
</style>


<!-- Custom styles for this template -->
<link href="sign-in.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
<form method="POST" action="<?php echo $_SEVER['PHP_SELF ']; ?>">
<img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
<p class="text-<?php echo $col; ?>">
<?php echo $msg; ?>
</p>
<div class="form-floating">
<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
<label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
<label for="floatingPassword">Password</label>
</div>


<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
<p class="mt-5 mb-3 text-muted">
&copy; 2017–2022
</p>
</form>
</main>
</body>
</html>