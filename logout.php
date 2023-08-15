<?php
include "server/conn.php";
session_unset();
session_destroy();
header("location:login.php");
?>