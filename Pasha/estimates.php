<?php
  $pageTitle = "Estimates";
  include('includes/header.inc.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['myName']) && !empty($_POST['myEmail']) && is_numeric($_POST['myZip']) && !empty($_POST['myCity']) && !empty($_POST['myState']) && !empty($_POST['myJob'])) {
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
    if (!is_numeric($_POST['myZip'])) {
      $output .= "Your zip Code is not a number!<br>";
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
  echo "<p>$output</p>";
} // End of main submission IF.
?>
<div id="rightcolumn">
  <p>Request a Free Estimate.</p>
  <form method="post" action="http://csweb.hh.nku.edu/csc301/millerc42/pasha/estimates.php">
    <div class="myRow">
      <label class="labelCol" for="myName"><span style="color:red;">*</span>Name: </label>
      <input type="text" name="myName" id="myName" value="<?php if (isset($_POST['myName'])) echo $_POST['myName'];?>" />
    </div>
    <div class="myRow">
      <label class="labelCol" for="myEmail"><span style="color:red;">*</span>E-mail: </label>
      <input type="text" name="myEmail" id="myEmail" value="<?php if (isset($_POST['myEmail'])) echo $_POST['myEmail'];?>"/>
    </div>
    <div class="myRow">
      <label class="labelCol" for="myZip"><span style="color:red;">*</span>Zip Code: </label>
      <input type="text" name="myZip" id="myZip" value="<?php if (isset($_POST['myZip'])) echo $_POST['myZip'];?>"/>
    </div>
    <div class="myRow">
      <label class="labelCol" for="myCity"><span style="color:red;">*</span>City: </label>
      <input type="text" name="myCity" id="myCity" value="<?php if (isset($_POST['myCity'])) echo $_POST['myCity'];?>"/>
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
      <label class="labelCol" for="myJob"><span style="color:red;">*</span>Type of Job: </label>
      <textarea name="myJob" id="myJob" rows="2" cols="20"><?php if (isset($_POST['myJob'])) echo $_POST['myJob'];?></textarea>
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
