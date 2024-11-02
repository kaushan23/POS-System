<?php
require('admin_authorization.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Yearly Sales</title>
	<link rel="icon" type="image/x-icon" href="images/logo.png">
	<!--BOOTSTRAP PLUGIN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" type="text/css" href="css/editemployee.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/dropdown.css">
</head>

<body>
	<div class="cont">
		<div class="row">
			<div class="table-responsive" style="padding:10px">
				<a href="reports.php"><img src="images/back.png" alt="back" style="margin-right:820px"></a>
				<br><br>
				<div style="color:#8107a0; font-size: 2.5vmax; font-weight: bold; text-align: center; margin-bottom:25px">Sales Report
				</div>
				<div class="table-responsive" style="padding:10px">
					<?php
					$con = new mysqli('localhost', 'root', '', 'emart');
					$query = $con->query("SELECT Year, Rs FROM yearly_sales");

					foreach ($query as $data) {
						$year[] = $data['Year'];
						$Rs[] = $data['Rs'];
					}

					?>

					<div style="width: 500px; margin-left:150px">
						<div class="dropdown">
							<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Sales By</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="dailysales.php">Day</a></li>
								<li><a class="dropdown-item" href="monthlysales.php">Month</a></li>
								<li><a class="dropdown-item" href="yearlysales.php">Year</a></li>
							</ul>
						</div>
						<br>
						<br>
						<span style="float: left; font-weight:bold; padding:15px">Yearly Sales</span>
						<canvas id="myChart"></canvas>
					</div>
					<script>
						// === include 'setup' then 'config' above ===
						const labels = <?php echo json_encode($year) ?>;
						const data = {
							labels: labels,
							datasets: [{
								label: 'Sales',
								data: <?php echo json_encode($Rs) ?>,
								backgroundColor: [
									'#6cd4c5',
								],
								borderColor: [
									'#6cd4c5',
								],
								borderWidth: 1
							}]
						};
						const config = {
							type: 'bar',
							data: data,
							options: {
								scales: {
									y: {
										beginAtZero: true
									}
								}
							},
						};

						var myChart = new Chart(
							document.getElementById('myChart'),
							config
						);
					</script>
				</div>
			</div>
		</div>
	</div>
</body>

</html>