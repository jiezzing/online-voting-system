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
    $('#login').click(function(){
        event.preventDefault();
        let username = $('#login-form').find('input[name="username"]').val();
        let password = $('#login-form').find('input[name="password"]').val();
        let data = {
            'username': username,
            'password': password
        };

        toastr.options = {
            "debug": false,
            "positionClass": "toast-top-left",
            "preventDuplicates": true      
        }

        if (username == "" || password == "") {
            return toastr.error("Username and password must not be empty. Please try again!", "Error", "error");
        }

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