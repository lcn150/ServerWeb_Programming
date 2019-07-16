<?php

$con = mysqli_connect('localhost','root','568015as','movie');

$delete_id = $_GET['mod'];

$query = "DELETE FROM users1 WHERE id='$delete_id' ";

if (mysqli_query($con, $query)){
  header("Location: modification.php");
}
?>

