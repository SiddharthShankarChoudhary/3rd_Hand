<?php  
require './config/config.php'; // To include config.php file
include("includes/classes/User.php"); // To include User.php file
include("includes/classes/Post.php"); // To include Post.php file
include("includes/classes/Message.php"); // To include Message.php file


// Triggers when session variable for username is set
// It prevents illegal access of index page

if (isset($_SESSION['username'])) {

	$userLoggedIn = $_SESSION['username'];

	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");

	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: login.php"); // If not set redirects to register.php
}

?>