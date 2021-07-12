<!doctype html>
<html lang="en">
<!-- Links or Header   -->
<?php 
    session_start();
    if(isset($_SESSION['isLoggedIn'])){
        if (isset($_SESSION['type_id']) && $_SESSION['type_id'] == 1) {
            header("Location: admin/pages/poll.php");
        } else {
            header("Location: voter/pages/poll.php");
        }
    }
    include 'home/header.php';
    include 'database/connection.php';
    include 'model/select_queries.php';

    $con = new connection();
    $db = $con->connect();
    
    $select = new Select($db);
?>
<!-- End of links/header -->

<body>

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
    <?php 
        include 'home/navbar.php';      
        include 'home/carousel.php';        
    ?>   
</div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script src="./assets/toastr/toastr.js"></script>
<script src="./assets/toastr/build/toastr.min.js"></script>
<script src="./assets/bootstrap-sweetalert/dist/sweetalert.js"></script>
<script src="./assets/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
<script>

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {

                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    else{
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-top-left",
                            "preventDuplicates": true      
                        }
                        let name = $('#registration-form').find('input[name="name"]').val();
                        let username = $('#registration-form').find('input[name="username"]').val();
                        let password = $('#registration-form').find('input[name="password"]').val();

                        let data = {
                            'name': name,
                            'username': username,
                            'password': password,
                            'type': 2
                        };
                        $.ajax({
                            type: "POST",
                            url: "controller/insert/register.php",
                            data: { 
                                data: data 
                            },
                            success: function(response){
                                if(response == "success")
                                    toastr.success("You can now use your registered username and password", "Success", "success");
                                else
                                    toastr.error("Username or password already exists. Please try again.", "Error", "error");
                            },
                            error: function(xhr, ajaxOptions, thrownError){
                                alert(thrownError);
                            }
                        });
                    }
                    form.classList.add('was-validated');
                    event.preventDefault();
                }, false);
            });
        }, false);
    })();
    // End

    $('#login').click(function(){
        event.preventDefault();
        let username = $('#login-form').find('input[name="username"]').val();
        let password = $('#login-form').find('input[name="password"]').val();
        let data = {
            'username': username,
            'password': password
        };

        $.ajax({
            type: "POST",
            url: "controller/auth/check_user.php",
            data: { 
                data: data 
            },
            success: function(response){
                window.location = "controller/auth/check_access.php";
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });
</script>
</body>
</html>