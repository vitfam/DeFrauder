
 <?php 

    $edit = "SELECT * FROM story WHERE story_id = '$sid'";
    $editRes = mysqli_query($conn, $edit); 

    if (mysqli_num_rows($editRes) > 0) {
        while ($row = mysqli_fetch_assoc($editRes)) {
            echo '

                <div class="modal fade" id="editStoryModal' . $row['story_id'] . '" tabindex="-1" aria-labelledby="editStoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStoryModalLabel">Edit the story</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action"' . $_SERVER['PHP_SELF'] . '" method="GET">
                                <div class="modal-body">
                                    
                                    <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp" value="' . $row['story_id'] . '" style="display:none;" />
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Story Title</label>
                                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="' . $row['story_title'] . '" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Story Content</label>
                                        <textarea class="form-control" id="content" rows="10" name="content">' . $row['story_content'] . '</textarea>
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