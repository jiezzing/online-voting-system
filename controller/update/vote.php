<?php
    include '../../database/connection.php';
    include '../../model/update_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Update($db);

    $obj = json_decode(json_encode($_POST['data']), true);

    $query->poll_no = $obj['poll_no'];
    $query->user_id = $obj['president'];
    $update = $query->vote(1);

    $query->user_id = $obj['vice_president'];
    $update = $query->vote(2);

    $query->user_id = $obj['secretary'];
    $update = $query->vote(3);

    $query->user_id = $obj['treasurer'];
    $update = $query->vote(4);
    
    $query->user_id = $obj['PIO'];
    $update = $query->vote(5);
    
    $query->user_id = $obj['auditor'];
    $update = $query->vote(6);
    
    $query->user_id = $obj['sergeant_at_arms'];
    $update = $query->vote(7);
    
    $query->user_id = $obj['dept_representatives'];
    $update = $query->vote(8);

    if($update)
        echo 'success'; 
    else   
        echo 'failed';
?>