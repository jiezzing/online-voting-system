<div class="row">
    <div class="col-md-12">
        <?php
            $poll = 0;
            $isPoll = false;
            $query = $select->getPoll();
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $poll = $row['latest_poll'];
                $isPoll = true;
                if($row['poll_status'] == 5){
                    echo '
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">POLL # '.$row['poll_no'].' - '; 
                            if($row['poll_status'] == 4){ 
                                echo ' <div class="mb-2 mr-2 badge badge-pill badge-danger">'.$row['status_name'].'</div>'; 
                            }
                            else{
                                echo ' <div class="mb-2 mr-2 badge badge-pill badge-primary">'.$row['status_name'].'</div>';
                            }
                            echo '</h5>
                            <small class="form-text text-muted">Created at: '.$row['created_at'].'</small>
                            <div class="collapse mt-3" id="card-collapse'.$row['poll_id'].'">
            
                                <div class="col-md-12">
                                    <div id="accordion-'.$poll.'" class="accordion-wrapper _poll-parent-div">
                                    ';
                                        
                                    $collapse_no = 0;
                                    $query2 = $select->getPositionsInPoll($row['poll_id']);
                                    while($row2 = $query2->fetch(PDO::FETCH_ASSOC)){
                                        $isActive = $row['poll_status'] == 5 ? 'is_poll_active' : '';
                                        echo'
                                            <div class="card '.$isActive.' _poll-parent-div">
                                                <div pos_id="'.$row2['pos_id'].'" pos_name="'.$row2['pos_name'].'" class="card-header">
                                                    <button type="button" data-toggle="collapse" data-target="#collapse'.$collapse_no.'-'.$poll.'" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                        <h6 class="m-0 p-0">'.$row2['pos_name'].'</h6>
                                                    </button>
                                                </div>
                                                <div data-parent="#accordion-'.$poll.'" id="collapse'.$collapse_no.'-'.$poll.'" aria-labelledby="headingOne" class="collapse">
                                                    <div class="card-body">
                                                        <table class="table table-hover table-bordered" id="candidate-table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">Name</th>
                                                                    <th>Address</th>
                                                                    <th>Age</th>
                                                                    <th>Department</th>
                                                                    <th>Votes</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>';
                                                                $president = $select->getRepresentativesInPoll($row['poll_id'], $row2['pos_id']);
                                                                while($pres = $president->fetch(PDO::FETCH_ASSOC)){
                                                                    echo '<tr>';
                                                                    $voted = $select->votedFor(1, $_SESSION['voters_id'], $poll, $pres['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                    $doneVote = $select->doneVote(1, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                    if ($doneVote['done_vote'] != 0) {
                                                                        // if ($pres['voters_id'] == $voted['rep_id']) {
                                                                        //     echo '<td style="text-align: center">
                                                                        //             <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                        //         </td>';
                                                                        // } else if ($pres['pos_name'] == "Department Representatives" || $pres['pos_name'] == "Department Representative") {
                                                                            $deptArr = [];
                                                                            $deptReps = $select->getRepresentatives($poll, $_SESSION['voters_id']);
                                                                            while($votedReps = $deptReps->fetch(PDO::FETCH_ASSOC)){
                                                                                if(!in_array($votedReps['rep_id'], $deptArr)) {
                                                                                    $deptArr[] = $votedReps['rep_id'];
                                                                                }
                                                                            }
                                                                            if (in_array($pres['voters_id'], $deptArr)) {
                                                                                echo '<td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                            </td>';
                                                                            }  else {
                                                                                echo '<td style="text-align: center">
                                                                                        <i class="fa fa fa-times"></i>
                                                                                </td>';
                                                                            }
                                                                        // } else {
                                                                        //     echo '<td style="text-align: center">
                                                                        //             <i class="fa fa fa-times"></i>
                                                                        //     </td>';
                                                                        // }
                                                                    } else {
                                                                        if ($pres['pos_name'] == "Department Representatives" || $pres['pos_name'] == "Department Representative") {
                                                                            echo '<td style="text-align: center">
                                                                                <div class="custom-radio custom-control">
                                                                                    <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="'.$pres['user_department'].'" class="position-'.$row2['pos_id'].' custom-control-input president representatives" value="'.$pres['voters_id'].'" position="president" candidate-name="'.$pres['user_fullname'].'">
                                                                                    <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                </div>
                                                                            </td>';
                                                                        } else {
                                                                            echo '<td style="text-align: center">
                                                                                <div class="custom-radio custom-control">
                                                                                    <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="president-radio-'.$collapse_no.'-'.$poll.'" class="position-'.$row2['pos_id'].' custom-control-input president" value="'.$pres['voters_id'].'" position="president" candidate-name="'.$pres['user_fullname'].'">
                                                                                    <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                </div>
                                                                            </td>';
                                                                        }
                                                                    }
                                                                    echo '
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                        <td style="width: 160px">'.$pres['user_fullname'].'</td>
                                                                        <td>'.$pres['user_address'].'</td>
                                                                        <td>'.$pres['user_age'].'</td>';

                                                                        if ($pres['user_department'] && $pres['pos_name'] == "Department Representatives" || $pres['pos_name'] == "Department Representative") {
                                                                            echo '<td>'.$pres['user_department'].'</td>';
                                                                        } else {
                                                                            echo '<td>---</td>';
                                                                        }

                                                                        echo '
                                                                        <td>'.$pres['total_votes'].'</td>
                                                                        <td style="text-align: center">
                                                                        <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$pres['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                        </td>
                                                                    </tr>
                                                                    ';
                                                                    $ctr++;
                                                                }
                                                            echo '
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                        $collapse_no++;
                                    }

                                echo'
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">';
                        $isVoted = $select->alreadyVoted($poll, $_SESSION['voters_id'])->fetch(PDO::FETCH_ASSOC);
                        if (!$isVoted['voted']) {
                            echo '
                            <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary">Select Candidates</button>
                            ';
                        } else {
                            echo '
                            <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary">Candidates</button>
                            ';
                        }
                        
                        echo '
                            <button type="button" data-toggle="modal" data-target="#real-time-leaderboard" class="btn mr-2 mb-0 btn-info real-time-leaderboard" value="'.$row['poll_id'].'">Real-Time Leaderboard</button>';

                            if (!$isVoted['voted']) {
                                echo '
                                <button type="button" id="_submit-votes" class="btn mr-2 mb-0 btn-info" value="'.$row['poll_id'].'"><i class="fa fa-paper-plane" aria-hidden="true" title="Copy to use stop"></i>  Submit Votes</button>
                                ';
                            }
                            echo'
                        </div>
                    </div>
                    ';
                }
                else{
                    if($row['poll_status'] == 4){
                        echo '
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">POLL # '.$row['poll_no'].' - '; 
                                if($row['poll_status'] == 4){ 
                                    echo ' <div class="mb-2 mr-2 badge badge-pill badge-danger">'.$row['status_name'].'</div>'; 
                                }
                                else{
                                    echo ' <div class="mb-2 mr-2 badge badge-pill badge-primary">'.$row['status_name'].'</div>';
                                }
                                echo '</h5>
                                <small class="form-text text-muted">Created at: '.$row['created_at'].'</small>
                            </div>
                            <div class="card-footer">
                                <button status="'.$row['poll_status'].'" type="button" data-toggle="modal" data-target="#real-time-leaderboard" class="btn mr-2 mb-0 btn-info real-time-leaderboard" value="'.$row['poll_id'].'">Results</button>
                            </div>
                        </div>
                        ';
                    }
                }
            }

            if(!$isPoll){
                echo '
                    <div class="main-card mb-3 card">
                        <div class="card-body" align="center">
                            <h5 class="card-title mt-2">NO POLL AVAILABLE THIS TIME</h5>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</div>