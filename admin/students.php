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
            <div
              class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
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
            </div>
          </div>
          <hr class="primary horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than Yesterday Persent</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-12 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Student Record By Class</h6>
                <div>
                  <form method="get">
                    <div class="mb-3">
                      <label class="form-label">Select Class</label>
                      <select name="cls" class="form-control form-control-lg">
                        <option value="">Self Registered</option>

                        <?php
                        $class_name = "";
                        $class = "";
                        $sql = "SELECT * FROM `classes`";
                        $sql = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($sql)) {
                          if (isset($_GET['cls'])) {
                            $class = $_GET['cls'];
                            if ($row['id'] == $class) {
                              $class_name = $row['class_name'];
                            }
                          }
                        ?>
                        <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $class)
                            echo "selected disabled" ?>>
                          <?= $row['class_name'] ?></option>
                        <?php } ?>

                      </select>
                    </div>
                    <div class="mb-3 text-end">
                      <button type="submit" class="btn bg-gradient-primary mb-0" href="javascript:;"><i
                          class="material-icons text-sm"></i>Show Students</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Selected Class Student List</h6>
            </div>
            <!-- <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm"></i>Add Event</a>
                    </div> -->
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-12 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Students For Class <span style="color:green"><?= $class_name ?></span></h6>
                <hr>
                <div>
                  <!-- table of student -->
                  <table class="table table-striped d-tbl" style="width:100%">
                    <thead>
                      <tr>
                        <th> Roll No</th>
                        <th> Name</th>
                        <th> Email</th>
                        <th> Phone</th>
                        <th> self Registered</th>
                        <th> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['cls']) && !empty($_GET['cls'])) {

                        $class = $_GET['cls'];

                        $sql = "SELECT * FROM student WHERE class_id=$class";
                      }else{
                        $sql = "SELECT * FROM student WHERE isselfRegistered=1";
                      }
                      
                      $sql = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($sql)) {
                      ?>
                      <tr>
                        <td><?= $row['student_roll_no'] ?></td>
                        <td><?= $row['student_name'] ?></td>
                        <td><?= $row['student_email'] ?></td>
                        <td><?= $row['student_phone'] ?></td>
                        <td><?= $row['isselfRegistered']==1? 'YES' : 'NO' ?></td>
                        <td><a href="managestudent.php?stid=<?= $row['student_id'] ?>">View</a></td>
                      </tr>
                      <?php
                        }
                      
                      ?>

                    </tbody>
                  </table>
                  <!-- table of student end -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</main>



<?php include "footer.php" ?>


 