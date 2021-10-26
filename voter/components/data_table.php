<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table id="users-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th style="width: 35%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = $select->getUsers();
                            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                echo'
                                    <tr>
                                        <td>'.$row['user_fullname'].'</td>
                                        <td>'.$row['voters_username'].'</td>
                                        <td>'.$row['voters_password'].'</td>
                                        <td>
                                            <button class="mb-2 mr-2 btn btn-primary"><i class="metismenu-icon pe-7s-edit"></i></button>
                                            <button class="mb-2 mr-2 btn btn-danger"><i class="metismenu-icon pe-7s-trash"></i></button>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>