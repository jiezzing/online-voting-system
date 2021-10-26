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
        $_SESSION['password'] = base64_decode($row['voters_password']);
        $_SESSION['name'] = $row['user_fullname'];
        $_SESSION['isLoggedIn'] = 1;
        $_SESSION['voters_id'] = $row['voters_id'];
        $_SESSION['type_id'] = $row['type_id'];
    }
    $response = [
        'status' => 'success',
        'isLoggedIn' => 1,
        'type_id' => $_SESSION['type_id']
    ];

    if($sel) {
        header('Content-type: application/json');
        echo json_encode($response);
    } else
        echo "failed";
?>