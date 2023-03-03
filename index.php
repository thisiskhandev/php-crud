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

    <form action="delete-selected.php" method="post">
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
              <td style="padding: 0; text-align: center;"><input type="checkbox" name="checkboxes[]" id="<?php echo 'checkID_' . $keys['sid'] ?>" class="delete_checkbox" value="<?php echo $keys['sid'] ?>"></td>
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
      <input type="submit" class="disabled" name="deleteAll" value="Delete Selected">
    </form>

  <?php } else {
    echo "<h2>No record found!</h2>";
    mysqli_close($conn);
  }
  ?>
</div>
</div>

<script>
  var InpCheckMain = document.getElementById("mainCheck");
  var btnDeleteAll = document.querySelector('input[name="deleteAll"]');
  var allCheckDelete = document.querySelectorAll('.delete_checkbox');

  InpCheckMain.addEventListener("change", function() {
    InpCheckMain.checked ? btnDeleteAll.classList.remove("disabled") : btnDeleteAll.classList.add("disabled");
    if (InpCheckMain.checked) {
      allCheckDelete.forEach((elem, ind) => {
        if (elem.checked === false) {
          elem.checked = true;
        }
      });
    } else {
      allCheckDelete.forEach((elem, ind) => {
        elem.checked = false;
      });
    }
  });

  var checkBoxCount = 0;
  allCheckDelete.forEach((elem, ind) => {
    elem.addEventListener('change', function() {
      // if (elem.checked) {
      //   btnDeleteAll.classList.remove("disabled");
      //   console.log(elem.length);
      // }
      // else if (elem.checked === false) {
      //   btnDeleteAll.classList.add("disabled");
      // }
      if (elem.checked) {
        checkBoxCount++;
      } else {
        checkBoxCount--;
        InpCheckMain.checked = false;
      }
      if (checkBoxCount > 0) {
        btnDeleteAll.classList.remove("disabled");
      } else {
        btnDeleteAll.classList.add("disabled");
      }
      console.log("Total check count: " + checkBoxCount);
    });
    // if (elem.checked === false) {
    //   btnDeleteAll.classList.add("disabled");
    // }

    // console.log(elem);
  });
</script>

</body>

</html>