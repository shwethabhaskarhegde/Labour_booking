<?php
                 $lid = $_GET['id'];
                 $conn = mysqli_connect("localhost","root","","labour2");
                 $query = "SELECT * FROM labour where id ='$lid'";
                 $query_run = mysqli_query($conn,$query);
                 $fid=mysqli_fetch_assoc($query_run);
                 if(mysqli_num_rows($query_run) > 0)
                 {
                     foreach($query_run as  $row)
                     {
                         $ln = $row['Name'];
                         $phone = $row['phone'];

                     }
                    }
              ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Presentable</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="success.css" type="text/css" />
</head>
<body class="center">
    <h1>Congratulation !!!</h1>
    <h1 style="font-size:25px";> Your booking for labour LBR<?php echo $_GET['id']?> from <?php echo $_GET['from']?> to <?php echo $_GET['to']?> is confirmed! </h1>
    <h1 style="font-size:25px";>For further details cantact<br><?php echo $ln ?><br><?php echo $phone ?></h1>
    <button type="button" id="button" onclick="location.href='homepage.php'" >Back to home page
</body>
</html>