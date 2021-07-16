<?php
    include '../../database/connection.php';
    include '../../model/insert_queries.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Insert($db);
    $query2 = new Select($db);

    $obj = json_decode(json_encode($_POST['data']), true);
    
    $select = $query2->getLastId();
    while($row = $select->fetch(PDO::FETCH_ASSOC)){
        $total_users = $row['voters_id'];
    }
    
    $query->user_type = $obj['type'];
    $query->user_fullname = $obj['name'];
    $query->user_age = $obj['age'];
    $query->user_address = $obj['address'];
    $query->user_motto = $obj['motto'];
    $query->user_achievements = $obj['achievements'];
    $query->user_department = $obj['user_department'] != "" && isset($obj['user_department']) ? $obj['user_department'] : NULL;

    $query->voters_username = NULL;
    $query->voters_password = NULL;

    $query->poll_no = $obj['poll_no'];
    $query->user_id = (intval($total_users) + 1);
    $query->pos_id = $obj['type'];


    $insert = $query->candidateProfileRegistration();
    $insert2 = $query->usersAccountRegistration();
    $insert3 = $query->createPollDetailFile();

    if($insert && $insert2 && $insert3)
        echo 'success'; 
    else   
        echo 'failed';
?>