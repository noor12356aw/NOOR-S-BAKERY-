<?php
    $con = mysqli_connect("localhost", "root", "")
    or die("Could not connect to the server.<br>" .mysqli_connect_error());
    echo "Connected to the server.<br>";
    $dbR = mysqli_select_db($con, "pb")
    or die("Could not select the DB.<br>" .mysqli_error($con));
    echo "Connected to the DB<br>";
    mysqli_close($con);
    ?>