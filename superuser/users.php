<?php 

    require './inside/valid_login.php';
    
    include '../partials/_dbconnect.php'; 

    if (isset($_GET['edit'])) {
        
        $sno = $_GET['id'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $story = $_GET['story'];
        $login = $_GET['login'];

        $update = "UPDATE users SET username = '$username', user_email = '$email', password = '$password', story_id = '$story', user_login_check = '$login' WHERE user_id = '$sno'";

        $updateRes = mysqli_query($conn, $update);
        $affect = mysqli_affected_rows($conn);

        if ($updateRes) {
        if ($affect) {
            echo '<script>alert("User details updated");</script>';
            echo "<script>setTimeout(\"location.href = './users.php';\",1);</script>";
            }
            else{
                echo '<script>alert("User details not updated");</script>';
                echo "<script>setTimeout(\"location.href = './users.php';\",1);</script>";
            }
        }
    }

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
      
        $sql = "DELETE FROM users WHERE user_id = '$sno'";
      
        $result = mysqli_query($conn, $sql);
        $affect = mysqli_affected_rows($conn);
      
        if ($result) {
          if ($affect) {
              echo '<script>alert("User Deleted");</script>';
              echo "<script>setTimeout(\"location.href = './users.php';\",1);</script>";
            }
            else{
                echo '<script>alert("User Not Deleted");</script>';
                echo "<script>setTimeout(\"location.href = './users.php';\",1);</script>";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $story = $_POST['story'];

        $exist = "SELECT * FROM users WHERE user_email = '$email'";
        $res = mysqli_query($conn, $exist); 

        if (mysqli_num_rows($res) > 0) {
            echo '<script>alert("Email Already Exists!!");</script>';
        }
        else{
            $sql = "INSERT INTO users(username, user_email, password, story_id)
                    VALUES('$name', '$email', '$password', '$story')";
            
            $result = mysqli_query($conn, $sql); 

            if ($result) {
                echo '<script>alert("Successfully Added new user!!");</script>';
            }
            else{
                echo '<script>alert("We are facing some issues!<br>Please try after sometime");</script>';
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
    <title>VITFAM | Users</title>
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
        <caption class="mb-4 text-center">List of all the users</caption>
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">S. No.</th>
                    <th class="text-center" scope="col">Username</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">Password</th>
                    <th class="text-center" scope="col">Story Number</th>
                    <th class="text-center" scope="col">LoggedIn</th>
        <?php
                
            if($_SESSION['type'] == 'A'){
                echo '<th class="text-center" scope="col">Action</th>';
            }
            echo '
                </tr>
            </thead>
            <tbody>
            ';

                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $iid = $row['user_id'];
                        echo "
                            <tr>
                                <th class='text-center' scope='row'>" . $i ."</th>
                                <td class='text-center'>" . $row['username'] ."</td>
                                <td class='text-center'>" . $row['user_email'] ."</td>
                                <td class='text-center'>" . $row['password'] ."</td>
                                <td class='text-center'>" . $row['story_id'] ."</td>
                                <td class='text-center'>" . $row['user_login_check'] ."</td>
                        ";
                        if($_SESSION['type'] == 'A'){
                            echo"
                                <td>
                                    <button class='btn btn-outline-primary mx-2 my-2' data-bs-toggle='modal' data-bs-target='#editUserModal" . $iid . "'>EDIT</button>
                                    ";
                                    require './inside/_usermodal.php';
                                    echo"
                                    <button class='delete btn btn-danger' id='del" . $iid . "'>DELETE</button>
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
                                    <td class="text-center"><input type="text" class="form-control" name="username" placeholder="Name" required/></td>
                                    <td class="text-center"><input type="email" class="form-control" name="email" placeholder="Email" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="password" placeholder="Password" required/></td>
                                    <td class="text-center"><input type="text" class="form-control" name="story" placeholder="Story Number" required/></td>
                                    <td class="text-center"><input type="text" class="form-control"  value="0" disabled/></td>
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
            window.location = `./users.php?delete=${sno}`;
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