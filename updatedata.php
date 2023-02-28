<?php
include_once "config.php";

$std_id = $_POST['sid'];
$std_name = $_POST['sname'];
$std_add = $_POST['saddress'];
$std_class = $_POST['cid'];
$std_phone = $_POST['sphone'];

$sql = "UPDATE student SET sname = '{$std_name}', saddress = '{$std_add}', sclass = '{$std_class}', sphone = '{$std_phone}' WHERE student.sid = '{$std_id}'";

$query = mysqli_query($conn, $sql) or die("<h3>Connection is not establish check db connection</h3>");

header("location: /crud");
mysqli_close($conn);
