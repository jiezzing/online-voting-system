<!doctype html>
<html lang="en">
<!-- Links or Header   -->
<?php 
    include 'components/header.php';
?>
<!-- End of links/header -->

<body>

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
    
    <?php 
        include 'components/navbar.php';        /* Navigation Bar */
        include 'components/sidebar.php';       /* Side Bar       */
        include 'components/semi-navbar.php';   /* Semi-Navbar    */
        include 'components/cards.php';         /* Cards          */
    ?>   
</div>
<!-- Javascripts -->
<?php 
    include 'components/scripts.php';
?>
<!-- End of Javascripts -->
</body>
</html>