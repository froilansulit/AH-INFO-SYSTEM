<?php
include '../head.php';
include '../session.php';
include '../connect.php';
$month_now = date('F');
$year_now = date('Y');
$inc_rec = 0;
$out_rec = 0;

$this_month_sql = "select * from financial_record where purpose='Incoming' AND month_date='$month_now' AND year_date='$year_now'"; // select all the data in DB

$this_month_result = mysqli_query($conn, $this_month_sql); // query to get the data

while ($row = mysqli_fetch_assoc($this_month_result)) {
  $inc_rec += $row['amount'];
}

$this_month_sql2 = "select * from financial_record where purpose='Outgoing' AND month_date='$month_now' AND year_date='$year_now'"; // select all the data in DB

$this_month_result2 = mysqli_query($conn, $this_month_sql2); // query to get the data

while ($row = mysqli_fetch_assoc($this_month_result2)) {
  $out_rec += $row['amount'];
}

$this_month_total = $inc_rec - $out_rec; 

$last_month = date("F", strtotime("last month"));
$year_now = date('Y');
$L_inc_rec = 0;
$L_out_rec = 0;

$last_month_sql = "select * from financial_record where purpose='Incoming' AND month_date='$last_month' AND year_date='$year_now'"; // select all the data in DB

$last_month_result = mysqli_query($conn, $last_month_sql); // query to get the data

while ($row = mysqli_fetch_assoc($last_month_result)) {
  $L_inc_rec += $row['amount'];
}

$last_month_sql2 = "select * from financial_record where purpose='Outgoing' AND month_date='$last_month' AND year_date='$year_now'"; // select all the data in DB

$last_month_result2 = mysqli_query($conn, $last_month_sql2); // query to get the data

while ($row = mysqli_fetch_assoc($last_month_result2)) {
  $L_out_rec += $row['amount'];
}

$last_month_total = $L_inc_rec - $L_out_rec; 

$Y_inc_rec = 0;
$Y_out_rec = 0;

$this_year_sql = "select * from financial_record where purpose='Incoming' AND year_date='$year_now'"; // select all the data in DB

$this_year_result = mysqli_query($conn, $this_year_sql); // query to get the data

while ($row = mysqli_fetch_assoc($this_year_result)) {
  $Y_inc_rec += $row['amount'];
}

$this_year_sql2 = "select * from financial_record where purpose='Outgoing' AND year_date='$year_now'"; // select all the data in DB

$this_year_result2 = mysqli_query($conn, $this_year_sql2); // query to get the data

while ($row = mysqli_fetch_assoc($this_year_result2)) {
  $Y_out_rec += $row['amount'];
}
$this_year_total = $Y_inc_rec - $Y_out_rec;
?>
<!DOCTYPE html>
<html lang="en">
<style>
  .company_name {
    font-size: 1.5rem;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }

  .icon { font-size: 1.7rem; }
</style>
<body>
  <div class="container-scroller">
    <?php include '../navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include '../sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper" style="background-color:#bddcff;">
          <div class="row">
            <div class="col-md-12 grid-margin">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Financial This Month</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= '₱ ' . number_format($this_month_total) ?></h3>
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
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?='₱ ' . number_format($last_month_total); ?></h3>
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
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?='₱ ' . number_format($this_year_total); ?></h3>
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
                    <p class="card-text">The graph below is the tally of incoming and outgoing financial transactions for this month. </p>
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

            $sql = "select * from financial_record"; // select all the data in DB
            $result = mysqli_query($conn, $sql); // query to get the data

            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $monthSelect[] = $row['month_date'];
            }
            ?>
          </div>
        </div>
        <?php include '../modals.php'; ?>
        <?php include '../footer.php'; ?>
      </div>
    </div>
  </div>
  <?php include '../scripts.php'; ?>

  <script>
  const data = {
  labels: [
    'Outgoing', 'Incoming'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [<?php echo $out_rec; ?>, <?php echo $inc_rec; ?>],
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
    data: [<?= $last_month_total; ?>, <?= $this_month_total; ?>],
    backgroundColor: [
      'rgb(54, 162, 235)', 'rgb(255, 205, 86)'
      
    ],
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
        position: 'top',
      },
      title: {
        display: true, text: 'Chart.js Pie Chart'
      }
    }
  },
};

</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );
</script>
</body>

</html>