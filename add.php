<?php include_once 'header.php';
include_once 'config.php';
$sql = "SELECT * FROM studentclass";
$result = mysqli_query($conn, $sql);
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <!-- Testing -->
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <select name="class">
                    <option value="" selected disabled>Select Class</option>
                    <?php

                    // print_r(mysqli_fetch_assoc($result));
                    print_r(mysqli_num_rows($result));
                    foreach ($result as $row) {
                        // print_r($row);
                    ?>
                        <option value=<?php echo $row['cid'] ?>><?php echo $row['cname'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            <?php } else {
                echo "<h3>No Classes found in database!</h3>" . "<p>Add class first in db</p>";
            } ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" minlength="0" maxlength="10" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save" />
    </form>
</div>
</div>
</body>

</html>