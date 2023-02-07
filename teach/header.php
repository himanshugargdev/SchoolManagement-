<?php
include "../server/session.php";
if (!isset($_SESSION['session_status'])) {

  echo '<script>window.location="../login.php";</script>';

}
if (!isset($_SESSION["staff_id"])) {
  echo '<script>window.location="../login.php";</script>';
}
include "../server/conn.php";
$sql = "SELECT * FROM staff WHERE    staff_id=" . $_SESSION['staff_id'];
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  $row_adm = mysqli_fetch_assoc($res);
  $_SESSION['staff_id'] = $row_adm['staff_id'];
  $_SESSION['staff_name'] = $row_adm['staff_name'];
  $_SESSION['staff_email'] = $row_adm['staff_email'];
  $_SESSION['staff_phone'] = $row_adm['staff_phone'];
  $_SESSION['staff_role'] = $row_adm['staff_role'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/white.png">
  <link rel="icon" type="image/png" href="../assets/images/white.png">
  <title>
    Home
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
  <!-- sweetalert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="../assets/images/white.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">WELCOME<br><?= $_SESSION['staff_name'] ?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="index.php">
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white   bg-gradient-secondary" href="profile.php">
            <span class="nav-link-text ms-1">My Profile</span>
          </a>
        </li> 
        
        <li class="nav-item">
          <a class="nav-link text-white   bg-gradient-secondary" href="manage-attendance.php">
            <span class="nav-link-text ms-1"> Attendance</span>
          </a>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link text-white   bg-gradient-secondary" href="manage-work.php">
            <span class="nav-link-text ms-1">Manage Work</span>
          </a>
        </li> -->
        
        <li class="nav-item">
          <a class="nav-link text-white   bg-gradient-secondary" href="manage-test.php">
            <span class="nav-link-text ms-1">Manage Test</span>
          </a>
        </li>
        
       
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php" type="button">Logout</a>
      </div>
    </div>
  </aside>