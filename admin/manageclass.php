<?php
include "header.php";
$class_name = $class_id = $incharge_id = $class_name = "";

if (isset($_POST['update']) || isset($_POST['new'])) {
  $class_name = $_POST['class_name'];
  $incharge_id = $_POST['incharge_id'];
  $admin_id = $_SESSION['admin_id'];
}

if (isset($_POST['update'])) {
  $cls = $_POST['cls'];
  $date = date("Y-m-d h:i:saY-m-d");
  $sql = "UPDATE `classes` SET `class_name`='$class_name', `update_by`=$admin_id ,`update_at`='$date',`incharge_id`='$incharge_id' WHERE `id`=$cls";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Update.","error"); </script>';
  } else {

    echo '<script>swal("Status!","Updated.","success"); </script>';
  }
}

if (isset($_POST['new'])) {
  $sql = "INSERT INTO `classes`( `class_name`, `insert_by`,  `incharge_id`) VALUES ('$class_name',$admin_id,'$incharge_id')";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Add New Class.","error"); </script>';
  } else {
    $cls = mysqli_insert_id($conn);
    echo '<script>swal("Status!","New Class Added.","success").then(function(){
        window.location="manageclass.php?cls=' . $cls . '";
      }); </script>';
  }
}


if (isset($_GET['cls'])) {
  $cls = $_GET['cls'];
  $sql = "SELECT * from classes where id=$cls";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $class_name = $row['class_name'];
    $cls = $row['id'];
    $incharge_id = $row['incharge_id'];
    $cls_sql = "SELECT * from classes where id=$incharge_id";
    $cls_sql = mysqli_query($conn, $cls_sql);
    $cls_row = mysqli_fetch_assoc($cls_sql);
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
              <i class="material-icons opacity-10">Manage Class</i>
            </div>
            <div class="text-end pt-1">
              <?php
              $sql = "SELECT id FROM classes ";
              $sql = mysqli_query($conn, $sql);
              $total_cls_row = mysqli_num_rows($sql);
              ?>
              <p class="text-sm mb-0 text-capitalize">Total Classes</p>
              <h4 class="mb-0"><?= $total_cls_row ?></h4>
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
            <div class="col-6 text-end">

              <?php
                 if (isset($cls)) {
                 ?>
                  <a class="btn bg-gradient-primary mb-0" href="manageclass.php"><i
                      class="material-icons text-sm"></i>New</a>
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
                <h6 class="mb-0">All Class Details</h6>
                <div class="card card-body   card-plain border-radius-lg  "
                  style="overflow-y: scroll;min-height: 300px; max-height: 500px;">

                  <?php
                       $sql = "SELECT * FROM classes order by class_name asc";
                       $sql = mysqli_query($conn, $sql);
                       if (mysqli_num_rows($sql) > 0) {
                         while ($row_class = mysqli_fetch_assoc($sql)) {
                           $getInchange = "SELECT * FROM `staff` WHERE staff_id=" . $row_class['incharge_id'];
                           $getInchange = mysqli_query($conn, $getInchange);
                           $getInchange = mysqli_fetch_assoc($getInchange);
                       ?>
                  <div class="col-md-12 mb-md-0 mb-4 event-item">
                    <p><b>Class Name: </b><b style="float:right"><?= $row_class['class_name'] ?></b></p>
                    <p><b>Class Id: </b><b style="float:right"><?= $row_class['id'] ?></b></p>
                    <p><b>Class Incharge: </b><b style="float:right"><?= $getInchange['staff_name']; ?>
                        (<?= $getInchange['staff_role'] ?>) in <?= $getInchange['subject'] ?></b></p>
                    <div class="col-12 text-end">
                      <a class="btn bg-gradient-primary mb-0" href="manageclass.php?cls=<?= $row_class['id'] ?>"><i
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
              <div class="card card-body border card-plain border-radius-lg  "
                style="overflow-y: scroll;min-height: 300px; max-height: 500px;">
                <h6 class="mb-0">Add / Update Classes</h6>
                <form method="post">
                  <div class="mb-3">
                    <label class="form-label">Class Name</label>
                    <input type="text" name="class_name" class="form-control form-control-lg" value="<?= $class_name ?>"
                      placeholder="  Name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Select Incharge</label>
                    <select name="incharge_id" class="form-control form-control-lg">
                      <option value="">select</option>
                      <?php
                            $sql = "SELECT * FROM `staff` WHERE (`staff_role`='Teacher' OR `staff_role`='Teacher' OR `staff_role`='Professor' OR `staff_role`='Assistant Professor')";
                            $sql = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                      <option value="<?= $row['staff_id'] ?>" <?php if ($row['staff_id'] == $incharge_id)
                                echo "selected  " ?>>
                        <?= $row['staff_name'] ?> (<?= $row['staff_role'] ?>) in (<?= $row['subject'] ?>)</option>
                      <?php } ?>

                    </select>
                  </div>
                  <div class="mb-3 text-end">
                    <?php
                         if (isset($cls)) {
                         ?>
                    <input style="display:none;" type="number" class="form-control form-control-lg" value="<?= $cls ?>"
                      name="cls" required>
                    <button class="btn bg-gradient-primary mb-0" name="update"><i
                        class="material-icons text-sm"></i>Update Class</button>
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