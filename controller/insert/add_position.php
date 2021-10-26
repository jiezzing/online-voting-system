<?php
    include '../../database/connection.php';
    include '../../model/insert_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Insert($db);

    $query->pos_name = $_POST['position'];
    $query->status_id = 2;

    $insert = $query->addPosition();

    if($insert)
        echo 'success'; 
    else   
        echo 'failed';
?>