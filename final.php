<?php 
  session_start();

  if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
    header("location: ./index.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>VITFAM | FINAL ROUND</title>
    <style>
    textarea.form-control,
    textarea.form-control:focus {
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

    include './partials/_dbconnect.php';
    $final = "SELECT * FROM final WHERE final_story_id = '$sid'";
    $finalRes = mysqli_query($conn, $final);
        
    if (mysqli_num_rows($finalRes)) {
      while($finalRow = mysqli_fetch_assoc($finalRes)){
        if($_SESSION['ques_increment'] == 4){
          echo '
          <div class="container story-box my-4">
              <h2 class="text-center text-uppercase">Question Round</h2>
          </div>

          <div class="container question-box my-5">
            <form action="./partials/_success.php" method="POST">
            <h3>Question 1</h3>    
            <div class="mb-3">
                    <label for="question1" class="form-label">' . $finalRow['final_question1'] . '</label>
                    <textarea type="text" class="form-control" id="question1" name="answer1" required rows="3"></textarea>
                </div>
                <h3>Question 2</h3>    
                <div class="mb-3">
                    <label for="question2" class="form-label">' . $finalRow['final_question2'] . '</label>
                    <textarea type="text" class="form-control" id="question2" name="answer2" required rows="3"></textarea>
                </div>
                <h3>Question 3</h3>    
                <div class="mb-3">
                    <label for="question3" class="form-label">' . $finalRow['final_question3'] . '</label>
                    <textarea type="text" class="form-control" id="question3" name="answer3" required rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success my-4">Submit</button>
            </form>
          </div>
          ';
        } else{
          header("location: ./index.php");
        }
      }
    }

    require './partials/_footer.php';

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="./js/main.js"></script>
</body>

</html>