<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table id="users-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Publish</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $select->hasOpenVotes()->fetch(PDO::FETCH_ASSOC);
                            $disabled = $result['active_poll'] == 1 ? 'disabled' : '';

                            if ($disabled == 'disabled') {
                                echo 
                                "<div class='alert alert-danger' role='alert'>
                                    Can't publish any positions as of the moment since there's' an active poll.
                                </div>";
                            }
                            $query = $select->getPositions();
                            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                $checked = $row['status_id'] == 1 ? 'checked' : '';
                                echo'
                                    <tr>
                                        <td>'.$row['pos_name'].'</td>
                                        <td style="width: 100px; text-align: center">
                                            <label class="switch">
                                                <input  '.$disabled.' '.$checked.' type="checkbox" class="publish-position" position_id="'.$row['pos_id'].'">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td style="text-align: center">
                                            <button class="mb-2 mr-2 btn btn-primary edit-position" data-toggle="modal" data-target="#edit-position-modal" value="'.$row['pos_id'].'"><i class="fa fa-edit"></i> Update</button>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>