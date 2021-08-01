<?php
header("X-XSS-Protection: 1; mode=block");

session_start();
error_reporting(0);



$uname = $_POST['uname'];
$pass = $_POST['pass'];

// Create connection
/*$conn = mysqli_connect('localhost', 'root', '','infosec');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}*/




$db_connection = mysqli_connect("localhost", "root", "", "hostel_query_management_system");
		$username = htmlspecialchars(strip_tags(mysqli_real_escape_string($db_connection, $uname)));
		$password = htmlspecialchars(strip_tags(mysqli_real_escape_string($db_connection, $pass)));
		$query = "SELECT * FROM details WHERE username = '" . $username. "' AND password = '" . $password . "'"; 



//$sql="SELECT * FROM details where username='$uname' AND password='$pass' ";
$result = mysqli_query($db_connection,$query);
$row = mysqli_fetch_array($result);

    
if(is_array($row)) {
$_SESSION["username"] = $row['username'];
$_SESSION["permission"] = $row['permission'];

} 
else {
$msg = "Invalid Username or Password!";
}

if(isset($_SESSION["username"])) {
header("Location:report.php");
}



/*if(isset($check)){
    $msg = 'Login Complete! Thanks';
    echo "<script> window.location.assign('Online_BI_Report.php'); </script>";
    
    
    
}
else{
    $msg = 'Login Failed!<br /> Please make sure that you enter the correct  details and that you have activated your account.';
    
}


*/

?>


<html>
    <head>
        <title>Hostel Query Management System</title>
        
<link rel = "icon" href="pictures/favicon.png"
        type = "image/x-icon"> 
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous"> 

        <style>
            body {
  background-image:url(pictures/full-0.jpg);
    
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
            
            .container{
                text-align: center;
                margin-top: 200px;
                width: 350px;
            }
            .margin{
                margin-top: 20px;
            }
            .centre{
                text-align: center;
            }
        
        
        
        </style>
    </head>
    <body>
        <div class="container">
            <strong><h1>Login Gateway</h1></strong>
        <form method="post"  class="margin" autocomplete="off">
  <fieldset class="form-group">
      <label for="uname"><strong>Enter the UserName</strong></label>
    <input type="text" class="form-control centre" id="city"  name="uname"  value = "<?php if (array_key_exists('uname', $_POST)) {
    echo $_POST['uname']; 
    
 }
 ?>">
      <label for="pass"><strong>Enter the Password</strong></label>
    <input type="password" class="form-control centre" id="city"  name="pass"  value = "<?php if (array_key_exists('pass', $_POST)) {
    echo $_POST['pass'];
}
                                                                                    
?>">
                                                                                        
      
  </fieldset>
  
  
            <button type="submit" class="btn btn-tertiary"><strong>Submit</strong></button>
</form>
        
        
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script> 
    </body>
</html>