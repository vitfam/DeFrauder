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

    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/congo.css">
    <title>VITFAM | Congratulations</title>
  </head>
  <body>
    <div id="loader">
      <div class="clock-loader"></div>
    </div>
    
    <audio id="my_audio" src="./music/congratulations.mp3" loop="loop"></audio>

  <div class="wrapper">
    <div class="modal modal--congratulations">
      <div class="modal-top">
        <img class="modal-icon u-imgResponsive" src="https://dl.dropboxusercontent.com/s/e1t2hhowjcrs7f5/100daysui_100icon.png" alt="Trophy" />
        <div class="modal-header">Congratulations <span><?php echo $_SESSION['username']; ?></span></div>
          <div class="modal-subheader">You have successfully completed <span>Stage <?php echo $_SESSION['stage']; ?></span></div>
        </div>
        <div class="modal-bottom">
        
        <?php 
            if($_SESSION['stage'] == 3){
              echo '
                <a href="./index.php" role="button" class="modal-btn u-btn u-btn--share">Home</a>
                <form action="./clues.php" method="POST">
                  <button type="submit" name="congo" class="modal-btn u-btn u-btn--success">Final Step</button>
                </form>
              ';
            }
            else if($_SESSION['stage'] == 2){
              echo '
              <a href="./index.php" role="button" class="modal-btn u-btn u-btn--share">Home</a>
                <form action="./clues.php" method="POST">
                  <button type="submit" name="congo" class="modal-btn u-btn u-btn--success">Unlock the Next Stage</button>
                </form>
                ';  
            }
            else if($_SESSION['stage'] == 1){
              echo '
              <a href="./index.php" class="modal-btn u-btn u-btn--share">Home</a>
                <form action="./clues.php" method="POST">
                  <button type="submit" name="congo" class="modal-btn u-btn u-btn--success">Unlock the Next Stage</button>
                </form>
              ';
            } else{
              header("location: ./index.php");
            }
        ?>
          </div>
      </div>
    </div>
  </div>
  <script src="./js/main.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rovf9gzu.json"  background="transparent"  speed="1"  style="width: 100vw; height: 100vh; position: absolute; z-index:-10; top:0%; left:0%; transform:scale(2);" autoplay></lottie-player>
  <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rovf9gzu.json"  background="transparent"  speed="1"  style="width: 100vw; height: 100vh; position: absolute; z-index:-10; top:50%; left:0%; transform:translate(-50%, -50%);" autoplay></lottie-player>
  <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rovf9gzu.json"  background="transparent"  speed="1"  style="width: 100vw; height: 100vh; position: absolute; z-index:-10; top:50%; left:100%; transform:translate(-50%, -50%);" autoplay></lottie-player>
  </body>
</html>
