<?php

include $_SERVER['DOCUMENT_ROOT']."/db.php";

//각 변수에 write.php에서 input name값 저장
$username = $_POST['name'];
$userpw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
$tag = $_POST['tag'];

$mqq = mq("alter table board auto_increment =1"); //auto_increment 값 초기화

if($username && $userpw && $title && $content && $tag){
    $sql = mq("insert into board(name,pw,title,content,date,tag) values('".$username."','".$userpw."','".$title."','".$content."','".$date."','".$tag."')");
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>