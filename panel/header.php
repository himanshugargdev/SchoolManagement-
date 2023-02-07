<?php
include "../server/session.php";
include "../server/conn.php";

if(empty($_SESSION['student_id'])||!isset($_SESSION['student_id'])||!isset($_SESSION['session_status'])){
    header("location:../login.php");
    exit();
}
   
    $res = mysqli_query($conn, "SELECT * FROM student WHERE student_id=" . $_SESSION['student_id']." LIMIT 1");
            if(mysqli_num_rows($res)>0){
                    $row = mysqli_fetch_assoc($res);

                $_SESSION['student_id']=$row['student_id'];
                $_SESSION['student_name']=$row['student_name'];
                $_SESSION['student_email']=$row['student_email'];
                $_SESSION['student_phone']=$row['student_phone']; 
                $_SESSION['student_roll_no']=$row['student_roll_no'];  
                $class_id=$row['class_id'];
                $class_name = "";
                $staff_role = " ";
                if(!empty($class_id)){
                    $cls_res=mysqli_query($conn, "SELECT * FROM classes WHERE id=$class_id");
              
                if(mysqli_num_rows($cls_res)>0){ 
                    $cls_row = mysqli_fetch_assoc($cls_res);
                    $class_name = $cls_row['class_name'];
                    $incharge_id = $cls_row['incharge_id'];
                    
                $inc_res=mysqli_query($conn, "SELECT * FROM staff WHERE staff_id=$incharge_id");
                $inc_res = mysqli_fetch_assoc($inc_res);
                
                $Incharge_name = $inc_res['staff_name'];
                $staff_role = $inc_res['staff_role'];
                } 
                $_SESSION['student_phone']=$row['student_phone'];   
                } 
            }

            $accessOk = false;
            if($_SESSION['student_roll_no']==""||$_SESSION['student_roll_no']==0){
                
            $accessOk = true;
                $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
                if ($curPageName != "profile.php" && $curPageName != "updatePass.php"){ 

                  ?>
                  <script>
                  alert("Don't have Access to visit without Complete Profile");
                  window.location="profile.php"
                </script>
                  <?php
                }
        
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/panel.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
      <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
  <!-- sweetalert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    