<?php include "header.php"; 
?>
    <?php
    include "navbar.php";
    ?>
        <div class="container_profile">
        <div class="box_profile"> 
            <img src="../assets/images/avtar.png"><br>
            <p  class="box_info"><b>First Name :     </b><span><?= $_SESSION['student_name']?></span></p>
            <p  class="box_info"><b>Surname :        </b><span><?= $_SESSION['student_name']?></span></p>
            <p  class="box_info"><b>Adm No. :        </b><span><?=$_SESSION['student_id'] ?></span></p>
            <p  class="box_info"><b>Roll No. :       </b><span><?=$_SESSION['student_roll_no'] ?></span></p>
            <p  class="box_info"><b>Class :          </b><span><?= $class_name?></span></p>
            <p  class="box_info"><b>Email  :         </b><span><?= $_SESSION['student_email']?></span></p>
            <p  class="box_info"><b>Mobile No. :     </b><span><?= $_SESSION['student_phone']?></span></p>
            <p  class="box_info"><b>Incharge Name :  </b><span><?= $_SESSION['student_name']?></span> </p>
        </div>
    </div>
 
<?php include "footer.php" ?>
