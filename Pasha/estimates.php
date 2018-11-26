<?php
  $pageTitle = "Estimates";
  include('includes/header.inc.php');
  // Begin estimate calculation
  function calculate($length, $width, $paint) {
    define ("WALL_HEIGHT", 8);
    if ($paint == "Regular") {
      $perFoot = 1.75;
    } else {
      $perFoot = 2.5;
    }
    $area = 2 * ($length * WALL_HEIGHT) + 2 * ($width * WALL_HEIGHT); // Walls
    $area += $length * $width;
    $estimate = ($area * $perFoot) * 0.8;
    return $estimate;
  }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['myName']) && filter_var(($_POST['myEmail']), FILTER_VALIDATE_EMAIL) && preg_match('/[0-9]{5}-?([0-9]{5})?/', $_POST['myZip']) && preg_match("/[A-Z]{1}.+[a-z]+/", $_POST['myCity']) && !empty($_POST['myState']) && is_numeric($_POST['roomLength']) && is_numeric($_POST['roomWidth'])) {
    echo "Cost of Paint Job is approximate $" . round(calculate($_POST['roomLength'], $_POST['roomWidth'], $_POST['paint_type']), 2);
  } else {
    $output = '<span style="color: red; font-weight: bold;">';
    $errorOutput = 'You forgot to enter';
    if (empty($_POST['myName'])) {
      $output .= "$errorOutput your Name!<br>";
    }
    if (!filter_var($_POST['myEmail'], FILTER_VALIDATE_EMAIL)) {
      $output .= "You have not entered a valid E-mail!<br>";
    }
    if (!preg_match('/[0-9]{5}-?([0-9]{5})?/', $_POST['myZip'])) {
      $output .= "Your zip Code is not valid!<br>";
    }
    if (!preg_match('/^[A-Z]{1}.+[a-z]+$/', $_POST['myCity'])) {
      $output .= "You have not properly formatted your City!<br>";
    }
    if (empty($_POST['myState'])) {
      $output .= "$errorOutput your State!<br>";
    }
    if (!is_numeric($_POST['roomLength'])) {
      $output .= "Your room length is not a number!<br>";
    }
    if (!is_numeric($_POST['roomWidth'])) {
      $output .= "Your room width is not a number!<br>";
    }
    if (!isset($_POST['paint_type'])) {
      $output .= "You need to pick a Paint Type!<br>";
    }
    $output .= '</span>';
    echo "<p>$output</p>";
  }
} // End of main submission IF.
?>
<div id="rightcolumn">
  <p>Request a Free Estimate.</p>
  <form method="post" action="http://csweb.hh.nku.edu/csc301/millerc42/pasha/estimates.php">
    <div class="myRow">
      <label class="labelCol" for="myName"><span style="color:red;">*</span>Name: </label>
      <input type="text" name="myName" id="myName" value="<?php if (isset($_POST['myName'])) echo strip_tags($_POST['myName']);?>" />
    </div>
    <div class="myRow">
      <label class="labelCol" for="myEmail"><span style="color:red;">*</span>E-mail: </label>
      <input type="text" name="myEmail" id="myEmail" value="<?php if (isset($_POST['myEmail'])) echo strip_tags($_POST['myEmail']);?>"/>
    </div>
    <div class="myRow">
      <label class="labelCol" for="myZip"><span style="color:red;">*</span>Zip Code: </label>
      <input type="text" name="myZip" id="myZip" value="<?php if (isset($_POST['myZip'])) echo $_POST['myZip'];?>"/>
    </div>
    <div class="myRow">
      <label class="labelCol" for="myCity"><span style="color:red;">*</span>City: </label>
      <input type="text" name="myCity" id="myCity" value="<?php if (isset($_POST['myCity'])) echo strip_tags($_POST['myCity']);?>"/>
    </div>

    <?php
      $states = array('IN', 'KY', 'OH');
    ?>

    <div class="myRow">
      <label class="labelCol" for="myState"><span style="color:red;">*</span>State: </label>
      <select name="myState" id="myState">
        <?php
          foreach ($states as $state) {
            echo "<option value=\"$state\"";
            if(isset($_POST['myState']) && ($_POST['myState'] == $state))
              echo 'selected="selected"';
              echo ">$state</option>\n" ;
          }
        ?>
      </select>
    </div>

    <div class="myRow">
      <label class="labelCol" for="roomLength"><span style="color:red;">*</span>Room Length: </label>
      <input type="text" name="roomLength" id="roomLength" value="<?php if (isset($_POST['roomLength'])) echo $_POST['roomLength'];?>"/>
    </div>

    <div class="myRow">
      <label class="labelCol" for="roomWidth"><span style="color:red;">*</span>Room Width: </label>
      <input type="text" name="roomWidth" id="roomWidth" value="<?php if (isset($_POST['roomWidth'])) echo $_POST['roomWidth'];?>"/>
    </div>

    <?php
      function create_paint_radio($value) {
        // Start the element:
        echo '<input type="radio" name="paint_type" value="' . $value . '"';
        // Check for stickiness:
        if (isset($_POST['paint_type']) && ($_POST['paint_type'] == $value)) {
          echo ' checked="checked"';
        }
        // Complete the element:
        echo "> $value ";
      } // End of create_gallon_radio() function.
    ?>

    <div class="myRow">
      <label class="labelCol" for="myPaint"><span style="color:red;">*</span>Paint Type: </label>
      <?php
        create_paint_radio('Regular');
        create_paint_radio('High Quality');
      ?>
    </div>

    <div class="mySubmit">
      <input type="submit" value="Free Estimate" />
    </div>
  </form>
  <?php
    include('includes/footer.inc.php');
  ?>
</div>
</div>
</body>
</html>
