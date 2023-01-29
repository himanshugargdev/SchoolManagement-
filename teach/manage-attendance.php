<?php
include "header.php";
$cls = "";
if (!isset($_GET['date'])) {
    $d = new DateTime();
    $date = $d->format('Y-m-d');
} else
    $date = $_GET['date'];
if (!isset($_GET['time'])) {
    $time = date("H:i");
} else
    $time = $_GET['time'];


if (isset($_GET['attend']) && isset($_GET['date']) && isset($_GET['stid'])) {
    $date = $_GET['date'];
    $cls = $_GET['cls'];
    $stid = $_GET['stid'];
    $attend = $_GET['attend'];
    $subj = $_GET['subj'];
    $insertby = $_SESSION['staff_id'];

    if (isset($_GET['op'])&&$_GET['op'] == "insert") {
        $sql = "INSERT INTO `attendance` (`student_id`, `class_id`, `subject_id`, `teacher_id`, `class_time`, `date`, `attendance`, `insert_by`)
            VALUES ($stid,$cls,$subj,$insertby,'$time','$date','$attend',$insertby)";

if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Error!!.","error"); </script>';
} else {
    $atid = mysqli_insert_id($conn);
    ?>
    <script>swal("Status!", "Attendance Added.", "success").then(function () {
            window.location = "manage-attendance.php?cls=<?= $cls ?>&stid=<?= $stid ?>&date=<?= $date ?>&subj=<?= $subj ?>&time=<?= $time ?>&attend=Present&atid<?= $atid ?>"
        }); </script>
    <?php
}
}
else if (isset($_GET['op'])&&$_GET['op'] == "update") {
        $atid=$_GET['atid'];
        $sql="UPDATE `attendance` SET `student_id`='$stid',`class_id`='$cls',`subject_id`='$subj',`teacher_id`='$insertby',`class_time`='$time',`date`='$date',`attendance`='$attend',`update_by`='$insertby',`update_at`=current_timestamp() WHERE id=$atid";

    
        if (!mysqli_query($conn, $sql)) {
            echo '<script>swal("Status!","Error!!.","error"); </script>';
        } else {
            $atid = mysqli_insert_id($conn);
            ?>
            <script>swal("Status!", "Attendance Updated.", "success").then(function () {
                    window.location = "manage-attendance.php?cls=<?= $cls ?>&stid=<?= $stid ?>&date=<?= $date ?>&subj=<?= $subj ?>&time=<?= $time ?>&attend=Present&atid<?= $atid ?>"
                }); </script>
            <?php
        }}

   

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
                        <a href="manage-attendance.php">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary  shadow-dark text-center border-radius-xl mt-n4 position-absolute">
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
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg  ">
                                <h6 class="mb-0">Student Record By Class</h6>
                                <div class="mb-3 text-end">
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#myModal" class="btn bg-gradient-success mb-0" ><i
                                            class="material-icons text-sm"></i>Leave Request's</button>
                                </div>
                                <div>
                                    <form method="get">
                                        <div class="mb-3">
                                            <label class="form-label">Select Class</label>
                                            <select name="cls" class="form-control form-control-lg"
                                                onchange="getSubject(this)" required>
                                                <option value="">select</option>
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
                                                          echo "selected  " ?>>
                                                        <?= $row['class_name'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Select Date
                                                <span style="color: red;">*</span></label>
                                            <input type="date" value="<?= $date ?>" name="date" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Select Time
                                                <span style="color: red;">*</span></label>
                                            <input type="time" value="<?= $time ?>" name="time" required />
                                        </div>


                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Subject</label>
                                    <select name="subj" class="form-control form-control-lg" id="subj" required>
                                        <option value="">select</option>
                                        <?php
                                        $subject_name = "";
                                        $subj = "";
                                        $cls = "";
                                        $sql = "SELECT * FROM `subject`";
                                        if (isset($_GET['cls'])) {
                                            $cls = $_GET['cls'];
                                            $sql .= "  WHERE class_id=$cls";
                                        }
                                        $sql = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                            if (isset($_GET['subj'])) {
                                                $subj = $_GET['subj'];
                                                if ($row['id'] == $subj) {
                                                    $subject_name = $row['subject_name'];
                                                }
                                            }
                                            ?>
                                            <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $subj)
                                                  echo "selected  " ?>>
                                                <?= $row['subject_name'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn bg-gradient-primary mb-0" href="javascript:;"><i
                                            class="material-icons text-sm"></i>Show Student</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm"></i>Add Event</a>
                    </div> -->
                </div>

                <div class="card-body p-3 m-1">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Selected Class Student List</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg  ">
                                <h6 class="mb-0">Students For Class <span style="color:green">
                                        <?= $class_name ?>
                                    </span></h6>

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
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['cls']) && !empty($_GET['cls'])) {

                                                $class = $_GET['cls'];
                                                $cls = $_GET['cls'];
                                                $sql = "SELECT * FROM student WHERE class_id=$class";
                                                $sql = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $row['student_roll_no'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['student_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['student_email'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['student_phone'] ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn  bg-gradient-success"
                                                                href="manage-attendance.php?cls=<?= $cls ?>&stid=<?= $row['student_id'] ?>&date=<?= $date ?>&subj=<?= $subj ?>&time=<?= $time ?>&attend=Present&op=insert">Present</a>
                                                            <a class="btn  bg-gradient-danger"
                                                                href="manage-attendance.php?cls=<?= $cls ?>&stid=<?= $row['student_id'] ?>&date=<?= $date ?>&subj=<?= $subj ?>&time=<?= $time ?>&attend=Absent&op=insert">Absent</a>
                                                            <a class="btn  bg-gradient-warning"
                                                                href="manage-attendance.php?cls=<?= $cls ?>&stid=<?= $row['student_id'] ?>&date=<?= $date ?>&subj=<?= $subj ?>&time=<?= $time ?>&attend=leave&op=insert">leave</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
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

                <div class="card-body p-3 m-1">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Attendance Table</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg  ">
                                <h6 class="mb-0">Attendance For  <span style="color:green">
                                        <?= $class_name ?> 
                                    </span> And Subject 
                                    <span style="color:green">
                                        <?= $subject_name ?> 
                                    </span>
                                </h6>

                                <hr>

                                <div>
                                    <!-- table of student -->
                                    <table class="table table-striped d-tbl" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th> Roll No</th>
                                                <th> Time</th>
                                                <th> Date</th>
                                                <th> Attendance</th>
                                                <th> Name</th>
                                                <th> Phone</th>
                                                <th> Subject</th>
                                                <th> Action | Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['cls']) && !empty($_GET['cls']) && isset($_GET['date']) && !empty($_GET['date'])) {

                                                $class = $_GET['cls'];
                                                $cls = $_GET['cls'];
                                                $sql = "SELECT * FROM attendance WHere class_id=$cls";


                                                if (isset($_GET['date'])) {
                                                    $sql .= "   AND date='$date' ";
                                                }
                                                if (isset($_GET['subj'])) {
                                                    $sql .= "   AND subject_id=$subj";
                                                }

                                                $sql = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($sql)) {

                                                    $student_id = $row['student_id'];

                                                    $st_sql = "SELECT * FROM student Where student_id=$student_id";
                                                    $st_row = mysqli_query($conn, $st_sql);
                                                    $st_row = mysqli_fetch_assoc($st_row);
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $st_row['student_roll_no'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['class_time'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['date'] ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            
                                                            switch($row['attendance']){
                                                                case 'Present': ?><span class="btn  bg-gradient-success"><?=$row['attendance']?></span>
                                                                <?php
                                                                break;
                                                                case 'Absent' ?><span class="btn  bg-gradient-danger"><?=$row['attendance']?></span>
                                                                <?php
                                                                break;
                                                                case 'leave' ?><span class="btn  bg-gradient-warning"><?=$row['attendance']?></span>
                                                                <?php
                                                                break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= $st_row['student_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $st_row['student_phone'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $subject_id = $row['subject_id'];
                                                            $sb_sql = "SELECT * FROM subject Where id=$subject_id";
                                                            $sb_row = mysqli_query($conn, $sb_sql);
                                                            $sb_row = mysqli_fetch_assoc($sb_row);
                                                            echo $sb_row['subject_name'];

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['attendance'] !== "Present") { ?>
                                                                <a class="btn  bg-gradient-success"
                                                                    href="manage-attendance.php?cls=<?= $row['class_id'] ?>&stid=<?= $st_row['student_id'] ?>&date=<?= $row['date'] ?>&subj=<?= $row['subject_id'] ?>&time=<?= $row['class_time'] ?>&atid=<?= $row['id'] ?>&attend=Present&op=update">Present</a>
                                                            <?php }
                                                            if ($row['attendance'] !== "Absent") { ?>
                                                                <a class="btn  bg-gradient-danger"
                                                                    href="manage-attendance.php?cls=<?= $row['class_id'] ?>&stid=<?= $st_row['student_id'] ?>&date=<?= $row['date'] ?>&subj=<?= $row['subject_id'] ?>&time=<?= $row['class_time'] ?>&atid=<?= $row['id'] ?>&attend=Absent&op=update">Absent</a>
                                                            <?php }
                                                            if ($row['attendance'] != "leave") { ?>
                                                                <a class="btn  bg-gradient-warning"
                                                                    href="manage-attendance.php?cls=<?= $row['class_id'] ?>&stid=<?= $st_row['student_id'] ?>&date=<?= $row['date'] ?>&subj=<?= $row['subject_id'] ?>&time=<?= $row['class_time'] ?>&atid=<?= $row['id'] ?>&attend=leave&op=update">leave</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php

                                                }
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
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="modal_content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Leave Request List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <table class="table table-striped d-tbl" style="width:100% background:#0000">
    <thead>
        <tr>
            <th> Roll No </th>
            <th> Name</th>
            <th> From</th>
            <th> To</th>
            <th>Type</th> 
            <th> Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          $sql = "SELECT * FROM leaves order by id desc"; 
        $sql = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($sql)){
            ?><tr>
            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['student_name'] ?></td>
                <td><?= $row['from'] ?></td>
                <td><?= $row['to'] ?></td>
                <td><?= $row['leave_type'] ?></td> 
                <td><?= $row['descr'] ?></td> 
                <th>
            <select onchange="setLeave('<?=$row['id']?>',this)"> 
            <option value="Not Seen Yet"  <?= $row['status']=='Not Seen Yet' ?'selected':''?>>Not Seen Yet</option>
            <option value="rejacted" <?= $row['status']=='rejacted' ?'selected':''?>  >rejacted</option>
            <option value="accepted"  <?= $row['status']=='accepted' ?'selected':''?>>accepted</option>
            </select>
            </th>
            </tr>
            <?php
        }
        ?>
    </tbody>
 </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script>

    function getSubject(event) {
        var cls = event.value;
        if (cls == "") {
            return;
        }
        var data = "getSubject=" + JSON.stringify({ cls });
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                var data = JSON.parse(xhttp.response);
                $("#subj").empty();
                $("#subj").append(`<option value=''>select</option>`)
                for (key in data) {
                    $("#subj").append(`<option value='${data[key].id}'>${data[key].subject_name}</option>`)
                }
            }
        };
        xhttp.open("POST", "../admin/ajex.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(data);
    }
    function setLeave(id,event) {
        var value = event.value;
        if (value == "") {
            return;
        }
        var data = "setLeave=" + JSON.stringify({ id,value });
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                var data = JSON.parse(xhttp.response);
                swal("Status",data.msg,data.state);
            }
        };
        xhttp.open("POST", "../admin/ajex.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(data);
    }
</script>