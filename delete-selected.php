<?php
// session_start();
# CHECKBOXES K LYE SEPERATE FILE MEN BHEJNA LAZMI HA OTHERWISE PHP_SELF PR CODE RUN NHI HOGA YAR PHIR SESSION / COOKIES / LOCALSTORAGE PR WORK KRNA HOGA.
include_once "config.php";
if (isset($_POST['deleteAll'])) {
    if (!empty($_POST['checkboxes'])) {
        // print_r($_POST['checkboxes']);
        foreach ($_POST['checkboxes'] as $checkboxes) {
            // echo $checkboxes . "<br>";
            $sql = "DELETE FROM student WHERE sid = {$checkboxes}";
            mysqli_query($conn, $sql) or die("Error while deleting multiple data");
            header("location: /crud");
        }
    } else {
        echo "no checkboxes are checked!";
    }
}
