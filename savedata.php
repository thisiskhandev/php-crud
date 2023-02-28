<?php
include_once "config.php";

$std_name = $_POST['sname'];
$std_address = $_POST['saddress'];
$std_class = $_POST['class'];
$std_phone = $_POST['sphone'];

$sql = "INSERT INTO student(sname, saddress, sclass, sphone) VALUES ('{$std_name}', '{$std_address}', '{$std_class}', '{$std_phone}')";

$result = mysqli_query($conn, $sql) or die("Query didn't run...");

header("location: /crud");
mysqli_close($conn);
