<?php
    include '../head.php';
    include '../session.php';
    include '../connect.php';

    $currentMonth = date('F');
    $currentYear = date('Y');
    $thisMonthIncoming = 0;
    $thisMonthOutgoing = 0;

    $thisMonthIncomingQuery = "SELECT * FROM financial_record WHERE purpose='Incoming' AND month_date='$currentMonth' AND year_date='$currentYear'"; 
    $thisMonthIncomingResult = mysqli_query($conn, $thisMonthIncomingQuery);

    while ($row = mysqli_fetch_assoc($thisMonthIncomingResult)) {
        $thisMonthIncoming += $row['amount'];
    }

    $thisMonthOutgoingQuery = "SELECT * FROM financial_record WHERE purpose='Outgoing' AND month_date='$currentMonth' AND year_date='$currentYear'"; 
    $thisMonthOutgoingResult = mysqli_query($conn, $thisMonthOutgoingQuery); 

    while ($row = mysqli_fetch_assoc($thisMonthOutgoingResult)) {
        $thisMonthOutgoing += $row['amount'];
    }

    $thisMonthTotal = $thisMonthIncoming - $thisMonthOutgoing;

    $lastMonth = date("F", strtotime("last month"));
    $lastMonthIncoming = 0; 
    $lastMonthOutgoing = 0; 

    $lastMonthIncomingQuery = "SELECT * FROM financial_record WHERE purpose='Incoming' AND month_date='$lastMonth' AND year_date='$currentYear'"; 
    $lastMonthIncomingResult = mysqli_query($conn, $lastMonthIncomingQuery); 

    while ($row = mysqli_fetch_assoc($lastMonthIncomingResult)) {
        $lastMonthIncoming += $row['amount'];
    }

    $lastMonthOutgoingQuery = "SELECT * FROM financial_record WHERE purpose='Outgoing' AND month_date='$lastMonth' AND year_date='$currentYear'"; 
    $lastMonthOutgoingResult = mysqli_query($conn, $lastMonthOutgoingQuery); 

    while ($row = mysqli_fetch_assoc($lastMonthOutgoingResult)) {
        $lastMonthOutgoing += $row['amount'];
    }
    
    $lastMonthTotal = $lastMonthIncoming - $lastMonthOutgoing;

    $thisYearIncoming = 0;
    $thisYearOutgoing = 0;
    
    $thisYearIncomingQuery = "SELECT * FROM financial_record WHERE purpose='Incoming' AND year_date='$currentYear'"; 
    
    $thisYearIncomingResult = mysqli_query($conn, $thisYearIncomingQuery); 

    while ($row = mysqli_fetch_assoc($thisYearIncomingResult)) {
        $thisYearIncoming += $row['amount'];
    }

    $thisYearOutgoingQuery2 = "SELECT * FROM financial_record WHERE purpose='Outgoing' AND year_date='$currentYear'"; // select all the data in DB

    $thisYearOutgoingResult = mysqli_query($conn, $thisYearOutgoingQuery2); // query to get the data

    while ($row = mysqli_fetch_assoc($thisYearOutgoingResult)) {
        $thisYearOutgoing += $row['amount'];
    }
    $thisYearTotal = $thisYearIncoming - $thisYearOutgoing;
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .company_name { font-size: 1.5rem; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; }
    .icon { font-size: 1.7rem; }
</style>
<body>
    <div class="container-scroller">
<?php include '../navbar.php'; ?>
        <div class="container-fluid page-body-wrapper">
<?php include '../sidebar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper" style="background: rgb(9,41,66);
background: linear-gradient(61deg, rgba(9,41,66,1) 23%, rgba(118,168,208,1) 92%);background-position: center;background-size: cover; background-attachment: fixed;">
                    <div class="row">
                        <div class="col-md-12 grid-margin"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">Financial This Month</p>
                                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= '₱ ' . number_format($thisMonthTotal) ?></h3>
                                        <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>This Month</small></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">Financial Last Month</p>
                                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= '₱ ' . number_format($lastMonthTotal); ?></h3>
                                        <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Last Month</small></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">Financial This Year</p>
                                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= '₱ ' . number_format($thisYearTotal); ?></h3>
                                        <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>This Year</small></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Transactions this Month</h5>
                                    <p class="card-text">The graph below is the tally of Reimbursement and Revenue financial transactions for this month. </p>
                                    <div><canvas id="myChart"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Transactions for the last month & this month</h5>
                                    <p class="card-text">The graph below is the tally of financial transactions for the last month and this month.</p>
                                    <div>
                                        <canvas id="myChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
                        $month = date('F');
                        $year = date('Y');

                        $sql = "SELECT * FROM financial_record"; // select all the data in DB
                        $result = mysqli_query($conn, $sql); // query to get the data

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $monthSelect[] = $row['month_date'];
                        }
?>
                    </div>
                </div>
<?php
    include '../footer.php';
    include '../modals.php';
?>
            </div>
        </div>
    </div>
<?php include '../scripts.php'; ?>
    <script>
        const data = {
            labels: [
                'Reimbursement', 'Revenue'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [<?= $thisMonthOutgoing; ?>, <?= $thisMonthIncoming; ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)', 'rgb(54, 162, 235)',
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Pie Chart'
                    }
                }
            },
        };

        // 2
        const data2 = {
            labels: [
                'Last Month', 'This Month'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [<?= $lastMonthTotal; ?>, <?= $thisMonthTotal; ?>],
                backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                hoverOffset: 4
            }]
        };

        const config2 = {
            type: 'doughnut',
            data: data2,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Pie Chart'
                    }
                }
            },
        };
    </script>
    <script>
        const myChart = new Chart( document.getElementById('myChart'), config );
        const myChart2 = new Chart( document.getElementById('myChart2'), config2 );
    </script>
</body>
</html>