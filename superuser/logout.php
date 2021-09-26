<?php

    session_start();
    session_unset();
    session_destroy();

    echo '<script>alert("Logging out...");</script>';
    echo "<script>setTimeout(\"location.href = './index.php';\",1);</script>";

?>