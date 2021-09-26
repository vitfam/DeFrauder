<!-- Footer of the website use in many places -->

<div class="container-fluid footer d-flex bg-dark text-light py-2 sticky-bottom mt-5">
    <p class="text-center mb-0 py-4">Copyright © <script>document.write(new Date().getFullYear())</script> All Rights reserved by <a href="./index.php" style="text-decoration:none;">VITFAM</a></p>
    <div class="foot-links d-flex">
        <a href="./index.php" class="btn btn-outline-light mx-1">Home</a>
        <a href="./rules.php" class="btn btn-outline-light mx-1">Guidelines</a>
        <?php
            session_start();
            include './partials/_dbconnect.php';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                $uid = $_SESSION['user_id'];
                $sid = $_SESSION['story_id'];
                $sql = "SELECT * FROM user_ques WHERE question_id = '$sid' AND user_id = '$uid'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)) {
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['ques_increment'] >= 4){
                            echo '
                            <a href="./final.php" class="btn btn-success mx-1">Final Round</a>
                            ';
                        }
                    }
                }
                echo'
                <form action="./partials/_loggout.php" method="POST">
                    <button type="submit" class="btn btn-danger mx-1">Logout</button>
                </form>
                ';
            }
        ?>
        
    </div>
</div>



