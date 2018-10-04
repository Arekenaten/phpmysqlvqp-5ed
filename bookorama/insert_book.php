<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('mysqli_connect.php');

    if (isset($_POST['isbn'])) {
      $isbn=mysqli_real_escape_string($dbc, $_POST['isbn']);
    } else {
      echo "You have not entered the ISBN.<br />"
           ."Please go back and try again.";
      exit;
    }
    if (isset($_POST['author'])) {
      $author=mysqli_real_escape_string($dbc, $_POST['author']);
    } else {
      echo "You have not entered the Author.<br />"
           ."Please go back and try again.";
      exit;
    }
    if (isset($_POST['title'])) {
      $title=mysqli_real_escape_string($dbc, $_POST['title']);
    } else {
      echo "You have not entered the title.<br />"
           ."Please go back and try again.";
      exit;
    }
    if (isset($_POST['price'])) {
      $price=mysqli_real_escape_string($dbc, $_POST['price']);
    } else {
      echo "You have not entered the price.<br />"
           ."Please go back and try again.";
      exit;
    }

    $query = "insert into books values
              ('".$isbn."', '".$author."', '".$title."', '".$price."')";
    $r = @mysqli_query($dbc, $query); // Run the query.

    if ($r) {
        echo  "<p>The book was inserted.</p>";
    } else {
    	  echo '<h1>System Error</h1>';
        echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $query . '</p>';
    }

    mysqli_close($dbc);
  }
?>
<html>
<head>
  <title>Book-O-Rama - New Book Entry</title>
</head>

<body>
  <h1>Book-O-Rama - New Book Entry</h1>

  <form action="insert_book.php" method="post">
    <table border="0">
      <tr>
        <td>ISBN</td>
         <td><input type="text" name="isbn" maxlength="13" size="13"></td>
      </tr>
      <tr>
        <td>Author</td>
        <td> <input type="text" name="author" maxlength="30" size="30"></td>
      </tr>
      <tr>
        <td>Title</td>
        <td> <input type="text" name="title" maxlength="60" size="30"></td>
      </tr>
      <tr>
        <td>Price $</td>
        <td><input type="text" name="price" maxlength="7" size="7"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Register"></td>
      </tr>
    </table>
  </form>
</body>
</html>
