<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

  $db = new mysqli("localhost","root","568015as","movie");
  $db->set_charset("utf8");

  function mq($sql)
  {
    global $db;
    return $db->query($sql);
  }
?>

<!doctype html>
<style>
body{
    border: 0;
    padding: 0; 
    background-image: url('../movie41.jpg');
    background-position: center;
    background-size: 100% 100%;
    opacity: 0.9;
}
</style>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="board_area"> 
  <h1 style="color:red">영화게시판</h1>
  <h4 style="color:cyan">자유롭게 영화추천 하는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70" style="color:green">번호</th>
                <th width="500" style="color:blue">제목</th>
                <th width="120" style="color:purple">글쓴이</th>
                <th width="100" style="color:pink">작성일</th>
                <th width="100" style="color:yellow">조회수</th>
            </tr>
        </thead>
        <?php
          $sql = mq("SELECT * from board order by idx desc limit 0,5"); // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
            while($board = $sql->fetch_array())
            {
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]); //title이 30을 넘어서면 ...표시
              }
             
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href="read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="write.php"><button>글쓰기</button></a>
    </div>
 <div id="search_box">
    <form action="search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>

  </div>



  <br>
  <br>
  <hr>
  <center>
  <p style="color:red"> This place has many<mark> movie </mark><a href="http://www.piku.co.kr/w/rank/29bagn">Click! </a><br></p>
    <p style="color:pink">Do you search <mark>preview?</mark><a href="https://www.youtube.com/">You tube</a><br></p>
    <p style="color:blue"><b> Not <mark>registered</mark> yet? <a href="../registration.php"> Registeration </a></b></p>

    <br>
    
    <a href="http://www.cgv.co.kr/"><mark>CGV</mark></a><br>
    <a href="http://www.lottecinema.co.kr/LCHS/index.aspx"><mark> Lotte Cinema</mark></p></a>
    <a href="http://www.megabox.co.kr/"> <mark>Mega Box</mark></p></a><br>
   
      
    <b><a href="../admin_login.php"><p style="color:pink">Are you admin?</p></b></a>
    <b><a href="../login.php"><p style="color:cyan">Are you login?</p></b></a>
  </center>
</body>
</html>
