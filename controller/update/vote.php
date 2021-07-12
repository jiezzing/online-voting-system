<?php
    session_start(); 
    include '../../database/connection.php';
    include '../../model/update_queries.php';
    include '../../model/insert_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Update($db);
    $insert = new Insert($db);

    date_default_timezone_set('Asia/Manila');

    $obj = json_decode(json_encode($_POST['data']), true);

    $query->poll_no = $obj['poll_no'];

    $insert->poll_no = $obj['poll_no'];
    $insert->created_at = date("Y-m-d H:i:s");
    $insert->updated_at = date("Y-m-d H:i:s");
    $insert->voters_id = $_SESSION['voters_id'];

    if (isset($obj['president'])) {
        $query->user_id = $obj['president'];
        $update = $query->vote(1);

        $insert->pos_id = 1;
        $insert->rep_id = $obj['president'];
        $insert->saveVotes();
    } 
    
    if (isset($obj['vice_president'])) {
        $query->user_id = $obj['vice_president'];
        $update = $query->vote(2);

        $insert->pos_id = 2;
        $insert->rep_id = $obj['vice_president'];
        $insert->saveVotes();
    } 
    
    if (isset($obj['secretary'])) {
        $query->user_id = $obj['secretary'];
        $update = $query->vote(3);

        $insert->pos_id = 3;
        $insert->rep_id = $obj['secretary'];
        $insert->saveVotes();
    }

    if (isset($obj['treasurer'])) {
        $query->user_id = $obj['treasurer'];
        $update = $query->vote(4);

        $insert->pos_id = 4;
        $insert->rep_id = $obj['treasurer'];
        $insert->saveVotes();
    }

    if (isset($obj['PIO'])) {
        $query->user_id = $obj['PIO'];
        $update = $query->vote(5);

        $insert->pos_id = 5;
        $insert->rep_id = $obj['PIO'];
        $insert->saveVotes();
    }

    if (isset($obj['auditor'])) {
        $query->user_id = $obj['auditor'];
        $update = $query->vote(6);

        $insert->pos_id = 6;
        $insert->rep_id = $obj['auditor'];
        $insert->saveVotes();
    }

    if (isset($obj['sergeant_at_arms'])) {
        $query->user_id = $obj['sergeant_at_arms'];
        $update = $query->vote(7);

        $insert->pos_id = 7;
        $insert->rep_id = $obj['sergeant_at_arms'];
        $insert->saveVotes();
    }

    if (isset($obj['dept_representatives'])) {
        $query->user_id = $obj['dept_representatives'];
        $update = $query->vote(8);

        $insert->pos_id = 8;
        $insert->rep_id = $obj['dept_representatives'];
        $insert->saveVotes();
    }

    if($update)
        echo 'success'; 
    else   
        echo 'failed';
?>