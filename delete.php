<?php include 'header.php';
include_once "config.php";
// $stdID = $_POST['sid'];
// $stdName = $_POST['sname'];
// $sqlDeleteByID = "DELETE FROM student WHERE student.sid = '{$stdID}'";
// $sqlDeleteByName = "DELETE FROM student WHERE student.sname = '{$stdName}'";

// $sqlSearchByName = "SELECT * FROM student WHERE sname LIKE '{$stdName}%'";
?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Delete by ID of Student</label>
            <input type="text" class="inpEmpty" name="sid" onkeyup="InpNotEmptyHandler()" />
        </div>
        <input class="submit" type="submit" name="confirmIdDelete" value="Delete" />
    </form>
    <?php

    if (isset($_POST['confirmIdDelete'])) {
        $stdID = $_POST['sid'];
        $sqlSearchByID = "SELECT * FROM student WHERE sid = '{$stdID}'";
        $query = mysqli_query($conn, $sqlSearchByID) or die("<h3>User not found!</h3>");
        $result = mysqli_fetch_assoc($query);
        echo "<pre>";
        // print_r($result);
        echo "</pre>";
        if (mysqli_num_rows($query) > 0) {
            foreach ($query as $keys) {
                // print_r($keys);
    ?>
                <div class="std_details">
                    <h3>Details</h3>

                    <div class="flex_box">
                        <article>
                            <h4><strong>ID: </strong> <span><?php echo $keys['sid'] ?></span></h4>
                            <h4><strong>Name:</strong> <span><?php echo $keys['sname'] ?></span></h4>
                            <h4><strong>Adress: </strong> <span><?php echo $keys['saddress'] ?></span></h4>
                            <!-- Student Class -->
                            <?php
                            $sClass = $keys['sclass'];
                            $sqlClass = "SELECT * FROM studentclass WHERE studentclass.cid = '{$sClass}'";
                            $resultClass = mysqli_query($conn, $sqlClass) or die("Class not match or found!");
                            if (mysqli_num_rows($resultClass) > 0) {
                                // print_r(mysqli_fetch_assoc($resultClass));
                                foreach ($resultClass as $classNameKey) {
                            ?>
                                    <h4><strong>Class: </strong> <span><?php echo $classNameKey['cname'] ?></span></h4>
                            <?php
                                }
                            }
                            ?>
                            <h4><strong>Phone: </strong> <span><?php echo $keys['sphone'] ?></span></h4>
                        </article>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="hidden" name="sid" value="<?php echo $keys['sid'] ?>">
                            <button class="btn" type="submit" name="deleteCurrentUser">Delete Student</button>
                        </form>
                    </div>

                </div>
    <?php
            }
        } else {
            echo "<p style='text-align: center; color: red;' class='not_found'>No Student found in our record!</p>";
        }
    }
    if (isset($_POST['deleteCurrentUser'])) {
        $stdID = $_POST['sid'];
        $sqlSearchByIdConfirmed = "DELETE FROM student WHERE student.sid = '{$stdID}'";
        $query = mysqli_query($conn, $sqlSearchByIdConfirmed) or die("Something went wrong!");
        header("location: /crud");
    }
    ?>

    <form class="post-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Delete by Name of Student</label>
            <input type="text" name="sname" onkeyup="InpNotEmptyHandler()" />
        </div>
        <input class="submit" type="submit" name="confirmNDelete" value="Delete" />
    </form>

    <?php
    if (isset($_POST['confirmNDelete'])) {
        $stdName = $_POST['sname'];
        // echo $stdName;
        $sql = "SELECT * FROM student WHERE sname LIKE '{$stdName}%'";
        $query = mysqli_query($conn, $sql) or die("Not found name in DB died!");
        $result = mysqli_fetch_assoc($query);
        // print_r($result);
        if (isset($query) > 0) {
            foreach ($query as $keys) {
    ?>
                <div class="std_details">
                    <h3>Details</h3>
                    <div class="flex_box">
                        <article>
                            <h4><strong>ID: </strong> <span><?php echo $keys['sid'] ?></span></h4>
                            <h4><strong>Name:</strong> <span><?php echo $keys['sname'] ?></span></h4>
                            <h4><strong>Adress: </strong> <span><?php echo $keys['saddress'] ?></span></h4>
                            <!-- Student Class -->
                            <?php
                            $sClass = $keys['sclass'];
                            $sqlClass = "SELECT * FROM studentclass WHERE studentclass.cid = '{$sClass}'";
                            $resultClass = mysqli_query($conn, $sqlClass) or die("Class not match or found!");
                            if (mysqli_num_rows($resultClass) > 0) {
                                // print_r(mysqli_fetch_assoc($resultClass));
                                foreach ($resultClass as $classNameKey) {
                            ?>
                                    <h4><strong>Class: </strong> <span><?php echo $classNameKey['cname'] ?></span></h4>
                            <?php
                                }
                            }
                            ?>
                            <h4><strong>Phone: </strong> <span><?php echo $keys['sphone'] ?></span></h4>
                        </article>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="hidden" name="sid" value="<?php echo $keys['sid'] ?>">
                            <button class="btn" type="submit" name="deleteCurrentUser">Delete Student</button>
                        </form>
                    </div>
                </div>
    <?php
            }
        } else {
            echo "<p style='text-align: center; color: red;' class='not_found'>No Student found in our record!</p>";
        }
    }
    ?>

</div>
</div>
</body>

</html>