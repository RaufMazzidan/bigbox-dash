function countNotif() {
	return $.ajax({
		type: "get",
		url: "api/object/notification/get.php",
		dataType: "json",
		success: function (data) {
		          // console.log(data.data.day[1]);
		          $('#countNotif').html(data.count);
		          $('.not').html(data.count);
		      }
		  });
}
function getNotification() {
	return $.ajax({
		type: "get",
		url: "api/object/notification/get.php",
		dataType: "json",
		success: function (data) {
			var month= ["January","February","March","April","May","June","July","August","September","October","November","December"];
			for (var i = 0; i < data.data.length; i++) {
				var dateRaw = data.data[i].date;
				var result = dateRaw.split('-');
				var m = parseInt(result[1]-1);
				var date = result[2]+' '+month[m]+' '+result[0];
				var cat = "";
				if (data.data[i].category == 3) {
					cat = '<span class="cat cat-lg danger"></span>'
				}else if(data.data[i].category == 2) {
					cat = '<span class="cat cat-lg warning"></span>'
				}else if (data.data[i].category == 1) {
					cat = '<span class="cat cat-lg safe"></span>'
				}else{
					cat = '<span class="cat cat-lg">'+data.data[i].content+'</span>'
				}
				$('#not-box').append('<div class="box-content" id="cat-list" data-time="'+data.data[i].category+'"><div class="row"><div class="col-1 cat-show">'+cat+'</div><div class="col-11"><span class="not-tanggal">'+data.data[i].day+', '+date+'</span><br><span id=""not-cont>'+data.data[i].content+'</span></div></div></div>');
			}
		}
	});
}


$( '#click' ).click(function() {
	$( '#notif' ).toggleClass('kanan');
});
$( '.close' ).click(function() {
	$( '#notif' ).removeClass('kanan');
});
$( '#btn-not' ).click(function() {
	$( '#notif' ).addClass('kanan');
});


$("#filter-notif").keyup(function() {
	var filter = $(this).val(),
	count = 0;
	$('#not-box div').each(function() {
		if ($(this).text().search(new RegExp(filter, "i")) < 0) {
			$(this).hide();
		} else {
			$(this).show();
			count++;
		}
	});
});