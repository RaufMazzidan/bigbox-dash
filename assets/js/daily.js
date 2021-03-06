if ($('#switch').is(':checked')) {
			// return false;
		}else{
			chg();
		}
		function chg() {
			if ($('#switch').is(':checked')) {
				getChartData(1)
			}
			else{
				getChartData(2);
				// dailyCol();
			}
		}

		  function chartDaily(value, data) {
	        var dailyChart = Highcharts.chart('chartDaily', {
	            chart: {
	                type: value
	            },
	            title: {
	                text: 'Daily Performance'
	            },
	            xAxis: {
	                type: 'category',
	                crosshair: true
	            },
	            yAxis: {
	                min: 0,
	                title: {
	                    text: 'Daily Work Hours'
	                }
	            },
	            tooltip: {
	                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	                    '<td style="padding:0"><b>{point.y:.1f} H</b></td></tr>',
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
	                name: 'Ahmad Khoirudin',
	                data: data
	            }]
	        });
	    }
	    function dailyPie() {
	    	Highcharts.chart('container', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Daily Performance'
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
							name: 'Day 1',
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
	    }


		function dailyCol(work,date,achi,over) {
			Highcharts.chart('container', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Daily Performance'
					},
					xAxis: {
						max:1,
						categories: date,
						crosshair: true
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Hours'
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y:.1f} jam</b></td></tr>',
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
						name: 'Work Time',
						data: work

					}, {
						name: 'Achievement',
						data: achi

					}, {
						name: 'Over Time',
						data: over

					}]
				});
		}


		function getChartData(n) {
			var work = [];
			var achi = [];
			var over = [];
			var date = [];
			$.ajax({
			type: "get",
			url: "api/object/performance/getDaily.php",
			dataType: "json",
			success: function (data) {
			 for (i = 0; i < data.data.length; i++) {
			 		var angkaw = parseInt(data.data[i].work);
			 		var angkaa = parseInt(data.data[i].achievement);
			 		var angkao = parseInt(data.data[i].over);
	               	date.push([data.data[i].date]);
	               	work.push([angkaw]);
	               	achi.push([angkaa]);
	               	over.push([angkao]);
	           	}
	           	workb = "["+work;
	           	a = workb.replace(/,(\s+)?$/, '')+"]"; 
	           	// var c = [a];
	           	if (n==2) {dailyCol(work,date,achi,over)}else{dailyPie(work,date,achi,over)}
	           	
	           	console.log(work);
	           }
			});
		}	
	function dailyTable() {
		tableDaily = $('#table-daily').DataTable(
		{
			'ajax': 'api/object/performance/getDaily.php',
			"columns": [
			{"data": "day"},
			{"data": "date"},
			{"data": "target"},
			{"data": "work"},
			{"data": "achievement"},
			{"data": "over"},
			{"data": "dayname"}
			]
		}
		);
		return true;
	}










	function getTableData(table) {
			const dataArray = [],
		    tesArray = [];
		 
		  // // loop table rows
		  table.rows({ search: "applied" }).every(function() {
		    const data = this.data();
		    tesArray = data[0];
		  //   // populationArray.push(parseInt(data[1].replace(/\,/g, "")));
		  });
		   
		 
		  // store all data in dataArray
		  // dataArray.push(tesArray);
		 
		  // return dataArray;
		  console.log(tesArray);
		}

		dailyTable();
		// getTableData(tableDaily);
