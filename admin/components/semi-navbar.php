<div class="app-main__outer">
    <div class="app-main__inner">
        <?php
            if($page == "Poll"){
                echo '
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-graph2 icon-gradient bg-amy-crisp">
                                    </i>
                                </div>
                                <div>Poll
                                    <div class="page-title-subheading">Automated computation of all votes
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="Create Poll" data-placement="bottom" class="btn-shadow mr-3 btn btn-danger" id="create-poll-btn">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>    
                        </div>
                    </div>       
                ';
            }
            else{
                echo '
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-amy-crisp">
                                    </i>
                                </div>
                                <div>Users
                                    <div class="page-title-subheading">Showing all voters/users
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>       
                ';
            }
        ?>