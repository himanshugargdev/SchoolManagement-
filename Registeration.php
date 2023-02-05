<?php
include "header.php";
?>
<div class="wrapper_register">
    <div class="container_register">
        <div class="box_register">

            <?php 
            
            if(isset($_POST['register'])){

                $name=$_POST['name'];
                $phone=$_POST['phone'];
                $email=$_POST['email'];
                $s_quetion=$_POST['s_quetion'];
                $answer=$_POST['answer'];
                $psw=$_POST['psw']; 
                $sql = "INSERT INTO `student`(  `student_name`, `student_email`, `student_phone`, `student_psw`, `security_question`, `security_answer`, `insert_by`, `status`, `isselfRegistered`) VALUES ('$name','$email','$phone','$psw','$s_quetion','$answer',NULL,'in-active',1)";
            if(mysqli_query($conn,$sql)){
                ?>    <script>alert('registerd please wait admin wiil process your data.')</script>  <?php
            }else{
                    ?>    <script>alert('<?php if (mysqli_errno($conn) === 1062) {
                            echo 'already registed data';
                        }?>')</script>  <?php

            }
            
            }
            ?>
            <form method="post">
                <h1>Registeration Student</h1><br>
                <div class="username_register">
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>

                <div class="username_register">
                    <input type="number" maxlength="12" name="phone" placeholder="Phone No" required>
                </div>

                    <div class="username_register">
                        <input type="email" name="email" placeholder="Email "  required>
                    </div>

                    <div class="username_register">
                        <label>Security Question</label>
                        <select name="s_quetion" required>
                            <option value="">select</option>
                            <option value="Enter your Best Friend Name">Enter your Best Friend Name</option>                   
                            <option value="Enter your Pat Name">Enter your Pat Name</option>                   
                            <option value="Enter your First School Name">Enter your First School Name</option>                   
                                </select>
                    </div>
                        <div class="username_register">
                            <input type="password" name="answer"  maxlength="30" placeholder="Answer">
                        </div>
                        <div class="username_register">
                            <input type="password" name="psw"  maxlength="30" placeholder="Password">
                        </div>
                
                <input type="submit" name="register" value="Submit" id="button_register">

            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>