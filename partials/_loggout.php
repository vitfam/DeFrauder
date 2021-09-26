<!-- With this script no user can login more than once -->

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // header("location: ./_logout.php");
    include '_dbconnect.php';
    
    session_start();
    
    $email = $_SESSION['user_email'];

    $sql = "SELECT * FROM users WHERE user_email = '$email'";
    
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);

    if ($num) {
        while($row = mysqli_fetch_assoc($result)){
            if($row['user_login_check'] == 1){
                $id = $row['user_id'];
                $login = "UPDATE users SET user_login_check = '0' WHERE user_id = '$id'";
                $res = mysqli_query($conn, $login);
                if ($res) {
                    header("location: ./_logout.php");
                } else {
                    echo '<script>alert("Experiencing Issue ' . mysqli_error($conn) . '");</script>';
                    echo "<script>setTimeout(\"location.href = './index.php';\",1);</script>";
                }
            } else{
                echo '<script>alert("Already Logout");</script>';
                echo "<script>setTimeout(\"location.href = './index.php';\",1);</script>";
            }
        }
    } else{
        echo '<script>alert("Mail not Found");</script>';
        echo "<script>setTimeout(\"location.href = './index.php';\",1);</script>";
    }
}

?>