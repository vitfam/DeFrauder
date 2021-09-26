<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include '../partials/_dbconnect.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM superuser WHERE email = '$email'";
    
    $result = mysqli_query($conn, $sql); 

    if (mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)){
            if ($password == $row['password']) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['last_login_timestamp'] = time(); 
                header("location: ./dashboard.php");
            }
            else{
                echo '<script>alert("Invalid Password!!");</script>';
                echo "<script>setTimeout(\"location.href = './index.php';\",1);</script>";
            }
        }
    }
    else{
        echo '<script>alert("Invalid Email!!");</script>';
        echo "<script>setTimeout(\"location.href = './index.php';\",1);</script>";
    }
}
    
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/VITFAM.png" type="image/x-icon">
    <style>
        .login-btn{
            width:100%;
            background-color: rgba(81, 97, 206, 1) !important; 
            border:none !important; 
            outline:none; 
            padding:10px 0 !important;
        }
        .login-btn:hover{
            background-color: rgba(81, 97, 206, .85) !important;
        }
        #loader {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: black;
            background-color: #F5F5F5;
        }
        .clock-loader {
            --clock-color: #5161CE;
            --clock-width: 10rem;
            --clock-radius: calc(var(--clock-width) / 2);
            --clock-minute-length: calc(var(--clock-width) * 0.4);
            --clock-hour-length: calc(var(--clock-width) * 0.2);
            --clock-thickness: 0.5rem;

            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: var(--clock-width);
            height: var(--clock-width);
            border: 3px solid var(--clock-color);
            border-radius: 50%;
        }
        .clock-loader::before,
        .clock-loader::after {
            position: absolute;
            content: "";
            top: calc(var(--clock-radius) * 0.25);
            width: var(--clock-thickness);
            background: var(--clock-color);
            border-radius: 10px;
            transform-origin: center calc(100% - calc(var(--clock-thickness) / 2));
            animation: spin infinite linear;
        }

        .clock-loader::before {
            height: var(--clock-minute-length);
            animation-duration: 2s;
        }

        .clock-loader::after {
            top: calc(var(--clock-radius) * 0.25 + var(--clock-hour-length));
            height: var(--clock-hour-length);
            animation-duration: 15s;
        }

        @keyframes spin {
            to {
                transform: rotate(1turn);
            }
        }
        @media (max-width: 575.98px) {
            form{
                width: 50vw;
            }
        }
    </style>

    <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>VITFAM | SUPER USER</title>
</head>

<body style="background: url('https://wallpapercave.com/wp/wp2508415.jpg') no-repeat fixed; background-size: cover; background-color: rgba(0, 0, 0, 0.8); background-blend-mode: multiply;">
    <div id="loader">
      <div class="clock-loader"></div>
    </div>
    <div class="container" style="position: absolute; top:50%; left:50%; transform: translate(-50%, -50%); width: 35%">
        <h1 class="my-5 text-center" style="color: #FFF;">Login to Admin Panel</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email"><i class="fas fa-user px-2"></i> Email Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password"><i class="fas fa-lock px-2"></i> Password</label>
            </div>
            <button type="submit" class="btn btn-primary login-btn mt-2">LOGIN</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>

</html>