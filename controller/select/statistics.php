<?php
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Select($db);

    $response = [];

    $query->poll_no = $_POST['id'];
    $query->pos_id = 1;

    $result = $query->getStatistics();

    while($res = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($response, $res);
    }

    echo json_encode($response);
?>