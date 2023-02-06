
<?php include "header.php"; ?>

<?php
include "navbar.php";

?>


<div class="wrapper_leave">
    <div class="container_leave">

        <div class="box_leave">
            <form method="post" >

            <?php
            if(isset($_POST['smt'])){
                $old=$_POST['old'];
                $new = $_POST['new'];
                $stid=$_SESSION['student_id'];
                $sql = "SELECT * FROM student WHERE student_id=$stid AND student_psw='$old'";
                $sql=mysqli_query($conn, $sql);
                if(mysqli_num_rows($sql)<=0){
            ?><script>swal('ERROR','Old Password Not Match.',"error") </script><?php
                }
                else{
                    $row=mysqli_fetch_assoc($sql);
                    if ($new == $row['student_psw']){
                        
            ?><script>swal('ERROR','Your new Password is same as Old Password Please Choose other Password.',"error") </script><?php
                    }else{
                        $s_quetion=$_POST['s_quetion'];
                        $answer=$_POST['answer'];
                        $sql = "UPDATE student SET student_psw='$new',`security_question`='$s_quetion',`security_answer`='$answer' WHERE student_id=$stid";
                        
                            if(mysqli_query($conn, $sql)){
                        ?><script>swal('Success','Password Updated.',"success") </script><?php
                            }
                    }
                        
                }
            }

            ?>
            <h1 class="box_info_Form">Update Password / Security Question</h1>
            <hr>
            
            <div class="personal_details"> 
                <label>Old Password</label><br>
                <input type="password" placeholder="Enter your Old  Password"  name="old"required> 
            </div>
            <div class="personal_details">
                <label>New Password</label><br>
                <input type="password" placeholder="Enter your New Password" name="new" required>
            </div>

            
          
            <div class="personal_details">
                <label>Security Question</label><br>
                 <select name="s_quetion" required style="border: 1px solid ;padding:15px;>
                      <option value="">select</option>
                      <option value="Enter your Best Friend Name">Enter your Best Friend Name</option>                   
                      <option value="Enter your Pat Name">Enter your Pat Name</option>                   
                      <option value="Enter your First School Name">Enter your First School Name</option>                   
                  </select>
             </div>
            <div class="personal_details">
                
            <label>Security Question Answer</label><br>
                <input type="password" name="answer"  maxlength="30" placeholder="Answer">
            </div>


            <div class="personal_details">
            <input type="submit"  name="smt" value="Change">
            </div> 
            </form>
            <hr>
        </div> 
    </div>
</div>
 
<?php include "footer.php" ?>