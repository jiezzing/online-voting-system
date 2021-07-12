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
                                                        <table class="table table-hover table-bordered" id="candidate-table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">Name</th>
                                                                    <th>Address</th>
                                                                    <th>Age</th>
                                                                    <th>Votes</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody> 
                                                            '; 
                                                                if($row['poll_status'] == 5){
                                                                    if($row2['pos_id'] == 1){
                                                                        $ctr = 0;
                                                                        $radio_ctr = 0;
                                                                        $select->poll_id = $row['poll_no'];
                                                                        $president = $select->getPresident(5);
                                                                        while($pres = $president->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(1, $_SESSION['voters_id'], $poll, $pres['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(1, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($pres['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '<td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                            <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="president-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input president" value="'.$pres['voters_id'].'" position="president" candidate-name="'.$pres['user_fullname'].'">
                                                                                            <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                                }
                                                                            } else {
                                                                                echo '<td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                        <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="president-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input president" value="'.$pres['voters_id'].'" position="president" candidate-name="'.$pres['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                            }
                                                                            echo '
                                                                                <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$pres['user_fullname'].'</td>
                                                                                <td>'.$pres['user_address'].'</td>
                                                                                <td>'.$pres['user_age'].'</td>
                                                                                <td>'.$pres['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$pres['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                                </td>
                                                                            </tr>
                                                                            ';
                                                                            $ctr++;
                                                                        }
                                                                    }
                                                                    else if($row2['pos_id'] == 2){
                                                                        $vice_pres = $select->getVicePresident(5);
                                                                        while($vice = $vice_pres->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(2, $_SESSION['voters_id'], $poll, $vice['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(2, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($vice['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '<td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                    <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="vice_pres-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input vice_pres" value="'.$vice['voters_id'].'" position="vice-president" candidate-name="'.$vice['user_fullname'].'">
                                                                                    <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                                    <td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                        <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="vice_pres-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input vice_pres" value="'.$vice['voters_id'].'" position="vice-president" candidate-name="'.$vice['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                            }
                                                                            echo '
                                                                                <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$vice['user_fullname'].'</td>
                                                                                <td>'.$vice['user_address'].'</td>
                                                                                <td>'.$vice['user_age'].'</td>
                                                                                <td>'.$vice['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$vice['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                                </td>
                                                                            </tr>
                                                                            ';
                                                                            $ctr++;
                                                                        }
                                                                    }
                                                                    else if($row2['pos_id'] == 3){
                                                                        $secretary = $select->getSecretary(5);
                                                                        while($sec = $secretary->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(3, $_SESSION['voters_id'], $poll, $sec['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(3, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($sec['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '
                                                                                    <td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                        <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="secretary-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input secretary" value="'.$sec['voters_id'].'" position="secretary" candidate-name="'.$sec['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                                <td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                    <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="secretary-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input secretary" value="'.$sec['voters_id'].'" position="secretary" candidate-name="'.$sec['user_fullname'].'">
                                                                                    <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                            }
                                                                            echo '
                                                                                <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$sec['user_fullname'].'</td>
                                                                                <td>'.$sec['user_address'].'</td>
                                                                                <td>'.$sec['user_age'].'</td>
                                                                                <td>'.$sec['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$sec['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                                </td>
                                                                            </tr>
                                                                            ';
                                                                            $ctr++;
                                                                        }
                                                                    }
                                                                    else if($row2['pos_id'] == 4){
                                                                        $treasurer = $select->getTreasurer(5);
                                                                        while($tres = $treasurer->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(4, $_SESSION['voters_id'], $poll, $tres['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(4, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($tres['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '
                                                                                    <td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                        <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="treasurer-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input treasurer" value="'.$tres['voters_id'].'" position="treasurer" candidate-name="'.$tres['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                                <td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                    <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="treasurer-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input treasurer" value="'.$tres['voters_id'].'" position="treasurer" candidate-name="'.$tres['user_fullname'].'">
                                                                                    <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                            }
                                                                            echo '
                                                                            <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$tres['user_fullname'].'</td>
                                                                                <td>'.$tres['user_address'].'</td>
                                                                                <td>'.$tres['user_age'].'</td>
                                                                                <td>'.$tres['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$tres['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                                </td>
                                                                            </tr>
                                                                            ';
                                                                            $ctr++;
                                                                        }
                                                                    }
                                                                    else if($row2['pos_id'] == 5){
                                                                        $PIO = $select->getPIO(5);
                                                                        while($pio = $PIO->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(5, $_SESSION['voters_id'], $poll, $pio['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(5, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($pio['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '
                                                                                    <td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                        <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="PIO-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input PIO" value="'.$pio['voters_id'].'" position="pio" candidate-name="'.$pio['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                                <td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                    <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="PIO-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input PIO" value="'.$pio['voters_id'].'" position="pio" candidate-name="'.$pio['user_fullname'].'">
                                                                                    <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                            }
                                                                            echo '
                                                                            <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$pio['user_fullname'].'</td>
                                                                                <td>'.$pio['user_address'].'</td>
                                                                                <td>'.$pio['user_age'].'</td>
                                                                                <td>'.$pio['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                    <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$pio['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                                </td>
                                                                            </tr>
                                                                            ';
                                                                            $ctr++;
                                                                        }
                                                                    }
                                                                    else if($row2['pos_id'] == 6){
                                                                        $auditor = $select->getAuditor(5);
                                                                        while($audit = $auditor->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(6, $_SESSION['voters_id'], $poll, $audit['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(6, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($audit['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '
                                                                                    <td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                        <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="auditor-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input auditor" value="'.$audit['voters_id'].'" position="audit" candidate-name="'.$audit['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                                <td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                    <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="auditor-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input auditor" value="'.$audit['voters_id'].'" position="audit" candidate-name="'.$audit['user_fullname'].'">
                                                                                    <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                            }
                                                                            echo '
                                                                                <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$audit['user_fullname'].'</td>
                                                                                <td>'.$audit['user_address'].'</td>
                                                                                <td>'.$audit['user_age'].'</td>
                                                                                <td>'.$audit['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                    <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$audit['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                                </td>
                                                                            </tr>
                                                                            ';
                                                                            $ctr++;
                                                                        }
                                                                    }
                                                                    else if($row2['pos_id'] == 7){
                                                                        $sergeant_at_arms = $select->getSergeantAtArms(5);
                                                                        while($arms = $sergeant_at_arms->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(7, $_SESSION['voters_id'], $poll, $arms['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(7, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($arms['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '
                                                                                    <td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                            <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="sergeant_at_arms-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input sergeant_at_arms" value="'.$arms['voters_id'].'" position="arms" candidate-name="'.$arms['user_fullname'].'">
                                                                                            <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                                <td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                        <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="sergeant_at_arms-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input sergeant_at_arms" value="'.$arms['voters_id'].'" position="arms" candidate-name="'.$arms['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                            }
                                                                            echo '
                                                                            <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$arms['user_fullname'].'</td>
                                                                                <td>'.$arms['user_address'].'</td>
                                                                                <td>'.$arms['user_age'].'</td>
                                                                                <td>'.$arms['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                    <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$arms['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
                                                                                </td>
                                                                            </tr>
                                                                            ';
                                                                            $ctr++;
                                                                        }
                                                                    }

                                                                    else if($row2['pos_id'] == 8){
                                                                        $representatives = $select->getRepresentatives(5);
                                                                        while($rep = $representatives->fetch(PDO::FETCH_ASSOC)){
                                                                            echo '<tr>';
                                                                            $voted = $select->votedFor(8, $_SESSION['voters_id'], $poll, $rep['voters_id'])->fetch(PDO::FETCH_ASSOC);
                                                                            $doneVote = $select->doneVote(8, $_SESSION['voters_id'], $poll)->fetch(PDO::FETCH_ASSOC);
                                                                            if ($doneVote['done_vote'] != 0) {
                                                                                if ($rep['voters_id'] == $voted['rep_id']) {
                                                                                    echo '<td style="text-align: center">
                                                                                            <button class="mb-2 mr-2 btn btn-primary">VOTED</button>
                                                                                        </td>';
                                                                                } else {
                                                                                    echo '
                                                                                    <td style="text-align: center">
                                                                                        <div class="custom-radio custom-control">
                                                                                            <input disabled type="radio" id="radio'.$ctr.'-'.$poll.'" name="representatives-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input representatives" value="'.$rep['voters_id'].'" position="reps" candidate-name="'.$rep['user_fullname'].'">
                                                                                            <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                        </div>
                                                                                    </td>';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                                <td style="text-align: center">
                                                                                    <div class="custom-radio custom-control">
                                                                                        <input type="radio" id="radio'.$ctr.'-'.$poll.'" name="representatives-radio-'.$collapse_no.'-'.$poll.'" class="custom-control-input representatives" value="'.$rep['voters_id'].'" position="reps" candidate-name="'.$rep['user_fullname'].'">
                                                                                        <label class="custom-control-label" for="radio'.$ctr.'-'.$poll.'"><i class="fa fa fa-check"></i></label>
                                                                                    </div>
                                                                                </td>';
                                                                            }
                                                                            echo '
                                                                            <td style="width: 70px; text-align: center"><i class="fa fa-user fa-2x"></i></td>
                                                                                <td style="width: 160px">'.$rep['user_fullname'].'</td>
                                                                                <td>'.$rep['user_address'].'</td>
                                                                                <td>'.$rep['user_age'].'</td>
                                                                                <td>'.$rep['total_votes'].'</td>
                                                                                <td style="text-align: center">
                                                                                    <button class="mb-2 mr-2 btn btn-primary details" data-toggle="modal" data-target="#candidate-info" value="'.$rep['user_id'].'"><i class="fa fa-id-card"></i> More Details</button>
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
                            <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary">View Candidates</button>
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