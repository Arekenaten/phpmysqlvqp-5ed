<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('mysqli_oop_connect.php');

    if (empty($_POST['isbn'])) {
      echo "You have not entered the ISBN.<br />"
           ."Please go back and try again.";
      exit;
    } else {
      $isbn = $mysqli->real_escape_string(trim($_POST['isbn']));
    }
    if (empty($_POST['author'])) {
      echo "You have not entered the Author.<br />"
           ."Please go back and try again.";
      exit;
    } else {
      $author = $mysqli->real_escape_string(trim($_POST['author']));
    }
    if (empty($_POST['title'])) {
      echo "You have not entered the title.<br />"
           ."Please go back and try again.";
      exit;
    } else {
      $title = $mysqli->real_escape_string(trim($_POST['title']));
    }
    if (empty($_POST['price'])) {
      echo "You have not entered the price.<br />"
           ."Please go back and try again.";
      exit;
    } else {
      $price = $mysqli->real_escape_string(trim($_POST['price']));
    }

    $q = "insert into books (isbn, author, title, price) VALUES ('$isbn', '$author', '$title', '$price')";
    $r = @$mysqli->query($q);

    if ($mysqli->affected_rows == 1) {
      echo '<p>Book added.</p>';
    } else {
      echo '<p>' . $mysqli->error . '</p>';
    }
    $mysqli->close();
    unset($mysqli);
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
