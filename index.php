<!doctype html>
<html lang="en">
<!-- Links or Header   -->
<?php 
    include 'home/header.php';
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
                        let name = $('#name').val();
                        let username = $('#username').val();
                        let password = $('#password').val();
                        let data = {
                            'name': name,
                            'username': username,
                            'password': password
                        };
                        $.ajax({
                            type: "POST",
                            url: "controller/insert/register.php",
                            data: { 
                                data: data 
                            },
                            success: function(response){
                                if(response == "success")
                                    toastr.success("Successfully registered", "Success", "success");
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
        swal("Success", "Success", 'success');
    })
</script>
</body>
</html>