<?php
    include '../../database/connection.php';
    include '../../model/update_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Update($db);

    $query->pos_id = $_POST['id'];

    if ($_POST['is_checked'] == 'true') {
        $update = $query->publishPosition(1);
    } else {
        $update = $query->publishPosition(2);
    }

    if($update)
        echo 'success'; 
    else   
        echo 'failed';
?> 