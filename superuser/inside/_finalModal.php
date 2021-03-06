
 <?php 

$edit = "SELECT * FROM user_final WHERE user_id = '$uid' AND final_id = '$fid'";
$editRes = mysqli_query($conn, $edit); 

if (mysqli_num_rows($editRes)) {
    while ($row = mysqli_fetch_assoc($editRes)) {
        echo '
            <div class="modal fade" id="finalModal' . $row['user_id'] . '" tabindex="-1" aria-labelledby="editStoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStoryModalLabel">Edit Final Answers</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action"' . $_SERVER['PHP_SELF'] . '" method="GET">
                            <div class="modal-body">
                                
                                <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp" value="' . $row['user_id'] . '" style="display:none;" />

                                <div class="mb-3">
                                    <label for="stage1" class="form-label">Final Answer 1</label>
                                    <textarea class="form-control" id="stage1" rows="5" name="stage1">' . $row['final_answer1'] . '</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="stage2" class="form-label">Final Answer 2</label>
                                    <textarea class="form-control" id="stage2" rows="5" name="stage2">' . $row['final_answer2'] . '</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="stage3" class="form-label">Final Answer 3</label>
                                    <textarea class="form-control" id="stage3" rows="5" name="stage3">' . $row['final_answer3'] . '</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="answer_given" class="form-label">Game Completed</label>
                                    <input class="form-control" id="answer_given" rows="5" name="answer_given" value="' . $row['final_logout'] . '" required />
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