<?php 

    require './inside/valid_login.php';
    
    include '../partials/_dbconnect.php'; 

    if (isset($_GET['edit'])) {
        
        $sno = $_GET['id'];
        $content = mysqli_real_escape_string($conn, $_GET['content']);
        $final1 = $_GET['final1'];
        $final2 = $_GET['final2'];
        $final3 = $_GET['final3'];
        $story = $_GET['story'];

        $final1 = str_replace("<", "&lt;", $final1);
        $final1 = str_replace(">", "&gt;", $final1);
        $final1 = str_replace("'", "&apos;", $final1);
        $final1 = str_replace('"', '&quot;', $final1);
        
        $final2 = str_replace("<", "&lt;", $final2);
        $final2 = str_replace(">", "&gt;", $final2);
        $final2 = str_replace("'", "&apos;", $final2);
        $final2 = str_replace('"', '&quot;', $final2);
        
        $final3 = str_replace("<", "&lt;", $final3);
        $final3 = str_replace(">", "&gt;", $final3);
        $final3 = str_replace("'", "&apos;", $final3);
        $final3 = str_replace('"', '&quot;', $final3);

        $update = "UPDATE final SET final_content = '$content', final_question1 = '$final1', final_question2 = '$final2', final_question3 = '$final3', final_story_id = '$story' WHERE final_id = '$sno'";

        $updateRes = mysqli_query($conn, $update);
        $affect = mysqli_affected_rows($conn);

        if ($updateRes) {
        if ($affect) {
            echo '<script>alert("Final Question details updated");</script>';
            echo "<script>setTimeout(\"location.href = './finalQuestion.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Final Question details not updated");</script>';
                echo "<script>setTimeout(\"location.href = './finalQuestion.php';\",1);</script>";
            }
        }
    }

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
      
        $sql = "DELETE FROM final WHERE final_id = '$sno'";
      
        $result = mysqli_query($conn, $sql);
        $affect = mysqli_affected_rows($conn);
      
        if ($result) {
          if ($affect) {
              echo '<script>alert("Final Questions Deleted");</script>';
              echo "<script>setTimeout(\"location.href = './finalQuestion.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Final Questions Not Deleted");</script>';
                echo "<script>setTimeout(\"location.href = './finalQuestion.php';\",1);</script>";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $final1 = mysqli_real_escape_string($conn, $_POST['final1']);
        $final2 = mysqli_real_escape_string($conn, $_POST['final2']);
        $final3 = mysqli_real_escape_string($conn, $_POST['final3']);
        $story = $_POST['story'];

        $sql = "INSERT INTO final(final_content, final_question1, final_question2, final_question3, final_story_id)
                VALUES('$content', '$final1', '$final2', '$final3', '$story')";
        
        $result = mysqli_query($conn, $sql); 

        if ($result) {
            echo '<script>alert("Successfully Added new final questions!!");</script>';
        }
        else{
            echo '<script>alert("We are facing some issues!<br>Please try after sometime");</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>VITFAM | Final Questions</title>
</head>

<body>
    <div id="loader">
        <div class="clock-loader"></div>
    </div>
    <?php require './inside/_header.php'; ?>

    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container mt-3" style="height: 63.5vh;">
        <div class="table-responsive">

            <table class="table table-hover caption-top">
                <caption class="mb-4 text-center">List of all the final round question</caption>
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">S. No.</th>
                        <th class="text-center" scope="col">Final Content</th>
                        <th class="text-center" scope="col">Final Question 1</th>
                        <th class="text-center" scope="col">Final Question 2</th>
                        <th class="text-center" scope="col">Final Question 3</th>
                        <th class="text-center" scope="col">Story Number</th>
                        <?php
                
            if($_SESSION['type'] == 'A'){
                echo '<th class="text-center" scope="col">Action</th>';
            }
            echo '
                </tr>
            </thead>
            <tbody>
            ';

                $sql = "SELECT * FROM final";
                $result = mysqli_query($conn, $sql); 
                
                if (mysqli_num_rows($result)) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['final_id'];
                        echo "
                            <tr>
                                <th class='text-center' scope='row'>" . $i ."</th>
                                <td ><textarea class='form-control' disabled />" . $row['final_content'] ."</textarea></td>
                                <td ><textarea class='form-control' disabled />" . $row['final_question1'] ."</textarea></td>
                                <td ><textarea class='form-control' disabled />" . $row['final_question2'] ."</textarea></td>
                                <td ><textarea class='form-control' disabled />" . $row['final_question3'] ."</textarea></td>
                                <td class='text-center'>" . $row['final_story_id'] ."</td>
                        ";
                        if($_SESSION['type'] == 'A'){
                            echo"
                                <td class='d-flex align-items-center' style='height: 92.8px;'>
                                    <button class='btn btn-outline-primary mx-2 my-2' data-bs-toggle='modal' data-bs-target='#editFQuesModal" . $id . "'>EDIT</button>
                                    ";
                                    require './inside/_finalQuesModal.php';
                                    echo"
                                    <button class='delete btn btn-danger' id='del" . $id . "'>DELETE</button>
                                </td>
                            ";
                        }
                        echo '</tr>';
                        $i++;
                    }
                }
                if($_SESSION['type'] == 'A'){
                    echo '
                        <tfoot>
                            <tr>
                                <form action"' . $_SERVER['PHP_SELF'] . '" method="POST">
                                    <th class="text-center" scope="row">' . $i .'</th>
                                    <td class="text-center"><input type="text" class="form-control" name="content" placeholder="Final Content" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="final1" placeholder="Final Question 1" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="final2" placeholder="Final Question 2" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="final3" placeholder="Final Question 3" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="story" placeholder="Story Number" required/></td>
                                    <td class="text-center">
                                        <button type="submit"class="add btn btn-success px-5">ADD</button>
                                    </td>
                                </form>
                            </tr>
                        </tfoot>
                    ';
                }

            ?>
                        </tbody>
            </table>
        </div>
    </div>
    <?php require './inside/_footer.php'; ?>
    <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener('click', (e) => {
            console.log('edit ', );
            sno = e.target.id.substr(3, );

            if (confirm("Are you Sure!")) {
                console.log("YES");
                window.location = `./finalQuestion.php?delete=${sno}`;
            } else {
                console.log("NO");
            }
        })
    })
    </script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>