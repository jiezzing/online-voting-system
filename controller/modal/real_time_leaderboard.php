<?php
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $model = new Select($db);

    $data = [];
    $ctr = 0;

    $query = $model->getPositionsInPoll($_POST['id']);
    while($result = $query->fetch(PDO::FETCH_ASSOC)){

        $active = $result['pos_id'] == $_POST['selected_tab'] ? 'active' : '';
        $data['tabs'] .= '<li class="nav-item _selected" pos_id="'.$result['pos_id'].'">
                    <a role="tab" class="nav-link '.$active.'" id="tab-'.$result['pos_id'].'" data-toggle="tab" href="#tab-content-'.$result['pos_id'].'">
                        <span>'.$result['pos_name'].'</span>
                    </a>
                </li>';

        $reps = $model->getRepresentativesInPoll($_POST['id'], $result['pos_id']);


        $data['tr'] = '';

        if ($result['pos_name'] == "Department Representative" || $result['pos_name'] == "Department Representatives") {
            while($resp = $reps->fetch(PDO::FETCH_ASSOC)){
                $data['tr'] .= '
                <tr>
                    <td>'.$resp['user_fullname'].'</td>
                    <td>'.$resp['user_department'].'</td>
                    <td>'.$resp['total_votes'].'</td>
                </tr>';
            }

            $data['content'] .= '
            <div class="tab-pane tabs-animation fade show '.$active.'" id="tab-content-'.$result['pos_id'].'" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Votes</th>
                                </tr>
                            </thead>
                            <tbody> 
                            '.$data['tr'].'
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';
        } else {
            while($resp = $reps->fetch(PDO::FETCH_ASSOC)){
                $data['tr'] .= ' <tr>
                    <td>'.$resp['user_fullname'].'</td>
                    <td>'.$resp['total_votes'].'</td>
                </tr>';
            }

            $data['content'] .= '
            <div class="tab-pane tabs-animation fade show '.$active.'" id="tab-content-'.$result['pos_id'].'" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Votes</th>
                                </tr>
                            </thead>
                            <tbody> 
                            '.$data['tr'].'
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';
        }
        $ctr++;
    }

    echo '<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        '.$data['tabs'].'
    </ul>

    <div class="tab-content">
        '.$data['content'].'
    </div>';
?>