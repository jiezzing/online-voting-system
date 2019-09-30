<div class="row">
    <div class="col-md-12">
        <?php
            $query = $select->getPoll();
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                global $poll;
                $poll = $row['poll_no'];
                echo '
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">VOTING # '.$row['poll_no'].' - '; 
                        if($row['poll_status'] == 4){ 
                            echo ' <div class="mb-2 mr-2 badge badge-pill badge-danger">'.$row['status_name'].'</div>'; 
                        }
                        else{
                            echo ' <div class="mb-2 mr-2 badge badge-pill badge-primary">'.$row['status_name'].'</div>';
                        }
                        echo '</h5>
                        <small class="form-text text-muted">Created at: today</small>
                        <div class="collapse mt-3" id="card-collapse'.$row['poll_id'].'">
        
                            <div class="col-md-12">
                                <div id="accordion" class="accordion-wrapper">
                                ';
                                    
                                $collapse_no = 0;
                                $query2 = $select->getPositions();
                                while($row2 = $query2->fetch(PDO::FETCH_ASSOC)){
                                    echo'
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapse'.$collapse_no.'" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h6 class="m-0 p-0">'.$row2['pos_name'].'</h6>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapse'.$collapse_no.'" aria-labelledby="headingOne" class="collapse">
                                                <div class="card-body">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Full Name</th>
                                                                <th colspan="2">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> 
                                                        '; 
                                                            if($row2['pos_id'] == 1){
                                                                $president_ctr = 0;
                                                                $query3 = $select->getAllPresident();
                                                                while($row3 = $query3->fetch(PDO::FETCH_ASSOC)){
                                                                    echo'
                                                                    <tr>
                                                                        <th scope="row">'.$row3['poll_id'].'</th>
                                                                        <td>'.$row3['user_fullname'].'</td>
                                                                        <td style="text-align: center">
                                                                            <button class="mb-2 mr-2 btn btn-primary" data-toggle="tooltip" title="See Information" data-placement="bottom" ><i class="fa fa-id-card"></i></button>
                                                                            <button class="mb-2 mr-2 btn btn-danger" data-toggle="tooltip" title="Delete" data-placement="bottom" ><i class="fa fa-trash"></i></button>
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <div class="custom-radio custom-control">
                                                                                <input type="radio" id="radio'.$president_ctr.'" name="president-radio" class="custom-control-input">
                                                                                <label class="custom-control-label" for="radio'.$president_ctr.'"> Vote</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    ';
                                                                    $president_ctr++;
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
                    <button type="button" data-toggle="collapse" href="#card-collapse'.$row['poll_id'].'" class="btn mr-2 btn-primary">View All Information</button>
                    <button type="button" class="btn mr-2 mb-0 btn-success register-candidate-btn" value="'.$row['poll_no'].'" data-toggle="modal" data-target=".bd-example-modal-lg">Register Candidate</button>
                    <button type="button" class="btn mr-2 mb-0 btn-warning" data-toggle="tooltip" title="Open for Voting" data-placement="bottom"><i class="fa fa-fw" aria-hidden="true" title="Copy to use play"></i></button>
                    <button type="button" class="btn mr-2 mb-0 btn-danger" data-toggle="tooltip" title="Close Voting" data-placement="bottom" disabled><i class="fa fa-fw" aria-hidden="true" title="Copy to use stop"></i></button>
                    </div>
                </div>
                ';
            }
        ?>
    </div>
</div>

