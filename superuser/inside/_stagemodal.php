
 <?php 

    $edit = "SELECT * FROM user_ques WHERE user_id = '$uid' AND question_id = '$qid'";
    $editRes = mysqli_query($conn, $edit); 

    if (mysqli_num_rows($editRes)) {
        while ($row = mysqli_fetch_assoc($editRes)) {
            echo '
                <div class="modal fade" id="stageModal' . $row['user_id'] . '" tabindex="-1" aria-labelledby="editStoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStoryModalLabel">Edit the story</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action"' . $_SERVER['PHP_SELF'] . '" method="GET">
                                <div class="modal-body">
                                    
                                    <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp" value="' . $row['user_id'] . '" style="display:none;" />

                                    <div class="mb-3">
                                        <label for="stage1" class="form-label">Stage 1 Answer</label>
                                        <textarea class="form-control" id="stage1" rows="5" name="stage1">' . $row['stage1_answer'] . '</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stage2" class="form-label">Stage 2 Answer</label>
                                        <textarea class="form-control" id="stage2" rows="5" name="stage2">' . $row['stage2_answer'] . '</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stage3" class="form-label">Stage 3 Answer</label>
                                        <textarea class="form-control" id="stage3" rows="5" name="stage3">' . $row['stage3_answer'] . '</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="answer_given" class="form-label">Answer Given</label>
                                        <input class="form-control" id="answer_given" rows="5" name="answer_given" value="' . $row['ques_increment'] . '" required />
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