<?php
require "../database/config.php";

if (isset($_GET['id']) == '') {
    header("location: ../contacts.php?Error=deletefailed");
    exit;
} else {
    $id = $_GET['id'];
    $sql = "DELETE FROM contacts WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    header("location: ../contacts.php?Error=deleteSuccess");
    exit;
}