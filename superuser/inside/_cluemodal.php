
 <?php 

    $edit = "SELECT * FROM clue WHERE clue_id = '$id'";
    $editRes = mysqli_query($conn, $edit); 

    if (mysqli_num_rows($editRes) > 0) {
        while ($row = mysqli_fetch_assoc($editRes)) {
            echo '

                <div class="modal fade" id="editClueModal' . $row['clue_id'] . '" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edit the Clue</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action"' . $_SERVER['PHP_SELF'] . '" method="GET">
                                <div class="modal-body">
                                    
                                    <input type="text" class="form-control" id="username" name="id" aria-describedby="emailHelp" value="' . $row['clue_id'] . '" style="display:none;" />
                                    <div class="mb-3">
                                        <label for="clue" class="form-label">Clue Number</label>
                                        <input type="text" class="form-control" id="clue" name="clue" aria-describedby="emailHelp" value="' . $row['clue_number'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Clue Title</label>
                                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="' . $row['clue_title'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Clue Content</label>
                                        <input type="text" class="form-control" id="content" name="content" aria-describedby="emailHelp" value="' . $row['clue_content'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="story" class="form-label">Story Number</label>
                                        <input type="text" class="form-control" id="story" name="story" aria-describedby="emailHelp" value="' . $row['clue_story_id'] . '" />
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