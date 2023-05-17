<?php include  $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>익명게시판 메인</title>
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

  <div class="board">
    <ul>
      <div class="table_bgbox">
        <h1 style="margin-left: 15%; font-size: 50px;">🔥최근 게시물🔥</h1>
        <table>
          <thead>
            <tr class="table-head">
              <th class="column1">관련태그</th>
              <th class="column2">제목</th>
              <th class="column3">날짜</th>
              <th class="column4">조회수</th>
              <th class="column5">댓글수</th>
            </tr>
          </thead>
          <?php
            // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
            $sql = mq("select * from board order by idx desc limit 0,10"); 
            while($board = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"]; 
              $tag_kor=$board["tag"];
              if($tag_kor=='humor'){
                $tag_kor='유머';
              }else if($tag_kor=='food'){
                $tag_kor='맛집';
              }else if($tag_kor=='talk'){
                $tag_kor='잡담';
              }
          ?>
          <tbody>
          <tr>
            <td width="100"><?php echo $tag_kor; ?></td>
            <td width="500"><a href="read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
            <td width="100"><?php echo $board['date']?></td>
            <td width="50"><?php echo $board['hit']; ?></td>
            <td width="50"><?php echo $board['comment']?></td>
          </tr>
          </tbody>
        <?php } ?>
        </table>
        <br>
        <div>
          <button class="wr_btn">
            <a href="write.php">글쓰기 <i class="fas fa-pencil-alt fa-1x"></i></a>
          </button>
        </div>
        <br>
      </div>
    </ul>
	</div>
    
  <footer>
        <div>
            <a href="https://www.dankook.ac.kr/web/kor"><img src="../image/Dankook_logo.png" alt="단국대 메인사이트"></a>
        </div>
        <div>
            Addr. 경기 용인시 수지구 죽전로 152 - 단국대학교(죽전캠퍼스) 미디어센터 501호 (모바일인터넷콘텐츠실습실) 4STUP <br>
            TEL. 010-6269-8441 <br>
            Email. wnstj0810@naver.com <br>
            COPYRIGHTⓒ 2022. DanKook&amp;Mobile Lab:4STUP. ALL RIGHTS RESERVED.
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>
</body>
</html>