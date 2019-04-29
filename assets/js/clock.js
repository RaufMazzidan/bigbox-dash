window.onload = date_time('date_time');
function date_time(id)
{
	date = new Date;
	year = date.getFullYear();
	month = date.getMonth();

	var days= ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
	var months= ["Januari","Februari","Maret","April","Mei","Juni","Juli","Augustus","September","Oktober","November","Desember"];

	d = date.getDate();
	day = date.getDay();
	h = date.getHours();

	if(h<10){
		h = "0"+h;
	}

	m = date.getMinutes();
	
	if(m<10){
		m = "0"+m;
	}

	s = date.getSeconds();
	
	if(s<10){
		s = "0"+s;
	}
	
	var tanggal = ''+days[day]+', '+d+' '+months[month]+' '+year;
	var time = h+':'+m+':'+s;
	
	$('#time').html(time);
	$('#date').html(tanggal);
	$('#datenow').html('Assisting Your Business From The Heart :: '+tanggal);
	
	setTimeout('date_time("'+id+'");','1000');
	return true;
}