<?php include "header.php"; 
?>
    <?php
    include "navbar.php";
    ?>
        <div class="container_profile">
        <div class="box_profile">
            
         
            <center><img src="../assets/images/avtar.png"></center>
            <br>
            <p  class="box_info"><b>Name :     </b><span><?= $_SESSION['student_name']?></span></p>
            <p  class="box_info"><b>Adm No. :        </b><span><?=$_SESSION['student_id'] ?></span></p>
            <p  class="box_info"><b>Roll No. :       </b><span><?=$_SESSION['student_roll_no'] ?></span></p>
            <p  class="box_info"><b>Class :          </b><span><?= $class_name?></span></p>
            <p  class="box_info"><b>Email  :         </b><span><?= $_SESSION['student_email']?></span></p>
            <p  class="box_info"><b>Mobile No. :     </b><span><?= $_SESSION['student_phone']?></span></p>
            <p  class="box_info"><b>Incharge Name :  </b><span><?= isset($Incharge_name)==true?$Incharge_name:null ?>(<?=isset($staff_role)==true?$staff_role:null?>)</span> </p>
            <p  class="box_info"><b>Change Password :  </b><span><a href="updatePass.php">click</a></span> </p>
       
        </div>
    </div>
 
<?php include "footer.php" ?>
