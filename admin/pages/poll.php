<!doctype html>
<html lang="en">
<?php 
    $page = 'Poll';
    include '../../controller/auth/auth_checker.php';
    include '../../admin/components/header.php';
    include '../../database/connection.php';
    include '../../model/select_queries.php';
    $con = new connection();
    $db = $con->connect();
    
    $select = new Select($db);
?>

<body>

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="registration-form">
                    <div class="form-row">
                        <div class="col-md-5">
                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Full Name</label><input name="fullname" id="exampleEmail11" placeholder="Full Name" type="text" class="form-control"></div>
                        </div>
                        <div class="col-md-5">
                            <div class="position-relative form-group">
                            <label for="exampleEmail11" class="">Position</label>
                            <select class="mb-2 form-control" name="position">
                                <?php
                                    $query3 = $select->getPositions();
                                    while($row3 = $query3->fetch(PDO::FETCH_ASSOC)){
                                        extract($row3);
                                            echo ' <option value="'.$row3['pos_id'].'">'.$row3['pos_name'].'</option> ';
                                    }
                                ?>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="position-relative form-group"><label for="examplePassword11" class="">Age</label><input name="age" id="examplePassword11" placeholder="Age" type="number"
                                                                                                                                        class="form-control"></div>
                        </div>
                    </div>
                    <div class="position-relative form-group"><label for="exampleAddress" class="">Address</label><input name="address" id="exampleAddress" placeholder="Address" type="text" class="form-control"></div>
                    
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group"><label for="exampleCity" class="">Sayings / Motto</label><input name="motto" id="exampleCity" type="text" class="form-control"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group"><label for="exampleCity" class="">Achievements</label><textarea name="achievements" id="exampleCity" type="text" class="form-control"></textarea></div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="exampleCity" class="">Picture / Image</label>
                                <input name="image" id="imageloader" type="file" class="form-control-file" accept="image/*" data-type='image'>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="register-btn">Register Candidate</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="statistics" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Results for POLL # 00001</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-0 card">
                            <div class="card-body">
                                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                            <span>President</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                            <span>Vice President</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                            <span>Secretary</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-3" data-toggle="tab" href="#tab-content-3">
                                            <span>Treasurer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-4" data-toggle="tab" href="#tab-content-4">
                                            <span>P.I.O</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-5" data-toggle="tab" href="#tab-content-5">
                                            <span>Auditor</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-6" data-toggle="tab" href="#tab-content-6">
                                            <span>Sergeant @ Arms</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-7" data-toggle="tab" href="#tab-content-7">
                                            <span>Department Reps.</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <canvas id="canvas"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-md" id="candidate-info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="candidate-info-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="register-btn">Register Candidate</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="edit-candidate-info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-candidate-info-body">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update-btn">Update</button>
                </div>
            </div>
        </div>
    </div>

    <?php 
        include '../../admin/components/navbar.php';  
        include '../../admin/components/sidebar.php'; 
        include '../../admin/components/semi-navbar.php';    
        include '../../admin/components/accordion.php';  
    ?>   
</div>


<script type="text/javascript" src="../../assets/scripts/main.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/build/toastr.min.js"></script>

<script src="../../assets/bootstrap-sweetalert/dist/sweetalert.js"></script>
<script src="../../assets/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

