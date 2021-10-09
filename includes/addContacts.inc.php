<?php

require "../database/config.php";

if (isset($_POST['addcontact'])) {
    $uid = $_POST['name'];
    $mobNo = $_POST['mobNo'];
    $altNo = $_POST['altNo'];
    $email = $_POST['email'];

    if (empty($uid) || empty($mobNo) || empty($altNo) || empty($email)) {
        header("location: ../addContacts.php?error=EmptyFields");
        exit;
    } else {

            $sql = "SELECT `name` FROM contacts WHERE `name` LIKE '$uid' OR `mobile_no` LIKE '$mobNo' OR `alternate_no` LIKE '$altNo';";
            $result = mysqli_query($conn,$sql);
            $results = mysqli_fetch_array($result);

            if ($results > 0) {
                header("location: ../addContacts.php?error=userExists");
                exit;
            } else {
                $sql = "INSERT INTO contacts(`name`,mobile_no,alternate_no,email)
                VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../addContacts.php?error=sqlInsertError");
                    exit;
                } else {
                    mysqli_stmt_bind_param($stmt, "ssss", $uid, $mobNo, $altNo, $email);
                    mysqli_stmt_execute($stmt);
                    header("location: ../contacts.php?error=Success");
                    exit;
                }
            }
        }
        
} else {
    header("location: ../addContacts.php");
    exit;
}
