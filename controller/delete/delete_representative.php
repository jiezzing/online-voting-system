<?php
    include '../../database/connection.php';
    include '../../model/delete_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Delete($db);

    $poll_id = $_POST['id'];

    $delete = $query->deletePollRepresentative($poll_id);

    if($delete)
        echo 'success'; 
    else   
        echo 'failed';
?>