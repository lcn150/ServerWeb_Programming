<?php
session_start();
if( !isset($_SESSION['login'])){
  header("Location: login.php");
}
?>
   <h2 style="color:blue">Welcome Content <?php echo $_SESSION['login'] ?> </h2>
  <table border="2" >
   <tr bgcolor="yellow" align="center">
    <th> id   </th>
    <th> name   </th>
    <th> password  </th>
    <th> E-mail   </th>
    <th> Thing  </th>
    <th> Birth   </th>
    <th> Food  </th>
    <th> Beverage  </th>
    <th> Ice   </th>
    <th> Bread   </th>
    <th> Location   </th>
    <th> Delete  </th>
   </tr> 

   <?php
    $con=mysqli_connect("localhost","root","568015as","movie");
    $username = $_SESSION['login'];
    $result = mysqli_query($con,"SELECT * FROM users1 where name = '$username'");

  while($row = mysqli_fetch_array($result)){
      $id = $row[0];
      $username = $row[1];
      $password = $row[2];
      $email = $row[3];
      $thing = $row[4];
      $birth = $row[5];
      $food = $row[6];
      $beverage = $row[7];
      $ice = $row[8];
      $bread = $row[9];
      $location = $row[10];
?>
 <tr>
    <td style="color:orange"> <?php echo $id; ?> </td>
    <td style="color:red"> <?=$username ?>  </td>
    <td style="color:green"> <?=$password ?>  </td>
    <td style="color:blue"> <?=$email ?>   </td>
    <td style="color:purple"> <?=$thing ?>  </td>
    <td style="color:orange"> <?=$birth ?>  </td>
    <td style="color:red"> <?=$food ?>   </td>
    <td style="color:pink"> <?=$beverage ?>  </td>
    <td style="color:cyan"> <?=$ice ?>  </td>
    <td style="color:yellow"> <?=$bread ?>   </td>
    <td style="color:green"> <?=$location ?>   </td>
    <td style="color:blue"> <a href="deleteme.php?del=<?=$id?>">Delete</a>   </td>
   
   </tr>
   <?php
   }
   ?>

<html>
<style>
body{
    border: 0;
    padding: 0; 
    background-image: url('movie9.jpg');
    background-position: center;
    background-size: 50% 100%;
    background-color:rgba(255,255,255,0.5);
}

</style>
<head>
  <title> Private Page </title>
</head>
<body>
    <h1 style="color:cyan"> Private Page</h1>
   
    <div class="container">
        <ul class ="list-group">
    <form method="post" class ="form-inline"action="file.php">  </ul> </form>
    </div>
   

  
  



    <hr>
    <b><a href="logout.php" style="color:red">  logout   </a><br>
     
      Do you want to modify?<a href="modify.php?mod=<?=$id?>" style="color:red">Modify</a><br>
      Let's go board!<a href="board/index1.php" style="color:red">Click</a>

</body>

</html>

