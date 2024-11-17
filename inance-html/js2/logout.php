<?php
     session_start();
     $name = $_SESSION['var1'];
                 $conn = mysqli_connect("localhost","root","","labour2");
                 $query = "DELETE FROM owner where Name='$name'";
                 $query_run = mysqli_query($conn,$query);
                 $_SESSION['deleted successfully'];
                 header('location:homepage.php');

              ?>