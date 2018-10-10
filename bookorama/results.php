<?php
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    require('mysqli_connect.php');

    if (isset($_POST['searchtype'])) {
      $searchtype=mysqli_real_escape_string($dbc, $_POST['searchtype']);
    } else {
      echo "You have not entered the search type.<br />"
           ."Please go back and try again.";
      exit;
    }
    if (isset($_POST['searchterm'])) {
      $searchterm=mysqli_real_escape_string($dbc, $_POST['searchterm']);
    } else {
      echo "You have not entered the search term.<br />"
           ."Please go back and try again.";
      exit;
    }

    $query = "select * from customers where ".$searchtype." like '%".$searchterm."%'";
    $r = @mysqli_query($dbc, $query);

    $num_results = mysqli_num_rows($r);

    echo "<p>Number of customers found: ".$num_results."</p>";

    for ($i=0; $i <$num_results; $i++) {
       $row = $r->fetch_assoc();
       echo "<p><strong>".($i+1).". Name: ";
       echo htmlspecialchars(stripslashes($row['name']));
       echo "<br />Address: ";
       echo stripslashes($row['address']);
       echo "<br />City: ";
       echo stripslashes($row['city']);
       echo "</p>";
    }

    mysqli_free_result($r);
    mysqli_close($dbc);
  }
?>
<html>
<head>
  <title>Book-O-Rama Customer Search</title>
</head>

<body>
  <h1>Book-O-Rama Customer Search</h1>

  <form action="results.php" method="post">
    Choose Search Type:<br />
    <select name="searchtype">
      <option value="name">Name</option>
      <option value="city">City</option>
    </select>
    <br />
    Enter Search Term:<br />
    <input name="searchterm" type="text" size="40">
    <br />
    <input type="submit" name="submit" value="Search">
  </form>

</body>
</html>
