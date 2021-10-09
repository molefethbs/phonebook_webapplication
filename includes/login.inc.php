<?php

    session_start();
    require "../database/config.php";

    if(isset($_POST["login"])){
        $uid = $_POST['username'];
        $pwd = $_POST['pwd'];

        if(!empty($uid) || !empty($pwd)){
            $sql = "SELECT * FROM user WHERE username=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../signup.php?error=sqlError");
                exit;
            } else {
                mysqli_stmt_bind_param($stmt, "s", $uid);
                mysqli_stmt_execute($stmt);
                $results = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_assoc($results);

                if($user){
                    if($pwd == password_verify($pwd, $user['password'])){
                        $_SESSION['user'] = $uid;
                        header("location: ../contacts.php?error=passwdsuccess");
                        exit;
                    }
                    else{
                        header("location: ../index.php?error=passwdunmatch");
                        exit;
                    }
                }
                else {
                    header("location: ../index.php?error=userDontExist");
                    exit;
                }
            }
        }else{
            header("location: ../index.php?error=emptyfields");
            exit;
        }

    }else{
        header("location: ../index.php");
        exit;
    }

?>