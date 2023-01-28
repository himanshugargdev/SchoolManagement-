
<?php include "header.php"; ?>
<?php
include "navbar.php";
?>
<div class="wrapper_leave">
    <div class="container_leave">

        <div class="box_leave">
            <h1 class="box_info_Form">Leave Application Form</h1>
            <hr>
            <div class="personal_details">
                <label>User Rollno</label><br>
                <input type="text" placeholder="Enter your Rollno" value="<?=$_SESSION['student_roll_no']?>" disabled required>
            </div>
            <div class="personal_details">
                <label>Student Name</label><br>
                <input type="text" placeholder="Enter your Name"  value="<?=$_SESSION['student_name']?>" disabled required>
            </div>
            <div class="personal_details">
                <label>Leave Type</label><br>
                <input type="text" placeholder="Sick/Urgent/Other" required>
            </div>
            <div class="personal_details">
                <label>Leave From</label><br>
                <input type="date" placeholder="mm/dd/yyyy" required>
            </div>
            <div class="personal_details">
                <label>Leave To </label><br>
                <input type="date" placeholder="mm/dd/yyyy" required>
            </div>
            <div class="personal_details">
                <label>Description </label><br>
                <input type="text" placeholder="Justify Your Problem" required>
            </div>
            <div class="personal_details">
                <label for="cars">Choose Subject:</label> <br>
                <select name="subj" id="subj"  required style="    width: 200px;
    padding: 15px;
    margin-top: 15px;
    border: 1px solid black;">
                <option value="">select</option>
                <?php  
                $sql = "SELECT * FROM subject WHERE class_id=$class_id";
                $sql=mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <option value="<?= $row['id'] ?>" > <?= $row['subject_name'] ?></option>
                <?php } ?>
                </select>  
            </div>
            <div class="submit_leave">
                <a href="#"> <input type="button" value="submit"></a>
            </div> 
        </div> 
    </div>
</div>
 
<?php include "footer.php" ?>