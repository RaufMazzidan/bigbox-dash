	getChartDataY();
	var tableYearly = $('#table-yearly').DataTable(
	{
		'ajax': 'api/object/performance/get.php',
		"columns": [
		{"data": "day"},
		{"data": "target"},
		{"data": "work"},
		{"data": "achievement"},
		{"data": "over"},
		{"data": "dayname"}
		]
	}

	);

function getBetween() {
        var sta = $('#sta').val();
        var end = $('#end').val();
        $('#table-yearly').DataTable().destroy();
        $('#table-yearly').DataTable(
            {
                "ajax": 'api/object/performance/getBetween.php?s='+sta+'&e='+end,
				"columns": [
				{"data": "day"},
				{"data": "target"},
				{"data": "work"},
				{"data": "achievement"},
				{"data": "over"},
				{"data": "dayname"}
				]
            }
        );
}

function getChartDataY() {
			var work = 0;
			var achi = 0 ;
			var over = 0;
			var date = [];
			var ww = [];
			var aa = [];
			var oo = [];
			$.ajax({
			type: "get",
			url: "api/object/performance/get.php",
			dataType: "json",
			success: function (data) {
			 for (i = 0; i < data.data.length; i++) {
			 		var angkaw = parseInt(data.data[i].work);
			 		var angkaa = parseInt(data.data[i].achievement);
			 		var angkao = parseInt(data.data[i].over);

			 		achi += angkaa;
			 		over += angkao;
			 		work += angkaw;
	               	date.push([data.data[i].day]);

	               	// ww.push([angkaw]);
	               	// aa.push([angkaa]);
	               	// oo.push([angkao]);
	           	}
	           	work = work / data.data.length;
	           	achi = achi / data.data.length;
	           	// var c = [a];
	           	// if (n==2) {dailyCol(work,date,achi,over)}else{dailyPie(work,date,achi,over)}
	           	var a = [work];
	           	var b = [achi];
	           	yearlyChart(a,date,b);
	           	yearPie(a,date,b)
	           }
			});
		}	
function yearPie(ww,aa,oo) {
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
					name: 'Work Time',
					y: 20,
				}, {
					name: 'Over Time',
					y: 20
				}, {
					name: 'Achievement',
					y: oo
				}]
			}]
		});

}
function yearlyChart(a,date,b) {
	// body...


	
		Highcharts.chart('column', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Daily Performance Average'
					},
					xAxis: {
						max:0,
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
						data: a

					}, {
						name: 'Achievement',
						data: b

					}]
				});




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
    		// formatter: function () {
    		// 	return this.value / 1000 + 'k';
    		// }
    	}
    },
    tooltip: {
    	pointFormat: '{series.name} = <b>{point.y:,.0f}'
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
    	name: 'Achievement Average',
    	data: [0,90]
    }]
});
	}