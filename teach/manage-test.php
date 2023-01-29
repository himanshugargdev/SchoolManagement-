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


if (isset($_GET['title'])) {
$title = $_GET['title'];
} else {
$title = "";
}
if (isset($_GET['type'])) {
$type = $_GET['type'];
} else {
$type = "";
}
if (isset($_GET['obtained_marks'])) {
$obtained_marks = $_GET['obtained_marks'];
} else {
$obtained_marks = "";
}
if (isset($_GET['total_marks'])) {
$total_marks = $_GET['total_marks'];
} else {
$total_marks = "";
}
if (isset($_GET['result'])) {
$result = $_GET['result'];
} else {
$result = "";
}

if (isset($_GET['stid'])) {
$date = $_GET['date'];
$cls = $_GET['cls'];
$stid = $_GET['stid'];
$subj = $_GET['subj'];
$insertby = $_SESSION['staff_id'];

if (isset($_GET['smt'])&& isset($_GET['rid'])) {
$rid = $_GET['rid'];
$sql = "UPDATE `test` SET `subject_id`='$subj',`class_id`='$cls',`student_id`='$stid',`type`='$type',`title`='$title',`obtained_marks`='$obtained_marks',`total_marks`='$total_marks',`result`='$result',`date`='$date',`time`='$time',`update_by`='$insertby',`update_at`=current_timestamp() WHERE id=$rid";
if (!mysqli_query($conn, $sql)) {
echo '<script>swal("Status!", "Error!!.", "error"); </script>';
} else { 
?>
<script>swal("Status!", "Result Updated.", "success").then(function () {
        window.location = "manage-test.php?cls=<?= $cls ?>&stid=<?= $stid ?>&type=<?=$type?>&date=<?= $date ?>&title=<?=$title?>&obtained_marks=<?=$obtained_marks?>&total_marks=<?=$total_marks?>&result=<?=$result?>&subj=<?= $subj ?>&time=<?= $time ?>&rid=<?= $rid ?>"
    });  </script>
<?php
}

} else if (isset($_GET['smt'])) {
$sql = "INSERT INTO `test`(  `subject_id`, `class_id`, `student_id`, `type`, `title`,  `obtained_marks`, `total_marks`, `result`,`date`,`time`, `insert_by`,   `insert_at` ) VALUES ('$subj','$cls','$stid','$type','$title','$obtained_marks','$total_marks','$result','$date','$time','$insertby',current_timestamp())";
if (!mysqli_query($conn, $sql)) {
echo '<script>swal("Status!","Error!!.","error"); </script>';
} else {
$rid = mysqli_insert_id($conn);
?>
<script>swal("Status!", "Result Inserted.", "success").then(function () {
        window.location = "manage-test.php?cls=<?= $cls ?>&stid=<?= $stid ?>&type=<?=$type?>&date=<?= $date ?>&title=<?=$title?>&obtained_marks=<?=$obtained_marks?>&total_marks=<?=$total_marks?>&result=<?=$result?>&subj=<?= $subj ?>&time=<?= $time ?>&rid=<?= $rid ?>"
    }); </script>
<?php
}
}

if(isset($_GET['rid'])){
$id=  $_GET['rid'];
$st_res = "SELECT * from test WHERE id=$id"; 
$st_res = mysqli_query($conn, $st_res);
$st_res = mysqli_fetch_assoc($st_res);
$title=$st_res['title'];
$type=$st_res['type'];
$obtained_marks=$st_res['obtained_marks'];
$total_marks=$st_res['total_marks'];
$result=$st_res['result'];
$date=$st_res['date'];
$time=$st_res['time'];

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
                        <a href="manage-test.php">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary  shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">Manage Test</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">
                                    <?= date("l") ?>
                                </p>

                                <h4 class="mb-0">
                                    Delcare Student Test
                                </h4>
                        </a>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> Delcare</span> Student
                        Test </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <di class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg  ">
                                <h6 class="mb-0">Student Record By Class</h6>
                                <div>
                                    <form method="get">
                                        <div class="mb-3">
                                            <label class="form-label">Select Class <span
                                                    style="color: red;">*</span></label>
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
                                                <option value="<?= $row['id'] ?>" <?php if ($row['id']==$class)
                                                    echo "selected  " ?>>
                                                    <?= $row['class_name'] ?>
                                                </option>
                                                <?php } ?>

                                            </select>
                                        </div>



                                        <div class="mb-3">
                                            <label class="form-label">Select Subject<span
                                                    style="color: red;">*</span></label>
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
                                                <option value="<?= $row['id'] ?>" <?php if ($row['id']==$subj)
                                                    echo "selected  " ?>>
                                                    <?= $row['subject_name'] ?>
                                                </option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="mb-3 text-end">
                                            <?php if (!isset($_GET['cls']) || !isset($_GET['subj'])) { ?>
                                            <!-- #region --> <button type="submit" class="btn bg-gradient-primary mb-0"
                                                href="javascript:;"><i class="material-icons text-sm"></i>Show
                                                Student</button>
                                        </div>
                                    </form>
                                    <?php
                                                } else { ?>
                                    <a href="manage-test.php" class="btn bg-gradient-warning mb-0"
                                        href="javascript:;"><i class="material-icons text-sm"></i>Reset</a>
                                </div>
                                <?php }   ?>

                                <?php if (isset($_GET['cls']) || isset($_GET['subj'])) {
                                                ?>

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
                                                if (isset($_GET['stid'])) {
                                                $stid = $_GET['stid'];
                                                $sql .= "  AND student_id=$stid";

                                                }
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
                                                            <?php
                                                if (isset($_GET['stid'])) {
                                                ?>
                                                            <a class="btn  bg-gradient-warning"
                                                                href="manage-test.php?cls=<?= $cls ?>&date=<?= $date ?>&subj=<?= $subj ?>&time=<?= $time ?>">un-select</a>

                                                            <?php
                                                } else {
                                                ?>
                                                            <a class="btn  bg-gradient-success"
                                                                href="manage-test.php?cls=<?= $cls ?>&stid=<?= $row['student_id'] ?>&date=<?= $date ?>&subj=<?= $subj ?>&time=<?= $time ?>">select</a>

                                                            <?php
                                                }
                                                ?>
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

                                <?php } ?>

                                <div style="margin-top: 20px;">
                                    <div class="mb-3" style="display: inline-block;">
                                        <label class="form-label">Select Date
                                            <span style="color: red;">*</span></label>
                                        <input type="date" value="<?= $date ?>" name="date" required />
                                    </div>
                                    <div class="mb-3" style="display: inline-block;">
                                        <label class="form-label">Select Time
                                            <span style="color: red;">*</span></label>
                                        <input type="time" value="<?= $time ?>" name="time" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title
                                        <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control form-control-lg" value="<?=$title?>"
                                        name="title" placeholder="Title" required />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Obtained Marks
                                        <span style="color: red;">*</span></label>
                                    <input type="number" class="form-control form-control-lg"
                                        value="<?=$obtained_marks?>" name="obtained_marks" placeholder="Remark"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Total Marks
                                        <span style="color: red;">*</span></label>
                                    <input type="number" class="form-control form-control-lg" value="<?=$total_marks?>"
                                        name="total_marks" placeholder="Remark" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Declare Test Result Type
                                        <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control form-control-lg" value="<?=$type?>"
                                        name="type" placeholder="Type" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Test Result
                                        <span style="color: red;">*</span></label>
                                    <select class="form-control form-control-lg" name="result" required>
                                        <option value="" <?php if($result=="" )echo"selected"; ?>>select</option>
                                        <option value="Re-apper" <?php if($result=="Re-apper" )echo"selected"; ?>
                                            >Re-apper</option>
                                        <option value="Qualified" <?php if($result=="Qualified" )echo"selected"; ?>
                                            >Qualified</option>
                                        <option value="RLA" <?php if($result=="RLA" )echo"selected"; ?>>RLA</option>
                                    </select>
                                </div>

                                <?php if (isset($_GET['rid'])) { ?>
                                <input type="text" style="display: none;" value="<?=$_GET['rid']?>" name="rid" required>
                                <input type="text" style="display: none;" value="<?=$_GET['stid']?>" name="stid"
                                    required>
                                <div class="mb-3 text-end">
                                    <input type="submit" name="smt" class="btn bg-gradient-success mb-0"
                                        value="Update Result" />
                                </div>
                                <?php } else  if (isset($_GET['stid'])) { ?>
                                <input type="text" style="display: none;" value="<?=$_GET['stid']?>" name="stid"
                                    required>
                                <div class="mb-3 text-end">
                                    <input type="submit" name="smt" class="btn bg-gradient-success mb-0"
                                        value="Submit Result" />
                                </div>
                                <?php } ?>
                                </form> 

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
                                                        <th> Class</th>
                                                        <th> Subject</th>
                                                        <th> Date</th>
                                                        <th> Time</th>
                                                        <th> Obtained Marks</th>
                                                        <th> Total Marks</th>
                                                        <th> Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                $sql = "SELECT * from test";
                                                if(isset($_GET['cls'])){
                                                $class = $_GET['cls'];
                                                $cls = $_GET['cls'];  
                                                $sql = "SELECT * from test WHERE class_id=$class";
                                                if (isset($_GET['stid'])) { 
                                                $stid = $_GET['stid'];
                                                $sql .= "  AND student_id=$stid"; 
                                                }
                                                if (isset($_GET['subj'])) { 
                                                $stid = $_GET['subj'];
                                                $sql .= "  AND subject_id=$stid"; 
                                                }
                                                if (isset($_GET['rid'])) { 
                                                $rid = $_GET['rid'];
                                                $sql .= "  AND id=$rid"; 
                                                }
                                                }


                                                $sql = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                $r_stid=$row['student_id'];
                                                $st_sql = "SELECT * FROM student WHERE student_id=$r_stid";
                                                $st_sql = mysqli_query($conn, $st_sql);
                                                $st_sql = mysqli_fetch_assoc($st_sql);

                                                $cls_row = $row['class_id'];
                                                $cls_row = "SELECT * from classes where id=$cls_row";
                                                $cls_row = mysqli_query($conn, $cls_row);
                                                $cls_row = mysqli_fetch_assoc($cls_row);

                                                $subj_row = $row['subject_id'];
                                                $subj_row = "SELECT * from subject where id=$subj_row";
                                                $subj_row = mysqli_query($conn, $subj_row);
                                                $subj_row = mysqli_fetch_assoc($subj_row);
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?= $st_sql['student_roll_no'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $st_sql['student_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $cls_row['class_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $subj_row['subject_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['date'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['time'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['obtained_marks'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['total_marks'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                if (isset($_GET['rid'])) {
                                                ?>
                                                            <a class="btn  bg-gradient-warning"
                                                                href="manage-test.php?cls=<?= $cls ?>&stid=<?= $st_sql['student_id'] ?>&date=<?= $date ?>&cls=<?=$cls_row['id']?>&subj=<?= $subj_row['id'] ?>&time=<?= $time ?>">selected</a>

                                                            <?php
                                                } else {
                                                ?>
                                                            <a class="btn  bg-gradient-success"
                                                                href="manage-test.php?cls=<?= $cls ?>&stid=<?= $st_sql['student_id'] ?>&date=<?= $date ?>&cls=<?=$cls_row['id']?>&subj=<?= $subj_row['id'] ?>&time=<?= $time ?>&rid=<?=$row['id']?>">Update</a>
                                                            <?php
                                                }
                                                ?>
                                                        </td>
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
    </div>

    </div>

</main>



<?php include "footer.php" ?>
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
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); xhttp.send(data);
    }
</script>