<script>
    let poll_no;
    $('#create-poll-btn').click(function(){
        swal({
            title: "Create new poll?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes",
            cancelButtonClass: 'btn-danger'
        }, function (data) {
            if(data){
                $.ajax({
                    type: "POST",
                    url: "../../controller/insert/create_poll.php",
                    data: { 
                        data: data 
                    },
                    success: function(response){
                        alert(response);
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                    }
                });
            }
        });
    });
    $('#register-btn').click(function(event){
        event.preventDefault();

        let fullname = $('#registration-form').find('input[name="fullname"]').val();
        let position = $('#registration-form').find('select[name="position"]').val();
        let age = $('#registration-form').find('input[name="age"]').val();
        let address = $('#registration-form').find('input[name="address"]').val();
        let motto = $('#registration-form').find('input[name="motto"]').val();
        let achievements = $('#registration-form').find('textarea[name="achievements"]').val();
        let image = $('#registration-form').find('input[name="image"]').val();
        let data = {
            'poll_no': parseFloat(poll_no),
            'type': position,
            'name': fullname,
            'age': age,
            'address': address,
            'motto': motto,
            'achievements': achievements,
            'image': image
        };

        $.ajax({
            type: "POST",
            url: "../../controller/insert/register_candidate.php",
            data: { 
                data: data 
            },
            success: function(response){
                alert(response);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });

    $(document).on('click', '.register-candidate-btn', function(e){
        e.preventDefault();
        poll_no = $(this).val();
        $('#modal-title').text("VOTING # " + poll_no + " - Registration Form");
    });

    $(document).on('click', '.start', function(e){
        e.preventDefault();
        let id = $(this).val();

        swal({
            title: "POLL # " + id,
            text: "Would you like this poll to be open for voting?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes",
            cancelButtonClass: 'btn-danger'
        }, function (data) {
            if(data){
                $.ajax({
                    type: "POST",
                    url: "../../controller/update/open_for_voting.php",
                    data: { 
                        id: id 
                    },
                    success: function(response){
                        $('#stop-btn' + id).attr('disabled', false);
                        swal({
                            title: "Voting is now open",
                            type: "success",
                            confirmButtonText: "Okay"
                        }, function (data) {
                            if(data){
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                    }
                });
            }
        });
    });
    


    $(document).on('click', '.stop', function(e){
        e.preventDefault();
        let id = $(this).val();

        swal({
            title: "POLL # " + id,
            text: "Would you like this poll to be closed?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes",
            cancelButtonClass: 'btn-danger'
        }, function (data) { 
            if(data){
                $.ajax({
                    type: "POST",
                    url: "../../controller/update/close_voting.php",
                    data: { 
                        id: id 
                    },
                    success: function(response){
                        $('#stop-btn' + id).attr('disabled', false);
                        swal({
                            title: "Voting is now clsed",
                            type: "success",
                            confirmButtonText: "Okay"
                        }, function (data) {
                            if(data){
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                    }
                });
            }
        });
    });

    let color = Chart.helpers.color;
    let barChartData = {
        labels: ['A', 'B', 'C', 'D', 'E'],
        datasets: [{
            label: 'Ranking',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [
                100,
                80,
                60,
                40,
                20,
                10
            ]
        }]

    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: { 
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'ONLINE VOTING SYSTEM ANALYTICS'
                }
            }
        });
    };

    $(document).on('click', '.details', function(e){
        e.preventDefault();
        let id = $(this).val();
        $.ajax({
            type: "POST",
            url: "../../controller/modal/candidate_details.php",
            data: { 
                id: id 
            },
            success: function(html){
                $('#candidate-info-body').html(html);
                $('#candidate-info').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });


    let upd_id;
    $(document).on('click', '.edit-details', function(e){
        e.preventDefault();
        let id = $(this).val();
        upd_id = id;
        $.ajax({
            type: "POST",
            url: "../../controller/modal/edit_candidate_details.php",
            data: { 
                id: id 
            },
            success: function(html){
                $('#edit-candidate-info-body').html(html);
                $('#edit-candidate-info').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });

    $('#update-btn').click(function(){
        let fullname = $('#edit-form').find('input[name="fullname"]').val();
        let position = $('#edit-form').find('select[name="position"]').val();
        let age = $('#edit-form').find('input[name="age"]').val();
        let address = $('#edit-form').find('input[name="address"]').val();
        let motto = $('#edit-form').find('input[name="motto"]').val();
        let achievements = $('#edit-form').find('textarea[name="achievements"]').val();
        let image = $('#edit-form').find('input[name="image"]').val();
        let data = {
            'voters_id': upd_id,
            'name': fullname,
            'pos_id': position,
            'age': age,
            'address': address,
            'motto': motto,
            'achievements': achievements
        };

        $.ajax({
            type: "POST",
            url: "../../controller/update/update_candidate_details.php",
            data: { 
                data: data 
            },
            success: function(response){
                alert(response);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });
</script>

</body>
</html>