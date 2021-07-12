<!doctype html>
<html lang="en">
<?php 
    session_start();
    if(!isset($_SESSION['isLoggedIn'])){
        header("Location: ../../index.php");
    }
    $page = 'Positions';
    include '../../admin/components/header.php';
    include '../../database/connection.php';
    include '../../model/select_queries.php';
    $con = new connection();
    $db = $con->connect();
    
    $select = new Select($db);
?>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit-position-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-position-modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update-position" data-dismiss="modal">Update Position</button>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include '../../admin/components/navbar.php';  
        include '../../admin/components/sidebar.php'; 
        include '../../admin/components/semi-navbar.php';  
        include '../../admin/components/positions_table.php';  
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

    let posId = 0;
    toastr.options = {
        "debug": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true      
    }
    
    $(document).on('click', '.edit-position', function(e){
        e.preventDefault();
        let id = $(this).val();

        posId = id;

        $.ajax({
            type: "POST",
            url: "../../controller/modal/get_position.php",
            data: { 
                id: id 
            },
            success: function(html){
                $('#edit-position-modal-body').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });

    $('#update-position').click(function(e){
        let position = $('#edit-position').val().trim();

        if (position == "") {
            return toastr.error("Position should not be empty.", "Error", "error");
        }

        $.ajax({
            type: "POST",
            url: "../../controller/update/update_position.php",
            data: { 
                id: posId,
                position: position
            },
            success: function(response){
                if(response == "success")
                    toastr.success("Position has been updated. Please reload the page.", "Success", "success");
                else
                    toastr.error("Something went wrong. Please try again.", "Error", "error");
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });

    $(document).on('change', '.publish-position', function() {
        let is_checked = $(this).prop("checked") == true;
        let id = $(this).attr("position_id");

        $.ajax({
            type: "POST",
            url: "../../controller/update/publish_position.php",
            data: { 
                id: id,
                is_checked: isChecked
            },
            success: function(response){
                console.log(response)
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    })
</script>
</body>
</html>