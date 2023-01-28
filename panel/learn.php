<?php include "header.php"; ?>
 
<div class="wrapper_learn">
    <div class="container_learn">

        <div class="box_learn" >
            <h1 class="box_info_learn">Students can learn from there according to their interest</h1>
            <br>
            
            <form  method="get" style="display:flex;gap:10px">
            <div class="personal_learn"> 
                <label for="cars">Choose any other Class interest:</label> 
                <select name="class_id" onchange="getSubject(this)" style="border : 1px solid black" required>
                    <option value="">select</option>
                    <?php
                    $class_name = "";
                    $class = $class_id;
                    $sql = "SELECT * FROM `classes`";
                    $sql = mysqli_query($conn, $sql);
                  

                    while ($row = mysqli_fetch_assoc($sql)) {
                        if (isset($_GET['cls'])) {
                            $class = $_GET['cls'];
                            if ($row['id'] == $class) {
                                $class_name = $row['class_name'];
                            }
                        }
                        ?>
                        <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $class)
                                echo "selected  " ?>>
                            <?= $row['class_name'] ?></option>
                    <?php } ?>
                </select>  
            </div>
            <div class="personal_learn"> 
                <label for="cars">Choose Subject:</label> 
                <select name="subj" id="subj" style="border : 1px solid black" required>
                <option value="">select</option>
                <?php
                $subject_name = "";
                $subj = "";
                
                
                $sql = "SELECT * FROM `subject` WHERE class_id=$class";
                if (isset($_GET['cls'])) {
                    $cls = $_GET['cls'];
                    $sql = "SELECT * FROM `subject`  WHERE class_id=$cls";
                }
                $sql = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($sql)) {
                    if (isset($_GET['subj'])) {
                        $subj = $_GET['subj'];
                        if ($row['id'] == $subj) {
                            $subject_name = $row['subject_name'];
                        }
                    }
                    ?>
                    <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $subj)
                            echo "selected  " ?>>
                        <?= $row['subject_name'] ?></option>
                <?php } ?>
                </select>  
            </div>
            <button type="submit">Show</button>  
        </form>   
        <hr> 

        <div class="content-box">
                <?php 

            if(!isset($_GET['subj'])){
                ?>
                <div class="aj-info-box">
                       <h4>✨ Please choose Sunject 📘 do you went to Study😊.</h4>
                    </div>
                <?php
            } else if(!isset($_GET['topic'])){
                ?>
               
               <div class="aj-info-box">
                       <h4>✨ Please choose topic 📘 do you went to Study😊.</h4>
                       <div>
                    <ul>
                <?php
            $sql = "SELECT * FROM topic WHERE class_id=$class";
            if(isset($_GET['subj'])){
                $sql .=" AND subject_id=$subj";
            }
            
            $sql = mysqli_query($conn, $sql);  
            if (mysqli_num_rows($sql) <= 0) {
                ?>
                
                <li><a href="learn.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item ">Topic not Found Choose other Subject</span>
                </a>
            </li> 
                <?php
            }
            while($row=mysqli_fetch_assoc($sql)){
                    ?>
                    <li><a href="learn.php?class_id=<?=$row['class_id']?>&subj=<?=$row['subject_id']?>&topic=<?=$row['topic_id']?>">
                    <span  >✨<?=$row['topic_title']?></span>
                    </a>
                </li> 
                    <?php
            }
            ?>
                    </ul>
                </div>
                    </div>
                <?php
            }else{
                $tid=$_GET['topic'];
                    $sql = "SELECT * FROM topic WHERE topic_id=$tid";
                    $sql = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($sql)>0){ 
                        $row = mysqli_fetch_assoc($sql);
                        ?>
                        <div>
                        <!--  topic title-->
                        <h3><?=$row['topic_title']?></h3>
                        </div>

                        <div>
                            <!-- topic content -->  
                            <h3><?=$row['topic_content']?></h3>
                        </div>
                        <?php
                    }

            }
                ?>
        </div>    
         </div>
            
    </div>

</div>
<?php
include "topicList.php";
?>
<?php include "footer.php" ?>
