<?php
include("./server/session.php");
include "header.php";
?>

<div class="container_footer">

  <div class="form">


    <div class="contact-info">
      <h3 class="title">Let's get in touch</h3>
      <p class="text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
        dolorum adipisci recusandae praesentium dicta!
      </p>

      <div class="info">
        <div class="information">

          <img src="./assets/images/location.png" class="icon" alt="" />
          <p>Dream School CRSU , JIND 126114</p>
        </div>
        <div class="information">
          <img src="./assets/images/email.png" class="icon" alt="" />
          <p>Dreamcrsu@gmail.com</p>
        </div>
        <div class="information">
          <img src="./assets/images/phone.png" class="icon" alt="" />
          <p>123-456-789</p>
        </div>
      </div>

      <div class="social-media">
        <p>Connect with us :</p>
        <div class="social-icons">
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="contact-form">
      <span class="circle one"></span>
      <span class="circle two"></span>

      <form method="post"" autocomplete="off">

        <?php
        if (isset($_POST['enquiry'])) {
          $email = $_POST['email'];
          $name = $_POST['name'];
          $number = $_POST['number'];
          $message = $_POST['message'];
          $sql = "INSERT INTO enquiry (`name`,`email`, `number` ,`message`) VALUE ('$name','$email','$number','$message')";
          if (mysqli_query($conn, $sql)) {
            ?>
            <script>swal("status", "Enquiry Form submited.", "success")</script><?php
          } else {
            ?> <script>swal("status", "Something Went wrong!", "error")</script><?php
          }
        }
        ?>
        <h3 class="title">Contact us</h3>
        <div class="input-container">
          <input type="text" name="name" class="input" placeholder="Username" required />
        </div>
        <div class="input-container">
          <input type="email" name="email" class="input" placeholder="Email" required/>
        </div>
        <div class="input-container">
          <input type="tel" name="number" class="input" placeholder="Phone"  required/>
        </div>
        <div class="input-container textarea">
          <textarea name="message" class="input" placeholder="Message"></textarea>
        </div>
        <input type="submit" value="Send" name="enquiry" class="btn" />
      </form>
    </div>
  </div>
</div>
<!-- core jquery -->




<?php include "footer.php"; ?>