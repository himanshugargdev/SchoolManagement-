
<?php include "header.php"; ?>
<?php
include "navbar.php";
?>

 
<div class="wrapper_leave">
    <div class="container_leave"> 
        <div class="box_leave">
      

            <div style="width: 100%;">
            <hr>
            <center>Your Performace</center>
            <hr>
            <table class="table table-striped d-tbl" style="width:100% background:#0000">
    <thead>
        <tr><th>id</th>
            <th> Roll No </th>
            <th> Class</th>
            <th>Subject </th>
            <th>Date</th>
            <th>Time</th>
            <th>Type</th>
            <th>Title</th>
            <th>Optained Marks</th>           
            <th>Total Marks </th> 
            <th>Result </th> 
         </tr>
    </thead>
    <tbody>
        <?php
          $st_id=$_SESSION['student_id'];
           $sql = "SELECT * FROM test WHERE student_id=$st_id order by id desc"; 
          $sql = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($sql)){
            $subj_row = $row['subject_id'];
            $subj_row = "SELECT * from subject where id=$subj_row";
            $subj_row = mysqli_query($conn, $subj_row);
            $subj_row = mysqli_fetch_assoc($subj_row);
                ?>
                <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['subject_id']?></td>
                    <td><?= $class_name?></td>
                    <td><?= $subj_row['subject_name']?></td>
                    <td><?= $row['date']?></td>
                    <td><?= $row['time']?></td>
                    <td><?= $row['type']?></td>
                    <td><?= $row['title']?></td>
                    <td><?= $row['obtained_marks']?></td>
                    <td><?= $row['total_marks']?></td>
                    <td><?= $row['result']?></td>
                </tr>   
                <?php
            }
        ?>
    </tbody>
 </table>
            </div>
        </div> 


        
</form> 






    </div>
</div>


 
<?php include "footer.php" ?>


