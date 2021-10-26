<?php
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Select($db);

    $result = $query->getPositionDetails($_POST['id']);

    while($data = $result->fetch(PDO::FETCH_ASSOC)){
        $position = $data['pos_name'];
    }

    echo'
        <div class="form-row">
            <div class="col-md-12">
                <div class="position-relative form-group"><label for="exampleEmail11" class="">Position</label><input id="edit-position" value="'.$position.'" placeholder="Position" type="text" class="form-control"></div>
            </div>
        </div>
    ';
?>