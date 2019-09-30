<?php
    include '../../database/connection.php';
    include '../../model/insert_queries.php';
    include '../../model/check_primary_key.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Insert($db);
    $checker = new CheckKey($db);

    $obj = json_decode(json_encode($_POST['data']), true);
    
    $query->user_type = $obj['type'];
    $query->user_fullname = $obj['name'];
    $query->voters_username = $obj['username'];
    $query->voters_password = base64_encode($obj['password']);

    $is_exist = false;
    $checkKey = $checker->checkPrimaryKey('users_account_file', $obj['username'], base64_encode($obj['password']));
    while($data = $checkKey->fetch(PDO::FETCH_ASSOC)){
        $is_exist = true;
        break;
    }
    if(!$is_exist){

        $insert = $query->usersProfileRegistration();
        $insert2 = $query->usersAccountRegistration();

        if($insert && $insert2)
            echo 'success'; 
        else   
            echo 'failed';
    }
    else
        echo 'exists';
?>