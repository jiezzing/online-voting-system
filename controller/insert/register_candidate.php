<?php
    include '../../database/connection.php';
    include '../../model/insert_queries.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Insert($db);
    $query2 = new Select($db);

    $select = $query2->getLastId();
    while($row = $select->fetch(PDO::FETCH_ASSOC)){
        $total_users = $row['voters_id'];
    }

    if(isset($_FILES['file']['name'])){
		if($_FILES['file']['name']){
            $path = '../../assets/images/avatars/' . $_FILES['file']['name'];
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $path)) {
                $query->user_photo = $_FILES['file']['name'];
                $query->image_path = $path;
            }
		}
	}
    
    $query->user_type = $_POST['type'];
    $query->user_firstname = $_POST['firstname'];
    $query->user_lastname = $_POST['lastname'];
    $query->user_mi = $_POST['mi'];
    $query->user_age = $_POST['age'];
    $query->user_address = $_POST['address'];
    $query->user_motto = $_POST['motto'];
    $query->user_achievements = $_POST['achievements'];
    $query->user_department = $_POST['user_department'] != "" && isset($_POST['user_department']) ? $_POST['user_department'] : NULL;

    $query->voters_username = NULL;
    $query->voters_password = NULL;

    $query->poll_no = $_POST['poll_no'];
    $query->user_id = (intval($total_users) + 1);
    $query->pos_id = $_POST['type'];


    $insert = $query->candidateProfileRegistration();
    $insert2 = $query->usersAccountRegistration();
    $insert3 = $query->createPollDetailFile();

    if($insert && $insert2 && $insert3)
        echo 'success'; 
    else   
        echo 'failed';
?>
