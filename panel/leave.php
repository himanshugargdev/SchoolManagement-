
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
                <label>User Id</label><br>
                <input type="text" placeholder="Enter your User Id" required> 
            </div>
            <div class="personal_details">
                <label>User Rollno</label><br>
                <input type="text" placeholder="Enter your Rollno" required>
            </div>
            <div class="personal_details">
                <label>User Name</label><br>
                <input type="text" placeholder="Enter your Name" required>
            </div>
            <div class="personal_details">
                <label>Leave Type</label><br>
                <input type="text" placeholder="Sick/Urgent/Other" required>
            </div>
            <div class="personal_details">
                <label>Leave From</label><br>
                <input type="text" placeholder="mm/dd/yyyy" required>
            </div>
            <div class="personal_details">
                <label>Leave To </label><br>
                <input type="text" placeholder="mm/dd/yyyy" required>
            </div>
            <div class="personal_details">
                <label>Description </label><br>
                <input type="text" placeholder="Justify Your Problem" required>
            </div>
            <div class="submit_leave">
                <a href="#"> <input type="button" value="submit"></a>
            </div> 
        </div> 
    </div>
</div>
 
<?php include "footer.php" ?>