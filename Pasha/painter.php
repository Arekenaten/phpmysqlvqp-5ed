<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
<title>The Painter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
  background-color:#FFFFFF;
  font-family:Arial;
}
td {
  color:#000000;
  font-family:Arial;
}
.heading {
  color:#ffffff;
  font-size:larger;
  font-weight:bold;
  background-color:#336600;
}
div {text-align:center;}
</style>
</head>
<body>
<?php

  if (!empty($_POST['myName']) && !empty($_POST['myEmail']) && !empty($_POST['myJob']) && !empty($_POST['myZip'])) {
    $name = $_POST['myName'];
    $email = $_POST['myEmail'];
    $zip = $_POST['myZip'];
    $city = $_POST['myCity'];
    $state = $_POST['myState'];
    $job = $_POST['myJob'];

    $output = '';
    $output .= "Name: $name<br>";
    $output .= "Email: $email<br>";
    $output .= "Zip: $zip<br>";
    $output .= "City: $city<br>";
    $output .= "State: $state<br>";
    $output .= "Type of Job: $job<br>";
  } else {
    $output = '<span style="color: red; font-weight: bold;">';
    $errorOutput = 'You forgot to enter';
    if (empty($_POST['myName'])) {
      $output .= "$errorOutput your Name!<br>";
    }
    if (empty($_POST['myEmail'])) {
      $output .= "$errorOutput your E-mail!<br>";
    }
    if (empty($_POST['myZip'])) {
      $output .= "$errorOutput your Zip Code!<br>";
    }
    if (empty($_POST['myCity'])) {
      $output .= "$errorOutput your City!<br>";
    }
    if (empty($_POST['myState'])) {
      $output .= "$errorOutput your State!<br>";
    }
    if (empty($_POST['myJob'])) {
      $output .= "$errorOutput the Type of Job!<br>";
    }
    $output .= '</span>';
  }

echo "<div>
<img src='painterlogo.gif' width='620' height='120' alt='The Painter' /><br />
 <h2>Free Estimate</h2>
 <h3>We will contact you to arrange your free estimate</h3>
 <h3>Here is the information you entered:</h3>
 <p>$output</p>
 <h3>Thank you for your interest in the Painter!</h3>"
?>
<form action="#">
<input type="button" value = "Back" onclick="javascript:history.go(-1)" />
</form>
</div>
</body>
</html>
