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
                                    
                                $collapse_no = 0;
                                $query2 = $select->getPositions();
                                while($row2 = $query2->fetch(PDO::FETCH_ASSOC)){
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
                                                                <th>Votes</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> 
                                                        '; 
                                                            for($i = 0; $i < 6; $i++){
                                                                if($row2['pos_id'] == 1){
                                                                    $ctr = 0;
                                                                    $radio_ctr = 0;
                                                                    $select->poll_id = $row['poll_no'];
                                                                    $president = $select->getPresident($i);
                                                                    while($pres = $president->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td style="width: 160px">'.$pres['user_fullname'].'</td>
                                                                            <td>'.$pres['user_address'].'</td>
                                                                            <td>'.$pres['user_age'].'</td>
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
                                                                        $ctr++;
                                                                    }
                                                                }
                                                                else if($row2['pos_id'] == 2){
                                                                    $vice_pres = $select->getVicePresident($i);
                                                                    while($vice = $vice_pres->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr> 
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td>'.$vice['user_fullname'].'</td>
                                                                            <td>'.$vice['user_address'].'</td>
                                                                            <td>'.$vice['user_age'].'</td>
                                                                            <td>'.$vice['total_votes'].'</td>
                                                                            <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$vice['user_id'].'"><i class="fa fa-id-card"></i> See Information</button>
                                                                                ';

                                                                                if ($row['poll_status'] == 3) {
                                                                                    echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$vice['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                                    echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$vice['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                                }

                                                                            echo '
                                                                            </td>
                                                                        </tr>
                                                                        ';
                                                                        $ctr++;
                                                                    }
                                                                }
                                                                else if($row2['pos_id'] == 3){
                                                                    $secretary = $select->getSecretary($i);
                                                                    while($sec = $secretary->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td>'.$sec['user_fullname'].'</td>
                                                                            <td>'.$sec['user_address'].'</td>
                                                                            <td>'.$sec['user_age'].'</td>
                                                                            <td>'.$sec['total_votes'].'</td>
                                                                            <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$sec['user_id'].'"><i class="fa fa-id-card"></i> See Information</button>
                                                                                ';

                                                                                if ($row['poll_status'] == 3) {
                                                                                echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$sec['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                                echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$sec['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                            }

                                                                            echo '
                                                                            </td>
                                                                        </tr>
                                                                        ';
                                                                        $ctr++;
                                                                    }
                                                                }
                                                                else if($row2['pos_id'] == 4){
                                                                    $treasurer = $select->getTreasurer($i);
                                                                    while($tres = $treasurer->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td>'.$tres['user_fullname'].'</td>
                                                                            <td>'.$tres['user_address'].'</td>
                                                                            <td>'.$tres['user_age'].'</td>
                                                                            <td>'.$tres['total_votes'].'</td>
                                                                            <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$tres['user_id'].'"><i class="fa fa-id-card"></i> See Information</button>
                                                                                ';

                                                                                if ($row['poll_status'] == 3) {
                                                                                echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$tres['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                                echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$tres['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                            }

                                                                            echo '
                                                                            </td>
                                                                        </tr>
                                                                        ';
                                                                        $ctr++;
                                                                    }
                                                                }
                                                                else if($row2['pos_id'] == 5){
                                                                    $PIO = $select->getPIO($i);
                                                                    while($pio = $PIO->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td>'.$pio['user_fullname'].'</td>
                                                                            <td>'.$pio['user_address'].'</td>
                                                                            <td>'.$pio['user_age'].'</td>
                                                                            <td>'.$pio['total_votes'].'</td>
                                                                            <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$pio['user_id'].'"><i class="fa fa-id-card"></i> See Information</button>
                                                                                
                                                                                ';

                                                                                if ($row['poll_status'] == 3) {
                                                                                echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$pio['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                                echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$pio['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                            }

                                                                            echo '
                                                                            </td>
                                                                        </tr>
                                                                        ';
                                                                        $ctr++;
                                                                    }
                                                                }
                                                                else if($row2['pos_id'] == 6){
                                                                    $auditor = $select->getAuditor($i);
                                                                    while($audit = $auditor->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td>'.$audit['user_fullname'].'</td>
                                                                            <td>'.$audit['user_address'].'</td>
                                                                            <td>'.$audit['user_age'].'</td>
                                                                            <td>'.$audit['total_votes'].'</td>
                                                                            <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$audit['user_id'].'"><i class="fa fa-id-card"></i> See Information</button>
                                                                                
                                                                                ';

                                                                                if ($row['poll_status'] == 3) {
                                                                                echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$audit['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                                echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$audit['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                            }

                                                                            echo '
                                                                            </td>
                                                                        </tr>
                                                                        ';
                                                                        $ctr++;
                                                                    }
                                                                }
                                                                else if($row2['pos_id'] == 7){
                                                                    $sergeant_at_arms = $select->getSergeantAtArms($i);
                                                                    while($arms = $sergeant_at_arms->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td>'.$arms['user_fullname'].'</td>
                                                                            <td>'.$arms['user_address'].'</td>
                                                                            <td>'.$arms['user_age'].'</td>
                                                                            <td>'.$arms['total_votes'].'</td>
                                                                            <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$arms['user_id'].'"><i class="fa fa-id-card"></i> See Information</button>
                                                                                ';

                                                                                if ($row['poll_status'] == 3) {
                                                                                echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$arms['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                                echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$arms['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                            }

                                                                            echo '
                                                                            </td>
                                                                        </tr>
                                                                        ';
                                                                        $ctr++;
                                                                    }
                                                                }
    
                                                                else if($row2['pos_id'] == 8){
                                                                    $representatives = $select->getRepresentatives($i);
                                                                    while($rep = $representatives->fetch(PDO::FETCH_ASSOC)){
                                                                        echo'
                                                                        <tr>
                                                                        <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                            <td>'.$rep['user_fullname'].'</td>
                                                                            <td>'.$rep['user_address'].'</td>
                                                                            <td>'.$rep['user_age'].'</td>
                                                                            <td>'.$rep['total_votes'].'</td>
                                                                            <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$rep['user_id'].'"><i class="fa fa-id-card"></i> See Information</button>
                                                                                
                                                                                ';

                                                                                if ($row['poll_status'] == 3) {
                                                                                echo '<button class="mb-2 mr-2 btn btn-success edit-details" data-toggle="modal" data-target="#edit-candidate-info" value="'.$rep['user_id'].'"><i class="fa fa-edit"></i> Update</button>';
                                                                                echo '<button class="mb-2 mr-2 btn btn-danger delete-representative" data-toggle="modal" value="'.$rep['user_id'].'"><i class="fa fa-trash"></i> Delete</button>';
                                                                            }

                                                                            echo '
                                                                            </td>   
                                                                        </tr>
                                                                        ';
                                                                        $ctr++;
                                                                    }
                                                                }
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
                    

                    <div class="card-footer">
                    ';
                        if($row['poll_status'] == 3){
                            echo '
                                <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary">View Candidates</button>
                                <button type="button" class="btn mr-2 mb-0 btn-success register-candidate-btn" value="'.$row['poll_no'].'" data-toggle="modal" data-target=".bd-example-modal-lg">Register Candidate</button>
                                <button type="button" class="btn mr-2 mb-0 btn-warning start" data-toggle="tooltip" title="Open for Voting" data-placement="bottom" value="'.$row['poll_no'].'" id="start-btn'.$row['poll_no'].'"><i class="fa fa-play-circle" aria-hidden="true"></i></button>
                                <button type="button" class="btn mr-2 mb-0 btn-danger stop" disabled data-toggle="tooltip" title="Close Voting" data-placement="bottom" value="'.$row['poll_no'].'" id="stop-btn'.$row['poll_no'].'"><i class="fa fa-stop-circle" aria-hidden="true"></i></button>
                                <button type="button" class="btn mr-2 mb-0 btn-danger delete" data-toggle="tooltip" title="Delete Poll" data-placement="bottom" value="'.$row['poll_no'].'" id="stop-btn'.$row['poll_no'].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            ';
                        }
                        else if($row['poll_status'] == 5){
                            echo '
                                <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary">View Candidates</button>
                                <button type="button" class="btn mr-2 mb-0 btn-danger stop" data-toggle="tooltip" title="Close Voting" data-placement="bottom" value="'.$row['poll_no'].'" id="stop-btn'.$row['poll_no'].'"><i class="fa fa-fw" aria-hidden="true" title="Copy to use stop"></i></button>
                            ';
                        }
                        else{
                            if($row['poll_status'] == 4){
                                echo '
                                    <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-warning">View Results</button>
                                    <button type="button" class="btn mr-2 mb-0 btn-danger delete" data-toggle="tooltip" title="Close Voting" data-placement="bottom" value="'.$row['poll_no'].'" id="stop-btn'.$row['poll_no'].'"><i class="fa fa-trash" aria-hidden="true" title="Copy to use stop"></i></button>
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

