<?php
 include('connect.php');
	if(!isset($_SESSION['loggedinId']))
	{
		header('location:labourlogin.php');
	}
	if(isset($_SESSION))
	{
	if(isset($_REQUEST['submit']))
	{
		$name=$_REQUEST['name'];  
		$phone=$_REQUEST['phone'];  
		$worktype=$_REQUEST['worktype'];
		$workplace=$_REQUEST['workplace'];
		$abt=$_REQUEST['abt'];
		$image = time().$_FILES["image"]['name'];
	 if(move_uploaded_file($_FILES["image"]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/dataprogram/photolabour/'.$image))
		if((!empty($name)) && (!empty($phone)) && (!empty($worktype)) && (!empty($workplace)) && (!empty($abt)) && (!empty($image)))
		{
			$userId=$_SESSION['loggedinId'];
			$up=mysqli_query($db,"UPDATE `labour` SET `Name`='$name',`phone`='$phone',`worktype`='$worktype',`workplace`='$workplace',`abt`='$abt',`image`='$image' WHERE `id`='$userId'");

			header('location:labourprofile.php');
			exit;
		}
		else
		{
			header('location:labourupdate.php');
			exit;
		}
	}
	$userId=$_SESSION['loggedinId'];
	$query_run = mysqli_query($db,"SELECT * FROM `labour` where `id`='$userId'");
	$data=mysqli_fetch_assoc($query_run);
	}
	
    ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registration form</title>
	<link rel="stylesheet" href="labourupdate.css">
	
</head>
<body>
	<div class="container">
		<div clss="heading" style="text-align: center; font-size: 25px;font-weight: 500; position :relative;padding: 0 0 20px 0;">UPDATE YOUR PROFILE</div><hr>	
		<form  action="#" method="POST" enctype="multipart/form-data" >
			<div class="d1">
				<div class="d2">
					<span class="d3"> Name</span>
					<input type="text" value="<?php echo $data['Name']; ?>" name="name" id="n" autocomplete="0ff" ><br>
					<span clas="error"></span>
				</div>	
				
				<div class="d2">
					<span class="d3"> phone No.</span>
					<input type="text" value="<?php echo $data['phone']; ?>" name="phone" autocomplete="0ff" ><br>
					<span clas="error"></span>
				</div>	
				<div class="d2">
					<span class="d3"> Work</span>
					<select name="worktype" required>
						<option value="earth movers">Earth movers</option>
						<option value="construction workers">Construction workers</option>
						<option value="agricultural workers">Agricultural workers</option>
						<option value="carpenters">Carpenter</option>
						<option value="painters">Painter</option>
						<option value="repairers">Repairer</option>
						<option value="Other">Other workers</option>
		            </select>
					<span clas="error"></span>
				</div>
				<div class="d2">
					<span class="d3">working place</span>
					<input type="text" value="<?php echo $data['workplace']; ?>" name="workplace" autocomplete="0ff" >
				</div>	
				<div class="d2">
					<span class="d3">About work</span>
					<input type="text" value="<?php echo $data['abt']; ?>" name="abt" autocomplete="0ff" >
				</div>	
				<div class="d2">
					<span class="d3">choose image</span>
					<input type="file" name="image"  autocomplete="0ff" >
				</div>		
			</div>	<hr>
				<div class="button">
					<input type="submit" name="submit" value="submit">
				</div>
				<br>
				<label>Want to go back?</lable>
                <a href="homepage.php" style="color:black; font-size:20px">Back to home</a><br><br>
			</form>	
	</div>
<body>
	</html>
	