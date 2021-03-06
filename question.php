<!-- There are the question asking after every stage -->

<?php 
  session_start();

  if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
    header("location: ./index.php"); // Not access for outsider
  }
  require './partials/_end.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./images/VITFAM.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>VITFAM | Question Time</title>
    <style>
      textarea.form-control, textarea.form-control:focus{
        background: transparent;
        color: #FFF;
      }
    </style>
  </head>
  
  <body>
    <div id="loader">
      <div class="clock-loader"></div>
    </div>
  

    <?php require './partials/_header.php'; 
    
    $sid = $_SESSION['story_id'];
    $uid = $_SESSION['user_id'];

    include './partials/_dbconnect.php';

    $ques = "SELECT * FROM question WHERE question_story_id = '$sid'";
    $quesRes = mysqli_query($conn, $ques);

    $sql = "SELECT * FROM user_ques WHERE question_id = '$sid' AND user_id = '$uid'";
    $result = mysqli_query($conn, $sql);
        
    if (mysqli_num_rows($quesRes)) {
      while($quesRow = mysqli_fetch_assoc($quesRes)){

        echo '
        <div class="container story-box my-4" style="width:80%;">
            <h2 class="text-center text-uppercase">Bonus Question</h2>
            
        </div>

        <div class="container question-box my-5" style="width:80%;">
          <h3>Question ' . $_SESSION['ques_increment'] . '</h3>
          <form action="./partials/_quesValidate.php" method="POST">
          ';
          if (mysqli_num_rows($result)) {
            while($row = mysqli_fetch_assoc($result)){
              if($row['ques_increment'] == 3){
                echo '
                  <div class="my-4">
                    <label for="question3" class="form-label mb-3">' . $quesRow['stage3_question'] . '</label>
                    <textarea class="form-control" id="question3" name="answer3" rows="6"></textarea>
                  </div>
                ';
              }
              else if($row['ques_increment'] == 2){
                echo '
                  <div class="my-4">
                    <label for="question2" class="form-label mb-3">' . $quesRow['stage2_question'] . '</label>
                    <textarea class="form-control" id="question2" name="answer2" rows="6"></textarea>
                  </div>
                ';
              }
              else if($row['ques_increment'] == 1){
                echo '
                  <div class="my-4">
                    <label for="question1" class="form-label mb-3">' . $quesRow['stage1_question'] . '</label>
                    <textarea class="form-control" id="question1" name="answer1" rows="6"></textarea>
                  </div>
                ';
              }
              else{
                header("location: ./final.php");
              }
            }
          }
          echo'
              <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
        ';
      }
    }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
  </body>
</html>