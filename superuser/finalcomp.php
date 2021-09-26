<?php 

    require './inside/valid_login.php';
    
    include '../partials/_dbconnect.php'; 

    if (isset($_GET['edit'])) {
        
        $sno = $_GET['id'];
        $ans1 = $_GET['ans1'];
        $ans2 = $_GET['ans2'];
        $ans3 = $_GET['ans3'];
        $ans = $_GET['answer_given'];

        $update = "UPDATE user_final SET final_answer1 = '$ans1', final_answer2 = '$ans2', final_answer3 = '$ans3', final_logout = '$ans' WHERE user_id = '$sno'";

        $updateRes = mysqli_query($conn, $update);
        $affect = mysqli_affected_rows($conn);

        if ($updateRes) {
            if ($affect) {
                echo '<script>alert("Answers updated");</script>';
                echo "<script>setTimeout(\"location.href = './finalcomp.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Answers not updated");</script>';
                echo "<script>setTimeout(\"location.href = './finalcomp.php';\",1);</script>";
            }
        }
    }

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
    <link rel="stylesheet" href="css/style.css">
    <title>VITFAM | Stage Complete</title>
</head>
<body>
    <div id="loader">
      <div class="clock-loader"></div>
    </div>
    <?php require './inside/_header.php'; ?>
    
    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container mt-3">
    <div class="table-responsive">
       
        <table class="table table-hover caption-top">
        <caption class="mb-4 text-center">Final Answers of the users</caption>
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">S. No.</th>
                    <th class="text-center" scope="col">User Name</th>
                    <th class="text-center" scope="col">Story Number</th>
                    <th class="text-center" scope="col">Answer 1</th>
                    <th class="text-center" scope="col">Answer 2</th>
                    <th class="text-center" scope="col">Answer 3</th>
                    <th class="text-center" scope="col">Game Completed</th>
                    <?php
                
            if($_SESSION['type'] == 'A'){
                echo '
                    <th class="text-center" scope="col">Action</th>';
            }
            echo '
                </tr>
            </thead>
            <tbody>
            ';

                $sql = "SELECT * FROM user_final";
                $result = mysqli_query($conn, $sql); 
                
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $uid = $row['user_id'];
                        $fid = $row['final_id'];
                        $user = "SELECT * FROM users WHERE user_id = '$uid'";
                        $res = mysqli_query($conn, $user); 
                        if (mysqli_num_rows($res)) {
                            while ($row1 = mysqli_fetch_assoc($res)) {
                                echo "
                                    <tr>
                                        <th class='text-center' scope='row'>" . $i ."</th>
                                        <th class='text-center'>" . $row1['username'] ."</th>
                                        <th class='text-center'>" . $row['final_id'] ."</th>
                                        <td class=''><textarea class='form-control' name='content' placeholder='Final Answer 1' rows='5' disabled>" . $row['final_answer1'] ."</textarea></td>
                                        <td class=''><textarea class='form-control' name='content' placeholder='Final Answer 2' rows='5' disabled>" . $row['final_answer2'] ."</textarea></td>
                                        <td class=''><textarea class='form-control' name='content' placeholder='Final Answer 3' rows='5' disabled>" . $row['final_answer3'] ."</textarea></td>
                                        <td class='text-center'>" . $row['final_logout'] ."</td>
                                ";
                                if($_SESSION['type'] == 'A'){
                                    echo"
                                        <td>
                                            <button class='btn btn-outline-primary mx-2 my-2' data-bs-toggle='modal' data-bs-target='#finalModal" . $uid . "'>EDIT</button>
                                    ";
                                    require './inside/_finalModal.php';
                                    echo"
                                        </td>
                                    ";
                                }
                                echo '</tr>';
                                $i++;
                            }
                        }
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    <?php require './inside/_footer.php'; ?>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>