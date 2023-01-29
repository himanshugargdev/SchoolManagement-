<?php
include "../server/conn.php";
if (isset($_POST['getSubject'])) {

    $arr = array();
    $arr = json_decode($_POST['getSubject']);
    $cls = $arr->cls;
      $sql = "SELECT * FROM `subject` Where class_id=$cls"; 
  
    $sql = mysqli_query($conn, $sql);
    $arr = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $arr[] = array("id" => $row['id'], "subject_name" => $row['subject_name']);
    }
    print_r(json_encode($arr));
}


if (isset($_POST['setLeave'])) {

  $arr = array();
  $arr = json_decode($_POST['setLeave']);
  $value = $arr->value;
  $id = $arr->id;
    $sql = "UPDATE `leaves` SET `status`='$value' WHERE id=$id"; 
    $arr = array();
if(mysqli_query($conn, $sql)){
    $arr = array("state" => "success", "msg" => "leave Status change to(" . $value . ") successfully.");
}else{
  
  $arr = array("state" => "error", "msg" => "unable  Status change to (" . $value . ") this leave!");
}
 
  print_r(json_encode($arr));
}





if(isset($_POST['getTopic'])){
  $arr = array();
  $arr = json_decode($_POST['getTopic']);
  $id = $arr->id;
    $sql = "SELECT * FROM `topic` Where topic_id=$id"; 

  $sql = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($sql);
  ?>
    <div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title"><?=$row['topic_title']?></h4>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<!-- Modal body -->
<div class="modal-body">
<?=$row['topic_content']?>
</div>

<!-- Modal footer -->
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>

</div>
  <?php
}
?>