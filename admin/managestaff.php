<?php
include "header.php";
$staff_name = $staff_id = $staff_email = $staff_phone = $status = $staff_role = $specialization = "";


if (isset($_POST['update']) || isset($_POST['new'])) {
  $staff_name = $_POST['staff_name'];
  $staff_email = $_POST['staff_email'];
  $staff_phone = $_POST['staff_phone'];
  $staff_role = $_POST['staff_role'];
  $specialization = $_POST['specialization'];
  $status = $_POST['status'];
  $admin_id = $_SESSION['admin_id'];
}

if (isset($_POST['update'])) {
  $staff_id = $_POST['stfid'];
  $date = date("Y-m-d h:i:saY-m-d");
  $sql = "UPDATE `staff` SET  `staff_name`= '$staff_name',`staff_email`= '$staff_email',`staff_phone`= '$staff_phone' ,`update_by`= $admin_id,`update_at`= '$date',`status` ='$status' , `staff_role`='$staff_role',`specialization`='$specialization' WHERE staff_id=$staff_id";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Update.","error"); </script>';
  } else {

    echo '<script>swal("Status!","Updated.","success"); </script>';
  }
}

if (isset($_POST['new'])) {

  echo $sql = "INSERT INTO `staff`( `staff_name`, `staff_email`, `staff_phone`, `staff_psw`, `insert_by` ,`status`,`staff_role`,`specialization`) VALUES (    '$staff_name',  '$staff_email', '$staff_phone' ,  '123456', '$admin_id','$status','$staff_role','$specialization')";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Add New Staff Mamber.","error"); </script>';
  } else {
    $stfid = mysqli_insert_id($conn);
    echo '<script>swal("Status!","New staff Mamber Added.","success").then(function(){
        window.location="managestaff.php?stfid=' . $stfid . '";
      }); </script>';
  }
}


if (isset($_GET['stfid'])) {
  $stfid = $_GET['stfid'];
  $sql = "SELECT * from staff where staff_id=$stfid";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $staff_name = $row['staff_name'];
    $staff_id = $row['staff_id'];
    $staff_email = $row['staff_email'];
    $staff_phone = $row['staff_phone'];
    $status = $row['status'];
    $staff_role = $row['staff_role'];
    $specialization = $row['specialization'];
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
              <i class="material-icons opacity-10">Manage Staff's</i>
            </div>
            <div class="text-end pt-1">
              <?php
              $sql = "SELECT staff_id FROM staff ";
              $sql = mysqli_query($conn, $sql);
              $total_std_row = mysqli_num_rows($sql);
              ?>
              <p class="text-sm mb-0 text-capitalize">Total staffs</p>
              <h4 class="mb-0"><?= $total_std_row ?></h4>
            </div>
          </div>
          <hr class="primary horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Add /Update </span>Click hare to
              Manage</p>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-12 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Staff Mamner's <span style="color:green"> </span></h6>
                <hr>
                <div>
                  <!-- table of staff -->
                  <table class="table table-striped d-tbl" style="width:100%">
                    <thead>
                      <tr>
                        <th> #</th>
                        <th> Name</th>
                        <th> Email</th>
                        <th> Phone</th>
                        <th> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                                $sql = "SELECT * FROM staff ";
                                $sql = mysqli_query($conn, $sql);
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($sql)) {

                                ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['staff_name'] ?></td>
                        <td><?= $row['staff_email'] ?></td>
                        <td><?= $row['staff_phone'] ?></td>
                        <td><a href="managestaff.php?stfid=<?= $row['staff_id'] ?>">View</a></td>
                      </tr>
                      <?php
                                  $i++;
                                }

                                  ?>

                    </tbody>
                  </table>
                  <!-- table of staff end -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Staff Details</h6>
            </div>
            <div class="col-6 text-end">

              <?php
                 if (isset($stfid)) {
                 ?>
              <a class="btn bg-gradient-primary mb-0" href="managestaff.php"><i
                  class="material-icons text-sm"></i>New</a>
              <?php
                 } else {
                    ?>
              <a class="btn bg-gradient-primary mb-0" href="staffs.php"><i class="material-icons text-sm"></i>Choose For
                Update</a>
              <?php
                 }
                  ?>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Staff View</h6>
                <div class="card card-body   card-plain border-radius-lg  "
                  style="overflow-y: scroll;min-height: 300px; max-height: 500px;">
                  <div class="col-md-12 mb-md-0 mb-4 event-item">
                    <p><b>ID: </b><b style="float:right"><?= $staff_id ?></b></p>
                    <p><b>Name: </b><b style="float:right"><?= $staff_name ?></b></p>
                    <p><b>Email: </b><b style="float:right"><?= $staff_email ?></b></p>
                    <p><b>Phone: </b><b style="float:right"><?= $staff_phone ?></b></p>
                    <p><b>Role: </b><b style="float:right"><?= $staff_role ?></b></p>
                    <p><b>Specialization: </b><b style="float:right"><?= $specialization ?></b></p>
                    <p><b>Status: </b><b style="float:right"><?= $status ?></b></p>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  "
                style="overflow-y: scroll;min-height: 300px; max-height: 500px;">
                <h6 class="mb-0">Add / Update </h6>
                <form method="post">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="staff_name" class="form-control form-control-lg" value="<?= $staff_name ?>"
                      placeholder="  Name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="staff_email" class="form-control form-control-lg"
                      value="<?= $staff_email ?>" placeholder="  Email">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="number" name="staff_phone" class="form-control form-control-lg"
                      value="<?= $staff_phone ?>" placeholder="  Phone">
                  </div>
                  <!-- 'Teacher','Professor','','Assistant professor','Temp_Worker' -->
                  <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="staff_role" class="form-control form-control-lg">
                      <option value="" <?php if ($staff_role == "")
                              echo "selected"; ?>>select</option>
                      <option value="Teacher" <?php if ($staff_role == "Teacher")
                              echo "selected"; ?>>Teacher</option>
                      <option value="Professor" <?php if ($staff_role == "Professor")
                              echo "selected"; ?>>Professor</option>
                      <option value="Helper" <?php if ($staff_role == "Helper")
                              echo "selected"; ?>>Helper</option>
                      <option value="Assistant professor" <?php if ($staff_role == "Assistant professor")
                              echo "selected"; ?>>Assistant professor</option>
                      <option value="Temp_Worker" <?php if ($staff_role == "Temp_Worker")
                              echo "selected"; ?>>Temp Worker
                      </option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Specialization</label>
                    <input type="text" name="specialization" class="form-control form-control-lg"
                      value="<?= $specialization ?>" placeholder="specialization">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control form-control-lg">
                      <option value="" <?php if ($status == "")
                              echo "selected"; ?>>select</option>
                      <option value="active" <?php if ($status == "active")
                              echo "selected"; ?>>active</option>
                      <option value="in-active" <?php if ($status == "in-active")
                              echo "selected"; ?>>in-active</option>
                    </select>
                  </div>
                  <div class="mb-3 text-end">
                    <?php
                         if (isset($stfid)) {
                         ?>
                    <input style="display:none;" type="number" class="form-control form-control-lg" value="<?= $stfid ?>"
                      name="stfid" required>
                    <button class="btn bg-gradient-primary mb-0" name="update"><i
                        class="material-icons text-sm"></i>Update staff</button>
                    <?php
                         } else {
                            ?>
                    <button class="btn bg-gradient-primary   mb-0" name="new"><i class="material-icons text-sm"></i>New
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
</main>



<?php include "footer.php" ?>