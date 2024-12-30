
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cake.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https;//fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
</head>
<body>
    <section class="contact" id="contact">
        <div class="contact-info">
          <h2> Get In <span> Touch </span></h2>
          <p>  If you have a specefic occasion and want us to take care of hosting sweets ,
            or you want a special design of your choice, 
            Contact us and we will always serve you ! <br>
            Trust Us :)</p>
        
        <div class="list">
          <li> <a href="#">+961 76890654</a></li>
          <li> <a href="#">cakebakery@gmail.com</a></li>
          <li> <a href="#"> West Bekaa, Lebanon</a></li>
        </div>
            </div>
            <div class="contact-form">
        <form action="submit.php" method="post">
        <input type="text" placeholder="Name"  name="name" required>
        <input type="number" placeholder="Phone"  name="phone"required>
        <input type="email" placeholder="Email"name="email" required>
        <textarea  id="" cols="35" rows="10" placeholder="Message" name="message" required></textarea>
        <input type="submit" value="submit" name="submit" class="submit" required>
        <input type="reset" value="reset" class="reset" name="reset" >
        
        </form>
            </div>
          </section>
</body>
</html>


<?php
   /*$con = mysqli_connect("localhost", "root", "","pb")
    or die("Could not connect to the server.<br>" .mysqli_connect_error());
    echo "Connected to the server.<br>";
    $dbR = mysqli_select_db($con, "pb")
    or die("Could not select the DB.<br>" .mysqli_error($con));
    echo "Connected to the DB<br>";


 $name=$_POST['name'];
 $phone=$_POST['phone'];
 $email=$_POST['email'];
 $message=$_POST['message'];

extract($_POST);
if(isset($submit)){

  $sql = "INSERT INTO contact (name, phone, email, message) 
  VALUES ('$name', '$phone', '$email', '$message')";


 if(mysqli_query($con, $sql)) {
   echo '
           <h2>Submitted Successful!</h2>
   ';
} else {
 
   echo '
       <div 
           <p>There was an error while submitting your message.</p>
       </div>
   ';
}
}
 mysqli_close($con); 
*/
// Database connection
  

$con = mysqli_connect("localhost", "root", "", "pb")
    or die("Could not connect to the server.<br>" . mysqli_connect_error()); 

     
// Sanitize input to prevent SQL injection
$name = mysqli_real_escape_string($con, $_POST['name']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$message = mysqli_real_escape_string($con, $_POST['message']);

// Check if form was submitted
if (isset($_POST['submit'])) {
    // Insert query
    $sql = "INSERT INTO contact (name, phone, email, message) 
            VALUES ('$name', '$phone', '$email', '$message')";

    // Execute query and handle result
    if (mysqli_query($con, $sql)) {
        echo '<h2>Submitted Successfully!</h2>';
    } else {
        echo '<div>
                <p>There was an error while submitting your message: ' . mysqli_error($con) . '</p>
              </div>';
    }
}

// Close connection
mysqli_close($con);




 