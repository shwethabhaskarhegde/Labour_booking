<?php
                    $conn = mysqli_connect("localhost","root","","labour2");

                    $query = "SELECT * FROM labour where worktype='construction workers'";
                    $query_run = mysqli_query($conn,$query);
                    $fid=mysqli_fetch_assoc($query_run);
                    $sl = "SELECT * FROM labour where worktype='construction workers'";
                    $result = mysqli_query($conn,$sl);
                    $fid2=mysqli_fetch_assoc($result);
                    foreach($result as $row)
                    {                  
                    $labourid = $row['id'];
                        $laboursts = $row['status'];
                    } 
                    $sl2 = "SELECT * FROM labourbook";
                    $res = mysqli_query($conn,$sl2);
                    $fid4=mysqli_fetch_assoc($res);
                    foreach($res as $rw)
                    {                  
                    $todate = $rw['to'];
                    echo $todate;
                    
                    }
