<?php include 'header.php';
include_once "config.php";
?>
<div id="main-content">
  <h2>Edit Record</h2>
  <form class="post-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="form-group">
      <label>Id</label>
      <input type="text" name="sid" />
    </div>
    <input class="submit" type="submit" name="showbtn" value="Show" />
  </form>

  <?php
  if (isset($_POST['showbtn'])) {
    // print_r($_POST['showbtn']);
    $stdID = $_POST['sid'];
    $sql = "SELECT * FROM student WHERE sid = '{$stdID}'";
    $result = mysqli_query($conn, $sql) or die("Query unsucesfull!");
    if (mysqli_num_rows($result) > 0) {
      foreach ($result as $keys) {
  ?>
        <form class="post-form" action="updatedata.php" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="sid" value="<?php echo $keys['sid'] ?>" />
            <input type="text" name="sname" value="<?php echo $keys['sname'] ?>" />
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $keys['saddress'] ?>" />
          </div>
          <div class="form-group">
            <label>Class</label>
            <?php

            $sqlClass = "SELECT * FROM  studentclass";
            $resultClass = mysqli_query($conn, $sqlClass) or die("Connection did not establish!");
            if (mysqli_num_rows($resultClass) > 0) {
              echo "<select name='cid' id=''>
          <option value='' disabled>Select Class</option>";
              foreach ($resultClass as $rows) {
                if ($keys['sclass'] === $rows['cid']) {
                  $select = "selected";
                } else {
                  $select = "";
                }
                echo "<option {$select} value='{$rows['cid']}'>{$rows['cname']}</option>";
              }
              echo "</select>";
            }
            ?>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" minlength="0" maxlength="10" name="sphone" value="<?php echo $keys['sphone'] ?>" />
          </div>
          <input class="submit" type="submit" value="Update" />
        </form>
  <?php
      }
    } else {
      echo "<h3 class='center error'>Please fill the the valid stdudent id</h3>";
    }
  }
  ?>
</div>
</div>
</body>

</html>