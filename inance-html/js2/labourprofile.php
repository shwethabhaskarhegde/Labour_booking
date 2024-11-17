<?php 
    include('connect.php');
    $name = $_SESSION['variable1'];
    
   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="imageedit.css" >
    <title>IMAGE</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-info">
              <h4 class="text-white"> WELCOME <?php echo $name ?> </h4>
            </div>
            <div class="card-body">
              <?php
                
                
                 $userId=$_SESSION['loggedinId'];
                 $query_run = mysqli_query($db,"SELECT * FROM `labour` where `id`='$userId'");
                 $data=mysqli_fetch_assoc($query_run);

              ?>
              <tr>
              <a href="homepage.php" class="btn btn-info">Home </a>
              <a href="labourupdate.php" class="btn btn-info">Update your profile </a>
              <a href="logoutlabour.php" class="btn btn-info">Logout</a>
              <br><br>
            </tr>
              <table class="table">
                <thread>
                  <tr>
                   
                    <th> Name</th>
                    <th>Date_of_birth</th>
                    <th>Address</th>
                    <th>Phone no.</th>
                    <th> Gender</th>
                    <th>Work type</th>
                    <th>workplace</th>
                    <th>About work</th>
                  </tr>
                </thread>
                <tbody>
                  <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as  $row)
                        {
                          ?>
                         
                            <tr >
                             <img src="<?php echo "photolabour/".$data['image']; ?> " width="200px" height="200px" class="image" alt="image">
                            </tr>
                            <br><br><br><br><br><br><br><br><br>
                            <tr>
                            <td><?php echo $data['Name']?></td>
                            <td><?php echo $data['date']?></td>
                            <td><?php echo $data['address']?></td>
                            <td><?php echo $data['phone']?></td>
                            <td><?php echo $data['gender']?></td>
                            <td><?php echo $data['worktype']?></td>
                            <td><?php echo $data['workplace']?></td>
                            <td><?php echo $data['abt']?></td>
                          </tr>
                          
                          <?php
                        }
                    }
                    else
                    {
                      ?>
                       <tr>
                        <td> Workers not available</td>
                       </tr>
                      <?php
                    }
                  ?>
                  <tr>
                    <td>

                    </td>
                  </tr>
                </tbody>
             </table>
            </div>
          </div>
       </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>