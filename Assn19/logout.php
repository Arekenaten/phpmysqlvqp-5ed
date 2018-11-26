<?php # Script 12.11 - logout.php #2
// This page lets the user logout.
// This version uses sessions.

session_start(); // Access the existing session.
// If no session variable exists, redirect the user:
if (!isset($_SESSION['user_id'])) {

	// Need the functions:
	require('includes/login_functions.inc.php');
	redirect_user();

} else { // Cancel the session:
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	$_SESSION = []; // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}

// Set the page title and include the HTML header:
$page_title = "You are now logged out, " . $first_name . " " . $last_name . "!";
include('includes/header.html');

// Print a customized message:
$output = "<h1 style='margin-top: 60px;'>Logged Out!</h1><p>You are logged out {$first_name} {$last_name}!</p>";
echo $output;

include('includes/footer.html');
?>
