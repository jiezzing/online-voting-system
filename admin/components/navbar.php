<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <div class="widget-content-left  ml-3 header-user-info">
            <div class="widget-heading">
                <strong>Online Voting System</strong>
            </div>
            <div class="widget-subheading">
                Vote easily online <i class="fa fa fa-check"></i>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <i class="fa fa-user fa-2x"></i>
                                    <!-- <img width="42" class="rounded-circle" src="../assets/images/avatars/1.jpg" alt=""> -->
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <button type="button" tabindex="0" onclick class="dropdown-item logout">Logout</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                <?php echo $_SESSION['name']; ?>
                            </div>
                            <div class="widget-subheading">
                                Administrator
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="register-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="registration-form">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Full Name</label><input name="fullname" id="_reg-fullname" placeholder="Full Name" type="text" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                            <label for="exampleEmail11" class="">Position</label>
                            <select class="mb-2 form-control" name="position" id="_reg-type">
                                <option value="0">Select Position</option> 
                                <option value="1">Admin</option> 
                                <option value="2">Voter</option> 
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="exampleCity" class="">Username or ID Number</label>
                                <input name="motto" id="_reg-username" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="exampleCity" class="">Password</label>
                                <input name="motto" id="_reg-password" type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="_register-user-btn">Register</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#_register-user-btn').click(() => {
        let fullname =  $('#_reg-fullname').val().trim();
        let type = $('#_reg-type').val();
        let username = $('#_reg-username').val().trim();
        let password = $('#_reg-password').val().trim();
        toastr.options = {
            "debug": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true      
        }

        let data = {
            'name': fullname,
            'username': username,
            'password': password,
            'type': type
        };

        if (fullname == "" || type == 0 || username == "" || password == "") {
            return toastr.error("Some fields are missing. Please try again!", "Error", "error");
        } else {
            $.ajax({
                type: "POST",
                url: "../../controller/insert/register.php",
                data: { 
                    data: data 
                },
                success: function(response){
                    if(response == "success") {
                        toastr.success("You can now use your registered username and password", "Success", "success");
                        $('#_reg-fullname').val('');
                        $('#_reg-type').val(0);
                        $('#_reg-username').val('');
                        $('#_reg-password').val('');
                    }                        
                    else
                        toastr.error("Username or password already exists. Please try again.", "Error", "error");
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
        }
    })

    $('.logout').click(() => {
        $.ajax({
            type: "POST",
            url: "../../controller/session_destroy.php",
            data: { 
                dummy: false 
            },
            success: function(response){
                window.location = '../../index.php'
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    })



    // (function() {
    //     window.addEventListener('load', function() {
    //         var forms = document.getElementsByClassName('needs-validation');
    //         var validation = Array.prototype.filter.call(forms, function(form) {

    //             form.addEventListener('submit', function(event) {
    //                 if (form.checkValidity() === false) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }
    //                 else{
    //                     toastr.options = {
    //                         "debug": false,
    //                         "positionClass": "toast-top-left",
    //                         "preventDuplicates": true      
    //                     }
    //                     let name = $('#registration-form').find('input[name="name"]').val();
    //                     let username = $('#registration-form').find('input[name="username"]').val();
    //                     let password = $('#registration-form').find('input[name="password"]').val();

    //                     let data = {
    //                         'name': name,
    //                         'username': username,
    //                         'password': password,
    //                         'type': 2
    //                     };
    //                     $.ajax({
    //                         type: "POST",
    //                         url: "controller/insert/register.php",
    //                         data: { 
    //                             data: data 
    //                         },
    //                         success: function(response){
    //                             if(response == "success")
    //                                 toastr.success("You can now use your registered username and password", "Success", "success");
    //                             else
    //                                 toastr.error("Username or password already exists. Please try again.", "Error", "error");
    //                         },
    //                         error: function(xhr, ajaxOptions, thrownError){
    //                             alert(thrownError);
    //                         }
    //                     });
    //                 }
    //                 form.classList.add('was-validated');
    //                 event.preventDefault();
    //             }, false);
    //         });
    //     }, false);
    // })();
</script>