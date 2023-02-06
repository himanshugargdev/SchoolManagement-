<?php
include("server/session.php");
include "header.php";
?>
<div class="wrapper_login">
    <div class="container_login">
        <div class="box_login">
            <form method="post" onsubmit="return forgotPsw(this)">
                <h1>Login</h1><br>
                <div class="username_login">
                    <input type="text" placeholder="Email/Phone No." name="username" required>
                </div>

                <div class="username_register">
                    <label>Security Question</label>
                    <select name="s_quetion" required>
                        <option value="">select</option>
                        <option value="Enter your Best Friend Name">Enter your Best Friend Name</option>
                        <option value="Enter your Pat Name">Enter your Pat Name</option>
                        <option value="Enter your First School Name">Enter your First School Name</option>
                    </select>
                </div>
                <div class="username_register">
                    <input type="password" name="answer" maxlength="30" placeholder="Answer">
                </div>
                <div>
                    <select name="user" required>
                        <option value="" selected disabled>select</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <input type="submit" name="login" value="Login" id="button_login">

            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>