<!DOCTYPE html>
<?php

session_start();

$con = mysqli_connect('localhost','root','568015as','movie');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $thing = $_POST['thing'];
    $birth = $_POST['birth'];
    $food = $_POST['food'];
    $beverage = $_POST['beverage'];
    $ice = $_POST['ice'];
    $bread = $_POST['bread'];
    $location = $_POST['location'];

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) ||empty($_POST['thing']) ||empty($_POST['birth']) ||empty($_POST['food']) || empty($_POST['beverage']) ||empty($_POST['ice'])|| empty($_POST['bread']) || empty($_POST['location'])) {
    echo "<script> alert('Please enter all required field!')</script>";
} else {
    $query = "SELECT * FROM users1 WHERE name='$username' OR email='$email' ";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_num_rows($result) > 0 ) {
        header("Location: registration.php?MSG=Username:$username or E-mail:$email is already exist, please use another one!");
    } else {
        $query = "INSERT INTO users1 (name, pass, email, thing, birth, food, beverage, ice, bread,location) VALUES ('$username','$password','$email','$thing','$birth','$food','$beverage','$ice','$bread','$location')";
        if (mysqli_query($con,$query)) {
            $_SESSION['login']=$username;
            header("Location: content.php");
            }        
    }
}
}

?>

<html>

<style>
h2{
  font-size: 1.5em;
  font-style: italic ;  

}
body{
    border: 0;
    padding: 0; 
    background-image: url('movie32.jpg');
    background-position: center;
    background-size: 90%;
    opacity: 0.9;
    background-color:rgba(255,255,255,0.5);
}
</style>
<head>
    <title> Reistration Page </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
      if( isset($_GET['MSG'])){
	     echo $_GET['MSG'];
       }

	?>
<center>
    <div class="container">
        <ul class ="list-group">
    <li class="list-group-item list-group-item-info"><h2 style="color:red"> Registration</h2></li>
    <form method="post" class ="form-inline"action="registration.php">
    <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-success" width="20" height="10"> Username : </li> </label> 
            <input type="text" class="form-control" name="username" placeholder="Enter username"> </div>
        <div class="form-group">
             <label for="pwd"> <li class="list-group-item list-group-item-warning"> Password : </li> </label>
            <input type="password" class="form-control" name="password" placeholder="Enter password"> </div>
        <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-danger">E-mail </li> </label> 
            <input type="text" class="form-control" name="email" placeholder="Enter email"> </div>
<br>
           <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-success"> Thing </li> </label> 
            <input type="text" class="form-control" name="thing" placeholder="Enter thing"> </div>

            <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-warning">Birth </li> </label> 
            <input type="password" class="form-control" name="birth" placeholder="Enter birth"> </div>

            <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-danger">Food </li> </label> 
            <input type="text" class="form-control" name="food" placeholder="Enter food"> </div>
<br>

          <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-success">beverage </li> </label> 
            <input type="text" class="form-control" name="beverage" placeholder="Enter beverage"> </div>

            <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-warning">Ice Cream </li> </label> 
            <input type="text" class="form-control" name="ice" placeholder="Enter ice"> </div>

            <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-danger">Bread </li> </label> 
            <input type="text" class="form-control" name="bread" placeholder="Enter bread"> </div>
<br>
           <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-warning">Location </li> </label> 
            <input type="text" class="form-control" name="location" placeholder="Enter location"> </div>
        <br>
            <button type="submit" class="btn btn-default" name="submit" value="Registration" > Submit</button>
        </ul>
    </form>
    </div>
    <p style="color:red"> This place has many<mark> movie </mark><a href="http://www.piku.co.kr/w/rank/29bagn">Click! </a><br></p>
     <p style="color:pink">Do you search <mark>preview?</mark><a href="https://www.youtube.com/">You tube</a><br></p>
    <a href="http://www.cgv.co.kr/"><b>CGV</b></a><br>
    <a href="http://www.lottecinema.co.kr/LCHS/index.aspx"><b>Lotte Cinema</b></a><br>
    <a href="http://www.megabox.co.kr/"><b>Mega Box</b></a><br>
   
<br>
    <b><a href="login.php">Do you want Login?</a></b><br>

</center>
</body>
</html>


