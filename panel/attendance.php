<?php include "header.php"; ?>
<?php
    include "navbar.php" ;
    ?>
<div class="wrapper_attendance">
        <div class="container_attendance">
        <div class="container_box_attendance">
            <h1 class="box_info_attendance">See your Attendance</h1><hr> 
            <!-- <div class="box_attendance">
            <span class="box_info">Month</span><hr>
            <span class="box_info">December</span><hr>
            <span class="box_info">Overall</span><hr>
            </div>
            <div class="box_attendance">
            <span class="box_info">Total Attendance</span><hr>
            <span class="box_info">10</span><hr>
            <span class="box_info">40</span>
            </div>
            <div class="box_attendance">
            <span class="box_info">Total Present</span><hr>
            <span class="box_info">5</span><hr>
            <span class="box_info">5</span>
            </div>
            <div class="box_attendance">
            <span class="box_info">Total Absent</span><hr>
            <span class="box_info">1</span><hr>
            <span class="box_info">1</span> -->
 <!-- table of student -->
 <table class="table table-striped d-tbl" style="width:100%">
    <thead>
        <tr>
            <th> Date</th>
            <th> Time</th>
            <th> Subject</th> 
            <th> Attendance</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $st_id=$_SESSION['student_id'];
        $sql = "SELECT * FROM attendance WHERE student_id=$st_id order by id desc";
        $sql = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($sql)){
            ?><tr>
            <td> <?=$row['date']?></td>
            <td> <?=$row['class_time']?></td>
            <td>  
            <?php
            $subject_id = $row['subject_id'];
            $sb_sql = "SELECT * FROM subject Where id=$subject_id";
            $sb_row = mysqli_query($conn, $sb_sql);
            $sb_row = mysqli_fetch_assoc($sb_row);
            echo $sb_row['subject_name'];
            ?></td>
            <td> <?=$row['attendance']?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
 </table>

            </div>
</div>

<?php include "footer.php" ?>