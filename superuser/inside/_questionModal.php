
 <?php 

$edit = "SELECT * FROM question WHERE question_id = '$id'";
$editRes = mysqli_query($conn, $edit); 

if (mysqli_num_rows($editRes)) {
    while ($row = mysqli_fetch_assoc($editRes)) {
        echo '
            <div class="modal fade" id="editQuesModal' . $row['question_id'] . '" tabindex="-1" aria-labelledby="editStoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStoryModalLabel">Edit the Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action"' . $_SERVER['PHP_SELF'] . '" method="GET">
                            <div class="modal-body">
                                
                                <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp" value="' . $row['question_id'] . '" style="display:none;" />

                                <div class="mb-3">
                                    <label for="content" class="form-label">Question Content</label>
                                    <input class="form-control" id="content" name="content" value="' . $row['question_content'] . '" required />
                                </div>

                                <div class="mb-3">
                                    <label for="stage1" class="form-label">Stage 1 Question</label>
                                    <textarea class="form-control" id="stage1" rows="3" name="stage1">' . $row['stage1_question'] . '</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="stage2" class="form-label">Stage 2 Question</label>
                                    <textarea class="form-control" id="stage2" rows="3" name="stage2">' . $row['stage2_question'] . '</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="stage3" class="form-label">Stage 3 Question</label>
                                    <textarea class="form-control" id="stage3" rows="3" name="stage3">' . $row['stage3_question'] . '</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="story" class="form-label">Story Number</label>
                                    <input class="form-control" id="story" name="story" value="' . $row['question_story_id'] . '" required />
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