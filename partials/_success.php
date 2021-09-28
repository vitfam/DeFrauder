
<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        session_start();
        
        include '_dbconnect.php';
        
        $sid = $_SESSION['story_id'];
        $uid = $_SESSION['user_id'];

        echo $incr = $_SESSION['ques_increment'];
    
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];

        $answer1 = str_replace("<", "&lt;", $answer1);
        $answer1 = str_replace(">", "&gt;", $answer1);
        $answer1 = str_replace("'", "&apos;", $answer1);
        $answer1 = str_replace('"', '&quot;', $answer1);
        
        $answer2 = str_replace("<", "&lt;", $answer2);
        $answer2 = str_replace(">", "&gt;", $answer2);
        $answer2 = str_replace("'", "&apos;", $answer2);
        $answer2 = str_replace('"', '&quot;', $answer2);
        
        $answer3 = str_replace("<", "&lt;", $answer3);
        $answer3 = str_replace(">", "&gt;", $answer3);
        $answer3 = str_replace("'", "&apos;", $answer3);
        $answer3 = str_replace('"', '&quot;', $answer3);

        $sqlquery = "SELECT * FROM user_final WHERE user_id = '$uid' AND final_id = '$sid'";
        $result = mysqli_query($conn, $sqlquery); 
        
        if ($result) {
            $ansdone = "UPDATE user_final SET final_answer1 = '$answer1', final_answer2 = '$answer2', final_answer3 = '$answer3' WHERE user_id = '$uid' AND final_id = '$sid'";
            $ansRes = mysqli_query($conn, $ansdone);
            if($ansRes){
                $increment = "UPDATE user_final SET final_logout = '1' WHERE user_id = '$uid' AND final_id = '$sid'";
                $incrementRes = mysqli_query($conn, $increment);
                if($incrementRes){
                    header("location: ../complete.php");
                } else{
                    echo mysqli_error($conn);
                }
            } 
        }
    }
?>
