function countInbox() {
	return $.ajax({
		type: "get",
		url: "api/object/inbox/get.php",
		dataType: "json",
		success: function (data) {
		          // console.log(data.data.day[1]);
		          $('#countInbox').html(data.count);
		          $('.inb').html(data.count);
		      }
		  });
}
function getInbox() {
	return $.ajax({
		type: "get",
		url: "api/object/inbox/get.php",
		dataType: "json",
		success: function (data) {
			var month= ["January","February","March","April","May","June","July","August","September","October","November","December"];
			for (var i = 0; i < data.data.length; i++) {
				var dateRaw = data.data[i].date;
				var result = dateRaw.split('-');
				var m = parseInt(result[1]-1);
				var date = result[2]+' '+month[m]+' '+result[0];
					cat = '<span class="cat cat-lg"></span>'
				$('#inb-box').append('<div class="box-content"><div class="row"><div class="col-1 cat-show" >'+cat+'</div><div class="col-11"><span class="not-tanggal">'+data.data[i].day+', '+date+'</span><br><span>'+data.data[i].content+'</span></div></div></div>');
			}
		}
	});
}

$( '#click-inb' ).click(function() {
	$( '#inbox' ).toggleClass('kanan');
});
$( '.close' ).click(function() {
	$( '#inbox' ).removeClass('kanan');
});
$( '#btn-inb' ).click(function() {
	$( '#inbox' ).addClass('kanan');
});

$("#filter-inbox").keyup(function() {
	var filterInb = $(this).val(),
	count = 0;
	$('#inb-box div').each(function() {
		if ($(this).text().search(new RegExp(filterInb, "i")) < 0) {
			$(this).hide();
		} else {
			$(this).show();
			count++;
		}
	});
});