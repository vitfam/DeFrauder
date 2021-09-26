<?php 

    require './inside/valid_login.php';
    
    include '../partials/_dbconnect.php'; 

    if (isset($_GET['edit'])) {
        
        $sno = $_GET['id'];
        $content = $_GET['content'];
        $stage1 = $_GET['stage1'];
        $stage2 = $_GET['stage2'];
        $stage3 = $_GET['stage3'];
        $story = $_GET['story'];

        $update = "UPDATE question SET question_content = '$content', stage1_question = '$stage1', stage2_question = '$stage2', stage3_question = '$stage3', question_story_id = '$story' WHERE question_id = '$sno'";

        $updateRes = mysqli_query($conn, $update);
        $affect = mysqli_affected_rows($conn);

        if ($updateRes) {
        if ($affect) {
            echo '<script>alert("Question details updated");</script>';
            echo "<script>setTimeout(\"location.href = './stagequestions.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Question details not updated");</script>';
                echo "<script>setTimeout(\"location.href = './stagequestions.php';\",1);</script>";
            }
        }
    }

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
      
        $sql = "DELETE FROM question WHERE question_id = '$sno'";
      
        $result = mysqli_query($conn, $sql);
        $affect = mysqli_affected_rows($conn);
      
        if ($result) {
          if ($affect) {
              echo '<script>alert("Question Deleted");</script>';
              echo "<script>setTimeout(\"location.href = './stagequestions.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Clue Not Deleted");</script>';
                echo "<script>setTimeout(\"location.href = './stagequestions.php';\",1);</script>";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $content = $_POST['content'];
        $stage1 = $_POST['stage1'];
        $stage2 = $_POST['stage2'];
        $stage3 = $_POST['stage3'];
        $story = $_POST['story'];

        $sql = "INSERT INTO question(question_content, stage1_question, stage2_question, stage3_question, question_story_id)
                VALUES('$content', '$stage1', '$stage2', '$stage3', '$story')";
        
        $result = mysqli_query($conn, $sql); 

        if ($result) {
            echo '<script>alert("Successfully Added new question!!");</script>';
        }
        else{
            echo '<script>alert("We are facing some issues!<br>Please try after sometime");</script>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <div id="loader">
        <div class="clock-loader"></div>
    </div>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/VITFAM.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>VITFAM | Stage Question</title>
</head>

<body>
    <?php require './inside/_header.php'; ?>

    <h2 class="text-center mt-4">Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="container mt-3" style="height: 63.5vh;">
        <div class="table-responsive">

            <table class="table table-hover caption-top">
                <caption class="mb-4 text-center">List of all the story-wise question</caption>
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">S. No.</th>
                        <th class="text-center" scope="col">Question Content</th>
                        <th class="text-center" scope="col">Stage 1 Question</th>
                        <th class="text-center" scope="col">Stage 2 Question</th>
                        <th class="text-center" scope="col">Stage 3 Question</th>
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

                $sql = "SELECT * FROM question";
                $result = mysqli_query($conn, $sql); 
                
                if (mysqli_num_rows($result)) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['question_id'];
                        echo "
                            <tr>
                                <th class='text-center' scope='row'>" . $i ."</th>
                                <td ><textarea class='form-control' disabled />" . $row['question_content'] ."</textarea></td>
                                <td ><textarea class='form-control' disabled />" . $row['stage1_question'] ."</textarea></td>
                                <td ><textarea class='form-control' disabled />" . $row['stage2_question'] ."</textarea></td>
                                <td ><textarea class='form-control' disabled />" . $row['stage3_question'] ."</textarea></td>
                                <td class='text-center'>" . $row['question_story_id'] ."</td>
                        ";
                        if($_SESSION['type'] == 'A'){
                            echo"
                                <td class='d-flex align-items-center' style='height: 92.8px;'>
                                    <button class='btn btn-outline-primary mx-2 my-2' data-bs-toggle='modal' data-bs-target='#editQuesModal" . $id . "'>EDIT</button>
                                    ";
                                    require './inside/_questionModal.php';
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
                                    <td class="text-center"><input type="text" class="form-control" name="content" placeholder="Question Content" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="stage1" placeholder="Stage 1 Question" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="stage2" placeholder="Stage 1 Question" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="stage3" placeholder="Stage 1 Question" required/></td>
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
                window.location = `./stagequestions.php?delete=${sno}`;
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