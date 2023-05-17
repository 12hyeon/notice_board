<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

$rno = $_POST['rno'];//댓글번호
$sql = mq("select * from comment where idx='".$rno."'");//comment 테이블에서 idx가 rno변수에 저장된 값을 찾음
$comment = $sql->fetch_array();

$bno = $_POST['b_no'];//게시글 번호
$sql2 = mq("select * from board where idx='".$bno."'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$board_com = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));

$pwk = $_POST['pw'];
$bpw = $comment['pw'];

if($pwk==$bpw) 
	{
		$board_com = $board_com['comment'] -1;
		$fet = mq("update board set comment = '".$board_com."' where idx = '".$bno."'");
		$sql = mq("delete from comment where idx='".$rno."'"); ?>
	<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.replace("read.php?idx=<?php echo $board["idx"]; ?>");</script>
	<?php 
	}else{ ?>
		<script type="text/javascript">alert('비밀번호가 틀립니다');history.back();</script>
	<?php } ?>