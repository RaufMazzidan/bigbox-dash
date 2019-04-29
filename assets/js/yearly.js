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
// $('#table-daily').DataTable();
// getTableData(tableDaily);

// function getTableData(table) {
// 	const dataArray = [],
//     tesArray = [];
 
//   // // loop table rows
//   table.rows({ search: "applied" }).every(function() {
//     const data = this.data();
//     tesArray = data[0];
//   //   // populationArray.push(parseInt(data[1].replace(/\,/g, "")));
//   });
   
 
  // store all data in dataArray
  // dataArray.push(tesArray);
 
  // return dataArray;
  // console.log(tesArray);
// }