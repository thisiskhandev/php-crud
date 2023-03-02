<?php
include_once "config.php";

$stdID = $_GET['id'];

$sql = "DELETE FROM student WHERE student.sid = '{$stdID}'";

$query = mysqli_query($conn, $sql) or die("<h3>Can't Delete this user</h3>");

header("location: /crud");

mysqli_close($conn);
