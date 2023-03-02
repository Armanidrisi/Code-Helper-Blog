<?php
//Start The Session
session_start();
ob_start();

//Importing The Config File Of The site
include "../includes/config.php";

//Checking User Logged In or Not
checksession();

// Handle The Delete Request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  // get the Post ID to delete
  $id = isset($_GET['id']) ? $_GET['id'] : null;

  // delete the Post
  if ($id) {
    // perform the deletion
    $sql = "DELETE FROM `tbl_posts` WHERE `id`='$id'";
$query=$conn->query ($sql);
    // return a success response
    http_response_code(204); //204: For No Content
  }

}
?>