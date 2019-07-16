<!DOCTYPE html>
<html>


<body>
<h1> Name : 이 충 헌 (1594029)</h1>
  <h2> Problem 1</h2>
   <?php
    echo "<p>"."<a href='http://php.net/'>"."PHP Programming"."</a>"."</p>";
    echo"<hr>";
   ?>
  <h2> Problem 2</h2>
   <?php
    echo substr("jun@hansung.ac.kr",0,strpos("jun@hansung.ac.kr","@"))."<br>";
    echo "<hr>";
   ?>
  <h2> Problem 3</h2>
   <?php
   $body = "072506";
   echo substr(chunk_split($body,2,":"),0,8);
   echo "<hr>";
   ?>

   <h2> Problem 4</h2>
   <?php
     $numbers = range(1, 60);
     shuffle($numbers);
     echo "Lotto Winning Numbers : ";
     for($x=1; $x<=6; $x++) {
      echo "$numbers[$x], ";
    }
    echo "<hr>";
   ?>

<h2> Problem 5</h2>
<?php
$x=6; 
while($x>=1)
  {
  echo "<h$x>"."Heading $x example."."</h$x>". "<br>";
  $x--;
  } 
?>
<?php 
$x=6; 
do
  {
  echo "<h$x>"."Heading $x example."."</h$x>". "<br>";
  $x--;
  }
while ($x>=1)
?>
<?php 
for ($x=6; $x>=1; $x--)
  {
  echo "<h$x>"."Heading $x example."."</h$x>". "<br>";
  } 
  echo "<hr>";
?>


<h2> Problem 6</h2>
<table border='1' width='1500'>
    <?php
       for($i=1; $i<=3; $i++){
          for($a=1; $a<=5; $a++){
             echo"<td>{$i} row - {$a} column</td>";
      }
      echo"</tr>";
    }
    echo"<hr>";
    ?>
  </table>


<h2> Problem 7</h2>
<table border='1' width='1000'>
    <?php
    for($i=1; $i<=9; $i++){
      for($a=1; $a<=9; $a++){
           $total = $i*$a;
           echo"<td>{$i}*{$a}=$total</td>";
      }
      echo"</tr>";
    }
    echo"<hr>";
    ?>
</table>

<h2> Problem 8</h2>
<?php
$midterm=array("Kim"=>"98","Lee"=>"34","Park"=>"55","Choi"=>"22","Jung"=>"45","Den"=>"77","Shin"=>"82","Won"=>"14","Pin"=>"64","Choong"=>"59");
arsort($midterm);
foreach($midterm as $x=>$x_value)
  {
  echo "Student ". $x ."'s score is " . $x_value;
  echo "<br>";
  }
  echo "<hr>";
?>

<h2> Problem 9</h2>
<?php
function recursive($x){
  if($x==1)
    return 1;
  else
    return $x * recursive($x-1);
}
echo recursive(5)."<br>";
echo"<hr>";
?>

<h2> Problem 10</h2>
<?php
function isPrime($x) {
    for ($i= 2; $i < $x; $i++) {
        if (($x % $i) == 0) {  
            return 0;
        }
    }
    return 1;
}
echo isPrime(6);

?>


</body>
</html>
