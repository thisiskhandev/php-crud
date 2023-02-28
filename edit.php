<?php include 'header.php';
include_once "config.php";
if (!empty($_GET['id'])) {
  $stdID = $_GET['id'];
  $sql = "SELECT * FROM student WHERE sid = '{$stdID}'";
  $result = mysqli_query($conn, $sql) or die("Query unsucesfull!");
?>
  <div id="main-content">
    <h2>Update Record</h2>
    <?php
    foreach ($result as $keys) {
      // print_r($keys);
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
      }
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
  </div>
<?php
} else {
  echo "<h2>Select a valid student</h2>";
  echo "<a href='/crud'>Home</a>";
}
?>
</body>

</html>