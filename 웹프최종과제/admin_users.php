
<html>



<style>
  table {
    width: 100%;
    border-top: 1px solid #444444;
    border-collapse: collapse;
  }
  th, td {
    border-bottom: 1px solid #444444;
    padding: 10px;
    text-align: center;
  }
  th:nth-child(2n), td:nth-child(2n) {
    background-color: #bbdefb;
  }
  th:nth-child(2n+1), td:nth-child(2n+1) {
    background-color: #e3f2fd;
  }
  h1 {
    font-style: italic ;  
    font-size: 1.5em;
  }
  body{
    border: 0;
    padding: 0; 
    background-image: url('movie7.jpg');
    background-position: center;
    background-size: 100% 100%;
    opacity: 0.6;
}
</style>
<h1 style="color:orange"> Admin Panel for user management</h1>
<table border="2" >
   <tr bgcolor="blue" align="center">

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
      <th> modify   </th>
   	<th> delete   </th>
   </tr>
   <?php
   $con = mysqli_connect('localhost','root','568015as','movie');
   $query = " SELECT * FROM users1";
   $result = mysqli_query($con, $query);
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
   	<td> <?php echo $id; ?> </td>
   	<td> <?=$username ?>  </td>
   	<td> <?=$password ?>  </td>
   	<td> <?=$email ?>   </td>
       <td> <?=$thing ?>  </td>
    <td> <?=$birth ?>  </td>
    <td> <?=$food ?>   </td>
    <td> <?=$beverage ?>  </td>
    <td> <?=$ice ?>  </td>
    <td> <?=$bread ?>   </td>
    <td> <?=$location ?>   </td>
   	<td> <a href="delete.php?del=<?=$id?>">delete</a>   </td>
      <td> <a href="modifyuser.php?mod=<?=$id?>">modify</a>   </td>
   </tr>
   <?php
   }
   ?>

</table>

<mark><a href="login.php">Are you user?</a></mark>


</html>