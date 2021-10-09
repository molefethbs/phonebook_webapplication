<?php

    session_start();
    include "components/header.php";
    require "database/config.php";

    if(!isset($_SESSION['user'])){
        header("location: index.php");
    }
?>

<section>
        <form class="col-lg-5 col-md-7 col-sm-8 col-10 shadow bg-white p-5 text-center" method="POST" action="includes/addContacts.inc.php">
            <h1 class="mb-5 center">ADD CONTACTS</h1>
            <input type="text" class="form-control my-4 rounded-0 p-0" name="name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" />
            <input type="text" class="form-control my-4 rounded-0 p-0" name="mobNo" placeholder="Mobile Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" />
            <input type="text" class="form-control my-4 rounded-0 p-0" name="altNo" placeholder="Alternate Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alternate Number'" />
            <input type="email" class="form-control my-4 rounded-0 p-0" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" />
            <button class="btn text-white text-uppercase rounded-0 mt-5 mb-4 btn-block" type="submit" name="addcontact">SAVE</button>
        </form>
    </section>
<?php
    include "components/footer.php";
?>