<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

$bno = $_GET['idx'];
$comment = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
	
if($bno && $_POST['dat_user'] && $_POST['dat_pw'] && $_POST['content']){
    $sql = mq("insert into comment(board_number,name,pw,content) values('".$bno."','".$_POST['dat_user']."','".$_POST['dat_pw']."','".$_POST['content']."')");
    $comment = $comment['comment'] + 1;
    $fet = mq("update board set comment = '".$comment."' where idx = '".$bno."'");
    echo "<script>alert('댓글이 작성되었습니다.'); 
    location.href='/read.php?idx=$bno';</script>";
}else{
    echo "<script>alert('댓글 작성에 실패했습니다.'); 
    history.back();</script>";
}
?>