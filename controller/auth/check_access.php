<?php
    session_start();
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Select($db);

    $obj = json_decode(json_encode($_POST['data']), true);

    $query->voters_username = $obj['username'];
    $query->voters_password = base64_encode($obj['password']);

    $sel = $query->checkType();
    if ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $type = $row['user_type'];
        if($type == 1){
            header("Location: ../../admin/poll.php");
            exit();
        }
        else{
            echo "Voters";
        }
    }
?>