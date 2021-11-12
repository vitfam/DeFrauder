<!-- Main page where all the clues are shown to the user -->

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>VITFAM | Clues</title>
    <style>
      .btn-list{
        background-color: rgba(201, 242, 199, 1) !important;
        border-color: rgba(201, 242, 199, 1) !important;
      }
      .btn-list:hover{
        background-color: rgba(201, 242, 199, .75) !important;
        border-color: rgba(201, 242, 199, .75) !important;
      }
      .container a{
        color: rgba(0, 187, 249, 1) !important;
      }
      .container a:hover{
        color: rgba(0, 187, 249, .5) !important;
      }
      a{
        text-decoration: none;
      }
    </style>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://source.unsplash.com/1600x900/?finance,fraud');">
    <div id="loader">
      <div class="clock-loader"></div>
    </div>

  <?php 
      require './partials/_header.php';
      
      include './partials/_dbconnect.php';
      
      $sid = $_SESSION['story_id'];
      $uid = $_SESSION['user_id'];
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if(isset($_POST['prev'])){
          $_SESSION['clue_id'] -= 1;
          $_SESSION['clue_id'] = ($_SESSION['clue_id'] < 1) ? $_SESSION['clue_id'] = 1 : $_SESSION['clue_id'];
        }

        if(isset($_POST['next'])){
          $_SESSION['clue_id'] += 1;
          $_SESSION['clue_id'] = ($_SESSION['clue_id'] > 15) ? $_SESSION['clue_id'] = 15 : $_SESSION['clue_id'];
        }
        
        $id = $_SESSION['clue_id'];
      
        echo '<div class="container" style="height:42.7vh;">';
          
        $clue_sql = "SELECT * FROM user_ques WHERE user_id = '$uid' AND question_id = '$sid'";
        $clue_res = mysqli_query($conn, $clue_sql);
        if(mysqli_num_rows($clue_res)){
          while($clue_row = mysqli_fetch_assoc($clue_res)){
            $_SESSION['ques_increment'] = $clue_row['ques_increment'];
            if($clue_row['ques_increment'] >= 3){
              if($id <= 15){
                $sql1 = "SELECT * FROM clue WHERE clue_story_id = '$sid' AND clue_number = '$id'";
                $res1 = mysqli_query($conn, $sql1);
                $num1 = mysqli_num_rows($res1);
                if ($num1) {
                  while($row1 = mysqli_fetch_assoc($res1)){
                    
                    $_SESSION['clue_id'] = $row1['clue_number'];
                    echo '
                      <div class="container story-box my-4">
                        <h3 class="text-center my-5" style="font-size: 40px;">Clue ' . $row1['clue_number'] . '</h3>
                        <p>' . $row1['clue_title'] . '</p>
                        <p><a href="' . $row1['clue_content'] . '" target="_blank">Click here to Access the Clue</a></p>
                      </div>
                      <div class="quest container d-flex justify-content-lg-between mt-5 pt-5">
                      ';
                        if ($id == 1) {
                          echo '  
                            <input type="submit" class="btn btn-light disabled my-2 mx-2" name="prev"  value="Previous"/>
                          ';
                        }
                        else{
                          echo '  
                          <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                            <input type="submit" class="btn btn-primary my-2 mx-2" name="prev"  value="Previous"/>
                          </form>
                          ';
                        }
                        if($id == 15){
                          if($clue_row['ques_increment'] == 4){
                            echo '
                              <a href="./final.php" role="button" class="btn btn-success my-2 mx-2" style="color:#FFF !important;">Final Question</a>
                            ';
                          }else{
                            echo '
                              <form action="./question.php" method="POST">
                                <input type="submit" class="btn btn-success my-2 mx-2" name="stage3" value="Bonus Question"/>
                              </form>
                            ';
                          }
                        } 
                        else{
                          echo '
                          <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                            <input type="submit" class="btn btn-primary px-4 my-2 mx-2" name="next"  value="Next"/>
                          </form>
                          ';
                        }
                      echo '
                      </div>
                    ';
                  }
                }
              } else{
                header("location: ./index.php");
              }
            }
            if($clue_row['ques_increment'] == 2){
              if($id <= 10){
                $sql1 = "SELECT * FROM clue WHERE clue_story_id = '$sid' AND clue_number = '$id'";
                $res1 = mysqli_query($conn, $sql1);
                $num1 = mysqli_num_rows($res1);
                if ($num1) {
                  while($row1 = mysqli_fetch_assoc($res1)){
                    
                    $_SESSION['clue_id'] = $row1['clue_number'];
                    echo '
                      <div class="container story-box my-4">
                        <h3 class="text-center my-5" style="font-size: 40px;">Clue ' . $row1['clue_number'] . '</h3>
                        <p>' . $row1['clue_title'] . '</p>
                        <p><a href="' . $row1['clue_content'] . '" target="_blank">Click here to Access the Clue</a></p>
                      </div>
                      <div class="quest container d-flex justify-content-lg-between mt-5 pt-5">
                      ';
                        if ($id == 1) {
                          echo '  
                            <input type="submit" class="btn btn-light disabled my-2 mx-2" name="prev"  value="Previous"/>
                          ';
                        }
                        else{
                          echo '  
                          <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                            <input type="submit" class="btn btn-primary my-2 mx-2" name="prev"  value="Previous"/>
                          </form>
                          ';
                        }
                        if($id == 10){
                          echo '
                          <form action="./question.php" method="POST">
                            <input type="submit" class="btn btn-success my-2 mx-2" name="stage2" value="Bonus Question"/>
                          </form>
                          ';
                        } 
                        else{
                          echo '
                          <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                            <input type="submit" class="btn btn-primary px-4 my-2 mx-2" name="next"  value="Next"/>
                          </form>
                          ';
                        }
                      echo '
                      </div>
                    ';
                  }
                }
              } else{
                header("location: ./index.php");
              }
            }
            if($clue_row['ques_increment'] == 1){
              if($id <= 5){
                $sql1 = "SELECT * FROM clue WHERE clue_story_id = '$sid' AND clue_number = '$id'";
                $res1 = mysqli_query($conn, $sql1);
                $num1 = mysqli_num_rows($res1);
                if ($num1) {
                  while($row1 = mysqli_fetch_assoc($res1)){
                    
                    $_SESSION['clue_id'] = $row1['clue_number'];
                    echo '
                      <div class="container story-box my-4">
                        <h3 class="text-center my-5" style="font-size: 40px;">Clue ' . $row1['clue_number'] . '</h3>
                        <p>' . $row1['clue_title'] . '</p>
                        <p><a href="' . $row1['clue_content'] . '" target="_blank">Click here to Access the Clue</a></p>
                      </div>
                      <div class="quest container d-flex justify-content-lg-between mt-5 pt-5">
                      ';
                        if ($id == 1) {
                          echo '  
                            <input type="submit" class="btn btn-light disabled my-2 mx-2" name="prev"  value="Previous"/>
                          ';
                        }
                        else{
                          echo '  
                          <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                            <input type="submit" class="btn btn-primary my-2 mx-2" name="prev"  value="Previous"/>
                          </form>
                          ';
                        }
                        if($id == 5){
                          echo '
                          <form action="./question.php" method="POST">
                            <input type="submit" class="btn btn-success my-2 mx-2" name="stage1" value="Bonus Question"/>
                          </form>
                          ';
                        } 
                        else{
                          echo '
                          <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                            <input type="submit" class="btn btn-primary px-4 my-2 mx-2" name="next"  value="Next"/>
                          </form>
                          ';
                        }
                      echo '
                      </div>
                    ';
                  }
                }
              } else{
                header("location: ./index.php");
              }
            }
          }
        }
        echo '</div>';
      } else{
        echo mysqli_error();
      }

      
      
    


      echo '<div class="container text-center py-3 my-4" style="height:15vh; padding-top:45px;">';

      $clueListSQL = "SELECT * FROM user_ques WHERE question_id = '$sid' AND user_id = '$uid'";
      $clueListResult = mysqli_query($conn, $clueListSQL);
      if (mysqli_num_rows($clueListResult)) {
        while($clueListRow = mysqli_fetch_assoc($clueListResult)){
          if($clueListRow['ques_increment'] > 3){
            for ($i = 1; $i <= 15; $i++) { 
              echo '<button type="button"  class="btn btn-list btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#clueModal' . $i . '">Clue ' . $i . '</button>';
              require './partials/_clueModal.php';
              
              if($i == 15){
                echo '<button type="button"  class="btn btn-warning btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#stageModal3">Stage 3 Answer</button>';
                require './partials/_stageModal.php';
              }
              if($i == 10){
                echo '<button type="button"  class="btn btn-warning btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#stageModal2">Stage 2 Answer</button>';
                require './partials/_stageModal.php';
              }
              if($i == 5){
                echo '<button type="button"  class="btn btn-warning btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#stageModal1">Stage 1 Answer</button>';
                require './partials/_stageModal.php';
              }
            }
            if($clueListRow['ques_increment'] == 4){
              echo '
                <a href="./final.php" role="submit" class="btn btn-success btn-sm mx-1 my-2" style="color:#FFF !important;">Final Question</a>
              ';
            }
          } else if($clueListRow['ques_increment'] == 3){
            for ($i = 1; $i <= 15; $i++) { 
              echo '<button type="button" class="btn btn-list btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#clueModal' . $i . '">Clue ' . $i . '</button>';
              require './partials/_clueModal.php';
              
              if($i == 10){
                echo '<button type="button" class="btn btn-warning btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#stageModal2">Stage 2 Answer</button>';
                require './partials/_stageModal.php';
              }
              if($i == 5){
                echo '<button type="button" class="btn btn-warning btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#stageModal1">Stage 1 Answer</button>';
                require './partials/_stageModal.php';
              }
            }
          } else if($clueListRow['ques_increment'] == 2){
            for ($i = 1; $i <= 15; $i++) { 
              if($i <= 10){
                echo '<button type="button" class="btn btn-list btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#clueModal' . $i . '">Clue ' . $i . '</button>';
                require './partials/_clueModal.php';
            } else{
                echo '<button type="button" class="btn btn-light btn-sm mx-1 my-2" disabled data-bs-toggle="modal" data-bs-target="#clueModal' . $i . '">Clue ' . $i . '</button>';
                require './partials/_clueModal.php';
              }
              if($i == 5){
                echo '<button type="button" class="btn btn-warning btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#stageModal1">Stage 1 Answer</button>';
                require './partials/_stageModal.php';
              }
            }
          } else if($clueListRow['ques_increment'] == 1){
            for ($i = 1; $i <= 15; $i++) { 
              if($i <= 5){
                echo '<button type="button"  class="btn btn-list btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#clueModal' . $i . '">Clue ' . $i . '</button>';
                require './partials/_clueModal.php';
              } else{
                  echo '<button type="button"  class="btn btn-light btn-sm mx-1 my-2" disabled data-bs-toggle="modal" data-bs-target="#clueModal' . $i . '">Clue ' . $i . '</button>';
                  require './partials/_clueModal.php';
              }
            }
          }
        }
      }

      echo '<button type="button" class="btn btn-list btn-sm py-1 px-2" data-bs-toggle="modal" data-bs-target="#storyModal">CHECK THE STORY</button>';
      require './partials/_storyModal.php';
      echo '</div>';
        
    ?>

    <?php require './partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="./js/main.js"></script>
</body>
</html>