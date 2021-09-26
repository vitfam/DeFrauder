<?php 
  session_start();

  if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
    header("location: ./index.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./images/VITFAM.png" type="image/x-icon">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/congo.css">
    <title>VITFAM | Thank You</title>
  </head>
  <body>
    <div id="loader">
      <div class="clock-loader"></div>
    </div>
    
    <audio id="my_audio" src="./music/complete.mp3" loop="loop"></audio>

    <?php 

      include './partials/_dbconnect.php';
      $sid = $_SESSION['story_id'];
      $uid = $_SESSION['user_id'];

      $sql = "SELECT * FROM user_ques WHERE question_id = '$sid' AND user_id = '$uid'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)){
          if($row['ques_increment'] >= 3){
            echo '
              <div class="wrapper">
              <div class="modal modal--congratulations">
                <div class="modal-top">
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_i4zw2ddg.json"  background="transparent"  speed="1"  style="width: 100%; height: 250px;" loop autoplay></lottie-player>
                  <div class="modal-header">Congratulations <span>' . $_SESSION['username'] . '</span></div>
                    <div class="modal-subheader">You\'ve successfully <span>completed</span> the Game</div>
                  </div>
                  <div class="modal-bottom">
                      <a href="./index.php" role="button" class="modal-btn u-btn u-btn--share">Home</a>
                      <form action="./partials/_loggout.php" method="POST">
                          <button type="submit" name="congo" class="modal-btn u-btn u-btn--danger">Logout</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            ';
          }else{
            header("location: ./index.php");
          }
        }
      } else{
        echo mysqli_error($conn);
      }

    ?>
    
    <script src="./js/main.js"></script>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rovf9gzu.json"  background="transparent"  speed="1"  style="width: 100vw; height: 100vh; position: absolute; z-index:-10; top:50%; left:50%; transform:scale(2) translate(-50%, -50%);" autoplay></lottie-player>
    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rovf9gzu.json"  background="transparent"  speed="1"  style="width: 100vw; height: 100vh; position: absolute; z-index:-10; top:50%; left:0%; transform:translate(-50%, -50%) scale(2) rotate(45deg);" autoplay></lottie-player>
    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rovf9gzu.json"  background="transparent"  speed="1"  style="width: 100vw; height: 100vh; position: absolute; z-index:-10; top:50%; left:100%; transform:translate(-50%, -50%) scale(2) rotate(-45deg);" autoplay></lottie-player>
  </body>
</html>