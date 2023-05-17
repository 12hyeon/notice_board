<?php 
  include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="index.css">
<title>게시판</title>
<style>
    .fo_re {
      font-weight: bold;
      color:red;
      margin-left: 15px; 
    }
    #search_box {
      margin-top:30px;
      text-align: center;
    }
    #search_box2 {
      text-align: center;
      margin-top: 30px;
    }
    #h_pos {
        vertical-align:middle;
        text-align: center;
        /* display:table-cell;
        width: 500px;  */
    }
    #point {
      border-radius: 10px;
      background-color: lightcoral;
      padding: 0px 5px;
    }
    tr:hover {
      background-color: lightgray;
    }
    th tr:hover {
      background-color: none;
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
          <option value="content">내용</option>
        </select>
        <input type="text" name="search" required="required"> <button class="search_btn">검색</button>
      </form>
    </div>
  </header>

  <div class="board">
    <ul>
      <div class="table_bgbox">
        <?php
          /* 검색 변수 */
          $category = $_GET['catgo'];
          $category_kor = $_GET['catgo'];
          $search_con = $_GET['search'];

          if($category_kor=='title'){
            $category_kor='제목';
          }
          else if($category_kor=='content'){
            $category_kor='내용';
          }
        ?>
        <div id="h_pos">
            <span style="font-size: 30px;"><strong><?php echo $category_kor; ?>에서 '  <span id="point"><?php echo $search_con; ?></span> '검색결과</strong></span>
            <span style="margin-left: 10px; font-size: 20px;"><a href="/"> [홈으로]</a></span>
        </div>
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
            $sql2 = mq("select * from board where $category like '%$search_con%' order by idx desc");
            
            while($board = $sql2->fetch_array()){
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
            <td width="500">
            <?php {  ?>
              <a href="/read.php?idx=<?php echo $board["idx"]; ?>" style="border-radius: 10px; padding: 3px 7px; background-color: lightpink;"><?php echo $title; }?></a></td>
            <td width="100"><?php echo $board['date']?></td>
            <td width="50"><?php echo $board['hit']; ?></td>
            <td width="50"><?php echo $board['comment']; ?></td>
          </tr>
          </tbody>
        <?php } ?>
        </table>
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

</body>
</html>
