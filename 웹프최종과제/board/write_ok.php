<?php
	include "db.php";

$date = date('Y-m-d');
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);


$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "upload/".$filename;
move_uploaded_file($tmpfile,$folder);

$tmpfile1 =  $_FILES['i_file']['tmp_name'];
$o_name1 = $_FILES['i_file']['name'];
$filename1 = iconv("UTF-8", "EUC-KR",$_FILES['i_file']['name']);
$folder1 = "upload/".$filename1;
move_uploaded_file($tmpfile1,$folder1);



$sql = mq("INSERT into board(name,pw,title,context,date,file,image) values('".$_POST['name']."','".$_POST['pw']."','".$_POST['title']."','".$_POST['content']."','".$date."','".$o_name."','".$o_name1."')"); ?>

<script type="text/javascript">alert("글쓰기 완료되었습니다.");</script>
<meta http-equiv="refresh" content="0; url=index1.php"/>



