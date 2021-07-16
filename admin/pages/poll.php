<!doctype html>
<html lang="en">
<?php 
    session_start();
    if(!isset($_SESSION['isLoggedIn'])){
        header("Location: ../../index.php");
    }
    $page = 'Poll';
    include '../../admin/components/header.php';
    include '../../database/connection.php';
    include '../../model/select_queries.php';
    $con = new connection();
    $db = $con->connect();
    
    $select = new Select($db);
?>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="registration-form-modal">
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
                                <select class="mb-2 form-control" name="position" id="_position">
                                    <?php
                                        $query3 = $select->getPositionByStatus(1);
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
                            <div class="col-md-12" hidden id="department">
                                <div class="position-relative form-group"><label for="exampleCity" class="">Department</label><input name="motto" id="department_name" type="text" class="form-control"></div>
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

    <div class="modal fade bd-example-modal-xl" id="real-time-leaderboard" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Real Time Leaderboard</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-0 card">
                            <div class="card-body" id="real-time-leaderboard-body">
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
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="edit-candidate-info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Candidate Details</h5>
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
    toastr.options = {
        "debug": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true      
    }

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
                        if(response == "success")
                            toastr.success("A new poll has been created. Please reload the page.", "Success", "success");
                        else
                            toastr.error("Something went wrong. Please try again.", "Error", "error");
                        swal.close()
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
        let department = $('#department_name').val().trim();
        let selected = $('#_position :selected').text();
        let data = {
            'poll_no': parseFloat(poll_no),
            'type': position,
            'name': fullname,
            'age': age,
            'address': address,
            'motto': motto,
            'achievements': achievements,
            'user_department': department
        };

        if (fullname.trim() === "" || age.trim() === "" || address.trim() === "" || motto.trim() === "" || achievements.trim() === "" || (department === "" && selected === "Department Representatives" || selected === "Department Representative")) {
            return toastr.error("Some fields are missing.", "Error", "error");
        }

        $.ajax({
            type: "POST",
            url: "../../controller/insert/register_candidate.php",
            data: { 
                data: data 
            },
            success: function(response){
                $('#registration-form').find('input[name="fullname"]').val('');
                $('#_position').val($('#_position option:first').val());
                $('#registration-form').find('input[name="age"]').val('');
                $('#registration-form').find('input[name="address"]').val('')
                $('#registration-form').find('input[name="motto"]').val('');
                $('#registration-form').find('textarea[name="achievements"]').val('');
                $('#department_name').val('');
                return toastr.success("New representative has been successfully registered.", "Success", "success");
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
                            title: "Voting is now closed",
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
        let age = $('#edit-form').find('input[name="age"]').val();
        let address = $('#edit-form').find('input[name="address"]').val();
        let motto = $('#edit-form').find('input[name="motto"]').val();
        let achievements = $('#edit-form').find('textarea[name="achievements"]').val();
        let department = $('#_edit-department-name').val().trim();

        let data = {
            'voters_id': upd_id,
            'name': fullname,
            'age': age,
            'address': address,
            'motto': motto,
            'achievements': achievements,
            'user_department': department
        };

        if (fullname.trim() === "" || age.trim() === "" || address.trim() === "" || motto.trim() === "" || achievements.trim() === "" || department === "") {
            return toastr.error("Some fields are missing.", "Error", "error");
        }

        $.ajax({
            type: "POST",
            url: "../../controller/update/update_candidate_details.php",
            data: { 
                data: data 
            },
            success: function(response){
                if(response == "success")
                    toastr.success("Candidate has been successfully updated. Please reload the page.", "Success", "success");
                else
                    toastr.error("Something went wrong. Please try again.", "Error", "error");
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });

    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        let id = $(this).val();

        swal({
            title: "POLL # " + id,
            text: "Would you like to delete this poll?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes",
            cancelButtonClass: 'btn-danger'
        }, function (data) { 
            if(data){
                $.ajax({
                    type: "POST",
                    url: "../../controller/delete/delete_poll.php",
                    data: { 
                        id: id 
                    },
                    success: function(response){
                        swal({
                            title: "Poll has been deleted",
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

    $(document).on('click', '.delete-representative', function(e){
        e.preventDefault();
        let id = $(this).val();

        swal({
            title: "Confirmation",
            text: "Would you like this representative?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes",
            cancelButtonClass: 'btn-danger'
        }, function (data) {
            if(data){
                $.ajax({
                    type: "POST",
                    url: "../../controller/delete/delete_representative.php",
                    data: { 
                        id: id 
                    },
                    success: function(response){
                        swal({
                            title: "Deleted",
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

    let forRealTimeId = 0;
    let selectedTab = 1;
    let status = 0;

    $(document).on('click', '.real-time-leaderboard', function(e){
        e.preventDefault();
        let id = $(this).val();
        forRealTimeId= id;
        status = $(this).attr('status');
        $.ajax({
            type: "POST",
            url: "../../controller/modal/real_time_leaderboard.php",
            data: { 
                id: id,
                selected_tab: selectedTab
            },
            success: function(html){
                $('#real-time-leaderboard-body').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });

    $(document).on('click', '._selected', function(e){
        e.preventDefault();
        selectedTab = $(this).attr('pos_id');
    });

    $(document).on('show.bs.modal', '#real-time-leaderboard', function () {
        setInterval(function(){ 
            let isShown = $('#real-time-leaderboard').is(':visible');

            if (isShown && status != 4) {
                $.ajax({
                    type: "POST",
                    url: "../../controller/modal/real_time_leaderboard.php",
                    data: { 
                        id: forRealTimeId,
                        selected_tab: selectedTab
                    },
                    success: function(html){
                        $('#real-time-leaderboard-body').html(html);
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                    }
                });
            }
        }, 10000);
    });

    $('#_position').change(() => {
        let selected = $('#_position :selected').text();

        if (selected == 'Department Representatives' || selected == 'Department Representative') {
            $('#department').removeAttr('hidden');
        } else {
            $('#department').attr('hidden', true);
        }
    })
</script>

</body>
</html>