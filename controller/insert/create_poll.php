<?php
    include '../../database/connection.php';
    include '../../model/insert_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Insert($db);
    date_default_timezone_set('Asia/Manila');

    $query->created_at = date("Y-m-d H:i:s");

    $insert = $query->createPoll();

    if($insert)
        echo 'success'; 
    else   
        echo 'failed';
?>