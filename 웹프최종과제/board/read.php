<?php
	include "db.php"; /* db load */
?>
<!doctype html>
<style>
body{
    border: 0;
    padding: 0; 
    background-image: url('../movie22.jpg');
    background-position: center;
    background-size: 100% 100%;
    opacity: 1;
}
</style>
<head>
<meta charset="UTF-8">
<title>영화 게시판</title>
<link rel="stylesheet" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="style2.css" />
<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.js"></script>
<script type="text/javascript" src="common.js"></script>
</head>
<body>
	<?php
	    $bno = $_GET['idx'];
		$hit = mysqli_fetch_array(mq("SELECT * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("UPDATE board set hit = '".$hit."' WHERE idx = '".$bno."'");
		$sql = mq("SELECT * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2 style="color:cyan"><?php echo $board['title']; ?></h2>
		<div style="color:red" id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div style="color:yellow"id="bo_content">
				<?php echo nl2br("$board[context]"); ?>
			</div>
			<div style="color:orange">
            파일 : <a href="upload/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
            </div>

              <div style="color:pink">
             이미지 : <a href="upload/<?php echo $board['image'];?>" download><?php echo $board['image']; ?></a>
            </div>

	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="index1.php">[목록으로]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>
	</div>

	<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>댓글목록</h3>
		<?php
			$sql3 = mq("SELECT * from reply where con_num='".$bno."' order by rdx desc");
			while($reply = $sql3->fetch_array()){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="rep_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['rdx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['rdx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
				 </form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="index1.php" method="post" class="reply_form">
			<input type="hidden" name="bno" value="<?php echo $bno; ?>">
			<input type="text" name="dat_user" id="dat_user" size="15" placeholder="아이디">
			<input type="password" name="dat_pw" id="dat_pw" size="15" placeholder="비밀번호">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button type="submit" id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>
</div>
</body>
</html>
