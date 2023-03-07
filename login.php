<?php
include("server/session.php");
include "header.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $psw = $_POST['psw'];
    $user = $_POST['user'];
    if($user=="admin"){
        $sql="SELECT * FROM admin WHERE (admin_email='$username' OR admin_phone='$username') AND admin_psw='$psw'  ";
    }
    if($user=="student"){
        $sql="SELECT * FROM student WHERE (student_email='$username' OR student_phone='$username') AND student_psw='$psw' ";
    }
    if($user=="staff"){
        $sql="SELECT * FROM staff WHERE (staff_email='$username' OR staff_phone='$username') AND staff_psw='$psw' ";
    }

    $res = mysqli_query($conn, $sql);
    $isAuthOk = false;
    if (mysqli_num_rows($res) > 0) {

        if($user=="admin"){ 
            $row_adm = mysqli_fetch_assoc($res);
            $_SESSION['admin_id'] = $row_adm['admin_id'];
            $_SESSION['admin_name'] = $row_adm['admin_name'];
            $_SESSION['admin_email'] = $row_adm['admin_email'];
            $_SESSION['admin_phone'] = $row_adm['admin_phone'];
            $_SESSION['session_status'] = 'admin';
            // header("location:admin/");
            echo"<script>window.location='admin/'</script>";
        }
        if($user=="student"){
            $row_adm = mysqli_fetch_assoc($res);
            $_SESSION['student_id'] = $row_adm['student_id'];
            $_SESSION['student_name'] = $row_adm['student_name'];
            $_SESSION['student_email'] = $row_adm['student_email'];
            $_SESSION['student_phone'] = $row_adm['student_phone'];
            $_SESSION['student_roll_no'] = $row_adm['student_roll_no'];
            $_SESSION['session_status'] = 'student';
            // header("location:panel/profile.php"); 
            echo"<script>window.location='panel/profile.php'</script>";
        }
        if($user=="staff"){
            $row_adm = mysqli_fetch_assoc($res);
            $_SESSION['staff_id'] = $row_adm['staff_id'];
            $_SESSION['staff_name'] = $row_adm['staff_name'];
            $_SESSION['staff_email'] = $row_adm['staff_email'];
            $_SESSION['staff_phone'] = $row_adm['staff_phone'];
            $_SESSION['session_status'] = 'staff';
            // header("location:teach/");
            echo"<script>window.location='teach/'</script>";
            
         }  
         $isAuthOk = true;
         return; 
    }
    
}
?>
<div class="wrapper_login">
    <div class="container_login">
        <div class="box_login">
            <form method="post" onsubmit="return loginSubmit(this)">
                <h1>Login</h1><br>  
                <div class="username_login">
                    <input type="text" placeholder="Email/Phone No." name="username" required>
                </div>
                <div class="username_login">
                    <input type="password" placeholder="Password" name="psw" required>
                </div>
                <div>
                    <select name="user" required>
                        <option value="" selected disabled>select</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                 
            <a href="forgot.php" style="padding:10px;color:green;float:right">forget password</a>
                <input type="submit" name="login" value="Login" id="button_login">

            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>