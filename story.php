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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>VITFAM | Story</title>
  </head>
  
  <body>
  <div id="loader">
      <div class="clock-loader"></div>
    </div>


    <?php 
    
      require './partials/_header.php';

      include './partials/_dbconnect.php';

      $id = $_SESSION['user_id'];
      $sql = "SELECT * FROM story S, users U WHERE U.story_id = S.story_id AND U.user_id = '$id'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      
      if ($num) {
        while($row = mysqli_fetch_assoc($result)){
          $_SESSION['story_id'] = $row['story_id'];
          $_SESSION['clue_id'] = 1;
          echo '
            <div class="container story-box my-4" style="width:80%;">
              <h2 class="text-center my-4">' . $row['story_title'] . '</h2>
              <p style="line-height:30px;">' . $row['story_content'] . '</p>
              <form action="./clues.php" method="POST" class="d-flex justify-content-lg-end my-5">
                <input class="btn btn-warning" type="submit" name="stage1" value="Proceed to Clues">
              </form>
            </div>
          ';
        }
      } 

    require './partials/_footer.php';

  ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
  </body>
</html>