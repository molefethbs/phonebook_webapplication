<?php

require "../database/config.php";

if (isset($_POST['reset'])) {
    $uid = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $time = date("Y-m-d H:i:s");


    if (empty($uid) || empty($pwd) || empty($pwd2)) {
        header("location: ../forgotpassword.php?error=EmptyFields");
        exit;
    } else {
        $sql = "SELECT * FROM user WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../forgotpassword.php?error=sqlError");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($results);

            if($user){
                if($pwd == $pwd2){
                    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                    $sql = "UPDATE user SET `password`='$hashedpwd',edited='$time'
                    WHERE username='$uid'";
        
                    if (mysqli_query($conn, $sql)) {
                        header("location: ../index.php?error=pwdChanged");
                        exit;
                    } else {
                        header("location: ../forgotpassword.php?Error=pwdChangeFailed");
                        exit;
                    }
                }else{
                    header("location: ../forgotpassword.php?error=PwdUnmatch");
                    exit;
                }
            }
            else{
                header("location: ../forgotpassword.php?Error=UserDontExist");
                exit;
            }
        }
    }
} else {
    header("location: ../forgotpassword.php");
    exit;
}
