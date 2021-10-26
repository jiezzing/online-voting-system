<?php
    include '../../database/connection.php';
    include '../../model/delete_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Delete($db);

    $poll_id = $_POST['id'];

    $delete = $query->deletePoll($poll_id);
    $delete2 = $query->deletePollDetails($poll_id);

    if($delete && $delete2)
        echo 'success'; 
    else   
        echo 'failed';
?>