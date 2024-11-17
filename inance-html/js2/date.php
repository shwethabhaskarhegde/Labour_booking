<html>
    <head>
</head>
<body>
    <script>

		var date = new Date();
		today = date.getDate();
		if(today < 10)
		
			tdate = '0' + today ;
		
		
		month = d.getMonth()+1;
		if(month < 10)
	
			tmonth = '0' + month; 
		
		var year = d.getUTCFullYear();
        
		var minDate = year + "-" + tmonth +"-"+tdate;
		$(' .txtDate').attr('min',minDate);
	</script>
    </body>
    </html>