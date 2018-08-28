<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Future Value</title>
</head>
<body>
<?php # Script 1.8 - numbers.php

// Declare interest constant
define('INTEREST', .08);

$amount = 1000;
$years = 20;

// Format the total:
$value = $amount * (1 + INTEREST) ** $years;
$value = number_format($value, 2);

// Print the results:
echo '<p>The future value of your $' . $amount . ' after ' . $years . ' years is <strong>' . $value . '</strong></p>';

?>
</body>
</html>
