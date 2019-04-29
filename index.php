<!DOCTYPE html>
<html>
<head>
	<title> Dashboard</title>
	<link rel="stylesheet" type="text/css" href="assets/grid/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>
<body onload="startTime()">
	<nav>
		<div class="row" style="margin: 0">
			<div class="col-2">
				<div class="brand">
					<img src="assets/img/bigboxwhite.png">
				</div>
			</div>
			<div class="col-10">
				<div class="header-text">
					<div class="text-run">
						<span id="datenow"></span>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="wrapper">
		<div class="row">
			<!-- <div class="col-2">
			</div> -->
			<div class="col-5">
				<div class="panel panel-user">
					<div class="row">
						<div class="left">
							<img src="assets/img/p1.jpg" class="foto">		
						</div>
						<div class="right">
							<span class="usr-name">ABD. RAUF JAUHARI IZZA MAZZIDAN</span>
							<br>
							<span class="usr-email">raufmazzidan@gmail.com</span>
						</div>
					</div>
					<div class="row">
						<div class="btn btn-notif" id="btn-not">NOTIFICATION<span id="countNotif" class="total"></span></div>
						<div class="btn btn-inbox" id="btn-inb">INBOX<span class="total" id="countInbox"></span></div>
						<div class="btn btn-exit">EXIT</div>
					</div>
				</div>
				<br>
				<div class="panel">
					<div class="panel-header">
						<label class='toggle-label'>
							<input id="switch" onclick="chg()" type='checkbox'/>
							<span class='back'>
								<span class='toggle'></span>
								<span class='label col'>COL</span>
								<span class='label pie'>PIE</span>  
							</span>
						</label>
						<div class="panel-title">
							DAILY PERFORMANCE
						</div>
					</div>
					<div id="container" style="width:100%; height:300px;"></div>		

				</div>
			</div>
			<div class="col-7">
				<div class="panel">
					<div class="panel-header">
						<div class="panel-title">
							DAILY PERFORMANCE
						</div>
					</div>
					<table id="table-daily" class="hover stripe" >
						<thead>
							<tr>
								<th>Day</th>
								<th>Date</th>
								<th>Target Time</th>
								<th>Work Time</th>
								<th>Achievement</th>
								<th>Overtime</th>
								<th>Day</th>
							</tr>
						</thead>
						<tbody style="text-align: center;">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-12">
				<div class="panel">
					<div class="panel-header">
						<div class="row" style="margin: auto;">
							<div class="col-1">
								<div class="row">
									<span class="pick">Start Date</span>
								</div>
								<div class="row">
									<select class="date-pick" id="sta">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>

									</select>
								</div>
							</div>
							<div class="col-1">
								<div class="row">
									<span class="pick">End Date</span>
								</div>
								<div class="row">
									<select class="date-pick" id="end">
										<!-- <option>Date</option> -->
										<!-- <option value="1">1</option> -->
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
									</select>
								</div>
							</div>
							<div class="col-1">
								<div class="row">
									&nbsp;
								</div>
								<div class="row">
									<button class="btn-reload" onclick="getBetween()" ">Reload</button>
								</div>
							</div>
							<div class="col">
								<div class="panel-title">
									YEAR SUMMARY PERFORMANCE
								</div>
							</div>	
						</div>

					</div>
					<br><br><br>

					<table id="table-yearly" class="hover stripe" >
						<thead>
							<tr>
								<th>Day</th>
								<th>Target Time</th>
								<th>Work Time</th>
								<th>Achievement</th>
								<th>Overtime</th>
								<th>Day</th>
							</tr>
						</thead>
						<tbody style="text-align: center;">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-12">
				<div class="panel" style="padding: 0px;">
					<div class="panel-header">
						<div class="panel-title" style="padding-right: 20px;">
							YEAR SUMMARY PERFORMANCE
						</div>
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-4">
								<div class="panel">
									<!-- <div class="panel-name">
										COLUMN
									</div> -->
									<br>
									<div id="column" style="width:100%; height:300px;"></div>		
								</div>
							</div>
							<div class="col-4">
								<div class="panel">
									<!-- <div class="panel-name">
										PIE
									</div> -->
									<br>
									<div id="pie" style="width:100%; height:300px;"></div>		
								</div>
							</div>
							<div class="col-4">
								<div class="panel">
									<!-- <div class="panel-name">
										AREA
									</div> -->
									<br>
									<div id="area" style="width:100%; height:300px;"></div>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="notif" class="panel-notif">
		<div class="panel-name" style="background-color: #e53935;color:white;border-radius: 3px;">
			<span class="close">&times;</span>
			NOTIFICATION
		</div>

		<br>
		<div class="panel" style="padding-left: 10px;border: none;">
			<div class="row">
				<div class="col-6">
					<input type="search" name="filter" id="filter-notif" class="filter" placeholder="Search.." >
				</div>
				<div class="col-2">
					<span class="cat danger"></span><p class="cat-name">Danger</p>
				</div>
				<div class="col-2">
					<span class="cat warning"></span><p class="cat-name">Warning</p>
				</div>
				<div class="col-2">
					<span class="cat safe"></span><p class="cat-name">Safe</p>
				</div>
			</div>
			<br>
			<div id="not-box" class="panel-box">
			</div>
		</div>
		  
	</div>
		<div id="inbox" class="panel-notif">
		<div class="panel-name" style="background-color: #4CAF50;color:white;border-radius: 3px;">
			<span class="close">&times;</span>
			INBOX
		</div>

		<br>
		<div class="panel" style="padding-left: 10px;border: none;">
			<div class="row">
				<div class="col-12">
					<input type="search" name="filter" id="filter-inbox" class="filter" placeholder="Search.." style="width: 95%!important;" >
				</div>
			</div>
			<br>
			<div id="inb-box" class="panel-box">
			</div>
		</div>
	</div>
</div>
</div>
<div class="footbar">
	<div class="tanggal">
		<span id="date"></span><br>
		<span id="time"></span>
	</div>
	<button class="circ danger not" id="click-not">10</button>
	<button class="circ safe inb" id="click-inb">10</button>
</div>

<script src="assets/jquery/jquery.js"></script>
<script src="assets/datatables/datatables.min.js"></script>
<script src="assets/highcharts/code/highcharts.js"></script>
<script src="assets/highcharts/code/modules/exporting.js"></script>
<script src="assets/highcharts/code/modules/export-data.js"></script>
<script src="assets/js/notification.js"></script>
<script src="assets/js/inbox.js"></script>
<script src="assets/js/daily.js"></script>
<script src="assets/js/yearly.js"></script>
<script src="assets/js/clock.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		// NOTIFICATION
		setInterval('countNotif()', 1000);
		countNotif();
		getNotification();
		// END NOTIFICATION
		// INBOX
		setInterval('countInbox()', 1000);
		countInbox();
		getInbox();
		// END INBOX
	} );
</script>
<script type="text/javascript">
</script>
</body>
</html>