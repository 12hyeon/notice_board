<?php include $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="index.css">
<title>게시판</title>
<style>
    a {
    text-decoration: none;
    color:#333;
    }
    ul li {
    list-style:none;
    }
    .fl {
       float:left;
    }
    .tc {
       text-align:center;
    }
    #write_btn {
        display: block;
       margin-top:40px;
       right: 0;
    }
    #page_num {
       font-size: 14px;
        /* margin-left: 260px; */
       margin-top:30px; 
       text-align: center;
    }
    #page_num ul li {
        float: left;
        margin-left: 10px;
        display: inline-block;
       text-align: center;
    }
    .fo_re, #page_num li {
        display: inline;
       font-weight: bold;
       color:red;
        padding: 5px;
    }
    .list-table {
        margin-top: 20px;
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
      <div class="table_bgbox" style="padding-top: 7%;">
        <strong><span style="margin-left: 8%; font-size: 36px; background: #F9F7F6; border-left: 0.5em solid #E7B7B7; padding: 0.5em;">자유게시판</span></strong>
        <strong><span style="display: inline; font-size: 24px; margin-left: 20px; background: linear-gradient(to right, #A7A3FF,#FFA7A3, #671cc4, #5673bd); -webkit-background-clip: text; -webkit-text-fill-color: transparent; padding: 0.5em; border-bottom: 2px solid #688FF4;">짧은 글로 강렬한 인상을 남겨보세요 !</span></strong>
        <br>  
          <div id="search_box" style="margin-left: 15%;">
            <form style="margin-top: 50px;" action="/search_result.php" method="get">
                <select name="catgo">
                    <option value="title">제목</option>
                    <option value="content">내용</option>
                </select>
                <input type="text" name="search" size="25" required="required" style="background: #FFFFFF;"> <button class="search_btn" style="color: #333;">검색</button>
                <button class="wr_btn" style="display:inline; margin: 20px;">
                <a href="/write.php">글쓰기 <i class="fas fa-pencil-alt fa-1x"></i></a>
                </button>
            </form>
            
          </div>
            <table class="list-table">
            <thead>
                <tr class="table-head">
                    <th width="70">관련태그</th>
                    <th width="300">제목</th>
                    <th width="120">날짜</th>
                    <th width="100">조회수</th>
                    <th width="100">댓글수</th>
                </tr>
            </thead>
            <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }

                $sql = mq("select * from board");
                $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수

                $list = 5; //한 페이지에 보여줄 개수
                $block_ct = 5; //블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

                $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                if($block_end > $total_page) {
                $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                }
                $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

                $sql2 = mq("select * from board order by idx desc limit $start_num, $list");
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
                    <td width="70"><?php echo $tag_kor; ?></td>
                    <td width="300"><a href='read.php?idx=<?php echo $board["idx"];?>'><?php echo $title;?></a></td>
                    <td width="120"><?php echo $board['date']?></td>
                    <td width="100"><?php echo $board['hit']?></td>
                    <td width="100"><?php echo $board['comment']; ?></td>
                </tr>
            </tbody>
            <?php } ?>
            </table>
            <div id="page_num">
                <?php
                if($page <= 1)
                { //만약 page가 1보다 크거나 같다면
                    echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
                }else{
                    echo "<li><a href='?page=1'>처음</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                if($page <= 1)
                { //만약 page가 1보다 크거나 같다면 빈값
                    
                }else{
                $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                    echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                }
                for($i=$block_start; $i<=$block_end; $i++){ 
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                    if($page == $i){ //만약 page가 $i와 같다면 
                    echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                    }else{
                    echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
                    }
                }
                if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                }else{
                    $next = $page + 1; //next변수에 page + 1을 해준다.
                    echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                    echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                }else{
                    echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                }
                ?>
            </div>
            <!-- <div id="write_btn">
            <button class="wr_btn"><a href="/write.php">글쓰기 <i class="fas fa-pencil-alt fa-1x"></i></a></button>
            </div> -->
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