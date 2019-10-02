<?php
    session_start();
    include '../../database/connection.php';
    include '../../model/select_queries.php';

    $con = new connection();
	$db = $con->connect();

    $query = new Select($db);

    $query->poll_no = $_POST['data'];
    $select = $query->getResult(1);
    while($row = $select->fetch(PDO::FETCH_ASSOC)){
        $pres_id[] = $row['user_id'];
        $president[] = $row['user_fullname'];
        $president_votes[] = $row['total_votes'];
    }
    $select = $query->getResult(2);
    while($row = $select->fetch(PDO::FETCH_ASSOC)){
        $vp_id[] = $row['user_id'];
        $vice_president[] = $row['user_fullname'];
        $vice_president_votes[] = $row['total_votes'];
    }
    $select = $query->getResult(3);
    while($row = $select->fetch(PDO::FETCH_ASSOC)){
        $sec_id[] = $row['user_id'];
        $secretary[] = $row['user_fullname'];
        $secretary_votes[] = $row['total_votes'];
    }

    echo'
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-0 card">
                <div class="card-body">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>President</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                <span>Vice President</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                <span>Secretary</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="president"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tabs-animation" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="vice-president"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tabs-animation" id="tab-content-2" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="secretary"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
?>

<script>
    let presObj = <?php echo json_encode($president); ?>;
    let presVotes = <?php echo json_encode($president_votes); ?>;
    let preId = <?php echo json_encode($pres_id); ?>;
    let president = [];
    let presidentVotes = [];
    let winner = presObj[0] + " w/ an ID of " +preId[0] + " is the WINNER";

    for(var i = 0; i < presObj.length; i++)
        president.push(presObj[i]);

    for(var i = 0; i < presVotes.length; i++)
        presidentVotes.push(presVotes[i]);

    let color = Chart.helpers.color;
    let barChartData1 = {
        labels: president,
        datasets: [{
            label: winner,
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: presidentVotes
        }]

    };

    var ctx = document.getElementById('president').getContext('2d');
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData1,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'ONLINE VOTING SYSTEM ANALYTICS'
            }
        }
    });

    // ======================================================== //

    let vicePrestObj = <?php echo json_encode($vice_president); ?>;
    let vicePresVotesObj = <?php echo json_encode($vice_president_votes); ?>;
    let vicePres = [];
    let vicePresVotes = [];
    for(var i = 0; i < vicePrestObj.length; i++)
        vicePres.push(vicePrestObj[i]);
    for(var i = 0; i < vicePresVotesObj.length; i++)
        vicePresVotes.push(vicePresVotesObj[i]);

    let barChartData2 = {
        labels: vicePres,
        datasets: [{
            label: 'Highest bar is the WINNER',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: vicePresVotes
        }]

    };

    var ctx = document.getElementById('vice-president').getContext('2d');
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData2,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'ONLINE VOTING SYSTEM ANALYTICS'
            }
        }
    });

// ======================================================== //

    let secObj = <?php echo json_encode($secretary); ?>;
    let secVotesObj = <?php echo json_encode($secretary_votes); ?>;
    let sec = [];
    let secVotes = [];
    for(var i = 0; i < secObj.length; i++)
        sec.push(secObj[i]);
    for(var i = 0; i < secVotesObj.length; i++)
        secVotes.push(secVotesObj[i]);

    let barChartData3 = {
        labels: sec,
        datasets: [{
            label: 'Highest bar is the WINNER',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: secVotes
        }]

    };

    var ctx = document.getElementById('secretary').getContext('2d');
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData2,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'ONLINE VOTING SYSTEM ANALYTICS'
            }
        }
    });
</script>

