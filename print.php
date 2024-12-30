<?php
  
  $con = mysqli_connect("localhost", "root", "")
  or die("Could not connect to the server.<br>" .mysqli_connect_error());
  echo "Connected to the server.<br>";
  $dbR = mysqli_select_db($con, "pb")
  or die("Could not select the DB.<br>" .mysqli_error($con));
  echo "Connected to the DB<br>";


     //Print Data
    
     $dbP = mysqli_query($con, "select * from contact")
     or die("Could not find the table. " .mysqli_error($con));
     echo "<table width='50%' border='1'>";
     echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Message</th></tr>";
     while ($row = mysqli_fetch_array($dbP))
     {
         echo "<tr><td>{$row["Name"]}</td>";
         echo "<td>{$row["Phone"]}</td>";
         echo "<td>{$row["Email"]}</td>";
         echo "<td>{$row["Message"]}</td>";
     }
     echo "</table><br><br>";
    ?>