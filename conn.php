<?php

$sn = "localhost";
$un = "root";
$pass = "";
$dbn = "drive";

$conn = new mysqli($sn, $un, $pass, $dbn);

if ($conn->connect_error) {
    die("NOT CONNECTED" . $conn->connect_error);
}
?>
