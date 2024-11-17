<?php
session_start();
?>
<html>
<head>
   <link rel="stylesheet" href="ownerlogin1.css">
</head>
<body>
    <div class="center">
        <h1 align="center">LOGIN</h1>
        <form action="#" method="POST" autocomplete="off" style="text-align:center;" >
            <div class="form">
                <input type="text" name="username" class="textfiled" placeholder="username"><br><br>
                <input type="text" name="phoneno" class="textfiled" placeholder="phoneno"><br><br>
                <input type="submit" name="login" vlaue="login" id="btn" ><br><br><hr>
                <br><br>
</div>
</form>
                
</html>
<?php
$conn = mysqli_connect("localhost","root","","Labour2");
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $phoneno = $_POST['phoneno'];
    $_SESSION['var1']= "$username";
    
    $query = "select * from owner where Name = '$username' && phone = '$phoneno' ";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    if($total==1)
    {
       header('location:ownerprofile.php');
    }
    else
        echo "incorrect password";

}


?>
