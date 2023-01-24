<?php
include "../server/session.php";
include "../server/conn.php";

if(empty($_SESSION['student_id'])||!isset($_SESSION['student_id'])||!isset($_SESSION['session_status'])){
    header("location:../login.php");
    exit();
}
   
    $res = mysqli_query($conn, "SELECT * FROM student WHERE student_id=" . $_SESSION['student_id']);
            if(mysqli_num_rows($res)>0){
                    $row = mysqli_fetch_assoc($res);
                $_SESSION['student_id']=$row['student_id'];
                $_SESSION['student_name']=$row['student_name'];
                $_SESSION['student_email']=$row['student_email'];
                $_SESSION['student_phone']=$row['student_phone']; 
                $_SESSION['student_roll_no']=$row['student_roll_no'];  
                $class_id=$row['class_id'];
                $cls_res=mysqli_query($conn, "SELECT * FROM classes WHERE id=$class_id");
                $class_name = "";
                if(mysqli_num_rows($cls_res)>0){ 
                    $cls_row = mysqli_fetch_assoc($cls_res);
                    $class_name = $cls_row['class_name'];
                }
                $_SESSION['student_phone']=$row['student_phone']; 
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
</head>
<body>
    