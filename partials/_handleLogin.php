<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include '_dbconnect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user_email = '$email'";
    
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);

    
    if ($num) {
        while($row = mysqli_fetch_assoc($result)){
            if ($password == $row['password']) {
                $uid = $row['user_id'];
                $sqlc = "SELECT * FROM user_final WHERE user_id = '$uid'";
                $resultc = mysqli_query($conn, $sqlc); 
                $numc = mysqli_num_rows($resultc);
                if (mysqli_num_rows($resultc)) {
                    while($rowc = mysqli_fetch_assoc($resultc)){
                        if($row['user_login_check'] == 0){
                            if($rowc['final_logout'] == 0){
                                $id = $row['user_id'];
                                $login = "UPDATE users SET user_login_check = '1' WHERE user_id = '$id'";
                                $res = mysqli_query($conn, $login);
                                if ($res) {
                                    $login = true;
                                    session_start();
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['completed'] = false;
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['user_id'] = $row['user_id'];
                                    $_SESSION['story_id'] = $row['story_id'];
                                    $_SESSION['user_email'] = $row['user_email'];
                                    $_SESSION['last_login_timestamp'] = time(); 
                                    header("location: ../index.php");
                                } else {
                                    echo '<script>alert("Experiencing Issue ' . mysqli_error($conn) . '");</script>';
                                    echo "<script>setTimeout(\"location.href = '../index.php';\",1);</script>";
                                }
                            } else {
                                echo '<script>alert("Completed the Game");</script>';
                                echo "<script>setTimeout(\"location.href = '../index.php';\",1);</script>";
                            }
                        } else{
                            echo '<script>alert("Already Login");</script>';
                            echo "<script>setTimeout(\"location.href = '../index.php';\",1);</script>";
                        }
                    }
                }
            }
            else{
                echo '<script>alert("Invalid Password");</script>';
                echo "<script>setTimeout(\"location.href = '../index.php';\",1);</script>";
            }
        }
    }
    else{
        echo '<script>alert("Invalid Email");</script>';
        echo "<script>setTimeout(\"location.href = '../index.php';\",1);</script>";
    }
}

?>