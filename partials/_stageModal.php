
<?php 

$sqlstage = "SELECT * FROM user_ques WHERE question_id = '$sid' AND user_id = '$uid'";
$resstage = mysqli_query($conn, $sqlstage); 

$j = $i / 5;
$ans = 'stage' . $j . '_answer';

if (mysqli_num_rows($resstage)) {
    while($rowstage = mysqli_fetch_assoc($resstage)){

        echo '
        <div class="modal fade" id="stageModal' . $j . '" tabindex="-1" aria-labelledby="clueModal2Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="clueModal2Label">Stage ' . $j . ' Answer</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                    '//<p style="text-align:justify;">' . $rowstage[$ans] . '</p>
                    .'<textarea class="form-control" disabled rows="8" style="text-align:justify;">' . $rowstage[$ans] . '</textarea>
                    </div>
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