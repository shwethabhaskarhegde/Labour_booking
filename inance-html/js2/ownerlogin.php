<?php
session_start();
?>
<html>
<head>
   <link rel="stylesheet" href="ownerlogin.css">
</head>
<body style=" background: linear-gradient(135deg, #71b7e6, #9b5b)";>
    <div class="center" style="background: linear-gradient(135deg, #9b5b, #71b7e6)";>
        <h1 align="center">LOGIN</h1>
        <form action="#" method="POST" autocomplete="off" style="text-align:center;" >
            <div class="form">
                <input type="text" name="username" class="textfiled" placeholder="username"><br><br>
                <input type="text" name="password" class="textfiled" placeholder="password"><br><br>
                <input type="submit" name="login" vlaue="login" id="btn" ><br><br><hr>
                <a href="forgotpassword.php">Forgot password?</a><br><br>
                <label>Not register?</lable>
                <a href="ownerregestration.php">Register here</a><br><br>
</div>
</form>
                
</html>
<?php
$conn = mysqli_connect("localhost","root","","Labour2");
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['var1']= "$username";
    $_SESSION['var2'] = "$password";
    $query = "select * from owner where name = '$username' && password = '$password' ";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    if($total==1)
    {
        $rt=mysqli_fetch_assoc($data);
        $userid=$rt['id'];
        $_SESSION['loginId']=$userid;
       header('location:ownerprofile.php');
    }
    else
        echo "incorrect password";

}
if(isset($_REQUEST['username']) || isset($_REQUEST['password']))
{
	   $name = $_REQUEST['username']; 
	   $password = $_REQUEST['password'];
	   $sql = "INSERT INTO ownerlogin (oname,password) VALUES('$name','$password')";
	   if(mysqli_query($conn,$sql))
	   {
	
	   }
	   else
	   {
	   	echo "login unsuccessfull!";
	   }
	}

?>
