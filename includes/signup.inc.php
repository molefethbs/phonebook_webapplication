<?php

require "../database/config.php";
include "../class/randomId.php";

if (isset($_POST['register'])) {
    $uid = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $id = randomKey(15);

    if (empty($id) || empty($uid) || empty($pwd) || empty($pwd2)) {
        header("location: ../signup.php?error=EmptyFields");
        exit;
    } else {
        if($pwd == $pwd2){
            $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM user WHERE username=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../signup.php?error=sqlError");
                exit;
            } else {
                mysqli_stmt_bind_param($stmt, "s", $uid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $results = mysqli_stmt_num_rows($stmt);

                if ($results > 0) {
                    header("location: ../signup.php?error=userExists");
                    exit;
                } else {
                    $sql = "INSERT INTO user(id, username, `password`)
                    VALUES(?,?,?);";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../signup.php?error=sqlInsertError");
                        exit;
                    } else {
                        mysqli_stmt_bind_param($stmt, "sss", $id, $uid, $hashed_pwd);
                        mysqli_stmt_execute($stmt);
                        header("location: ../index.php?error=Success");
                        exit;
                    }
                }
            }
        }else{
            header("location: ../signup.php?error=pwdDontMatch");
            exit;
        }
        
    }
} else {
    header("location: /signup.php");
    exit;
}
