<?php require 'partials/_validation.php'; ?>

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
    <title>VITFAM | SCAM 2021</title>
</head>
<!-- <body style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('https://floridapolitics.com/wp-content/uploads/2016/02/fraud-Large.jpg'); background-size: cover; background-repeat: no-repeat; overflow: hidden;"> -->
<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('https://www.bluefin.com/wp-content/uploads/2020/10/fraudulent-credit-card-transactions.jpg'); background-size: cover; background-repeat: no-repeat; overflow: hidden;">
    <div id="loader">
        <div class="clock-loader"></div>
    </div>
    <audio id="my_audio" src="./music/index.mp3" loop="loop"></audio>

    <?php require './partials/_header.php'; ?>

    <div class="container main_page main-heading">
        <h1>SCAM 2021</h1>
        <?php 
                include './partials/_dbconnect.php';
                
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                    echo '
                      <h2>Welcome <span>' . $_SESSION['username'] . '</span></h2>
                      <div class="d-flex mt-4 justify-content-center align-items-center">
                    ';
                            
                    echo '
                        <a href="story.php" class="btn btn-outline-light mx-2">Proceed to Story</a>
                        <a href="rules.php" class="btn btn-primary mx-2">Guidelines</a>
                        <form action="./partials/_loggout.php" method="POST">
                          <button type="submit" class="btn btn-danger mx-2">Logout</button>
                        </form>
                      </div>
                    ';
                }
                else{ 
                    echo '
                      <div class="d-flex mt-4 justify-content-center align-items-center">
                        <button type="button" class="btn btn-outline-light my-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login to the Website</button>
                        <a href="./rules.php" class="btn btn-primary mx-2">Guidelines</a>
                      </div>
                    ';
                }  

              ?>
    </div>

    <?php include './partials/_loginModal.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <script src="./js/main.js"></script>
</body>

</html>