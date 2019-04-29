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
					<span id="asasas"></span>
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
	<script type="text/javascript">
		Highcharts.chart('column', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'COLUMN'
			},
			xAxis: {
				categories: [
				'Jan',
				'Feb',
				'Mar',
				'Apr',
				'May',
				'Jun',
				'Jul',
				'Aug',
				'Sep',
				'Oct',
				'Nov',
				'Dec'
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Rainfall (mm)'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: 'Tokyo',
				data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

			}, {
				name: 'New York',
				data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

			}, {
				name: 'London',
				data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

			}, {
				name: 'Berlin',
				data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

			}]
		});
	</script>
	<script type="text/javascript">
		Highcharts.chart('pie', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: 'PIE'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					}
				}
			},
			series: [{
				name: 'Brands',
				colorByPoint: true,
				data: [{
					name: 'Chrome',
					y: 50,
					sliced: true,
					selected: true
				}, {
					name: 'Internet Explorer',
					y: 20
				}, {
					name: 'Firefox',
					y: 20
				}, {
					name: 'Edge',
					y: 5
				}, {
					name: 'Safari',
					y: 5
				}]
			}]
		});
	</script>
	<script type="text/javascript">
		Highcharts.chart('area', {
			chart: {
				type: 'area'
			},
			title: {
				text: 'AREA'
			},
			subtitle: {
				text: null
			},
			xAxis: {
				allowDecimals: false,
				labels: {
					formatter: function () {
                return this.value; // clean, unformatted number for year
            }
        }
    },
    yAxis: {
    	labels: {
    		formatter: function () {
    			return this.value / 1000 + 'k';
    		}
    	}
    },
    tooltip: {
    	pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
    },
    plotOptions: {
    	area: {
    		pointStart: 1940,
    		marker: {
    			enabled: false,
    			symbol: 'circle',
    			radius: 2,
    			states: {
    				hover: {
    					enabled: true
    				}
    			}
    		}
    	}
    },
    series: [{
    	name: 'USA',
    	data: [
    	null, null, null, null, null, 6, 11, 32, 110, 235,
    	369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
    	20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
    	26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
    	24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
    	21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
    	10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
    	5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
    	]
    }, {
    	name: 'USSR/Russia',
    	data: [null, null, null, null, null, null, null, null, null, null,
    	5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
    	1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
    	11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
    	30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
    	37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
    	21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
    	12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
    	]
    }]
});
</script>
</body>
</html>