<?php
include("server/conn.php");
?>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/site.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>


    <div class="toggle">
        <i class="fa-solid fa-bars menu"></i>
    </div>
    <div class="wrapper">
        <div class="top">
            <div class="navbar_logo">
                <img src="assets/images/white.png" />
            </div>
            <ul class="top_items">
                <li>
                    <a href='Fee.php'>Fee Structure</a>
                </li>
                <li>
                    <a href='index.php'>Home </a>
                </li> 
                <li><a href='Registeration.php'>Register</a>
                </li>
                <li><a href='login.php'>Login</a>
                </li>
            </ul>
        </div> 
        <script src="https://code.jquery.com/jquery-3.6.1.js">
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.menu').click(function () {
                    $('ul').toggleClass('active');
                })
            })
        </script>