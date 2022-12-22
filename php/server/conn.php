<?php
$host = "localhost";
$psw = "";
$root = "root";
$db = "crsu_school_managment";
$conn = mysqli_connect($host, $root, $psw, $db);

if ($conn->connect_error) {
    die("DB : ".$db ." Connection failed: " . $conn->connect_error);
  }

?>  