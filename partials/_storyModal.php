<div class="modal fade" id="storyModal" tabindex="-1" aria-labelledby="storyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content text-dark">
        <?php

            $id = $_SESSION['user_id'];
            $sqlStory = "SELECT * FROM story S, users U WHERE U.story_id = S.story_id AND U.user_id = '$id'";
            $resultStory = mysqli_query($conn, $sqlStory);

            if (mysqli_num_rows($resultStory)) {
                while($row = mysqli_fetch_assoc($resultStory)){
                    echo '
                        <div class="modal-header">
                            <h5 class="modal-title" id="storyModalLabel" style="text-transform: uppercase;">' . $row['story_title'] .'</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-dark text-light">
                            <p style="line-height:30px; text-align: justify;">' . $row['story_content'] . '</p>
                        </div>
                    ';
                }
            } 
                    
        ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>