<?php
   include $_SERVER['DOCUMENT_ROOT']."/db.php"; /* db load */
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="index.css">
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/common.js"></script>
<style>
   .table_bgbox {
      min-width: 700px;
   }
    #board_read {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
       width: 95%;
      min-width: 500px;
       position: relative;
       word-break:break-all;
      padding-bottom: 40px;
    }
    #user_info {
       font-size:20px;
    }
    #user_info ul li {
       float:left;
       margin-left:10px;
    }
    #bo_line {
       min-width:400px;
       width: 98%;
       height:2px;
       background: gray;
       margin-top:20px;
    }
    #bo_content {
       margin-top:20px;
    }
    #bo_ser {
       font-size:18px;
       color:#333;
       position: absolute;
       right: 0;
       margin-right: 40px;
    }
    #bo_ser > ul > li {
       float:left;
       margin-left:10px;
    }
   /* 댓글 */
    .reply_view {
       width:900px;
       margin-top:100px; 
       word-break:break-all;
    }
    .dap_lo {
       font-size: 20px;
      width: 90%;
      width: 700px;
       padding: 30px 0px;
       border-bottom: solid 1px gray;
    }
   .dap_lo div:nth-child(2) {
      padding: 5px;
      margin-left: 20px;
   }
    .dap_to {
       margin-top:15px;
    }
    .rep_me {
       font-size:15px;
    }
    .rep_me ul li {
       float:left;
       width: 30px;
    }
    .dat_delete {
       display: none;
    }   
    .dat_edit {
       display:none;
    }
    .dap_sm {
       position: absolute;
       top: 10px;
    }
    .dap_edit_t{
       width:520px;
       height:70px;
       position: absolute;
       top: 40px;
    }
    .re_mo_bt {
       position: absolute;
       top:40px;
       right: 5px;
       width: 90px;
       height: 72px;
    }
    #re_content {
      border-radius: 5px;
      border-style: none;
      width: 75%;
      height: 50px;
      min-width: 100px;
      font-size: 18px;
    }
    .dap_ins {
       margin-top:20px;
    }
   .dap_ins input {
      margin: 5px;
      padding: 5px;
      margin-right: 20px;
      text-align: center;
      border-radius: 5px;
      border-style: none;
   }
    .re_bt {
       position: absolute;
       width:100px;
       height:56px;
       font-size:20px;
       margin-left: 20px;
      border-radius: 10px;
      background-color: #32355d;
      color:white;
    }
    #foot_box {
       height: 50px; 
    }

   ul {
      padding: 0;
   }
   .bor_edit{
		display: none;
	}
	.bor_delete{
		display: none;
	}
</style>
</head>
<body>
<?php
	    $mqq = mq("alter table comment auto_increment =1"); //auto_increment 값 초기화
		$bno = $_GET['idx'];
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
      $tag_kor=$board["tag"];
          if($tag_kor=='humor'){
            $tag_kor='유머';
          }else if($tag_kor=='food'){
            $tag_kor='맛집';
          }else if($tag_kor=='talk'){
            $tag_kor='잡담';
          }
	?>
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
   <br>
    <div class="board">
        <ul>
            <div class="table_bgbox">
                <ul>
               <!-- 글 불러오기 -->
               <div id="board_read">
                  <h2>[<?php echo $tag_kor;?>]<?php echo $board['title']; ?></h2>
                  <span id="user_info">
                  <i class="fas fa-user-circle fa-lg"></i> 익명 <?php echo $board['date']; ?> 조회수:<?php echo $board['hit']; ?>
                  <div id="bo_line"></div>
                  <div id="bo_content">
                     <?php echo nl2br("$board[content]"); ?>
                  </div>
				</span>
                  <!-- 목록, 수정, 삭제 -->
                  <span class="bo_ser" id="bo_ser">
                       <ul style="padding: 0;">
					        <li><a href="/">[목록으로]</a></li>
			                <li><a class="bor_edit_bt" href="#">[수정]</a></li>
			                <li><a class="bor_del_bt" href="#">[삭제]</a></li>
		                </ul>
		<div class='bor_edit'>
		    <form action="modify.php" method="post">
			<input type="hidden" name="rno" value="<?php echo $board['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
		    </form>
	    </div>
		<div class='bor_delete'>
		    <form action="delete.php" method="post">
			    <input type="hidden" name="rno" value="<?php echo $board['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			    <p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
		    </form>
                        </div>
                    </span>
               </div>
            </ul>
            <ul>
<!--- 댓글 불러오기 -->
<div class="reply_view">
  <span style="font-size: 24px; font-weight: bold; border-left: 10px solid #688FF4; padding: 0.5em; border-bottom: 2px solid #688FF4;">댓글목록 <i class="far fa-comment fa-flip-horizontal" ></i> - <?php echo $board['comment']?></span>
      <?php
          $same=array();
          $count=0;
         $count_save=0;
         $sql3 = mq("select * from comment where board_number='".$bno."' order by idx");
         while($comment = $sql3->fetch_array()){ 
            $anony_com=$comment['name'];
            if($anony_com==$board['name']){
               $anony_com='익명(작성자)';
               $count=NULL;
            }else{
               $count_save=$count_save+1;
               $same[$count_save]=$comment['name'];
               
               $anony_com='익명';
               $count=$count_save;

               for($i=1;$i<$count_save;$i++){
                  if($same[$i]==$comment['name']){
                     $count=$i;
                     $count_save=$count_save-1;
                  }
               }
            }
      ?>
      <div style="height: 20px;"></div>
      <div class="dap_lo">
         <div><i class="fas fa-user-circle fa-lg"></i><b><?php echo " ".$anony_com;?><?php echo $count;?></b></div>
         <div class="dap_to comt_edit"><?php echo nl2br("$comment[content]"); ?></div>
         <div class="rep_me dap_to" style="display: inline;"><?php echo $comment['date']; ?></div>
         <div class="rep_me rep_menu" style="display: inline;">
            <a class="dat_edit_bt" href="#">수정</a>
            <a class="dat_delete_bt" href="#">삭제</a>
         </div>
                     <!-- 댓글 수정 폼 dialog -->
                     <div class="dat_edit">
                        <form method="post" action="reply_modify_ok.php">
                           <input type="hidden" name="rno" value="<?php echo $comment['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                           <input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
                           <textarea name="content" class="dap_edit_t"><?php echo $comment['content']; ?></textarea>
                           <input type="submit" value="수정하기" class="re_mo_bt">
                        </form>
                     </div>
                     <!-- 댓글 삭제 비밀번호 확인 -->
                     <div class='dat_delete'>
                        <form action="reply_delete.php" method="post">
                           <input type="hidden" name="rno" value="<?php echo $comment['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                           <p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
                        </form>
                     </div>
                  </div>
                  <?php } ?>
                  <!--- 댓글 입력 폼 -->
                  <div class="dap_ins">
                     <form action="reply_ok.php?idx=<?php echo $bno; ?>" method="post">
                        아이디 <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디" style="width: 200px; height:24px;">
                        비밀번호 <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호" style="width: 200px; height:24px;">
                        <div style="margin-top:10px; ">
                           <textarea name="content" class="reply_content" id="re_content" style="width:550px;"></textarea>
                           <button id="rep_bt" class="re_bt" style="display: inline;">댓글</button>
                        </div>
                     </form>
                  </div>
               </div><!--- 댓글 불러오기 끝 -->
            </ul>
         </div>
      </ul>
   </div>
<div id="foot_box"></div>
</div>

<script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>

</body>
</html>