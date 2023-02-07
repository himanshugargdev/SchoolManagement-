<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/secondlayut.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <main>
            <div class="box1">
                <div class="iframe1 schoolinfo">
                <h4 style="font-size:18px;margin-left:27px;">______About us______</h4> <br />
                <iframe class="iframe2" src="iframe.html"></iframe>
            </div></div>
            <div class="box2">
                <div class="knowledge schoolinfo">
                    <h4 style="margin-left: 45px; font-size:18px;margin-top:15px">  _______We are proud of_______</h4><br />
                    <h3>1) Smart class</h3>
                    <h3>2) Laboratories</h3>
                    <h3>3) School Result</h3>
                    <h3>4) Discipline</h3>
                    <h3>5) Growing Network</h3>
                    <h3>6) Teacher Student Ratio</h3>
                    <h3>7) Global Curriculam</h3>
                    <h3>8) Holistic Development</h3>
                </div>
            </div>
            <div class="box3"><div class="enquiry_form schoolinfo">
                <h2 style="margin-left:100px ; margin-top:15px;">Enquiry Form</h2>
            <?php
                if(isset($_POST['enquiry'])){
                    $email =$_POST['email'];
                    $name =$_POST['name'];
                    $number =$_POST['number'];
                    $message =$_POST['message'] ; 
                    $sql = "INSERT INTO enquiry (`name`,`email`, `number` ,`message`) VALUE ('$name','$email','$number','$message')";
                    if(mysqli_query($conn,$sql)){
                     ?> <script>swal("status","Enquiry Form submited.","success")</script><?php 
                    }else{ 
                        ?> <script>swal("status","Something Went wrong!","error")</script><?php 
                    }    
                }
            ?>

          <form method="post">
          <input type="text" name="name" placeholder="Name" required />
                <input type="email"  name="email"placeholder="E-mail" required />
                <input type="number" name="number" placeholder="Contact No." required />
                <input type="text" name="message" placeholder="Message" style="padding:5px 0px 50px 5px" required />
                <button type="submit" name="enquiry"   >Send</button> 
          </form>
            </div></div>
        </main>
    </div>
    

    <div class="wrapper">
        <div class="container">
            <div class="box">
                <img src="assets/svg/undraw_business_chat_re_gg4h.svg">
                <h2>Business Chat</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
            <div class="box">
                <img src="assets/svg/education.svg">
                <h2>Education</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
            <div class="box">
                <img src="assets/svg/teacher.svg">
                <h2>Teacher</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
            <div class="box">
                <img src="assets/svg/Teaching.svg">
                <h2>Teaching</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
            <div class="box">
                <img src="assets/svg/Exam.svg">
                <h2>Exam</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
            <div class="box">
                <img src="assets/svg/Virtual_reality.svg">
                <h2>Virtual reality</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
            <div class="box">
                <img src="assets/svg/Soccer.svg">
                <h2>Games</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
            <div class="box">
                <img src="assets/svg/Dance.svg">
                <h2>Dance</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum neque debitis vitae, iusto nulla temporibus.</p>
            </div>
         </div>
         
    </div>
    <div class="wrapper">
        <div class="container1">
            <div class="box1">
              <div class="image_box">
                    <img src="assets/images/Himanshu.jpg">
              </div>
                <p>
                “Hi, I’m Himanshu. I’m from Narwana.
                
                </p>
                <h4>Designer<br><span>HIMANSHU</span></h4>
         </div>
                 <div class="box1">
                <div class="image_box">
                    <img src="assets/images/Ajay.jpg">
                </div>
                <p> “Hi, I’m Ajay. I’m from Jind.
                    
               
                     <h4>Project Leader <br><span>AJAY</span></h4>
                </div>
                <div class="box1">
                <div class="image_box">
                    <img src="assets/images/kapil.png">
                </div>
                <p> “Hi, I’m Kapil. I’m from Jind.
                    
                </p>
                <h4>Designer Developer<br><span>KAPIL</span></h4>
         </div>
     </div>
    </div>
             
            <?php 
            include "footer.php"
            ?>
           
        
        
</body>
</html>