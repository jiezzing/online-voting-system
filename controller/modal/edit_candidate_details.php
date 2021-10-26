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
        $pos_id = $row['pos_id'];
        $address = $row['user_address'];
        $motto = $row['user_motto'];
        $achieve = $row['user_achievements'];
        $pos_name = $row['pos_name'];
        $department = $row['user_department'] != "" ? $row['user_department'] : '';
    }

    echo'
        <form id="edit-form">
            <div class="form-row text-center">
                <div class="col-md-12">
                    <div class="position-relative form-group pt-4 pb-4">
                    <i class="fa fa-user fa-4x"></i>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-5">
                    <div class="position-relative form-group">
                        <label for="exampleEmail11" class="">Full Name</label>
                        <input name="fullname" value="'.$name.'" id="exampleEmail11" placeholder="Full Name" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="position-relative form-group">
                        <label for="exampleEmail11" class="">Position</label>
                        <input disabled value="'.$pos_name.'" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="position-relative form-group">
                        <label for="examplePassword11" class="">Age</label>
                        <input name="age" value="'.$age.'" id="examplePassword11" placeholder="Age" type="number" class="form-control">
                    </div>
                </div>
            </div>
            <div class="position-relative form-group">
                <label for="exampleAddress" class="">Address</label>
                <input name="address" value="'.$address.'" id="exampleAddress" placeholder="Address" type="text" class="form-control">
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="exampleCity" class="">Sayings / Motto</label>
                        <input name="motto" value="'.$motto.'" id="exampleCity" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="exampleCity" class="">Achievements</label>
                        <textarea name="achievements" id="exampleCity" type="text" class="form-control">'.$achieve.'</textarea>
                    </div>
                </div>
                ';

                if ($pos_name == "Department Representatives" || $pos_name == "Department Representative") {
                    echo'<div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Department</label>
                            <input name="motto" value="'.$department.'" id="_edit-department-name" type="text" class="form-control">
                        </div>
                    </div>';
                }
                echo '
            </div>
        </form>
    ';
?>