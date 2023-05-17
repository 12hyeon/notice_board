<?php include  $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <meta charset="UTF-8">
  <!-- <form method="post", action="write_ok.php"> -->
  <title>새 글 작성</title>
  <style>
    /* div {
        text-align: center;
    } */
    .board ul {
        border-style: none;
        text-align: center;
    }
    #wr_btn {
    text-align: center;
    background-color: lightslategray;
    width: 1800px;
    height: 30px;
    border-radius: 5px;
    margin: auto;
    }
    .table_bgbox {
        min-width: 600px;
    }
    .table_bgbox input {
        border-style: none;
        border-radius: 5px;
        text-align: center;
        margin: 5px;
        padding: 2px;
        margin-left: auto;
        margin-right: auto;
    }
    .table_bgbox input:hover {
        border-bottom: #32355d;
    }
    select {
        width: 80px;
        padding: 3px;
        border-radius: 5px;
    }
    #title {
        width: 40%;
        /* max-width: 200px; */
        padding: 3px;
    }
    #id, #pw {
        padding: 3px;
        margin-right: 10px;
    }
    ul {
        padding: 0;
    }
    #wr_login {
        margin-bottom: 10px;
    }
    #wr_login input {
        margin-left: 10px;
    }
    #wr_info input, #wr_bottom input {
        margin: 0px 20px 10px 20px;
    }
    #wr_info {
        border-bottom:1px solid lightslategray;
        width: 100%;
    }
    #wr_bottom {
        margin-top: 20px;
    }
    .corr, .delete, .write {
        padding: 30px;
    }
    textarea {
        margin-top: 20px;
        border-style: none;
        border-radius: 10px;
        width: 100%;
        height: 500px;
        min-height: 200px;
        min-width: 500px;
    }
    .finish_btn {
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
          <!-- <option value="name">글쓴이</option>dmdmw -->
          <option value="content">내용</option>
        </select>
        <input type="text" name="search" required="required"> <button class="search_btn">검색</button>
      </form>
    </div>
  </header>
    <br>
    <div class="board">
        <ul>
            <div class="table_bgbox">
                <form action="write_ok.php" method="post">
                    <div id="wr_login">
                        아이디 <input id="id" type="text" name= "name">
                        비밀번호 <input id="pw" type="password" name="pw">
                    </div>
                
                    <div id="wr_info">
                        <select name="tag">
                            <option value="humor">유머</option>
                            <option value="food">맛집</option>
                            <option value="talk">잡담</option>
                        </select>
                        <input type="text" id="title" name="title" placeholder="제목" style="width:50%;">
                        <i class="fas fa-user-circle fa-lg"></i> 익명
                    </div>
                    <ul>
                        <div class="text">
                            <textarea name="content" placeholder="[커뮤니티 이용규칙 안내]
                            
본 게시판은 누구나 기분 좋게 참여할 수 있는 커뮤니티를 만들기 위해 커뮤니티 이용규칙을 제정하여 운영하고 있습니다. 
모든 이용자는 커뮤니티 이용 전 반드시 커뮤니티 이용규칙의 모든 내용을 숙지하여야 합니다.
                                                
모든 이용자는 방송통신심의위원회의 정보통신에 관한 심의규정, 현행 법률, 서비스 이용 약관 및 커뮤니티 이용규칙을 위반하거나, 사회 통념 및 관련 법령을 기준으로 타 이용자에게 악영향을 끼치는 경우, 게시물이 삭제되고 서비스 이용이 일정 기간 제한될 수 있습니다.
                                                
커뮤니티 이용규칙은 불법 행위, 각종 차별 및 혐오, 사회적 갈등 조장, 타인의 권리 침해, 다른 이용자에게 불쾌감을 주는 행위, 커뮤니티 유출 행위, 시스템 장애를 유발하는 비정상 행위 등 커뮤니티 분위기 형성과 운영에 악영향을 미치는 행위들을 제한하기 위해 지속적으로 개정됩니다. 중대한 변경사항이 있는 경우에는 공지사항을 통해 고지하므로 반드시 확인해주시기 바랍니다.
                                                
커뮤니티 이용규칙에서 사용된 용어의 정의는 서비스 이용약관을 따릅니다."></textarea>
                        </div>
                    </ul>
                    <button class="finish_btn" type="submit">작성 완료 <i class="fas fa-pencil-alt fa-1x"></i></button>
                </form>
                <br>
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
    
    <script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>

</body>

</html>
</html>