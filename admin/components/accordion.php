<div class="row">
    <div class="col-md-12">
        <?php
            $hasData = false;
            $query = $select->getPoll();
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $poll = $row['poll_no'];
                $hasData = true;
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
                                <div id="accordion-'.$poll.'" class="accordion-wrapper">
                                ';

                                $hasPos = false;
                                    
                                $collapse_no = 0;
                                $departmentReps = [];
                                $query2 = $select->getPositionsInPoll($row['poll_id']);
                                while($row2 = $query2->fetch(PDO::FETCH_ASSOC)){
                                    $hasPos = true;
                                    echo'
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapse'.$collapse_no.'-'.$poll.'" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h6 class="m-0 p-0">'.$row2['pos_name'].'</h6>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion-'.$poll.'" id="collapse'.$collapse_no.'-'.$poll.'" aria-labelledby="headingOne" class="collapse">
                                                <div class="card-body">
                                                    <table class="table table-hover table-bordered" id="candidate-table" >
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">Name</th>
                                                                <th>Address</th>
                                                                <th>Age</th>
                                                                <th>Department</th>
                                                                <th>Votes</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> 
                                                        '; 
                                                        $candidates = $select->getRepresentativesInPoll($row['poll_id'], $row2['pos_id']);
                                                            while($pres = $candidates->fetch(PDO::FETCH_ASSOC)){
                                                                echo'
                                                                    <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                        <td style="width: 160px">'.$pres['user_fullname'].'</td>
                                                                        <td>'.$pres['user_address'].'</td>
                                                                        <td>'.$pres['user_age'].'</td>';

                                                                        if ($pres['user_department'] && $pres['pos_name'] == "Department Representatives" || $pres['pos_name'] == "Department Representative") {
                                                                            $departmentReps[$pres['user_department']][] = array(
                                                                                $pres['user_id'],
                                                                                $pres['user_fullname'],
                                                                            );
                                                                            echo '<td>'.$pres['user_department'].'</td>';
                                                                        } else {
                                                                            echo '<td>---</td>';
                                                                        }

                                                                        echo '
                                                                        <td>'.$pres['total_votes'].'</td>
                                                                        <td style="text-align: center">
                                                                            <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$pres['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                            
                                                                        ';

                                                                        if ($row['poll_status'] == 3) {
                                                                            echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$pres['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                            echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$pres['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                        }

                                                                        echo '
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    ';
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

                                if ($collapse_no == 0) {
                                    echo'
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" class="text-center m-0 p-0 btn btn-block">
                                                    <h6 class="m-0 p-0">No registered positions and candidates</h6>
                                                </button>
                                            </div>
                                        </div>
                                    ';
                                }

                            echo'
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-footer">
                    ';
                        if($row['poll_status'] == 3){
                            echo '
                                <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary">Information</button>
                                <button type="button" class="btn mr-2 mb-0 btn-success register-candidate-btn" value="'.$row['poll_no'].'" data-toggle="modal" data-target="#registration-form-modal">Register Candidate</button>
                                ';
                                
                                if ($collapse_no) {
                                    echo'<button type="button" class="btn mr-2 mb-0 btn-warning start" data-toggle="tooltip" title="Open for Voting" data-placement="bottom" value="'.$row['poll_no'].'" id="start-btn'.$row['poll_no'].'"><i class="fa fa-play-circle" aria-hidden="true"></i></button>';
                                }

                                echo '
                                <button type="button" class="btn mr-2 mb-0 btn-danger delete" data-toggle="tooltip" title="Delete Poll" data-placement="bottom" value="'.$row['poll_no'].'" id="stop-btn'.$row['poll_no'].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            ';
                        }
                        else if($row['poll_status'] == 5){
                            echo '
                                <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary"> Information</button>
                                <button type="button" class="btn mr-2 mb-0 btn-danger stop" data-toggle="tooltip" title="Close Voting" data-placement="bottom" value="'.$row['poll_no'].'" id="stop-btn'.$row['poll_no'].'"><i class="fa fa-fw" aria-hidden="true" title="Copy to use stop"></i></button>
                                <button type="button" data-toggle="modal" data-target="#real-time-leaderboard" class="btn mr-2 mb-0 btn-info real-time-leaderboard" value="'.$row['poll_no'].'">Real-Time Leaderboard</button>
                                ';
                        }
                        else{
                            if($row['poll_status'] == 4){
                                echo '
                                    <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-warning">Information</button>
                                    <button type="button" class="btn mr-2 mb-0 btn-danger delete" data-toggle="tooltip" title="Close Voting" data-placement="bottom" value="'.$row['poll_no'].'" id="stop-btn'.$row['poll_no'].'"><i class="fa fa-trash" aria-hidden="true" title="Copy to use stop"></i></button>
                                    <button type="button" data-toggle="modal" data-target="#real-time-leaderboard" status="'.$row['poll_status'].'" class="btn mr-2 mb-0 btn-info real-time-leaderboard" value="'.$row['poll_no'].'">Final Result</button>
                                    <a href="../../tcpdf/results.php?poll_no='.$row['poll_no'].'" target="new" class="pdf_view" type="view">
                                        <button type="button" class="btn mr-2 mb-0 btn-dark"><i class="fa fa-download" aria-hidden="true" title="Copy to use stop"></i> Download Results</button>
                                    </a>
                                ';
                            }
                        }
                        
                    echo'
                    </div>
                </div>
                ';
            }

            if (!$hasData) {
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

