<?php
	$today = date("d-m-y");
	$connect = mysqli_connect("localhost","root","","Labour2");
	if($connect===false)
	{
		die("ERROR:could not connect"
			.mysqli_connect_error());
	}
	$nameERR = $addressERR =$phoneERR = $password = "";
$name = $address = $phone = $password = "";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(empty($_POST['name']))
    {
		echo "<br>";
    	$nameERR = "Name is required";
	}
	else
	{
		$name = input_data($_POST['name']);
		if(!preg_match("/^[a-zA-Z]*$/",$name))
		{
			$nameERR = "only alphabets and whitespaces are allowed";
		}
	}
	if(empty($_POST['address']))
    {
		echo "<br>";
    	$addressERR = "Adress is required";
	}
	if(empty($_POST['phone']))
    {
		echo "<br>";
    	$phoneERR = "phonenumber is required";
	}
	else
	{
		$phone = input_data($_POST['phone']);
		if(!preg_match("/[0-9]/",$phone))
		{
			$phoneERR = "only numbers are allowed";
		}
	}
	if(empty($_POST['gender']))
    {
		echo "<br>";
    	$addressERR = "Gender is required";
	}
	if(empty($_POST['worktype']))
    {
		echo "<br>";
    	$addressERR = "Worktype is required";
	}
}
function input_data($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if(isset($_REQUEST['name']) || isset($_REQUEST['day']) || isset($_REQUEST['address']) || isset($_REQUEST['phone']) || isset($_REQUEST['gender']) || isset($_REQUEST['worktype']) || isset($_REQUEST['workplace']) || isset($_REQUEST['password']) || isset($_REQUEST['abt']) || isset($_REQUEST['image']))
{
	   $name = $_REQUEST['name'];
	   $date1 = $_REQUEST['day'];
	   $address = $_REQUEST['address'];
	   $phone = $_REQUEST['phone'];
	   $gender = $_REQUEST['gender'];
	   $worktype = $_REQUEST['worktype'];
	   $workplace = $_REQUEST['workplace'];
	   $password = $_REQUEST['password'];
	   $abt = $_REQUEST['abt'];
		$image = time().$_FILES["image"]['name'];
	 if(move_uploaded_file($_FILES["image"]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/dataprogram/photolabour/'.$image))
		{
	   $sql = "INSERT INTO labour (name,date,address,phone,gender,worktype,workplace,password,abt,image) VALUES('$name','$date1','$address','$phone','$gender','$worktype','$workplace','$password','$abt','$image')";
	   if(mysqli_query($connect,$sql))
	   {
	   	echo "registration successfull!";
		header ('location:homepage.php');
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
	<link rel="stylesheet" href="owner.css">
	
</head>
<body>
	<div class="container">
		<div clss="heading" style="text-align: center; font-size: 25px;font-weight: 500; position :relative;padding: 0 0 20px 0;">REGISTRATION FORM</div><hr>	
		<form  action="#" method="POST" enctype="multipart/form-data" >
			<div class="d1">
				<div class="d2">
					<span class="d3"> Name</span>
					<input type="text" name="name" id="n" autocomplete="0ff" ><br>
					<span clas="error"><?php echo "$nameERR"; ?></span>
				</div>	
				<div class="d2">
					<span class="d3"> Date_of_birth</span>
					<input type="date" name="day"  autocomplete="0ff" ><br>
				</div>	
				<div class="d2">
					<span class="d3"> Address</span>
					<input type="text" name="address" autocomplete="0ff"  ><br>
					<span clas="error"><?php echo "$addressERR"; ?></span>
				</div>	
				<div class="d2">
					<span class="d3"> phone No.</span>
					<input type="text" name="phone" autocomplete="0ff" ><br>
					<span clas="error"><?php echo "$phoneERR"; ?></span>
				</div>	
				<div class="d2">
					<span class="d3"> Gender</span>
					<select name="gender" required> 
						<option value="male"> Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
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
					
				</div>
				<div class="d2">
					<span class="d3">working place</span>
					<input type="text" name="workplace" autocomplete="0ff" >
				</div>
				<div class="d2">
					<span class="d3">Password</span>
					<input type="password" name="password" autocomplete="0ff" >
				</div>	
				<div class="d2">
					<span class="d3">About work</span>
					<input type="text" name="abt" autocomplete="0ff" >
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
				<label>Already register?</lable>
                <a id="back" href="labourlogin.php" style="color:skyblue; font-size:20px">login here</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
				<label>Want to go back?</lable>
                <a href="homepage.php" style="color:skyblue; font-size:20px">Back to home</a><br><br>
			</form>	
	</div>
<body>
	</html>
	