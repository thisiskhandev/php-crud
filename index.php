<?php include_once "header.php" ?>

<div id="main-content">
  <h2>All Records</h2>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection failed!");

  $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
  $result = mysqli_query($conn, $sql) or die("Query unsucessfull!");
  echo "<pre>";
  // print_r($conn);
  // print_r($result);
  // print_r(mysqli_fetch_assoc($result));
  echo "</pre>";

  if (mysqli_num_rows($result) > 0) {
    // foreach ($result as $keyss) {
    //   print_r($keyss);
    // }
  ?>

    <table cellpadding="7px">
      <thead>
        <th><input type="checkbox" name="" id="mainCheck"></th>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
        // while ($row = mysqli_fetch_assoc($result)) {
        foreach ($result as $keys) {
        ?>
          <tr>
            <td style="padding: 0; text-align: center;"><input type="checkbox" name="" id=""></td>
            <td><?php echo $keys['sid'] ?></td>
            <td><?php echo $keys['sname'] ?></td>
            <td><?php echo $keys['saddress'] ?></td>
            <td><?php echo $keys['cname'] ?></td>
            <td><?php echo $keys['sphone'] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $keys['sid'] ?>">Edit</a>
              <a href="delete-inline.php?id=<?php echo $keys['sid'] ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <input type="submit" name="deleteAll" value="Delete All">
    </form>

  <?php } else {
    echo "<h2>No record found!</h2>";
    mysqli_close($conn);
  } ?>
</div>
</div>
<script>
  var InpCheckMain = document.getElementById("mainCheck");
  var deleteAllBtn = document.querySelector('input[name="deleteAll"]');
  InpCheckMain.checked ? deleteAllBtn.style.visibility = "visible" && console.log("working!") : deleteAllBtn.style.visibility = "hidden";
  if (InpCheckMain.checked) {
    console.log("working");
  }
</script>
</body>

</html>

<!-- document.getElementById("mainCheck").checked -->