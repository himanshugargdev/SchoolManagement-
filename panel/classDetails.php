<?php include "header.php"; 
?>
    <?php
    include "navbar.php";

                $inc_res=mysqli_query($conn, "SELECT * FROM staff WHERE staff_id=$incharge_id");
                $inc_res = mysqli_fetch_assoc($inc_res);
                $Incharge_name = $inc_res['staff_name'];
                $staff_role = $inc_res['staff_role'];
                $staff_phone = $inc_res['staff_phone'];
                $staff_email = $inc_res['staff_email'];
    ?>
        
        <div class="wrapper_noti">
    <div class="container_noti">

        <div class="box_noti">
            <h1 class="box_info__noti">Classes Details</h1>
            <hr>
            <div>
                <span><b>My Classes Name:</b> <?=$class_name ?></span>
                <span>Incharge: <?=$Incharge_name ?>(<?=$staff_role?>)<br>
                <span><b>Incharge Email:</b><a href="mailto:<?=$staff_email?>"> <?=$staff_email ?> </a> </span><br>
                <span><b>Incharge Phone:</b><a href="tel:<?= $staff_phone ?>"> <?=$staff_phone ?></a> </span>
                
            </div>
            <hr>

            <?php
            $sql = "SELECT * FROM subject WHERE class_id=$class_id";
            $sql=mysqli_query($conn, $sql);
            if(mysqli_num_rows($sql)<=0){

                ?>  Not Found Subjects.
                <?php  
                
            }else{ 

                ?>
                 <table class="table table-striped d-tbl" style="width:100%">
                    <thead>
                        <tr>
                            <th> S.No</th>
                            <th> Subject ID</th>
                            <th> Subject</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while($sub_row=mysqli_fetch_assoc($sql)){
                               $i++;
          ?><tr><td><?=$i?></td><td><?=$sub_row['id']?></td><td><?=$sub_row['subject_name']?></td></tr>
                                <?php
                        }
                        ?> 
                    </tbody>
                <?php
            }
            ?>
        </div>
    </div>
</div>
 
<?php include "footer.php" ?>
