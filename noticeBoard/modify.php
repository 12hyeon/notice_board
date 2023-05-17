<?php
include $_SERVER['DOCUMENT_ROOT']."./db.php";
$rno = $_POST['rno'];
$sql = mq("select * from board where idx='$rno';");
$board = $sql->fetch_array();
$pwk = $_POST['pw'];
$bpw = $board['pw'];
if($pwk==$bpw) {
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="index.css">
<title>게시판</title>
<style>
    #board_write {
        width:900px;
        position:relative;
        margin: 200px auto;padding: 100px;background-color: #a5a8c742;border-radius: 5px;
    }

#write_area {
margin-top:70px;
font-size:14px;}

#in_name {
margin-top:30px;
}

#in_name textarea {
font-weight:bold;
font-size:30px;
color:#333;
width: 900px;
border:none;
resize: none;
}

#in_title {
margin-top:30px;
}

#in_title textarea {
font-weight:bold;
font-size:26px;
color:#333;
width: 900px;
border:none;
resize: none;
}

.wi_line {
border:solid 1px lightgray;
margin-top:10px;
}

#in_content {
margin-top:10px;
}

#in_content textarea {
font:18px;
color:#333;
width: 900px;
height: 400px;
resize: none;
}

#in_pw input {
font:14px;
margin-top:10px;
margin-left: 0;
text-align: center;
}

.bt_se {
margin-top:20px;
text-align:center;
}

.bt_se button {
width:100px;
height:30px;
}

.bt_se button:hover {
color: rgb(238, 52, 123);
transform: scale(1.2);
}

#utitle, #uname {
border-radius: 5px;
}

</style>
</head>
<body>
<header class="bar">
    <div class="home">
      <a href="/index.php"><img src="/image/4STUP_log.png" alt="4STUP_logo" style="margin-left: 50px;"></a>
      <a class="homepage" href="/index.php">4STUP: Mobile Lab</a>
    </div>

    <div class="menu">
      <a href="/main.php"><strong>익명게시판</strong></a>
    </div>

    <div class="search_bar">
      <form action="/search_result.php" method="get">
        <select name="catgo">
          <option value="title">제목</option>
          <!-- <option value="name">글쓴이</option>dmdmw -->
          <option value="content">내용</option>
        </select>
        <input type="text" name="search" required="required"> <button class="search_btn">검색</button>
      </form>
    </div>
  </header>
<br>
<div id="board_write">
<h1><a href="/main.php"><span style="margin-left: 0; font-size: 36px; background: #F9F7F6; border-left: 0.5em solid #0800ff70; padding: 0.5em;">자유게시판</span></a></h1>
<br>
<h4 style="margin: 0 auto;">게시글을 수정합니다.</h4>
<div id="write_area">
<form action="modify_ok.php?idx=<?php echo $rno; ?>" method="post">
<div id="in_title">
<textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
</div>
<div class="wi_line"></div>
<div id="in_name">
<textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
</div>
<div class="wi_line"></div>
<div id="in_content">
<textarea name="content" id="ucontent" placeholder="내용" required style="font-size: 24px;"><?php echo $board['content']; ?></textarea>
</div>
<div class="bt_se">
<button type="submit">저장</button>
</div>
</form>
</div>
</div>

<footer>
<div>
<a href="https://www.dankook.ac.kr/web/kor"><img src="../image/Dankook_logo.png" alt="단국대 메인사이트"></a>
</div>
<div>
Addr. 경기 용인시 수지구 죽전로 152 - 단국대학교(죽전캠퍼스) 미디어센터 501호 (모바일인터넷콘텐츠실습실) 4STUP <br>

TEL. 010-8981-7182 <br>

Email. wnstj0810@naver.com <br>

COPYRIGHTⓒ 2022. DanKook&amp;Mobile Lab:4STUP. ALL RIGHTS RESERVED.

</div>
</footer>

<?php
}else{ ?>
<script type="text/javascript">alert('비밀번호가 틀립니다');history.back();</script>
<?php } ?>

<script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>
</body>
</html>