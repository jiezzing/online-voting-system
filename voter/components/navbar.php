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
                                Voter
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>

<script>
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
</script>