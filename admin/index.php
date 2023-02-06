<?php
include "header.php";

?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?= include("navBar.php") ?>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <!-- student -->
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <a href="students.php">
              <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Students</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Students</p>
                <?php
                $sql = "SELECT student_id FROM student ";
                $sql = mysqli_query($conn, $sql);
                $total_std_row = mysqli_num_rows($sql);
                ?>
                <h4 class="mb-0"><?= $total_std_row ?></h4>
            </a>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View</span> All Students</p>
        </div>
      </div>
    </div>
    <!-- manage student -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="managestudent.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Manage Students</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Students</p>
              <h4 class="mb-0"><?= $total_std_row ?></h4>
            </div>
          </a>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Add /Update </span>Click hare to Manage
          </p>
        </div>
      </div>
    </div>

    <!-- class -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="manageclass.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Manage Class</i>
            </div>
            <?php
              $sql = "SELECT id FROM classes ";
              $sql = mysqli_query($conn, $sql);
              $total_cls_row = mysqli_num_rows($sql);
              ?>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Class</p>
              <h4 class="mb-0"><?= $total_cls_row ?></h4>
            </div>
          </a>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Add/Update </span>Manage Class hare.</p>
        </div>
      </div>
    </div>

    <!-- subject -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="managesubject.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Manage Subject</i>
            </div>
            <?php
              $sql = "SELECT id FROM subject ";
              $sql = mysqli_query($conn, $sql);
              $total_subj_row = mysqli_num_rows($sql);
              ?>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Subject</p>
              <h4 class="mb-0"><?= $total_subj_row ?></h4>
            </div>
          </a>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Add/Update </span>Manage Subject hare.
          </p>
        </div>
      </div>
    </div>
    <hr>
    <!-- staff -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="managestaff.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Manage Staff Mamber's</i>
            </div>
            <?php
              $sql = "SELECT staff_id FROM staff ";
              $sql = mysqli_query($conn, $sql);
              $total_staff_row = mysqli_num_rows($sql);
              ?>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Staff</p>
              <h4 class="mb-0"><?= $total_staff_row ?></h4>
            </div>
          </a>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Add/Update </span>Manage Staff hare.</p>
        </div>
      </div>
    </div>

    <!-- study point -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="studypoint.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Students Study Point</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">&nbsp; </p>
              <h4 class="mb-0">&nbsp;</h4>
            </div>
          </a>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Our </span> Active Lessions/Topic</p>
        </div>
      </div>
    </div>
    <!-- Event /Calender -->
    <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <a href="events.php">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Event /Calender</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">&nbsp; </p>
              <h4 class="mb-0">&nbsp;</h4>
            </div>
          </a>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Our </span> Event /Calender</p>
        </div>
      </div>
    </div> -->
  </div>

  </div>
</main>



<?php include "footer.php" ?>