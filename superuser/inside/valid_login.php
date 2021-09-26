<?php

    session_start();
    if ((isset($_SESSION['login']) || $_SESSION['login'] == true)){
        $login = true;
        if((time() - $_SESSION['last_login_timestamp']) > 900) {
            $login = false;
            echo '<script>alert("15 Minutes Over!!");</script>';
            echo "<script>setTimeout(\"location.href = './logout.php';\",1);</script>";
        }  
        else {  
            $_SESSION['last_login_timestamp'] = time();
        }
    }
    else{
        header("location: ./index.php");
    }

?>