<?php
//Start The Session 
session_start();

unset($_SESSION['admin']); //Unset The Session

header('location:login.php'); //Redirect To Login Page
?>