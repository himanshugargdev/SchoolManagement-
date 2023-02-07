
<?php include "header.php"; ?>
<?php
include "navbar.php";
?>

 
<div class="wrapper_leave">
    <div class="container_leave">
<form method="post">
    <?php
  
    if(isset($_POST['add'])){
        $sid = $_SESSION['student_id'];
        $roll_no=$_POST['roll_no'];
        $name=$_POST['name'];
        $type=$_POST['type'];
        $from=$_POST['from'];
        $to=  $_POST['to'];
        $descr=$_POST['descr']; 
        $sql = "INSERT INTO `leaves`(`student_id`,`roll_no` ,`student_name`, `leave_type`, `from`, `to`, `descr`) VALUES
        ('$sid','$roll_no','$name','$type','$from','$to','$descr')";

if(mysqli_query($conn, $sql)){
?><script>swal('Success','Leave Added.',"success").then(()=>{
window.location="leave.php";
}) </script><?php
}else{
?><script>swal('ERROR','Try Again.',"error"); </script><?php
}   

        
}
    
    ?>

        <div class="box_leave">
            <h1 class="box_info_Form">Leave Application Form</h1>
            <hr>
            <div class="personal_details">
                <label>User Rollno</label><br>
                <input type="text" placeholder="Enter your Rollno" name="roll_no" value="<?=$_SESSION['student_roll_no']?>"  readonly required>
            </div>
            <div class="personal_details">
                <label>Student Name</label><br>
                <input type="text" placeholder="Enter your Name" name="name"  value="<?=$_SESSION['student_name']?>" readonly  required>
            </div>
            <div class="personal_details">
                <label>Leave Type</label><br>
                <select   name="type" required style="width: 200px;   padding: 15px;    margin-top: 15px; border: 1px solid black;">
                    <option value="">select</option>
                    <option value="Urgent">Urgent</option>
                    <option value="Sick">Sick</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="personal_details">
                <label>Leave From</label><br>
                <input type="date" placeholder="mm/dd/yyyy" name="from" required>
            </div>
            <div class="personal_details">
                <label>Leave To </label><br>
                <input type="date" placeholder="mm/dd/yyyy" name="to" required>
            </div>
            <div class="personal_details">
                <label>Description </label><br>
                <input type="text" placeholder="Justify Your Problem" name="descr" required>
            </div>
           <div class="submit_leave">
                 <input type="submit" name="add" value="submit">
            </div> 

            <div style="width: 100%;">
            <hr>
            <center>Leaves History</center>
            <hr>
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
        $st_id=$_SESSION['student_id'];
          $sql = "SELECT * FROM leaves WHERE student_id=$st_id order by id desc"; 
        $sql = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($sql)){
            ?><tr>
            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['student_name'] ?></td>
                <td><?= $row['from'] ?></td>
                <td><?= $row['to'] ?></td>
                <td><?= $row['leave_type'] ?></td> 
                <td><?= $row['descr'] ?></td> 
                <th><?=$row['status']?></th>
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


