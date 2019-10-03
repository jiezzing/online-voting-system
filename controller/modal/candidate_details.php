<?php
    session_start();
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Select($db);

    $id = $_POST['id'];
    $select = $query->getPersonalDetails($id);
    while($row = $select->fetch(PDO::FETCH_ASSOC)){
        $name = $row['user_fullname'];
        $age = $row['user_age'];
        $pos = $row['pos_name'];
        $address = $row['user_address'];
        $motto = $row['user_motto'];
        $achieve = $row['user_achievements'];
    }

    echo'
        <form id="registration-form">
            <div class="form-row">
                <div class="col-md-4">
                    <img width="120" src="../../assets/images/avatars/1.jpg" alt="">
                </div>
                <div class="col-md-8">
                    <div class="position-relative form-group">
                        <label for="exampleEmail11" class="">Name: <strong>'.$name.'</strong></label><br>
                        <label for="exampleEmail11" class="">Age: <strong>'.$age.' yrs old</strong></label><br>
                        <label for="exampleEmail11" class="">Running for: <strong>'.$pos.'</strong></label><br>
                        <label for="exampleEmail11" class="">Address: <strong>'.$address.'</strong></label><br>
                        <label for="exampleAddress" class="">Motto: <strong>'.$motto.'</strong></label><br>
                        <label for="exampleAddress" class="">Achievements: <strong>'.$achieve.'</strong></label><br>
                    </div>
                </div>
            </div>
        </form>
    ';
?>

