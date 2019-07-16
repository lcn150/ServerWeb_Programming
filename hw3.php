<!DOCTYPE html>
<html>
<body>
<h2> Problem 1</h2>
<?php

$startdate=mktime(11, 14, 54, 9, 3, 2018);
$enddate=strtotime("+15 weeks", $startdate);
echo "My web Programming class"."<br>";
while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}
echo "<br>";
echo"<hr>";
?>

<h2> Problem 2</h2>

<?php
$d1=strtotime("April 19");
$d2=ceil(($d1-time())/60/60/24);
echo "My birthday countdown D" . $d2 ."<br>";
echo"<hr>";
?>

<h2> Problem 3</h2>

<?php
date_default_timezone_set("America/New_York");
echo "The New_York time is " . date("h:i:sa")."<br>";

date_default_timezone_set("Asia/Seoul");
echo "The Seoul time is " . date("h:i:sa")."<br>";

date_default_timezone_set("Africa/Cairo");
echo "The Cairo time is " . date("h:i:sa")."<br>";

date_default_timezone_set("Australia/Sydney");
echo "The Sydney time is " . date("h:i:sa")."<br>";
?>




</body>
</html>