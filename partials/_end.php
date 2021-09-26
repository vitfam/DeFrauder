<?php 
    session_start();
    include '_dbconnect.php';

    $sid = $_SESSION['story_id'];
    $uid = $_SESSION['user_id'];

    $check = "SELECT * FROM user_final WHERE user_id = '$uid' AND final_id = '$sid'";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)){
            if($row['final_logout'] == 1){
                header("location: ./complete.php");
            }
        }
    }
?>