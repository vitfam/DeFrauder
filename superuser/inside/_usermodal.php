
 <?php 

    $edit = "SELECT * FROM users WHERE user_id = '$iid'";
    $editRes = mysqli_query($conn, $edit); 

    if (mysqli_num_rows($editRes) > 0) {
        while ($row = mysqli_fetch_assoc($editRes)) {
            echo '

                <div class="modal fade" id="editUserModal' . $row['user_id'] . '" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edit the user details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action"' . $_SERVER['PHP_SELF'] . '" method="GET">
                                <div class="modal-body">
                                    
                                    <input type="text" class="form-control" id="username" name="id" aria-describedby="emailHelp" value="' . $row['user_id'] . '" style="display:none;" />
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="' . $row['username'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="' . $row['user_email'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" aria-describedby="emailHelp" value="' . $row['password'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="story" class="form-label">Story Number</label>
                                        <input type="text" class="form-control" id="story" name="story" aria-describedby="emailHelp" value="' . $row['story_id'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="login" class="form-label">LoggedIn</label>
                                        <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" value="' . $row['user_login_check'] . '" />
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" style="position: absolute; left:10px;" name="edit">Save Changes</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>