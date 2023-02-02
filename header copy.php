<html>
<head>
    <link rel="stylesheet" href="StyleSheet1.css" />
    <meta charset="utf-8" name="viewport"
          content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" >

</head>
<body>
    <?php echo '<style>';
    include "header.css";
    echo '</style>'?>
     <div class="toggle">
    <i class="fa-solid fa-bars menu"></i>
    </div>
    <div class="wrapper">
    <div class="top">
            <div class="navbar_logo">
                <img src="white.png" />
            </div>
            <ul class="top_items">
                 <li><?php
                echo "<a href='Registeration.php' >Registeration</a>";
                  ?></li>
                <li><?php
                echo "<a href='login.php' >Login</a>";
                  ?></li>
            </ul>
        </div>
        <div class="navbar">
            <div class="container">

                <ul>
                <li><a href='firstpage.php'>Home </a>
                </li>
                 
                    <li><a href="about_school.php">About School</a></li>
                    <li><a href="Faculty.php">Faculty</a></li>
                    <li><a href='Fee.php' >Fee Structure</a></li>
                </ul>
            </div>
        </div>
        <script
  src="https://code.jquery.com/jquery-3.6.1.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.menu').click(function(){
        $('ul').toggleClass('active');
    })
})
</script>
</body>
</html>