<?php
include "header.php";
$subject_title = $class_id = $subject_name = $discription = $class_name = "";
if (isset($_POST['update']) || isset($_POST['new'])) {
  $subject_title = $_POST['subject_title'];
  $subject_name = $_POST['subject_name'];
  $discription = $_POST['discription'];
  $class_id = $_POST['class_id'];
  $admin_id = $_SESSION['admin_id'];
}

if (isset($_POST['new'])) {
  $sql = "INSERT INTO `subject`( `class_id`, `subject_name`, `subject_title`, `discription`,`insert_by`) VALUES ('$class_id','$subject_name','$subject_title','$discription',$admin_id)";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Add New Subject.","error"); </script>';
  } else {
    $subj = mysqli_insert_id($conn);
    echo '<script>swal("Status!","New Subject Added.","success").then(function(){
      window.location="managesubject.php?cls=' . $class_id . '&subj=' . $subj . '";
    }); </script>';
  }
}


if (isset($_POST['update'])) {
  $subj = $_POST['subj'];
  $date = date("Y-m-d h:i:saY-m-d");
  $sql = "UPDATE `subject` SET `class_id`='$class_id',`subject_name`='$subject_name',`subject_title`='$subject_title',`discription`='$discription',  `update_at`='$date',`update_by`='$admin_id' WHERE id=$subj";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Update.","error"); </script>';
  } else {
    echo '<script>swal("Status!","Updated.","success").then(function(){
        window.location="managesubject.php?cls=' . $class_id . '&subj=' . $subj . '";
      }); </script>';
  }
}

if (isset($_GET['subj'])) {
  $subj = $_GET['subj'];
  $sql = "SELECT * from subject where id=$subj";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $subject_title = $row['subject_title'];
    $subject_name = $row['subject_name'];
    $discription = $row['discription'];
    $class_id = $row['class_id'];
    $subj = $row['id'];
  }
}


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
              <i class="material-icons opacity-10">Manage Subject</i>
            </div>
            <div class="text-end pt-1">
              <?php
              $sql = "SELECT id FROM subject ";
              $sql = mysqli_query($conn, $sql);
              $total_subj_row = mysqli_num_rows($sql);
              ?>
              <p class="text-sm mb-0 text-capitalize">Total Subject</p>
              <h4 class="mb-0"><?= $total_subj_row ?></h4>
            </div>
          </div>
          <hr class="primary horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Add /Update </span> hare...</p>
          </div>
        </div>
      </div>

    </div>


    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Classes Details</h6>
            </div>

          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">


            <div class="col-12 text-end">

              <?php
                     if (isset($subj)) {
                     ?>
              <a class="btn bg-gradient-primary mb-0" href="managesubject.php"><i
                  class="material-icons text-sm"></i>New</a>

              <?php
                     }
                      ?>
            </div>

            <div class="col-md-12 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Subject List By Class</h6>
                <div>
                  <form method="get">
                    <div class="mb-3">
                      <label class="form-label">Select Class</label>
                      <select name="cls" class="form-control form-control-lg">
                        <option value="">select</option>
                        <?php

                            $sql = "SELECT * FROM `classes`";
                            $sql = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($sql)) {
                              if (isset($_GET['cls'])) {
                                $cls = $_GET['cls'];
                                if ($row['id'] == $cls) {
                                  $class_name = $row['class_name'];
                                }
                              } else {
                                $cls = "";
                              }
                            ?>
                        <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $cls)
                                echo "selected  " ?>>
                          <?= $row['class_name'] ?></option>
                        <?php } ?>

                      </select>
                    </div>
                    <div class="mb-3 text-end">
                      <button type="submit" class="btn bg-gradient-primary mb-0" href="javascript:;"><i
                          class="material-icons text-sm"></i>Show Subject</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">All Subject Details <span style="color:green"><?= $class_name ?></span></h6>
                <div class="card card-body   card-plain border-radius-lg  "
                  style="overflow-y: scroll;min-height: 300px; max-height: 500px;">

                  <?php
                       $sql = "SELECT * FROM subject ";
                       if (!empty($cls)) {
                         $sql .= "WHERE class_id=$cls order by subject_name asc";
                       }
                       $sql = mysqli_query($conn, $sql);
                       if (mysqli_num_rows($sql) > 0) {
                         while ($subj_row = mysqli_fetch_assoc($sql)) {
                       ?>
                  <div class="col-md-12 mb-md-0 mb-4 event-item">
                    <p><b>Sunject Name: </b><b style="float:right"><?= $subj_row['subject_name'] ?></b></p>
                    <p><b>Subject Id: </b><b style="float:right"><?= $subj_row['id'] ?></b></p>
                    <details>
                      <p><span><b>Title:</b></span> <?= $subj_row['subject_title'] ?></p>
                      <p><span><b>Discription:</b></span> <?= $subj_row['discription'] ?></p>
                    </details>
                    <div class="col-12 text-end">
                      <a class="btn bg-gradient-primary mb-0"
                        href="managesubject.php?cls=<?= $cls ?>&subj=<?= $subj_row['id'] ?>"><i
                          class="material-icons text-sm"></i>update</a>
                    </div>

                  </div>
                  <?php
                         }
                       }


                         ?>

                </div>
              </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Add / Update Subject</h6>
                <div class="card card-body border card-plain border-radius-lg  "
                  style="overflow-y: scroll;min-height: 300px; max-height: 500px;">
                  <form method="post">
                    <div class="mb-3">
                      <label class="form-label">Subject Name</label>
                      <input type="text" name="subject_name" class="form-control form-control-lg"
                        value="<?= $subject_name ?>" placeholder="  Name">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Subject Title</label>
                      <input type="text" name="subject_title" class="form-control form-control-lg"
                        value="<?= $subject_title ?>" placeholder="  title">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Subject Desc...</label>
                      <textarea name="discription" placeholder="Discription" class="form-control form-control-lg"
                        rows="5"><?= $discription ?></textarea>
                    </div>


                    <div class="mb-3">
                      <label class="form-label">Under The Class</label>
                      <select name="class_id" class="form-control form-control-lg">
                        <option value="">select</option>
                        <?php
                            $sql = "SELECT * FROM `classes`";
                            $sql = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                        <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $class_id)
                                echo "selected  " ?>>
                          <?= $row['class_name'] ?></option>
                        <?php } ?>

                      </select>
                    </div>
                    <div class="mb-3 text-end">
                      <?php
                         if (isset($subj)) {
                         ?>
                      <input style="display:none;" type="number" class="form-control form-control-lg"
                        value="<?= $subj ?>" name="subj" required>
                      <button class="btn bg-gradient-primary mb-0" name="update"><i
                          class="material-icons text-sm"></i>Update Subject</button>
                      <?php
                         } else {
                            ?>
                      <button class="btn bg-gradient-primary   mb-0" name="new"><i
                          class="material-icons text-sm"></i>New Subject</button>
                      <?php
                         }
                            ?>
                    </div>
                  </form>
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