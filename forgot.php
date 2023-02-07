<?php
include("server/session.php");
include "header.php";

if (isset($_POST['forgot'])) {
    
        $username=$_POST['username'];
        $s_quetion=$_POST['s_quetion'];
        $security_answer=$_POST['answer'];
        $user=$_POST['user'];

        
        if($user=="student"){
            $sql="SELECT * FROM student WHERE (student_email='$username' OR student_phone='$username') AND security_question='$s_quetion' AND security_answer='$security_answer'";
      }
    

    $res = mysqli_query($conn, $sql);
    $isAuthOk = false;
    if (mysqli_num_rows($res) > 0) {
       $row=mysqli_fetch_assoc($res);
       ?>
       <script>
        alert(`your password is : <?=$row['student_psw']?>`);
        </script>
       <?php 
         
    }else{
        ?>
        <script>
         alert(`Your Details Not Match`);
         </script>
        <?php 
    }
    
}
?>
<div class="wrapper_login">
    <div class="container_login">
        <div class="box_login">
            <form method="post" >
                <h1>Forgot Password</h1><br>  
                <div class="username_login">
                    <input type="text" placeholder="Email/Phone" name="username" required>
                </div>
                <div>
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
                    <select name="user" required>
                        <option value="" selected disabled>select</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <input type="submit" name="forgot" value="Forgot" id="button_login"> 
            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>