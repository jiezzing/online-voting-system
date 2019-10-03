<?php
    session_start();
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Select($db);

    $query->voters_username = $_SESSION['username'];
    $query->voters_password = base64_encode($_SESSION['password']);
    echo base64_encode($_SESSION['password']);

    $sel = $query->checkType();
    if ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
        if($row['type_id'] == 1){
            header("Location: ../../admin/pages/poll.php");
            exit();
        }
        else if($row['type_id'] == 2){
            header("Location: ../../voter/pages/poll.php");
            exit();
        }
        else{
            echo "not found";
        }
    }
    else{
        echo "not found";
        header("Location: ../../index.php");
        exit();
    }

?>