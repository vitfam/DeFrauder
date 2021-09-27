
<?php 

    $sql1 = "SELECT * FROM clue WHERE clue_story_id = '$sid' AND clue_number = '$i'";
    $res1 = mysqli_query($conn, $sql1); 

    if (mysqli_num_rows($res1)) {
        while($row1 = mysqli_fetch_assoc($res1)){

            echo '
            <div class="modal fade text-dark" id="clueModal' . $row1['clue_number'] . '" tabindex="-1" aria-labelledby="clueModal2Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="clueModal2Label">Clue ' . $row1['clue_number'] . '</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align:justify;"><a href="' . $row1['clue_content'] . '" target="_blank">Click here to Access the Clue</a></p>
                        <p style="text-align:justify;">The link is about finding ' . $row1['clue_title'] . '</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
            ';
            
        }
    } 
        
?>