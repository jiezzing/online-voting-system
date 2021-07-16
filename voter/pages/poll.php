<!doctype html>
<html lang="en">
<?php 
    session_start();
    if(!isset($_SESSION['isLoggedIn'])){
        header("Location: ../../index.php");
    }
    $page = 'Poll';
    include '../../voter/components/header.php';
    include '../../database/connection.php';
    include '../../model/select_queries.php';
    $con = new connection();
    $db = $con->connect();
    
    $select = new Select($db);
?>

<body>

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
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
    <?php 
        include '../../voter/components/navbar.php';  
        include '../../voter/components/sidebar.php'; 
        include '../../voter/components/semi-navbar.php';    
        include '../../voter/components/accordion.php';  
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
        "positionClass": "toast-top-left",
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

    // let president, vice_president, secretary, treasurer, pio, auditor, s_arms, dept_reps;
    // let votes = [];

    // $(document).on('change', '.president', function(e){
    //     e.preventDefault();
    //     president = $(this).val();
    //     let name = $("input[position=president]:checked").attr('candidate-name');
    //     $('#pres-subhead').text(name);
    // });

    // $(document).on('change', '.vice_pres', function(e){
    //     e.preventDefault();
    //     vice_president = $(this).val();
    //     let name = $("input[position=vice-president]:checked").attr('candidate-name');
    //     $('#v-pres-subhead').text(name);
    // });

    // $(document).on('change', '.secretary', function(e){
    //     e.preventDefault();
    //     secretary = $(this).val();
    //     let name = $("input[position=secretary]:checked").attr('candidate-name');
    //     $('#sec-subhead').text(name);
    // });

    // $(document).on('change', '.treasurer', function(e){
    //     e.preventDefault();
    //     treasurer = $(this).val();
    //     let name = $("input[position=treasurer]:checked").attr('candidate-name');
    //     $('#tres-subhead').text(name);
    // });
    
    // $(document).on('change', '.PIO', function(e){
    //     e.preventDefault();
    //     pio = $(this).val();
    //     let name = $("input[position=pio]:checked").attr('candidate-name');
    //     $('#pio-subhead').text(name);
    // });

    // $(document).on('change', '.auditor', function(e){
    //     e.preventDefault();
    //     auditor = $(this).val();
    //     let name = $("input[position=audit]:checked").attr('candidate-name');
    //     $('#aud-subhead').text(name);
    // });

    // $(document).on('change', '.sergeant_at_arms', function(e){
    //     e.preventDefault();
    //     s_arms = $(this).val();
    //     let name = $("input[position=arms]:checked").attr('candidate-name');
    //     $('#arms-subhead').text(name);
    // });

    // $(document).on('change', '.representatives', function(e){
    //     e.preventDefault();
    //     dept_reps = $(this).val();
    //     let name = $("input[position=reps]:checked").attr('candidate-name');
    //     $('#rep-subhead').text(name);
    // });

    // let dyna;

    $(document).on('click', '.send-votes', function(e){
        e.preventDefault();
        dyna = 0;

        let data = {
            'poll_no': poll,
            'president': president,
            'vice_president': vice_president,
            'secretary': secretary,
            'treasurer': treasurer,
            'PIO': pio,
            'auditor': auditor,
            'sergeant_at_arms': s_arms,
            'dept_representatives': dept_reps
        };

        $.ajax({
            type: "POST",
            url: "../../controller/update/vote.php",
            data: { 
                data: data   
            },
            success: function(response){
                swal({
                    title: "Vote sent",
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
    });

    $(document).on('click', '.statistics', function(e){
        e.preventDefault();
        let value = $(this).val();
        $('#stat-title').text("RESULTS OF POLL # " + value);

        $.ajax({
            type: "POST",
            url: "../../controller/modal/statistics.php",
            data: { 
                data: value   
            },
            success: function(html){
                $('#stats-body').html(html);
                $('#statistics').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
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

    $(document).on('click', '#_submit-votes',() => {
        let votes = [];
        let reps = [];
        let pollNo = $('#_submit-votes').val();
        let departments = [];
        let isFilled = 0;
        
        $('input[type="radio"].representatives').each(function(){
            let name = $(this).attr('name');

            if (!departments.includes(name)) {
                departments.push(name)
            }
        });
        
        $('input[type="radio"].representatives:checked').each(function(){
            let selected = $(this).val()

            reps.push(selected);  
        });
        
        $('._poll-parent-div div[pos_id]').map(function(){ 
            let posName = $(this).attr('pos_name');
            let posId = $(this).attr('pos_id');
            let selected = $('input[type="radio"].position-' + posId + ':checked').val() == undefined ? 'none' : $('input[type="radio"].position-' + posId + ':checked').val();

            return votes.push({
                pos_id: posId,
                pos_name: $(this).attr('pos_name'),
                selected_candidate: posName == "Department Representatives" || posName == "Department Representative" ? reps : selected
            }) 
        })

        votes.forEach(function(item) {
            if (item.selected_candidate == 'none' || (item.pos_name == "Department Representative" || item.pos_name == "Department Representatives" && item.selected_candidate.length != departments.length)) {
                return toastr.error('Please select your best candidate in every position.', 'Error', 'error');
            } else {
                isFilled++;
            }
        })

        if (votes.length == isFilled) {
            $.ajax({
                type: "POST",
                url: "../../controller/update/vote.php",
                data: { 
                    votes: votes,
                    poll_no: pollNo 
                },
                success: function(response){
                    swal({
                        title: "Vote sent",
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
    })
</script>

</body>
</html>