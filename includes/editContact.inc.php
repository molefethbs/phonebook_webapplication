<?php

require "../database/config.php";

if (isset($_POST['updatecontact'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobNo = $_POST['mobNo'];
    $altNo = $_POST['altNo'];
    $email = $_POST['email'];
    $time = date("Y-m-d H:i:s");


    if (empty($name) || empty($mobNo) || empty($altNo) || empty($email)) {
        header("location: ../editContact.php?error=EmptyFields");
        exit;
    } else {

        $sql = "UPDATE contacts SET `name`='$name',mobile_no='$mobNo',alternate_no='$altNo',email='$email', edited='$time'
        WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            header("location: ../contacts.php?error=updateSuccess");
            exit;
        } else {
            header("location: ../editContact.php?Error=updateError");
            exit;
        }
    }
} else {
    header("location: ../contacts.php");
    exit;
}
