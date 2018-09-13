<?php
  $pageTitle = "Estimates";
  include('includes/header.inc.php');
?>
<div id="rightcolumn">
  <p>Request a Free Estimate.</p>
  <form method="post" action="http://csweb.hh.nku.edu/csc301/millerc42/pasha/painter.php">
    <div class="myRow">
      <label class="labelCol" for="myName"><span style="color:red;">*</span>Name: </label>
      <input type="text" name="myName" id="myName" />
    </div>
    <div class="myRow">
      <label class="labelCol" for="myEmail"><span style="color:red;">*</span>E-mail: </label>
      <input type="text" name="myEmail" id="myEmail" />
    </div>
    <div class="myRow">
      <label class="labelCol" for="myZip"><span style="color:red;">*</span>Zip Code: </label>
      <input type="text" name="myZip" id="myZip" />
    </div>
    <div class="myRow">
      <label class="labelCol" for="myCity"><span style="color:red;">*</span>City: </label>
      <input type="text" name="myCity" id="myCity" />
    </div>

    <?php
      $states = array('IN', 'KY', 'OH');
    ?>

    <div class="myRow">
      <label class="labelCol" for="myState"><span style="color:red;">*</span>State: </label>
      <select name="myState" id="myState">
        <?php
          foreach ($states as $state) {
            echo "<option value='" . $state . "'>" . $state . "</option>";
          }
        ?>
      </select>
    </div>
    <div class="myRow">
      <label class="labelCol" for="myJob"><span style="color:red;">*</span>Type of Job: </label>
      <textarea name="myJob" id="myJob" rows="2" cols="20"></textarea>
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
