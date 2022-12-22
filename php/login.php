<?php
include("server/session.php");
include "header.php";
?>
<div class="wrapper_login">
    <div class="container_login">
        <div class="box_login">
            <form method="post" onsubmit="return loginSubmit(this)">
                <h1>Login</h1><br>
<?php 

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $psw = $_POST['psw']; 
    $user=$_POST['user'];
    $flag = false;
    if(empty($username)||empty($psw)){
        ?>
        <script>
    swal("Status!","Please fill both username and Password","error");
         </script>
        <?php
    }

if($user=="admin"){ 
        $sql = "SELECT * FROM admin WHERE (admin_email='$username' OR admin_phone='$username') AND admin_psw='$psw' ";
        $flag = true;
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){
            $row_adm= mysqli_fetch_assoc($res);
            $_SESSION['admin_id']=$row_adm['admin_id'];
            $_SESSION['admin_name']=$row_adm['admin_name'];
            $_SESSION['admin_email']=$row_adm['admin_email'];
            $_SESSION['admin_phone'] = $row_adm['admin_phone'];
            $_SESSION['session_status'] = 'admin';

            ?>
            <script>   
            window.location="admin/index.php";
         </script>
            <?

        }else{
            ?>
            <script>
    swal("Status!","Not Registered","error");
         </script>
            <?php
        }

    } else  if($user=="student"){
        $flag = true;
        $sql = "SELECT * FROM student WHERE (student_email='$username' OR student_phone='$username') AND student_psw='$psw'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){
            $row_adm= mysqli_fetch_assoc($res);
            $_SESSION['student_id']=$row_adm['student_id'];
            $_SESSION['student_name']=$row_adm['student_name'];
            $_SESSION['student_email']=$row_adm['student_email'];
            $_SESSION['student_phone'] = $row_adm['student_phone'];
            $_SESSION['session_status'] = 'student';
        }else{
            ?>
            <script>
    swal("Status!","Not Registered","error");
         </script>
            <?php
        }

    }else{
    ?>
     <script>
    swal("Status!","Can not Login Please choose correct user type","error").then(function (){
        alert();
    });
   
         </script>
    <?php
}
 
}

?>

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
                <option value="student">Student</option> 
                </select>
                </div>
                <input type="submit" name="login" value="Login" id="button_login">
                
             </form>
        </div>
    </div>
     
    <?php include "footer.php"; ?>

