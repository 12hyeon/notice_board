<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";
	
	$rno = $_POST['rno']; // 게시글 번호
	$sql3 = mq("select * from board where idx='$rno';");
    $board = $sql3->fetch_array();

	$pwk = $_POST['pw'];
    $bpw = $board['pw'];

	if($pwk==$bpw){
	    $sql = mq("delete from board where idx='$rno';");
	    $sql2 = mq("delete from comment where board_number='".$rno."' order by idx");
		?>
		<script type="text/javascript">alert("삭제되었습니다.");</script>
		<meta http-equiv="refresh" content="0 url=/" />
		<?php
	} else{ ?>
	<script type="text/javascript">alert('비밀번호가 틀립니다');history.back();</script>
	<?php } ?>

