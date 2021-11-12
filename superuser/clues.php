<?php 

    require './inside/valid_login.php';
    
    include '../partials/_dbconnect.php'; 

    if (isset($_GET['edit'])) {
        
        $sno = $_GET['id'];
        $clue = $_GET['clue'];
        $title = $_GET['title'];
        $content = $_GET['content'];
        $story = $_GET['story'];

        $title = str_replace("'", "&apos;", $title);
        $title = str_replace('"', '&quot;', $title);
        
        $content = str_replace("'", "&apos;", $content);
        $content = str_replace('"', '&quot;', $content);
        
        $update = "UPDATE clue SET clue_number = '$clue', clue_title = '$title', clue_content = '$content', clue_story_id = '$story' WHERE clue_id = '$sno'";

        $updateRes = mysqli_query($conn, $update);
        $affect = mysqli_affected_rows($conn);

        if ($updateRes) {
        if ($affect) {
            echo '<script>alert("Clue details updated");</script>';
            echo "<script>setTimeout(\"location.href = './clues.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Clue details not updated");</script>';
                echo "<script>setTimeout(\"location.href = './clues.php';\",1);</script>";
            }
        }
    }

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
      
        $sql = "DELETE FROM clue WHERE clue_id = '$sno'";
      
        $result = mysqli_query($conn, $sql);
        $affect = mysqli_affected_rows($conn);
      
        if ($result) {
          if ($affect) {
              echo '<script>alert("Clue Deleted");</script>';
              echo "<script>setTimeout(\"location.href = './clues.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Clue Not Deleted");</script>';
                echo "<script>setTimeout(\"location.href = './clues.php';\",1);</script>";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $clue = $_POST['clue'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $story = $_POST['story'];

        $title = str_replace("<", "&lt;", $title);
        $title = str_replace(">", "&gt;", $title);
        $title = str_replace("'", "&apos;", $title);
        $title = str_replace('"', '&quot;', $title);
        
        $content = str_replace("<", "&lt;", $content);
        $content = str_replace(">", "&gt;", $content);
        $content = str_replace("'", "&apos;", $content);
        $content = str_replace('"', '&quot;', $content);

        $sql = "INSERT INTO clue(clue_title, clue_content, clue_number, clue_story_id)
                VALUES('$title', '$content', '$clue', '$story')";
        
        $result = mysqli_query($conn, $sql); 

        if ($result) {
            echo '<script>alert("Successfully Added new clue!!");</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>VITFAM | Clues</title>
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
        <caption class="mb-4 text-center">List of all the clues</caption>
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">S. No.</th>
                    <th class="text-center" scope="col">Clue Number</th>
                    <th class="text-center" scope="col">Clue Title</th>
                    <th class="text-center" scope="col">Clue Content</th>
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

                $sql = "SELECT * FROM clue";
                $result = mysqli_query($conn, $sql); 
                
                if (mysqli_num_rows($result)) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['clue_id'];
                        echo $cc = strtr($row['clue_clue'], '"', '"');
                        echo "
                            <tr>
                                <th class='text-center' scope='row'>" . $i ."</th>
                                <td class='text-center'>" . $row['clue_number'] ."</td>
                                <td class='text-center'>" . $row['clue_title'] ."</td>
                                
                                <td class='text-center'><textarea class='form-control' disabled style='width: 350px;' rows='2'/>" . $row['clue_content'] ."</textarea></td>
                                <td class='text-center'>" . $row['clue_story_id'] ."</td>
                        ";
                        if($_SESSION['type'] == 'A'){
                            echo"
                                <td>
                                    <button class='btn btn-outline-primary mx-2 my-2' data-bs-toggle='modal' data-bs-target='#editClueModal" . $id . "'>EDIT</button>
                                    ";
                                    require './inside/_cluemodal.php';
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
                                    <td class="text-center"><input type="text" class="form-control" name="clue" placeholder="Clue Number" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="title" placeholder="Clue Title" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="content" placeholder="Clue Content" required/></td>
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
      Array.from(deletes).forEach((element)=>{
        element.addEventListener('click', (e)=>{
          console.log('edit ', );
          sno = e.target.id.substr(3,);
          
          if(confirm("Are you Sure!")){
            console.log("YES");
            window.location = `./clues.php?delete=${sno}`;
          }
          else{
            console.log("NO");
          }
        })
      })
    </script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>