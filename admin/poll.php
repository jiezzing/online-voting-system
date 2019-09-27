<!doctype html>
<html lang="en">
<?php 
	session_start();
    include '../admin/header.php';
?>

<body>

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
    
    <?php 
        include '../admin/navbar.php';  
        include '../admin/sidebar.php'; 
        include '../admin/semi-navbar.php';    
        include '../admin/cards.php';  
    ?>   
</div>
<script type="text/javascript" src="../assets/scripts/main.js"></script>
<script src="../assets/toastr/toastr.js"></script>
<script src="../assets/toastr/build/toastr.min.js"></script>
<script src="../assets/bootstrap-sweetalert/dist/sweetalert.js"></script>
<script src="../assets/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>