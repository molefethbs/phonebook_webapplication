<?php
    session_start();
    require "database/config.php";
    include "components/header.php";

    if(!isset($_SESSION['user'])){
        header("location: index.php");
    }

    if (isset($_GET['id']) == '') {
        header("location: contacts.php?Error=UpdateUnavailable");
        exit;
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM contacts WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <section>
            <form class="col-lg-5 col-md-7 col-sm-8 col-10 shadow bg-white p-5 text-center" method="POST" action="includes/editContact.inc.php">
                <h1 class="mb-5 center">UPDATE CONTACTS</h1>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <input type="text" class="form-control my-4 rounded-0 p-0" name="name" value="<?php echo $row['name']; ?>" onfocus="this.value = ''" />
                <input type="text" class="form-control my-4 rounded-0 p-0" name="mobNo" value="<?php echo $row['mobile_no']; ?>" onfocus="this.value = ''" />
                <input type="text" class="form-control my-4 rounded-0 p-0" name="altNo" value="<?php echo $row['alternate_no']; ?>" onfocus="this.value = ''" />
                <input type="email" class="form-control my-4 rounded-0 p-0" name="email" value="<?php echo $row['email']; ?>" onfocus="this.value = ''" />
                <button class="btn text-white text-uppercase rounded-0 mt-5 mb-4 btn-block" type="submit" name="updatecontact">SAVE</button>
            </form>
        </section>
    <?php
        }
    }
?>
<?php
    include "components/footer.php";
?>