<?php
error_reporting(0);

header("X-XSS-Protection: 1; mode=block");
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel_query_management_system";
$HandlerName = $_POST["TaskName"];
$SuccessMessage = "Good job the problem details have been deleted successfully.";
$error = 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit']))
        {
    if (empty($HandlerName))
  {
     exit('Field name is empty, Please go back and enter  values and click submit button.');
         
   
    
  }

$sql = "SELECT query FROM queries WHERE query='$HandlerName'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $field1name = $row["query"];
        
       
        
    }
} else {
    $error++;
    
    echo  "";

    
}
    
$sql = "DELETE FROM queries WHERE query='$HandlerName'";

if ($conn->query($sql) === TRUE) {
   
    
  echo "";
} else {
  echo "";
}

echo "<meta http-equiv='refresh' content='2'>";
}

$conn->close();
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
        <script src="buttons.js"></script>
        <style>


            
            .container{
                text-align: center;
                margin-top: 30px;
                width: 320px;
            }
            .margin{
                margin-top: 2px;
            }
            .centre{
                text-align: center;

            }
            .error{
                margin-top: 500px;
            }
            
     body {

         background-image: url(pictures/pexels-mike-1181772.jpg);
    background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
         
}

   


        .white{
    color:black;
    text-align: center;
            margin-top: 150px;
            
 
}
            .width{
                max-width: 500px;
                text-align: center;
                margin: auto;
            }
            
            


        
        
        </style>
    </head>
    <body>
<?php
    error_reporting(0);
if($_SESSION["username"]) {
?> 
        <?php
if($_SESSION["permission"]) {
?> 
        <strong style="color:white;">
        Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?>.  <button id="logout" onclick="myFunction()" class="btn btn-secondary" type="button">Logout</button></strong>
        <div class="white">
        <div class="container">
            <h1>Delete Problem</h1>
        <form method="post"  class="margin">
  <fieldset class="form-group">
    <strong><label for="TaskName">Query in Detail</label></strong>
    <input type="text" class="form-control centre" autocomplete="off" id="TaskName"  name="TaskName" value = "<?php if (array_key_exists('TaskName', $_POST)) {
    echo $_POST['TaskName']; 
    
 }
 ?>">
      
      
      
  </fieldset>
  
  
  <button type="submit" name="submit" class="btn btn-secondary"><strong>Submit</strong></button>
</form>
            
            
        
        
    </div>
            
            <?php 
              
              if ($field1name) {
                  
                  echo '<div class="alert alert-success width centre" role="alert">
  '.$SuccessMessage.'
</div>';
                  
            
                  
              }
            elseif ($error == 1){
                echo '<div class="alert alert-danger width centre" role="alert">Please Enter Valid Query
</div>';
            }
              
              ?>
            
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script> 
<?php
}else header("Location:status.php");
?>
<?php
}else header("Location:index.php");
?>
    </body>
</html>