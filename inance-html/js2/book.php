 
<?php

	function bookLabour(){
		$connect = mysqli_connect("localhost","root","","Labour2");
		if($connect===false)
		{
			die("ERROR:could not connect"
				.mysqli_connect_error());
		}
		if(isset($_POST['from']) || isset($_POST['to']))
		{
			$from = $_POST['from'];
			$to = $_POST['to'];
			$lbrId = $_GET['id'];
			echo "$lbrId";
			echo "$maxDate";
			$sql = "INSERT INTO `labourbook`(`id`,`from`, `to`) VALUES ('$lbrId','$from','$to')";
			if(mysqli_query($connect,$sql))
			{
				
				$up=mysqli_query($connect,"UPDATE `labour` SET `status`='0' WHERE `id`='$lbrId'");
				header('location:success.php?id=' . $lbrId . '&from=' . $from . '&to=' . $to );
				
				
			}
			else 
			{
				echo "registration unsuccessfull!";
			}
			}
		}
		?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registration form</title>
	<link rel="stylesheet" href="book.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body  style=" background: linear-gradient(135deg, #71b7e6, #9b5b)";>
<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#f1').attr('min', maxDate);
	document.cookie="cdate="+maxDate;
});
</script>
<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#f2').attr('min', maxDate);
});
</script>
	<div class="center"  style=" background: linear-gradient(135deg, #9b5b, #71b7e6)";>
		<div clss="heading" style="text-align: center; font-size: 25px;font-weight: 500; position :relative;padding: 0 0 20px 0;">CONFIRMATION FORM</div><hr>	
		<form  action="<?php echo bookLabour(); ?>" method="POST" style="text-align:center;" >
			<br>
			<div class="d1">
				<div class="d2">
					<h6>Labour Id: LBR<?php echo $_GET['id'] ;?></h6>
				</div>	
				<div class="d2">
				<label>From:</label>
				<input type="text" id="f1" name="from" onfocus="(this.type='date')" required><br><br>
				</div>	
				<div class="d2">
				<label>To
					:</label>
					<input type="text" id="f2" name="to" onfocus="(this.type='date')"  placeholder="to" required>
					<br><br>
				</div>	
				
			</div>	<hr>
			
					<button type="submit" id="button" style="margin-right:30px;">confirm
					<button type="button" id="button" onclick="location.href='findworkers.php'" style="margin-left:30px;" >cancel
          <br><br>
					
			</form>	
			<?php
			
	?>
	</div>
	
</body>
	</html>
	