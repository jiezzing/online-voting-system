<!doctype html>
<html lang="en">
<?php 
    session_start();
    if(!isset($_SESSION['isLoggedIn'])){
        header("Location: ../../index.php");
    }
    $page = 'Users';
    include '../../admin/components/header.php';
    include '../../database/connection.php';
    include '../../model/select_queries.php';
    $con = new connection();
    $db = $con->connect();
    
    $select = new Select($db);
?>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
    <?php 
        include '../../admin/components/navbar.php';  
        include '../../admin/components/sidebar.php'; 
        include '../../admin/components/semi-navbar.php';  
        include '../../admin/components/data_table.php';  
    ?>   
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/build/toastr.min.js"></script>
<script src="../../assets/bootstrap-sweetalert/dist/sweetalert.js"></script>
<script src="../../assets/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../../assets/mdb/js/addons/datatables.js"></script>
<script type="text/javascript" src="../../assets/mdb/js/addons/datatables.min.js"></script>

<script>
    $('#users-table').DataTable();
</script>
</body>
</html>