<?php
    
    session_start();
    
    if ((isset($_SESSION['loggedin']))){
        $loggedin = true;
    }
    else{
        $loggedin = false;
    }

?>