<?php
header("X-XSS-Protection: 1; mode=block");
session_start();

?>


<html>
<head>
<title>Hostel Query Management System</title> 
    <meta name="description" content="Here is the web application to manage the files completely hassle free.">
  <meta name="author" content="Anshumaan Singh">
    <link rel = "icon" href="pictures/favicon.png" type = "image/x-icon"> 
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">  
            <script src="buttons.js"></script>
<style>
    body {
  background-image:url(pictures/1519797304524.jpg);
    
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
    .container{
text-align: center;
margin-top: 100px;
width: 900px;
}
.margin{
margin-top: 60px;
}
.centre{
text-align: center;
}  
    
    .margin1{
        margin-top: 180px;
    }
    
   
.white{
    color:white; 
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
   
    <div class="container">
  <div class="row">
    <div class="col-sm-12">
<h1 class="white margin">Hostel Query Management System</h1>
<div class="container margin1"> 
    <button id="Upload" onclick="mynewestFunction()" class="btn btn-secondary">Upload Problem</button>
    <button id="View" onclick="mynewestFunction2()" class="btn btn-secondary">Problem Report</button>
        </div>
    </div>
    </div>
    </div>
</strong>
    
    
<?php
}else header("Location:index.php");
?>
</body>
</html>

