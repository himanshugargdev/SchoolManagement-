<nav>
        <ul style="max-height: 600px;min-height:400pc;overflow:scroll">
            <li>
                <a href="#" class="logo">
                    <img src="../assets/images/black.png" alt="">
                </a>
            </li> 
            <li><a href="profile.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item ">Profile</span>
                </a>
            </li>
                <hr>
                <center>Study Topic</center>
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
                    <span class="nav-item "> Not Found  </span>
                </a>
            </li> 
                <?php
            }
            while($row=mysqli_fetch_assoc($sql)){
                    ?>
                <li><a href="learn.php?class_id=<?=$row['class_id']?>&subj=<?=$row['subject_id']?>&topic=<?=$row['topic_id']?>">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item "><?=$row['topic_title']?></span>
                </a>
            </li> 
                    <?php
            }
            ?>

        </ul>
        <ul>
        <li>
        <a href="../logout.php" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="nav-item">Logout</span>
        </a></li>
        </ul>   
    </nav>
 