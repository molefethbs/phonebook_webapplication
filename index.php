<?php

    session_start();
    include "components/header.php";
    require "database/config.php";

    if(isset($_SESSION['user'])){
        header("location: contacts.php");
    }
?>

<section>
        <div class="top-img"></div>
        <form class="col-lg-5 col-md-7 col-sm-8 col-10 bg-white p-5 text-center" method="POST" action="includes/login.inc.php">
            <h1 class="mb-5">LOGIN</h1>
            <input type="text" class="form-control my-4 rounded-0 p-0" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" />
            <input type="password" class="form-control my-4 rounded-0 p-0" name="pwd" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" />
            <button class="btn text-white text-uppercase rounded-0 mt-5 mb-4 btn-block" type="submit" name="login">Login</button>
            <a href="#" class="f-pass" style="text-decoration: none">Don't have Account?</a><a href="signup.php" class="f-pass"> <b>  Create Account</b></a><br>
            <a href="forgotpassword.php" class="f-pass">Forgot Password?</a>
        </form>
    </section>
<?php
    include "components/footer.php";
?>