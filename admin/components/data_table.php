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