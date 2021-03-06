<?php 

    require './inside/valid_login.php';
    
    include '../partials/_dbconnect.php'; 

    if (isset($_GET['edit'])) {
        
        $sno = $_GET['id'];
        $title = $_GET['title'];
        $content = $_GET['content'];

        $title = str_replace("'", "&apos;", $title);
        $title = str_replace('"', '&quot;', $title);
        
        $content = str_replace("'", "&apos;", $content);
        $content = str_replace('"', '&quot;', $content);

        $update = "UPDATE story SET story_title = '$title', story_content = '$content' WHERE story_id = '$sno'";

        $updateRes = mysqli_query($conn, $update);
        $affect = mysqli_affected_rows($conn);

        if ($updateRes) {
        if ($affect) {
            echo '<script>alert("Story updated");</script>';
            echo "<script>setTimeout(\"location.href = './story.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Story is not updated");</script>';
                echo "<script>setTimeout(\"location.href = './story.php';\",1);</script>";
            }
        }
    }

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
      
        $sql = "DELETE FROM story WHERE story_id = '$sno'";
      
        $result = mysqli_query($conn, $sql);
        $affect = mysqli_affected_rows($conn);
      
        if ($result) {
          if ($affect) {
              echo '<script>alert("Story Deleted");</script>';
              echo "<script>setTimeout(\"location.href = './story.php';\",1);</script>";
            }
            else{
                echo '<script>alert("Story Not Deleted");</script>';
                echo "<script>setTimeout(\"location.href = './story.php';\",1);</script>";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $title = $_POST['title'];
        $content = $_POST['content'];

        $title = str_replace("<", "&lt;", $title);
        $title = str_replace(">", "&gt;", $title);
        $title = str_replace("'", "&apos;", $title);
        $title = str_replace('"', '&quot;', $title);
        
        $content = str_replace("<", "&lt;", $content);
        $content = str_replace(">", "&gt;", $content);
        $content = str_replace("'", "&apos;", $content);
        $content = str_replace('"', '&quot;', $content);

        $sql = "INSERT INTO story(story_title, story_content)
                VALUES('$title', '$content')";
        
        $result = mysqli_query($conn, $sql); 

        if ($result) {
            echo '<script>alert("Successfully Added new story!!");</script>';
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
    <link rel="stylesheet" href="css/style.css">
    <title>VITFAM | Stories</title>
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
        <caption class="mb-4 text-center">List of Stories</caption>
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">S. No.</th>
                    <th class="text-center" scope="col">Story Number</th>
                    <th class="text-center" scope="col">Story Title</th>
                    <th class="text-center" scope="col">Story Content</th>
        <?php
                
            if($_SESSION['type'] == 'A'){
                echo '<th class="text-center" scope="col">Action</th>';
            }
            echo '
                </tr>
            </thead>
            <tbody>
            ';

                $sql = "SELECT * FROM story";
                $result = mysqli_query($conn, $sql); 
                
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sid = $row['story_id'];
                        echo "
                            <tr>
                                <th class='text-center' scope='row'>" . $i ."</th>
                                <th class='text-center'>" . $row['story_id'] ."</th>
                                <td class='text-center'>" . $row['story_title'] ."</td>
                                <td class='d-flex justify-content-center align-items-center'><textarea style='width:600px;' class='form-control' name='content' placeholder='Content' rows='12' disabled>" . $row['story_content'] ."</textarea></td>
                        ";
                        if($_SESSION['type'] == 'A'){
                            echo"
                                <td class='' style='height:310px;'>
                                    <button class='btn btn-outline-primary mx-2 my-2' data-bs-toggle='modal' data-bs-target='#editStoryModal" . $sid . "'>EDIT</button>
                                    ";
                                    require './inside/_storymodal.php';
                                    echo"
                                    <button class='delete btn btn-danger' id='del" . $sid . "'>DELETE</button>
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
                                    <th class="text-center" scope="row">' . $i . '</th>
                                    <td class="text-center"><textarea class="form-control" name="id" placeholder="Auto Increment" rows="3" disabled></textarea></td>
                                    <td class="text-center"><textarea class="form-control" name="title" placeholder="Story Title" rows="3" required></textarea></td>
                                    <td class="text-center"><textarea class="form-control" name="content" placeholder="Story Content" rows="3" required></textarea></td>
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
            console.log(sno);
            window.location = `./story.php?delete=${sno}`;
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