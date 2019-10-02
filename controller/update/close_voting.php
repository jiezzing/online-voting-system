<?php
    include '../../database/connection.php';
    include '../../model/update_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Update($db);

    date_default_timezone_set('Asia/Manila');

    $end_at = date("Y-m-d H:i:s");

    $query->poll_id = $_POST['id'];
    $query->poll_no = $_POST['id'];
    $update = $query->closeVoting($end_at);
    $update2 = $query->closeVotingDetail();

    if($update && $update2)
        echo 'success'; 
    else   
        echo 'failed';
?>