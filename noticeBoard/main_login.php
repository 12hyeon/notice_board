<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '011212',
    'db');
$info = array(
    'id'=>'로그인', 
    'pw'=>'회원가입'
);
if(isset($_POST['id'])) {
    $sql = "SELECT * from member WHERE id={$_POST['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $info['id'] = $row['id'];
    $info['pw'] = $row['password'];
    echo $info['id'];
    echo $info['pw'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>메인 홈페이지</title>
</head>

<body>
<header class="bar">
        <div class="home">
            <a href="main.html"><img src="/image/4STUP_log.png" alt="4STUP_logo"></a>
            <a class="homepage" href="main.html">4STUP: Mobile Lab</a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="board.html"><strong>익명게시판</strong></a></li>
                <li><input type="text" placeholder="Search"><i class="fas fa-search"></i></li>
            </ul>
        </div>
        <div class="btn">
            <ul>
            <?php if ($info['id'] != '로그인') {?>
                <li><strong><?=$info['id']?>님 </strong></a></li>
                <li><strong>어서오세요</strong></a></li>
                <?php } else {?>
                    <li><a class="login" href="login.php"><strong>로그인</strong></a></li>
                <li><a class="signup" href="sign.php"><strong>회원가입</strong></a></li>
                <?php } ?>
            </ul>
        </div>
    </header>

    <div class="board">
		<ul>
			<div class="table_bgbox">
                <h1 style="margin-left: 17%; font-size: 50px;">익명 게시판 인기글🔥</h1>
				<table style="margin-left: auto; margin-right: auto;">
					<thead>
						<tr class="table-head">
							
							<th class="column1">관련태그</th>
							<th class="column2">제목</th>
                            <th class="column3">날짜</th>
							<th class="column4">조회수</th>
                            <th class="column5">댓글수</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td class="column1">😃유머</td>
								<td class="column2">본인 수강신청 망함</td>
                                <td class="column3">2022-02-22 01:22</td>
								<td class="column4">2</td>
                                <td class="column5">1</td>
							</tr>
					</tbody>
				</table>
                <br>
                <div style="text-align: center;">
                    <button><이전></button>
                    <button><다음></button>
                </div>
			</div>
		</ul>
	</div>
    
    <div class="footer">
        <h2><pre>이용약관    개인정보처리방침    커뮤니티처리방침    공지사항    문의하기</pre></h2>
    </div>

    <script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>

</body>

</html>