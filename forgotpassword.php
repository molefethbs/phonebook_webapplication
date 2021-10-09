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
        <form class="col-lg-5 col-md-7 col-sm-8 col-10 bg-white p-5 text-center" method="POST" action="includes/resetpassword.inc.php">
            <h1 class="mb-5">RESET PASSWORD</h1>
            <input type="text" class="form-control my-4 rounded-0 p-0" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" />
            <input type="password" class="form-control my-4 rounded-0 p-0" name="pwd" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" />
            <input type="password" class="form-control my-4 rounded-0 p-0" name="pwd2" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" />
            <button class="btn text-white text-uppercase rounded-0 mt-5 mb-4 btn-block" type="submit" name="reset">RESET</button>
        </form>
    </section>
<?php
    include "components/footer.php";
?>