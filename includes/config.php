<?php
//Site Deatils
$sitename = "Code Helper"; //Site Name
$twitter = "https://twitter.com/"; // Twitter URL
$facebook = "https://facebook.com"; // facebook
$github = "https://github.com/Armanidrisi"; // github Url


//Database Details
$db_host = "127.0.0.1"; //Database Host
$db_user = "root"; //Datbase User
$db_pass = "root"; //Datbase Password
$db_name = "codecrafters"; //Database Name

//Creating The Database Connection

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name); // Create Datbase Connection

//Check The Connection
if ($conn->connect_error) {
  //Show The Error
  echo "Datbase Connection Error ". $conn->connect_error;
} else {
  //echo "Connection Success"; //Connecting Success

}

//Function For Checking Session Of Admin Login
function checksession() {
  if (!isset($_SESSION['admin'])) {
    header('location:login.php');
  }
}

?>