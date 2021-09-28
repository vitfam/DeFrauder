<?php

    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "vitfam";

// Comment above code if you're using heruko server

// ------------------------------------------

// Comment below code if you're using localhost

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = substr($url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    
// ------------------------------------------

    $conn = mysqli_connect($server, $username, $password, $database);

    if(!$conn){
        die("Not connect with server");
    }

?>