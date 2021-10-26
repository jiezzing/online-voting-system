<?php
    include '../../database/connection.php';
    include '../../model/update_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Update($db);

    $query->pos_id = $_POST['id'];
    $update = $query->updatePosition($_POST['position']);

    if($update)
        echo 'success'; 
    else   
        echo 'failed';
?>