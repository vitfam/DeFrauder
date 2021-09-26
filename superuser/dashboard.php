<?php

    require './inside/valid_login.php';
    include '../partials/_dbconnect.php'; 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../images/VITFAM.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>VITFAM | Dashboard</title>
</head>
<body>
    <div id="loader">
      <div class="clock-loader"></div>
    </div>
    <?php require './inside/_header.php'; ?>
    
    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container">
        
        <div class="container my-5 d-flex justify-content-around align-items-center">
                
            <div class="card mx-2" id="c1" style="width: 18rem;">
                <div class="card-body">
                    <?php
                        $usersql = "SELECT * FROM users";
                        $userRes = mysqli_query($conn, $usersql);
                        
                        if (mysqli_num_rows($userRes)) {
                            echo '
                                <h2 class="card-title text-center pt-3"><i class="fa fa-users fa-3x"></i></h2>
                                <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . mysqli_num_rows($userRes) . '</span> Users</h3>
                            ';
                        }
                    ?>
                </div>
            </div>

            <div class="card mx-2" id="c2" style="width: 18rem;">
                <div class="card-body">
                <?php
                        $sql = "SELECT * FROM story";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result)) {
                            echo '
                                <h2 class="card-title text-center pt-3"><i class="fa fa-book-open fa-3x"></i></h2>
                                <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . mysqli_num_rows($result) . '</span> Stories</h3>
                            ';
                        }
                    ?>
                </div>
            </div>

            <div class="card mx-2" id="c3" style="width: 18rem;">
                <div class="card-body">
                <?php
                    $cluesql = "SELECT * FROM clue";
                    $clueRes = mysqli_query($conn, $cluesql);
                    
                    if (mysqli_num_rows($userRes)) {
                        echo '
                            <h2 class="card-title text-center pt-3"><i class="fa fa-lightbulb fa-3x"></i></h2>
                            <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . mysqli_num_rows($clueRes) . '</span> Clues</h3>
                        ';
                    }
                ?>
                </div>
            </div>

        </div>
        
        <div class="container my-5 d-flex justify-content-around align-items-center">
        
            <div class="card mx-2" id="c4" style="width: 18rem;">
                <div class="card-body">
                <?php
                    $sql = "SELECT * FROM question";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result)) {
                        echo '
                            <h2 class="card-title text-center pt-3"><i class="fa fa-question-circle fa-3x"></i></h2>
                            <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . mysqli_num_rows($result) . '</span> Stage Questions</h3>
                        ';
                    }
                ?>
                </div>
            </div>

            <div class="card mx-2" id="c5" style="width: 18rem;">
                <div class="card-body">
                <?php
                    $sql = "SELECT * FROM final";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result)) {
                        echo '
                            <h2 class="card-title text-center pt-3"><i class="fa fa-trophy fa-3x"></i></h2>
                            <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . mysqli_num_rows($result) . '</span> Final Questions</h3>
                        ';
                    }
                ?>
                </div>
            </div>

            <div class="card mx-2" id="c6" style="width: 18rem;">
                <div class="card-body">
                <?php
                    $sql = "SELECT * FROM superuser";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result)) {
                        echo '
                            <h2 class="card-title text-center pt-3"><i class="fa fa-user fa-3x"></i></h2>
                            <h3 class="card-text text-center py-4"><span style="color: #2A0944;">' . mysqli_num_rows($result) . '</span> Superusers</h3>
                        ';
                    }
                ?>
                </div>
            </div>

        </div>
        
    </div>

    <?php require './inside/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>
</html>