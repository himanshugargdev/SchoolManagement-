<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="login.css" rel="stylesheet">
</head>
<body>
<?php 
include "header.php"; 
?>
<div class="wrapper_login">
    <div class="container_login">
        <div class="box_login">
            <form>
                <h1>Login</h1><br>
                 <div class="username_login">
                <input type="text" placeholder="Username">
                </div>
                <div class="username_login">
                <input type="password" placeholder="Password">
            </div>
                <input type="button" name="#" value="Login" id="button_login"> 
                
            </form>
        </div>    
</div> 


<?php 
                  include "footer.php"; 
                        ?>   
    
    
</body>
</html>