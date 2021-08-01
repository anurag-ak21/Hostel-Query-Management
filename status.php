<?php
header("X-XSS-Protection: 1; mode=block");
session_start();
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
    

.white{
    color: white;
    text-align: center;
    margin-top: 10px;
 
}
    .butt{
        text-align: center;
    margin-top: 10px;
    }
    
    body {
        background-image: url(pictures/pexels-pixabay-357514.jpg);
    background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
        
}


    
            .width{
                max-width: 650px;
                text-align: center;
                margin: auto;
                margin-top: 20px;
            }
    .centre{
        margin-top: 270px;
    }
         
    .pad{
        padding-top: 20px;
    }
    
</style>
</head>
<body>
<?php
    error_reporting(0);
if($_SESSION["username"]) {
?> 
    <strong style="color:white;">
        Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?>.  <button id="logout" onclick="myFunction()" class="btn btn-secondary" type="button">Logout</button>
    
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel_query_management_system";
$error="There is nothing to show.<hr>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, date, query FROM queries ORDER BY date";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $field1name = $row["username"];
        $field2name = $row["date"];
        $field3name = $row["query"];
        $print = "<br>Username : ". $field1name. " || Dated : ". $field2name. " || Problem Description : " . $field3name ."</br><hr>";
        

        
        
        echo  '<div class="alert alert-success pad width" role="alert">
  '.$print.'
</div>';
        
    }
} else {
    
    
    echo  '<div class="alert alert-danger pad width" role="alert">
  '.$error.'
</div>';
    
}

$conn->close();
?>

    
    
    <div class="container white"> 
    <button id="delete" onclick="mynewestFunction3()" class="btn btn-secondary butt"><strong>Delete Queries</strong></button>
         <button id="update" onclick="mynewestFunction4()" class="btn btn-secondary butt"><strong>Update Queries</strong></button>
   
        </div>
<?php
}else header("Location:index.php");
?>
    </strong>
</body>
</html>