$(function(){
    var dttoday = new Date();
var month = dttoday.getMonth() + 1;
var day = dttoday.getDate();
var year = dttoday.getFullYear();
if(month < 10)
	
	month = '0' + month.toString(); 
 if(day < 10)
		
    day = '0' + day.toString();
    var minDate = year + '-' + month + '-' + day;
    $('#f1').attr('min',minDate);     
})