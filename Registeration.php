<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="registeration.css" rel="stylesheet">
</head>
<body>
<?php 
include "header.php"; 
?>
<div class="wrapper_register">
    <div class="container_register">
        <div class="box_register">
            <form>
                <h1>Registeration</h1><br>
                 <div class="username_register">
                <input type="text" placeholder="Full Name">
                </div>
                <div class="username_register">
                    <input type="text" placeholder="Phone No">
                    </div>
                    <div class="username_register">
                        <input type="text" placeholder="City">
                        </div>
                <div class="username_register">
                <input type="text" placeholder="State">
            </div>
                <input type="button" name="#" value="Submit" id="button_register"> 
                
            </form>
        </div>
</div>
    </div>
    <?php 
                  include "footer.php"; 
                        ?>   

</body>
</html>