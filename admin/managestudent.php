<?php
include "header.php";
$student_name = $student_id = $student_roll_no = $student_email = $student_phone = $class_id = $class_name = $status = "";


if (isset($_POST['update']) || isset($_POST['new'])) {
  $student_name = $_POST['student_name'];
  $student_roll_no = $_POST['student_roll_no'];
  $student_email = $_POST['student_email'];
  $student_phone = $_POST['student_phone'];
  $class_id = $_POST['class_id'];
  $admin_id = $_SESSION['admin_id'];
  $status = $_POST['status'];
  $s_question = $_POST['s_question'];
  $answer = $_POST['answer'];
}

if (isset($_POST['update'])) {
  $student_id = $_POST['stid'];
  $date = date("Y-m-d h:i:saY-m-d");
  $sql = "UPDATE `student` SET `security_question`='$s_question', `security_answer`='$answer',`student_roll_no`='$student_roll_no' ,`class_id`= '$class_id',`student_name`= '$student_name',`student_email`= '$student_email',`student_phone`= '$student_phone' ,`update_by`= $admin_id,`update_at`= '$date',`status` ='$status' WHERE student_id=$student_id";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Update.'.mysqli_error($conn).'","error"); </script>';
  } else {

    echo '<script>swal("Status!","Updated.","success"); </script>';
  }
}

if (isset($_POST['new'])) {

    $sql = "INSERT INTO `student`( `student_roll_no`, `class_id`, `student_name`, `student_email`, `student_phone`, `student_psw`, `insert_by` ,`status`,`security_question` ,`security_answer`) VALUES ('$student_roll_no',  '$class_id',  '$student_name',  '$student_email', '$student_phone' ,  '123456',  $admin_id,'$status','$s_question', '$answer')";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Add New Student.","error"); </script>';
  } else {
    $stid = mysqli_insert_id($conn);
    echo '<script>swal("Status!","New Student Added.","success").then(function(){
        window.location="managestudent.php?stid=' . $stid . '";
      }); </script>';
  }
}


if (isset($_GET['stid'])) {
  $stid = $_GET['stid'];
  $sql = "SELECT * from student where student_id=$stid";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $student_name = $row['student_name'];
    $student_id = $row['student_id'];
    $student_roll_no = $row['student_roll_no'];
    $student_email = $row['student_email'];
    $student_phone = $row['student_phone'];
    $class_id = $row['class_id'];
    $status = $row['status'];
    $s_question = $row['security_question'];
    $answer = $row['security_answer'];
   
      $cls_sql = "SELECT * from classes where id=$class_id";
      $cls_sql = mysqli_query($conn, $cls_sql);
      $cls_row = mysqli_fetch_assoc($cls_sql);
      if(isset($cls_row['class_name'])){

        $class_name = $cls_row['class_name'];
      }else
      $class_name = "NOT a Class Member";
   
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
              <i class="material-icons opacity-10">Manage Students</i>
            </div>
            <div class="text-end pt-1">
              <?php
              $sql = "SELECT student_id FROM student ";
              $sql = mysqli_query($conn, $sql);
              $total_std_row = mysqli_num_rows($sql);
              ?>
              <p class="text-sm mb-0 text-capitalize">Total Students</p>
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
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Student Details</h6>
            </div>
            <div class="col-6 text-end">

              <?php
                 if (isset($stid)) {
                 ?>
              <a class="btn bg-gradient-primary mb-0" href="managestudent.php"><i
                  class="material-icons text-sm"></i>New</a>
              <?php
                 } else {
                    ?>
              <a class="btn bg-gradient-primary mb-0" href="students.php"><i class="material-icons text-sm"></i>Choose
                For Update</a>
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
                <h6 class="mb-0">Student View</h6>
                <div class="card card-body   card-plain border-radius-lg  "
                  style="overflow-y: scroll;min-height: 300px; max-height: 500px;">
                  <div class="col-md-12 mb-md-0 mb-4 event-item">
                    <p><b>ID: </b><b style="float:right"><?= $student_id ?></b></p>
                    <p><b>Name: </b><b style="float:right"><?= $student_name ?></b></p>
                    <p><b>Roll No: </b><b style="float:right"><?= $student_roll_no ?></b></p>
                    <p><b>Email: </b><b style="float:right"><?= $student_email ?></b></p>
                    <p><b>Phone: </b><b style="float:right"><?= $student_phone ?></b></p>
                    <p><b>Class: </b> <b style="float:right"><?= $class_name ?></b></p>
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
                    <input type="text" name="student_name" class="form-control form-control-lg"
                      value="<?= $student_name ?>" placeholder="  Name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="student_email" class="form-control form-control-lg"
                      value="<?= $student_email ?>" placeholder="  Email">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="number" name="student_phone" class="form-control form-control-lg"
                      value="<?= $student_phone ?>" placeholder="  Phone">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Class</label>
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

                  <div class="mb-3">
                    <label class="form-label">Roll No.</label>
                    <input type="number" name="student_roll_no" class="form-control form-control-lg"
                      value="<?= $student_roll_no ?>" placeholder="  Roll No.">
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Security Question</label>
                    <select name="s_question" class="form-control form-control-lg">
                           <option value="">select</option>
                            <option value="Enter your Best Friend Name"  <?=$s_question=='Enter your Best Friend Name'?'selected':null?>>Enter your Best Friend Name</option>                   
                            <option value="Enter your Pat Name"          <?=$s_question=='Enter your Pat Name'?'selected':null?>>Enter your Pat Name</option>                   
                            <option value="Enter your First School Name" <?=$s_question=='Enter your First School Name'?'selected':null?>>Enter your First School Name</option>                   
                            
                    </select>
                    <div class="mb-3">
                    <label class="form-label">Answer</label>
                    <input type="password" name="answer" class="form-control form-control-lg"
                      value="<?= $answer ?>" placeholder="Answer">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control form-control-lg">
                      <option value="">select</option>
                      <option value="active" selected>active</option>
                      <option value="in-active">in-active</option>

                    </select>
                  </div>
                  <div class="mb-3 text-end">
                    <?php
                         if (isset($stid)) {
                         ?>
                    <input style="display:none;" type="number" class="form-control form-control-lg" value="<?= $stid ?>"
                      name="stid" required>
                    <button class="btn bg-gradient-primary mb-0" name="update"><i
                        class="material-icons text-sm"></i>Update Student</button>
                    <?php
                         } else {
                            ?>
                    <button class="btn bg-gradient-primary   mb-0" name="new"><i class="material-icons text-sm"></i>New
                      Student</button>
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