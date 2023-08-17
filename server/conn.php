<?php

require_once("init.php");


$conn = mysqli_connect($host, $root, $psw, $db);
date_default_timezone_set('asia/kolkata');
if ($conn->connect_error) {
  die("DB : " . $db . " Connection failed: " . $conn->connect_error);
}
?>