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


  ?>

    <table cellpadding="7px">
      <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['sid'] ?></td>
            <td><?php echo $row['sname'] ?></td>
            <td><?php echo $row['saddress'] ?></td>
            <td><?php echo $row['sclass'] ?></td>
            <td><?php echo $row['sphone'] ?></td>
            <td>
              <a href="#">Edit</a>
              <a href="#">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  <?php } ?>
</div>
</div>
</body>

</html>