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

    $sel = $query->login();
    if ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['username'] = $row['voters_username'];
        $_SESSION['password'] = $row['voters_password'];
        $_SESSION['isLoggedIn'] = 1;
    }

    if($sel)
        echo "success";
    else
        echo "failed";
?>