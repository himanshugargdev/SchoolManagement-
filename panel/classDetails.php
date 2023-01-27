<?php include "header.php"; 
?>
    <?php
    include "navbar.php";

                $inc_res=mysqli_query($conn, "SELECT * FROM staff WHERE staff_id=$incharge_id");
                $inc_res = mysqli_fetch_assoc($inc_res);
                $Incharge_name = $inc_res['staff_name'];
                $staff_role = $inc_res['staff_role'];
    ?>
        
        <div class="wrapper_noti">
    <div class="container_noti">

        <div class="box_noti">
            <h1 class="box_info__noti">Class</h1>
            <hr>
            
        </div>
    </div>
</div>
 
<?php include "footer.php" ?>
