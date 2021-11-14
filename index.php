<?php require 'partials/_validation.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Motive, Movement and Opportunity, we've got it all here at VITFAM's DeFRAUDER. It is time to fish out the fraud in our suspenseful stories. With clues and hints lined up all along the way, just like a treasure hunt for lost treasures, the ball is in your court to figure out the mastermind schemer and their scheme in the exciting and fast-moving tales we've got lined up for you.">
    <link rel="shortcut icon" href="./images/VITFAM.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>VITFAM | DeFRAUDER</title>
</head>

<body
    style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('https://wallpaperaccess.com/full/1104840.jpg'); overflow: hidden;">
    <div id="loader">
        <div class="clock-loader"></div>
    </div>

    <audio id="my_audio" src="./music/DeFrauder.mp3" loop="loop"></audio>

    <?php require './partials/_header.php'; ?>

    <div class="container main-heading">

        <!-- Add particles js -->
        <div id="particles-js"></div>

        <div class="patterns">
            <svg width="100%" height="100%">
                <text x="50%" y="50%" text-anchor="middle">DeFRAUDER</text>
            </svg>
        </div>

        <div class="inner-data">
            <?php 
                include './partials/_dbconnect.php';
                
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                    echo '
                      <h2 style="font-family: \'Cinzel Decorative\', cursive;">Welcome <span>' . $_SESSION['username'] . '</span></h2>
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
                    // echo '
                    //   <div class="d-flex mt-4 justify-content-center align-items-center">
                    //     <button type="button" class="btn btn-outline-light my-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login to the Website</button>
                    //     <a href="./rules.php" class="btn btn-primary mx-2">Guidelines</a>
                    //   </div>
                    // ';
                    echo '
                    <h2 style="font-family: \'Cinzel Decorative\', cursive;">tHANK YOu fOR PARtiCiPAtiNG</h2>
                      <div class="d-flex mt-4 justify-content-center align-items-center">
                        <a href="./winners.php" class="btn btn-outline-light mx-2">Check Result</a>
                        <a href="https://instagram.com/vitfam_/" target="_blank" class="btn btn-warning text-dark mx-2">Follow for more events</a>
                      </div>
                    ';
                }  

              ?>
        </div>
    </div>

    <?php include './partials/_loginModal.php'; ?>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <script>
    window.onload = async () => {
        try {
            await document.getElementById("my_audio").play();
        } catch (err) {
            // console.log(err); // console cleared
        }
    }
    </script>

    <script src="./js/main.js"></script>
    <script src="./js/particle.js"></script>
</body>

</html>