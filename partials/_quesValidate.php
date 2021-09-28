<?php 

    session_start();
    
    include '_dbconnect.php';
    
    $sid = $_SESSION['story_id'];
    $uid = $_SESSION['user_id'];

    $incr = $_SESSION['ques_increment'] + 1;
    
    
    if(isset($_POST['answer3'])){
        $answer = $_POST['answer3'];
        $answer = str_replace("<", "&lt;", $answer);
        $answer = str_replace(">", "&gt;", $answer);
        $answer = str_replace("'", "&apos;", $answer);
        $answer = str_replace('"', '&quot;', $answer);


        $sqlquery = "SELECT * FROM user_ques WHERE user_id = '$uid' AND question_id = '$sid'";
        $result = mysqli_query($conn, $sqlquery); 
        
        if ($result) {
            $ansdone = "UPDATE user_ques SET stage3_answer = '$answer' WHERE user_id = '$uid' AND question_id = '$sid'";
            $ansRes = mysqli_query($conn, $ansdone);
            if($ansRes){
                $increment = "UPDATE user_ques SET ques_increment = '$incr' WHERE user_id = '$uid' AND question_id = '$sid'";
                $incrementRes = mysqli_query($conn, $increment);
                if($incrementRes){
                    $_SESSION['stage'] = 3;
                    header("location: ../congratulations.php");
                } else{
                    echo mysqli_error($conn);
                }
            } 
        }
    }

    else if(isset($_POST['answer2'])){
        $answer = $_POST['answer2'];
        $answer = str_replace("<", "&lt;", $answer);
        $answer = str_replace(">", "&gt;", $answer);
        $answer = str_replace("'", "&apos;", $answer);
        $answer = str_replace('"', '&quot;', $answer);

        $sqlquery = "SELECT * FROM user_ques WHERE user_id = '$uid' AND question_id = '$sid'";
        $result = mysqli_query($conn, $sqlquery); 
        
        if ($result) {
            $ansdone = "UPDATE user_ques SET stage2_answer = '$answer' WHERE user_id = '$uid' AND question_id = '$sid'";
            $ansRes = mysqli_query($conn, $ansdone);
            if($ansRes){
                $increment = "UPDATE user_ques SET ques_increment = '$incr' WHERE user_id = '$uid' AND question_id = '$sid'";
                $incrementRes = mysqli_query($conn, $increment);
                if($incrementRes){
                    $_SESSION['stage'] = 2;
                    header("location: ../congratulations.php");
                } else{
                    echo mysqli_error($conn);
                }
            } 
        }
    }



    else if(isset($_POST['answer1'])){
        $answer = $_POST['answer1'];
        $answer = str_replace("<", "&lt;", $answer);
        $answer = str_replace(">", "&gt;", $answer);
        $answer = str_replace("'", "&apos;", $answer);
        $answer = str_replace('"', '&quot;', $answer);

        $sqlquery = "SELECT * FROM user_ques WHERE user_id = '$uid' AND question_id = '$sid'";
        $result = mysqli_query($conn, $sqlquery); 
        
        if ($result) {
            $ansdone = "UPDATE user_ques SET stage1_answer = '$answer' WHERE user_id = '$uid' AND question_id = '$sid'";
            $ansRes = mysqli_query($conn, $ansdone);
            if($ansRes){
                $increment = "UPDATE user_ques SET ques_increment = '$incr' WHERE user_id = '$uid' AND question_id = '$sid'";
                $incrementRes = mysqli_query($conn, $increment);
                if($incrementRes){
                    $_SESSION['stage'] = 1;
                    header("location: ../congratulations.php");
                } else{
                    echo mysqli_error($conn);
                }
            } 
        }
    }

?>
