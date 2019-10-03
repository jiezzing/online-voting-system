<?php
    include '../../database/connection.php';
    include '../../model/update_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Update($db);
    $obj = json_decode(json_encode($_POST['data']), true);

    $query->voters_id = $obj['voters_id'];
    $update = $query->updateUserDetails($obj['name'], $obj['pos_id'], $obj['age'], $obj['address'], $obj['motto'], $obj['achievements']);

    if($update)
        echo 'success'; 
    else   
        echo 'failed';
?>