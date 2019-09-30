<?php
    session_start();
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Select($db);

    $query->voters_username = $_SESSION['username'];
    $query->voters_password = base64_encode($_SESSION['username']);

    $sel = $query->checkType();
    if ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
        if($row['user_type'] == 1){
            echo "Admin";
            header("Location: ../../admin/pages/poll.php");
            exit();
        }
        else if($row['user_type'] == 2){
            echo "Voter";
        }
        else{
            echo "not found";
        }
    }
?>