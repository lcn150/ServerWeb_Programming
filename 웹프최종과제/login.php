<!DOCTYPE html>
<?php
session_start();

$con = mysqli_connect('localhost','root','568015as','movie');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($_POST['username'])) {
        echo "<script> alert('Please enter your name!')</script>";
        }
    if (empty($_POST['password'])) {
        echo "<script> alert('Please enter your password!')</script>";
        }
    
    $query = "SELECT name, pass FROM users1 WHERE name='$username' AND pass='$password' ";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_num_rows($result) > 0 ) {
            $_SESSION['login']=$username;
            header("Location: content.php");
    } else {
        echo "Wrong username or password !";
    }

}
?>
<html lang="en">
<style>
h2{
  font-size: 1.5em;
  font-style: italic ;  

}
body{
    border: 0;
    padding: 0; 
    background-image: url('movie45.jpg');
    background-position: center;
    background-size: 80%;
    opacity: 0.88;
    background-color:rgba(255,255,255,0.5);
}
</style>

<head>
   
    <title> Login Page </title> 
     <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>//ajax
function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>
<body>
<center>
     <div class ="container">
        <ul class="list-group">
            <li class="list-group-item list-group-item-success"><h2 style="color:blue"> Login</h2></li> 
    <form method="post" action="login.php" class="form-inline">
        <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-warning"> Username : </li></label>
             <input type="text" onkeyup="showHint(this.value)" class="form-control" name="username" placeholder="Enter username"></div>
             <p style="color:red">Suggestions: <span id="txtHint"></span></p>
        <div class="form-group">
           <label for="pwd"> <li class="list-group-item list-group-item-danger"> Password :</li></label>
           <input type="password" class="form-control" name="password"  placeholder="Enter password">
        </div>
        <br>
            <button type="submit" class="btn btn-default" name="submit" value="Login" > Login</button>
        
        </ul>
    </form>
</div>
   <p style="color:red"> This place has many<mark> movie </mark><a href="http://www.piku.co.kr/w/rank/29bagn">Click! </a><br></p>
    <p style="color:pink">Do you search <mark>preview?</mark><a href="https://www.youtube.com/">You tube</a><br></p>
    <p style="color:blue"><b> Not <mark>registered</mark> yet? <a href="registration.php"> Registeration </a></b></p>

    <br>
    
    <a href="http://www.cgv.co.kr/"><mark>CGV</mark></a><br>
    <a href="http://www.lottecinema.co.kr/LCHS/index.aspx"><mark> Lotte Cinema</mark></p></a>
    <a href="http://www.megabox.co.kr/"> <mark>Mega Box</mark></p></a><br>
   
      
    <b><a href="admin_login.php"><p style="color:cyan">Are you admin?</p></b></a>
</center>
</body>
</html>

 