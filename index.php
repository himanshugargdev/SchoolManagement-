<?php
include("server/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/firstpage.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="wrapper_start">
        <div class="top">
            <div class="navbar_logo">
                <img src="assets/images/white.png" />
            </div>
            <ul class="top_items">
                    <li> <a href='Fee.php'>Fee Structure</a></li>
                </li>
                    <li> <a href='contectus.php'>Contact Us</a></li>
                </li>
                <li><a href='login.php'>Login</a>
                </li>
                <li><a href='Registeration.php'>Register</a>
                </li>

            </ul>
        </div> 
        <div class="content">
            <img src="assets/images/white.png" />
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