<!-- Footer of the website use in many places -->

<div class="container-fluid footer d-flex text-dark py-2 sticky-bottom mt-5" style="background-color: #DDD">
    <p class="text-center mb-0 py-4">Copyright © <script>document.write(new Date().getFullYear())</script> All Rights reserved by <a href="./index.php" style="text-decoration:none;">VITFAM</a></p>
    <div class="foot-links d-flex">
        <a href="./index.php" class="btn btn-outline-dark mx-1">Home</a>
        <a href="./rules.php" class="btn btn-outline-dark mx-1">Guidelines</a>
        <?php
            session_start();
            include './partials/_dbconnect.php';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                echo'
                <form action="./partials/_loggout.php" method="POST">
                    <button type="submit" class="btn btn-danger mx-1">Logout</button>
                </form>
                ';
            }
        ?>
        
    </div>
</div>


