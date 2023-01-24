<?php
include "../server/conn.php";
if (isset($_POST['getSubject'])) {

    $sql = "SELECT * FROM `subject`";

    $sql = mysqli_query($conn, $sql);
    $arr = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $arr[] = array("id" => $row['id'], "subject_name" => $row['subject_name']);
    }
    print_r(json_encode($arr));
}
?>