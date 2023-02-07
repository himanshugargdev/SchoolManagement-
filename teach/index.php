<?php
include "header.php";

?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?= include("navBar.php") ?>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <a href="manage-attendance.php">
              <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Attendance</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">
                  <?= date("l") ?>
                </p>

                <h4 class="mb-0">
                 Today
                </h4>
            </a>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View</span> Attendance</p>
        </div>
      </div>
    </div>
    <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="manage-work.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Manage Work</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Daily  Students Work</p>
              <?php
         
              ?>
              <h4 class="mb-0">
                &nbsp;
              </h4>
          </a>
        </div>
      </div>
      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Assign/View</span> Student Work</p>
      </div>
    </div>
  </div>  -->
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="manage-test.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Manage Test</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Declare Student Test</p>
              <?php
         
              ?>
              <h4 class="mb-0">
                &nbsp;
              </h4>
          </a>
        </div>
      </div>
      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Assign/View</span> Student </p>
      </div>
    </div>
  </div> 
</main>



<?php include "footer.php" ?>