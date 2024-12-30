 <?php $con = mysqli_connect("localhost", "root", "")
    or die("Could not connect to the server.<br>" .mysqli_connect_error());
    echo "Connected to the server.<br>";
    $dbR = mysqli_select_db($con, "pb")
    or die("Could not select the DB.<br>" .mysqli_error($con));
    echo "Connected to the DB<br>";


      //trying to Insert Data 
      /*
$dbI=mysqli_query($con,"INSERT into contact values ('rami','70883080','hsami@gmail.com','hi')" )
or die("could not insert into table".mysqli_error($con));
echo"Successfully added".mysqli_info($con)."  records<br>";
echo"Successfully inserted".mysqli_affected_rows($con)."  records<br>";
*/



//update Record
$dbU=mysqli_query($con,"UPDATE contact set phone='71220599' where NAME='ali'");
echo"Successfully Updated <br> ".mysqli_info($con);

//delete record
$dbD=mysqli_query($con,"DELETE from contact where NAME='ali'");
echo" <br>Succssesfully Deleted".mysqli_info($con);
mysqli_close($con);
   ?>