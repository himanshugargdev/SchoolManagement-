<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="firstpage.css" rel="stylesheet">

</head>
<body>
    <div class="wrapper_start">
        <div class="top">
            <div class="navbar_logo">
                <img src="images/white.png" />
            </div>
            <ul class="top_items">
                 
                  <li><a href='Registeration.php' >Registeration</a>
                  </li>
                <li><a href='login.php' >Login</a>
                  </li>
                
            </ul>
        </div>
    
        <div class="navbar">
            <div class="container">

                <ul>
               
                   
                    <li><a href="about_school.php">About School</a></li>
                    <li><a href="Faculty.php">Faculty</a></li>
                    <li><a href='Fee.php' >Fee Structure</a>
                  </li>
       
                </ul>
            </div>
        </div>
        
        <div class="content">
            <img src="images/white.png" />
        </div>
        <div class="content">
            <a href="#">JIND (HARYANA)<br><br>
                Affiliated To H.B.S.E. Code No.: 126114<br>
                
            </a>
        </div>
    </div>
    <?php
    include "secondlayout.php"
    ?>
</body>
</html>