<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Predefined Variables</title>
</head>
<body>
<?php # Script 1.5 - predefined.php

// Create a shorthand version of the variable names:
$name = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];
$docRoot = $_SERVER['DOCUMENT_ROOT'];

// Print the name of this script:
echo "<p>You are running on:<br><strong>$name</strong>.</p>\n";

// Print the user's information:
echo "<p>Your server port:<br><strong>$port</strong></p>\n";

// Print the server's information:
echo "<p>This server root is:<br><strong>$docRoot</strong>.</p>\n";

?>
</body>
</html>
